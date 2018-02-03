<?php

namespace App\Http\Controllers\Dashboard;

use App\SmsNumber\SmsNumber;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_list = SmsNumber::all();
        return view('dashboard.index', compact('my_list'));
    }
}
