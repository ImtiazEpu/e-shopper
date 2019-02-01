<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setSuccess($message):void
    {
        session()->flash('type', 'success');
        session()->flash('message', $message);
    }

    public function setError($message):void
    {
        session()->flash('type', 'warning');
        session()->flash('message', $message);
    }
}
