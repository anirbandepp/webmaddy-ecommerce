<?php

namespace App\Http\Controllers;

use App\Models\CustomerActivity;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerActivityController extends Controller
{
    public function index()
    {
        $users = User::with('usersactivity')->get();

        return view('admin.pages.customersactivity.list')->with([
            'users' => $users
        ]);
    }
}
