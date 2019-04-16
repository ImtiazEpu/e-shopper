<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use App\Notifications\RegistrationEmailNotification;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class
AuthController extends Controller
{
    public function shoLoginForm()
    {
        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'], 'total_price'));
        return view('frontend.auth.login', $data);
    }

    public function processLogin()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = request()->only(['email', 'password']);
        if(auth()->attempt($credentials)) {
            if (Auth::user()->hasAnyRole('admin')) {
                $this->setSuccess('Admin logged in.');
                return redirect('/dashboard');
            } else {
                if (auth()->user()->email_verified_at === null) {
                    $this->setError('Your account is not activated.');
                    return redirect()->route('login');
                }
            }
            $this->setSuccess('User logged in.');
            return redirect('/');
        }/*else
            if (auth()->user()->email_verified_at === null) {
                $this->setError('Your account is not activated.');
                return redirect()->route('login');
            }
            $this->setSuccess('User logged in.');
            return redirect('/');
        }*/


        $this->setError('Invalid credentials.');
        return redirect()->back();

    }

    public function shoRegisterForm()
    {
        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'], 'total_price'));
        return view('frontend.auth.register',$data);
    }

    public function processRegister()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|min:11|max:13|unique:users,phone_number',
            'password' => 'required|min:6|',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $user = User::create([
                'name' => request()->input('name'),
                'email' => strtolower(request()->input('email')),
                'phone_number' => request()->input('phone_number'),
                'password' => bcrypt(request()->input('password')),
                'email_verification_token' => uniqid(time(), true) . str_random(16),
            ]);
            $role = Role::select('id')->where('name','user')->first();
            $user->roles()->attach($role);

            $user->notify(new RegistrationEmailNotification($user));
            //return $user;

            $this->setSuccess('Registration successful');
            return redirect()->route('login');
        } catch (\Exception $e) {
            $this->setError($e->getMessage());
            return redirect()->back();
        }
    }

    public function activate($token = null)
    {
        if ($token === null) {
            return redirect('/');
        }
        $user = User::where('email_verification_token', $token)->firstOrFail();

        if ($user) {
            $user->update([
                'email_verified_at' => Carbon::now(),
                'email_verification_token' => null,
            ]);
            $this->setSuccess('Account activated. You can login now.');
            return redirect()->route('login');
        }

        $this->setError('Invalid token.');
        return redirect()->route('login');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    public function profile()
    {
        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['orders'] = Order::where('user_id', auth()->user()->id)->get();
        return view('frontend.auth.profile', $data);
    }
}
