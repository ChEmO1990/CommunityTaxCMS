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
        $input_s = $request->input('s');
        $input_status = $request->input('status');

        if(empty($input_s)) {
            switch($input_status) {
            case 'active': 
                $employees = Employee::where('status', 1)->paginate(20);
                return view('employee.index', compact('employees', 'input_status'))
                    ->with('page_title', 'Employees')
                    ->with('page_description', '');
            break;

            case 'inactive': 
                $employees = Employee::where('status', 0)->paginate(20);
                return view('employee.index', compact('employees', 'input_status'))
                    ->with('page_title', 'Employees')
                    ->with('page_description', '');
            break;

            case 'Chicago': 
                $employees = Employee::where('location', 'Chicago')->paginate(20);
                return view('employee.index', compact('employees', 'input_status'))
                    ->with('page_title', 'Employees')
                    ->with('page_description', '');
            break;

            case 'Cancun': 
                $employees = Employee::where('location', 'Cancun')->paginate(20);
                return view('employee.index', compact('employees', 'input_status'))
                    ->with('page_title', 'Employees')
                    ->with('page_description', '');
            break;

            case 'Puerto Rico': 
                $employees = Employee::where('location', 'Puerto Rico')->paginate(20);
                return view('employee.index', compact('employees', 'input_status'))
                    ->with('page_title', 'Employees')
                    ->with('page_description', '');
            break;

            case 'reset': 
                $employees = Employee::where('location', 'Puerto Rico')->paginate(20);
                return view('employee.index', compact('employees'))
                    ->with('page_title', 'Employees')
                    ->with('page_description', '');
            break;

            default:
            $employees = Employee::paginate(20);
                return view('employee.index', compact('employees'))
                    ->with('page_title', 'Employees')
                    ->with('page_description', '');
        }
        } else {
            $employees = Employee::latest()
            ->search($input_s)
            ->paginate(20);
            return view('employee.index', compact('employees', 'input_s'))->with('page_title', 'Employees')
            ->with('page_description', '.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.new_hire')->with('page_title', 'Create Employee')
        ->with('page_description', '');
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
        $manager = $request['manager'];
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
        $employee->manager = $manager;
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
            $logics3c_account->password = Account::DEFAULT_3CLOGICS_PASSWORD;
            $logics3c_account->save();
        } else {
            $employee->clogics_account = false;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $accounts = Employee::find($employee->id)->accounts;
        return view('employee.show', compact('employee'), compact('accounts'))->with('page_title', 'Detailed Information')
        ->with('page_description', '');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $termination)
    {
        $employee = Employee::find($id);
        $accounts = Employee::find($id)->accounts;

        if( $termination == 'yes' ) {
            return view('employee.termination')
            ->with('employee', $employee)
            ->with('accounts', $accounts)
            ->with('page_title', 'Termination Form')
            ->with('page_description', '');
        } else {
            if( $employee->status == 1 ) {
                return view('employee.edit')
                ->with('employee', $employee)
                ->with('accounts', $accounts)
                ->with('page_title', 'Edit Active Employee Form')
                ->with('page_description', '');
            } else {
                return view('employee.edit_inactive_employee')
                ->with('employee', $employee)
                ->with('accounts', $accounts)
                ->with('page_title', 'Edit Inactive Employee Form')
                ->with('page_description', '');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $accounts = Employee::find($id)->accounts;

        $rules = [ 
            'network_account' => 'required', 
            'email'  => 'required', 
            'manager'  => 'required', 
            'clone_account' => 'required',
            'location' => 'required',
            'job_title' => 'required',
            'ext' => 'required',
        ];

        $this->validate($request, $rules);

        $network_account = $request['network_account'];
        $email = $request['email'];
        $manager = $request['manager'];
        $clone_account = $request['clone_account'];
        $location = $request['location'];
        $job_title = $request['job_title'];
        $did = $request['did'];
        $ext = $request['ext'];
        $fwd_to_name = $request['fwd_to_name'];
        $fwd_to_ext = $request['fwd_to_ext'];
        $fwd_to_mail = $request['fwd_to_mail'];

        //Active User
        $clogics_account = $request['clogics_account'];
        $logics_account = $request['logics_account'];
        $assign_logics_sms = $request['assign_logics_sms'];
        $tax_preparer_udfid = $request['tax_preparer_udfid'];
        $tax_preparers_eas = $request['tax_preparers_eas'];
        $ifax_account = $request['ifax_account'];
        $spark_account = $request['spark_account'];
        $ds_account = $request['ds_account'];
        $user_to_scanner = $request['user_to_scanner'];

        //Inactive User
        $run_script = $request['run_script'];
        $delete_app_calendar = $request['delete_app_calendar'];
        $move_tasks_in_logics = $request['move_tasks_in_logics'];
        $release_sms = $request['release_sms'];
        $set_logics_to_inactive = $request['set_logics_to_inactive'];
        $dis_empl_account = $request['dis_empl_account'];
        $rel_ext = $request['rel_ext'];
        $check_mac = $request['check_mac'];
        $golive = $request['golive'];
        $removehylafax_account = $request['removehylafax_account'];
        $printer_scanner = $request['printer_scanner'];
        $remove_scandocs_folder = $request['remove_scandocs_folder'];
        $movedocs_autoimport = $request['movedocs_autoimport'];
        $remove_docstar_inbox = $request['remove_docstar_inbox'];
        $remfrm_trueportal = $request['remfrm_trueportal'];
        $remfrm_adt = $request['remfrm_adt'];
        $remfrm_website = $request['remfrm_website'];
        
        if( $employee->status === 1 ) {
        //We save the information
            $employee->network_account = $network_account;
            $employee->email = $email;
            $employee->manager = $manager;
            $employee->clone_account = $clone_account;
            $employee->location = $location;
            $employee->job_title = $job_title;
            $employee->did = $did;
            $employee->ext = $ext;

            //We check checkbox current status
        if( !empty($clogics_account) ) {
            $employee->clogics_account = true;
        } else {
            $employee->clogics_account = false;
        }

        if( !empty($logics_account) ) {
            $employee->logics_account = true;
        } else {
            $employee->logics_account = false;
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

        if( !empty($spark_account) ) {
            $employee->spark_account = true;
        } else {
            $employee->spark_account = false;
        }

        if( !empty($ds_account) ) {
            $employee->ds_account = true;
        } else {
            $employee->ds_account = false;
        }

        if( !empty($user_to_scanner) ) {
            $employee->user_to_scanner = true;
        } else {
            $employee->user_to_scanner = false;
        }

        $employee->save();

        //Get parameters from foreach view Manually
            $username0 = $request['username0'];
            $username1 = $request['username1'];
            $username2 = $request['username2'];
            $username3 = $request['username3'];
            $username4 = $request['username4'];
            $username5 = $request['username5'];
            $username6 = $request['username6'];
            $username7 = $request['username7'];

            $password0 = $request['password0'];
            $password1 = $request['password1'];
            $password2 = $request['password2'];
            $password3 = $request['password3'];
            $password4 = $request['password4'];
            $password5 = $request['password5'];
            $password6 = $request['password6'];
            $password7 = $request['password7'];

            Account::where('employee_id', $id)
            ->where('type_account', Account::TYPE_PERSONAL_ACCOUNT)
            ->update(['user_name' => $username0,'password' => $password0]);

            Account::where('employee_id', $id)
            ->where('type_account', Account::TYPE_3CLOGICS_ACCOUNT)
            ->update(['user_name' => $username1,'password' => $password1]);

            Account::where('employee_id', $id)
            ->where('type_account', Account::TYPE_LOGICS_ACCOUNT)
            ->update(['user_name' => $username2,'password' => $password2]);

            Account::where('employee_id', $id)
            ->where('type_account', Account::TYPE_OUTLOOK_ACCOUNT)
            ->update(['user_name' => $username3,'password' => $password3]);

            Account::where('employee_id', $id)
            ->where('type_account', Account::TYPE_SPARK_ACCOUNT)
            ->update(['user_name' => $username4,'password' => $password4]);

            Account::where('employee_id', $id)
            ->where('type_account', Account::TYPE_HYLAFAX_ACCOUNT)
            ->update(['user_name' => $username5,'password' => $password5]);

            Account::where('employee_id', $id)
            ->where('type_account', Account::TYPE_PHONESYSTEM_ACCOUNT)
            ->update(['user_name' => $username6,'password' => $password6]);

            Account::where('employee_id', $id)
            ->where('type_account', Account::TYPE_DOCSTAR_ACCOUNT)
            ->update(['user_name' => $username7,'password' => $password7]);

            alert()->success('Active Employee Edit', 'The record has been edited successfully.');
            return redirect()->route('employees.show', ['id' => $employee->id]);
        } else {
            $employee->network_account = $network_account;
            $employee->email = $email;
            $employee->manager = $manager;
            $employee->clone_account = $clone_account;
            $employee->location = $location;
            $employee->job_title = $job_title;
            $employee->did = $did;
            $employee->ext = $ext;
            $employee->fwd_to_name = $fwd_to_name;
            $employee->fwd_to_ext = $fwd_to_ext;
            $employee->fwd_to_mail = $fwd_to_mail;

            //We check checkbox current status
            if( !empty($run_script) ) {
                $employee->run_script = true;
            } else {
                $employee->run_script = false;
            }

            if( !empty($delete_app_calendar) ) {
                $employee->delete_app_calendar = true;
            } else {
                $employee->delete_app_calendar = false;
            }

            if( !empty($move_tasks_in_logics) ) {
                $employee->move_tasks_in_logics = true;
            } else {
                $employee->move_tasks_in_logics = false;
            }

            if( !empty($release_sms) ) {
                $employee->release_sms = true;
            } else {
                $employee->release_sms = false;
            }

            if( !empty($set_logics_to_inactive) ) {
                $employee->set_logics_to_inactive = true;
            } else {
                $employee->set_logics_to_inactive = false;
            }

            if( !empty($dis_empl_account) ) {
                $employee->dis_empl_account = true;
            } else {
                $employee->dis_empl_account = false;
            }

            if( !empty($rel_ext) ) {
                $employee->rel_ext = true;
            } else {
                $employee->rel_ext = false;
            }

            if( !empty($check_mac) ) {
                $employee->check_mac = true;
            } else {
                $employee->check_mac = false;
            }

            if( !empty($golive) ) {
                $employee->golive = true;
            } else {
                $employee->golive = false;
            }

            if( !empty($removehylafax_account) ) {
                $employee->removehylafax_account = true;
            } else {
                $employee->removehylafax_account = false;
            }

            if( !empty($printer_scanner) ) {
                $employee->printer_scanner = true;
            } else {
                $employee->printer_scanner = false;
            }

            if( !empty($remove_scandocs_folder) ) {
                $employee->remove_scandocs_folder = true;
            } else {
                $employee->remove_scandocs_folder = false;
            }

            if( !empty($movedocs_autoimport) ) {
                $employee->movedocs_autoimport = true;
            } else {
                $employee->movedocs_autoimport = false;
            }

            if( !empty($remove_docstar_inbox) ) {
                $employee->remove_docstar_inbox = true;
            } else {
                $employee->remove_docstar_inbox = false;
            }

            if( !empty($remfrm_trueportal) ) {
                $employee->remfrm_trueportal = true;
            } else {
                $employee->remfrm_trueportal = false;
            }

            if( !empty($remfrm_adt) ) {
                $employee->remfrm_adt = true;
            } else {
                $employee->remfrm_adt = false;
            }

            if( !empty($remfrm_website) ) {
                $employee->remfrm_website = true;
            } else {
                $employee->remfrm_website = false;
            }
            
            $employee->save();

            alert()->success('Inactive Employee Edit', 'The record has been edited successfully.');
            return redirect()->route('employees.show', ['id' => $employee->id]);
        }
    }

    public function termination(Request $request, $id)
    {
        $employee = Employee::find($id);

        $rules = [ 
            'term_date'   => 'required',
            'fwd_to_name' => 'required', 
            'fwd_to_ext'  => 'required', 
            'fwd_to_mail' => 'required',
        ];

        $this->validate($request, $rules);

        $term_date = $request['term_date'];
        $fwd_to_name = $request['fwd_to_name'];
        $fwd_to_ext = $request['fwd_to_ext'];
        $fwd_to_mail = $request['fwd_to_mail'];

        //We save the basic parameters first
        $employee->status = false; //This is the most important parameter
        $employee->term_date = $term_date;
        $employee->fwd_to_name = $fwd_to_name;
        $employee->fwd_to_ext = $fwd_to_ext;
        $employee->fwd_to_mail = $fwd_to_mail;

        $run_script = $request['run_script'];
        $delete_app_calendar = $request['delete_app_calendar'];
        $move_tasks_in_logics = $request['move_tasks_in_logics'];
        $release_sms = $request['release_sms'];
        $set_logics_to_inactive = $request['set_logics_to_inactive'];
        $dis_empl_account = $request['dis_empl_account'];
        $rel_ext = $request['rel_ext'];
        $check_mac = $request['check_mac'];
        $golive = $request['golive'];
        $removehylafax_account = $request['removehylafax_account'];
        $printer_scanner = $request['printer_scanner'];
        $remove_scandocs_folder = $request['remove_scandocs_folder'];
        $movedocs_autoimport = $request['movedocs_autoimport'];
        $remove_docstar_inbox = $request['remove_docstar_inbox'];
        $remfrm_trueportal = $request['remfrm_trueportal'];
        $remfrm_adt = $request['remfrm_adt'];
        $remfrm_website = $request['remfrm_website'];

        if( !empty($run_script) ) {
            $employee->run_script = true;
        }

        if( !empty($delete_app_calendar) ) {
            $employee->delete_app_calendar = true;
        }

        if( !empty($move_tasks_in_logics) ) {
            $employee->move_tasks_in_logics = true;
        }

        if( !empty($release_sms) ) {
            $employee->release_sms = true;
        }

        if( !empty($set_logics_to_inactive) ) {
            $employee->set_logics_to_inactive = true;
        }

        if( !empty($dis_empl_account) ) {
            $employee->dis_empl_account = true;
        }

        if( !empty($rel_ext) ) {
            $employee->rel_ext = true;
        }
        
        if( !empty($check_mac) ) {
            $employee->check_mac = true;
        }

        if( !empty($golive) ) {
            $employee->golive = true;
        }

        if( !empty($removehylafax_account) ) {
            $employee->removehylafax_account = true;
        }

        if( !empty($printer_scanner) ) {
            $employee->printer_scanner = true;
        }

        if( !empty($remove_scandocs_folder) ) {
            $employee->remove_scandocs_folder = true;
        }

        if( !empty($movedocs_autoimport) ) {
            $employee->movedocs_autoimport = true;
        }

        if( !empty($remove_docstar_inbox) ) {
            $employee->remove_docstar_inbox = true;
        }

        if( !empty($remfrm_trueportal) ) {
            $employee->remfrm_trueportal = true;
        }

        if( !empty($remfrm_adt) ) {
            $employee->remfrm_adt = true;
        }

        if( !empty($remfrm_website) ) {
            $employee->remfrm_website = true;
        }

        //We save new values into table
        $employee->save();

        Account::where('employee_id', $id)
        ->where('type_account', Account::TYPE_PERSONAL_ACCOUNT)
        ->update(['status' => false]);

        Account::where('employee_id', $id)
        ->where('type_account', Account::TYPE_3CLOGICS_ACCOUNT)
        ->update(['status' => false]);

        Account::where('employee_id', $id)
        ->where('type_account', Account::TYPE_LOGICS_ACCOUNT)
        ->update(['status' => false]);

        Account::where('employee_id', $id)
        ->where('type_account', Account::TYPE_OUTLOOK_ACCOUNT)
        ->update(['status' => false]);

        Account::where('employee_id', $id)
        ->where('type_account', Account::TYPE_SPARK_ACCOUNT)
        ->update(['status' => false]);

        Account::where('employee_id', $id)
        ->where('type_account', Account::TYPE_HYLAFAX_ACCOUNT)
        ->update(['status' => false]);

        Account::where('employee_id', $id)
        ->where('type_account', Account::TYPE_PHONESYSTEM_ACCOUNT)
        ->update(['status' => false]);

        Account::where('employee_id', $id)
        ->where('type_account', Account::TYPE_DOCSTAR_ACCOUNT)
        ->update(['status' => false]);

        alert()->success('Termination Process', 'The termination process has been finished successfully.');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {

    }
}