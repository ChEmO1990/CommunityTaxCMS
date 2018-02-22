<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Models\Sms\SmsNumber;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\SmsNumberRequest;

class SmsNumberController extends Controller
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

        if(empty($input_s) ) {
            switch($input_status) {
            case 'available': 
                $my_list = SmsNumber::where('status', 1)
                ->paginate(20);
                return view('sms.index', compact('my_list', 'input_status'))
                    ->with('page_title', 'List of Telephone Numbers')
                    ->with('page_description', 'You can create, remove and edit any number phone.');
            break;

            case 'notavailable': 
                $my_list = SmsNumber::where('status', 0)
                ->paginate(20);
                return view('sms.index', compact('my_list', 'input_status'))
                    ->with('page_title', 'List of Telephone Numbers')
                    ->with('page_description', 'You can create, remove and edit any number phone.');
            break;

            case 'reset': 
                $my_list = SmsNumber::paginate(20);
            return view('sms.index', compact('my_list'))->with('page_title', 'List of Telephone Numbers')
                                         ->with('page_description', 'You can create, remove and edit any number phone.');
            break;

            default:
            $my_list = SmsNumber::paginate(20);
            return view('sms.index', compact('my_list'))->with('page_title', 'List of Telephone Numbers')
                                         ->with('page_description', 'You can create, remove and edit any number phone.');

        }
        } else {
            $my_list = SmsNumber::latest()
            ->search($input_s)
            ->paginate(20);
            return view('sms.index', compact('my_list', 'input'))->with('page_title', 'List of Telephone Numbers')
                                         ->with('page_description', 'You can create, remove and edit any number phone.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sms.create')->with('page_title', 'Create Phone Number')
                                         ->with('page_description', '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SmsNumberRequest $request)
    {
        alert()->success('Phone number', 'The record has been saved successfully.');
        SmsNumber::create($request->all());
        return redirect()->route('sms.index')->with('message', 'item added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    { 
        $keyword = Input::get(urlencode('keyword'));
        $my_list = SmsNumber::where('assign_to', 'LIKE', '%'.$keyword.'%')->paginate(20);
        return view('sms.index', compact('my_list'));
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sms = SmsNumber::find($id);
        return view('sms.edit')->with('sms', $sms)->with('page_title', 'Edit phone number information')
                                         ->with('page_description', '');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sms = SmsNumber::find($id);
        $sms->sms_number = $request->input('sms_number');
        $sms->assign_to = $request->input('assign_to');
        $sms->comment = $request->input('comment');
        

        if(strtolower($sms->assign_to) == strtolower('open') || empty($sms->assign_to) ) {
            $sms->status = true;
        } else {
            $sms->status = false;
        }
        
        $sms->save();

        alert()->success('Phone number', 'The record has been edited successfully.');
        return redirect('sms')->with('success', 'Updated ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sms = SmsNumber::find($id);
        $sms->delete();
        alert()->success('Phone number', 'The record has been removed successfully.');
        return redirect('sms')->with('success', 'Post Rmoved');
    }
}