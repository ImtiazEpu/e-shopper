<?php

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@mintshop.com',
            'phone_number' => '01616567207',
            'password' => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
        ]);
        $user = User::create([
            'name'=>'User',
            'email'=>'user@mintshop.com',
            'phone_number' => '01676567207',
            'password' => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
        factory(User::class, 10)->create();



    }
}
