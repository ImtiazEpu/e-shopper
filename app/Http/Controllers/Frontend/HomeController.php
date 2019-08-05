<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function showHomePage()
    {
        $data = [];
        $data['products'] = Product::with('media')->select(['id','title', 'slug', 'price', 'sale_price'])
            ->where('active', 1)
            ->paginate(9);
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'], 'total_price'));
        return view('frontend.home',$data);

    }
}
