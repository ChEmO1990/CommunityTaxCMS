<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Models\Accounts\Account;
use App\Models\Employees\Employee;
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
        $name = $request['name'];
        $network_account = $request['network_account'];
        $email = $request['email'];
        $clone_account = $request['clone_account'];
        $location = $request['location'];
        $job_title = $request['job_title'];
        $did = $request['did'];
        $ext = $request['ext'];
        $start_date = $request['start_date'];

        $clogics_account = $request['clogics_account'];
        $logics = $request['logics'];
        $assign_logics_sms = $request['assign_logics_sms'];
        $tax_preparer_udfid = $request['tax_preparer_udfid'];
        $tax_preparers_eas = $request['tax_preparers_eas'];
        $ifax_account = $request['ifax_account'];
        $spark = $request['spark_account'];
        $docstar = $request['docstar'];
        $user_to_scanner = $request['user_to_scanner'];

        //We create an Employee instance and we set parameters
        $employee = new Employee;
        $employee->name = $name;
        $employee->network_account = $network_account;
        $employee->email = $email;
        $employee->clone_account = $clone_account;
        $employee->location = $location;
        $employee->job_title = $job_title;
        $employee->did = $did;
        $employee->ext = $ext;
        $employee->start_date = $start_date;
        $employee->save();

        //Personal Account
        $personal_account = new Account();
        $personal_account->employee_id = $employee->id;
        $personal_account->type_account = Account::TYPE_PERSONAL_ACCOUNT;
        $personal_account->user_name = $network_account;
        $personal_account->password = Account::DEFAULT_PASSWORD;
        $personal_account->save();

        //Outlook Account
        $outlook_account = new Account();
        $outlook_account->employee_id = $employee->id;
        $outlook_account->type_account = Account::TYPE_OUTLOOK_ACCOUNT;
        $outlook_account->user_name = $email;
        $outlook_account->password = Account::DEFAULT_PASSWORD;
        $outlook_account->save();

        //PhoneSystem Account
        $phonesys_account = new Account();
        $phonesys_account->employee_id = $employee->id;
        $phonesys_account->type_account = Account::TYPE_PHONESYSTEM_ACCOUNT;
        $phonesys_account->user_name = $network_account;
        $phonesys_account->password = Account::DEFAULT_PASSWORD;
        $phonesys_account->save();

        //3C Logics Account
        if( !empty($clogics_account) ) {
            $employee->clogics_account = true;
            $logics3c_account = new Account();
            $logics3c_account->employee_id = $employee->id;
            $logics3c_account->type_account = Account::TYPE_3CLOGICS_ACCOUNT;
            $logics3c_account->user_name = str_replace(' ', '', $name);
            $logics3c_account->password = Account::DEFAULT_PASSWORD;
            $logics3c_account->save();
        } else {
            $employee->clogics_account = false;
            $logics3c_account = new Account();
            $logics3c_account->employee_id = $employee->id;
            $logics3c_account->type_account = Account::TYPE_3CLOGICS_ACCOUNT;
            $logics3c_account->save();
        }

        //Logics Account
        if( !empty($logics) ) {
            $employee->logics_account = true;
            $logics_account = new Account();
            $logics_account->employee_id = $employee->id;
            $logics_account->type_account = Account::TYPE_LOGICS_ACCOUNT;
            $logics_account->user_name = $email;
            $logics_account->save();
        } else {
            $employee->logics_account = false;
            $logics_account = new Account();
            $logics_account->employee_id = $employee->id;
            $logics_account->type_account = Account::TYPE_LOGICS_ACCOUNT;
            $logics_account->save();
        }

        //Hylafax Account
        if( !empty($ifax_account) ) {
            $employee->ifax_account = true;
            $hylafax_account = new Account();
            $hylafax_account->employee_id = $employee->id;
            $hylafax_account->type_account = Account::TYPE_HYLAFAX_ACCOUNT;
            $hylafax_account->user_name = $network_account;
            $hylafax_account->password = Account::DEFAULT_PASSWORD;
            $hylafax_account->save();
        } else {
            $employee->ifax_account = false;
            $hylafax_account = new Account();
            $hylafax_account->employee_id = $employee->id;
            $hylafax_account->type_account = Account::TYPE_HYLAFAX_ACCOUNT;
            $hylafax_account->save();
        }

        //Spark Account
        if( !empty($spark) ) {
            $employee->spark_account = true;
            $sparkAccount = new Account();
            $sparkAccount->employee_id = $employee->id;
            $sparkAccount->type_account = Account::TYPE_SPARK_ACCOUNT;
            $sparkAccount->user_name = $ext;
            $sparkAccount->password = Account::DEFAULT_PASSWORD_SPARK;
            $sparkAccount->save();
        } else {
            $employee->spark_account = false;
            $sparkAccount = new Account();
            $sparkAccount->employee_id = $employee->id;
            $sparkAccount->type_account = Account::TYPE_SPARK_ACCOUNT;
            $sparkAccount->save();
        }

        //DocStar Account
        if( !empty($docstar) ) {
            $employee->ds_account = true;
            $docstar_account = new Account();
            $docstar_account->employee_id = $employee->id;
            $docstar_account->type_account = Account::TYPE_DOCSTAR_ACCOUNT;
            $docstar_account->user_name = $network_account;
            $docstar_account->password = Account::DEFAULT_PASSWORD;
            $docstar_account->save();
        } else {
            $employee->ds_account = false;
            $docstar_account = new Account();
            $docstar_account->employee_id = $employee->id;
            $docstar_account->type_account = Account::TYPE_DOCSTAR_ACCOUNT;
            $docstar_account->save();
        }

        if( !empty($assign_logics_sms) ) {
            $employee->assign_logics_sms = true;
        } else {
            $employee->assign_logics_sms = false;
        }

        if( !empty($tax_preparer_udfid) ) {
            $employee->tax_preparer_udfid = true;
        } else {
            $employee->tax_preparer_udfid = false;
        }

        if( !empty($tax_preparers_eas) ) {
            $employee->tax_preparers_eas = true;
        } else {
            $employee->tax_preparers_eas = false;
        }

        if( !empty($ifax_account) ) {
            $employee->ifax_account = true;
        } else {
            $employee->ifax_account = false;
        }

        if( !empty($user_to_scanner) ) {
            $employee->user_to_scanner = true;
        } else {
            $employee->user_to_scanner = true;
        }

        $employee->save();

        alert()->success('Employee', 'The record has been saved successfully.');
        return redirect()->route('employees.index')->with('message', 'item added');

        echo 'Todo se grabo correctamente';
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
