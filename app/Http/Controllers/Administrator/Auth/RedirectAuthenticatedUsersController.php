<?php

namespace App\Http\Controllers\Administrator\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role_action == 'superAdmin') {
            return redirect('/adminDashboard');
        } elseif (auth()->user()->role_action == 'admin') {
            return redirect('/userDashboard');
        } elseif (auth()->user()->role_action == 'employee') {
            return redirect('/guestDashboard');
        } else {
            return auth()->logout();
        }
    }
}
