<?php

namespace App\Http\Controllers\Employee;

use App\Employee\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->input('s');

        if(empty($input) ) {
            $employees = Employee::paginate(20);
            return view('employee.index', compact('employees'))->with('page_title', 'List of Employees')
                                         ->with('page_description', 'You can see all employees.');
        } else {
            $employees = Employee::latest()
            ->search($input)
            ->paginate(20);
            return view('employee.index', compact('employees', 'input'))->with('page_title', 'List of Employees')
                                         ->with('page_description', 'You can see all employees.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.new_hire')->with('page_title', 'Create New Employee')
                                         ->with('page_description', 'This section let you create a new employee.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        var_dump($request->all());

        /*
        $rules = [
            'name' => 'required',
            'network_account' => 'required',
            'email' => 'required',
            'clone_account' => 'required',
            'location' => 'required',
            'job_title' => 'required',
            'start_date' => 'required'
        ];
        
        $this->validate($request, $rules);


        $full_name = $request['full_name'];
        $network_account = $request['network_account'];
        $email = $request['email'];
        $manager_account_name = $request['manager_account_name'];
        $locations = $request['locations'];
        $job_title = $request['job_title'];
        $did = $request['did'];
        $ext = $request['ext'];
        $date = $request['date'];
        $clogics = $request['3clogics'];
        $logics = $request['logics'];
        $assign_logics_sms = $request['assign_logics_sms'];
        $tax_preparer_udfid = $request['tax_preparer_udfid'];
        $tax_preparer_eas = $request['tax_preparer_eas'];
        $ifax_account = $request['ifax_account'];
        $spark_account = $request['spark_account'];
        $docstar = $request['docstar'];
        $user_scanner = $request['user_scanner'];


        $employee = new Employee();
        $employee->name($full_name);
        $employee->network_account($network_account);
        $employee->email($email);
        $employee->clone_account($manager_account_name);
        $employee->location($locations);
        $employee->job_title($job_title);
        $employee->did($did);
        $employee->ext($ext);
        $employee->start_date($date);

        $employee->clogics_account($clogics);
        $employee->logics_account($logics);
        $employee->assign_logics_sms($assign_logics_sms);
        $employee->tax_preparer_udfid($tax_preparer_udfid);
        $employee->tax_preparers_eas($tax_preparer_eas);
        $employee->ifax_account($ifax_account);
        $employee->spark_account($spark_account);
        $employee->ds_account($docstar);
        $employee->user_to_scanner($user_scanner);

        var_dump($employee);
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        echo 'Hola';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
