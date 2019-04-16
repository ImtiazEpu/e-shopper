<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller
{
    public function showDashPage()
    {

        return view('backend.dashboard');

    }
}
