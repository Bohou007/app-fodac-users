<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        if (Auth::user()->account_type == 'OC') {
            return view('notifications.users.index');
        }else {
            return view('notifications.admin.index');
        }

    }
}
