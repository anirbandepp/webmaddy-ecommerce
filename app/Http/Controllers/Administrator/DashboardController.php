<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        /*
         * Uncomment the line below if you want to use verified middleware
         */
        //$this->middleware('verified:administrator.verification.notice');
    }


    public function index()
    {
        $user = Auth::user();

        return view('administrator.dashboard')->with(['user' => $user]);
    }
}
