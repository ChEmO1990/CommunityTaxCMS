<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Sms\SmsNumber;
use App\Models\Employees\Employee;
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
        $sms_phones = SmsNumber::all();
        $sms_available = SmsNumber::where('status', 1);
        $sms_not_available = SmsNumber::where('status', 0);
        $employees = Employee::all();
        $active_employees = Employee::where('status', 1);
        $inactive_employees = Employee::where('status', 0);
        return view('dashboard.index')
        ->with(compact('sms_phones'))
        ->with(compact('sms_available'))
        ->with(compact('sms_not_available'))
        ->with(compact('employees'))
        ->with(compact('active_employees'))
        ->with(compact('inactive_employees'))
        ->with('page_title', 'Database Summary')
        ->with('page_description', 'You can see a brief summary of our records');
    }
}
