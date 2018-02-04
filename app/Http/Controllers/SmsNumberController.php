<?php

namespace App\Http\Controllers;

use App\SmsNumber;
use App\Http\Requests\SmsNumberRequest;
use Illuminate\Http\Request;

class SmsNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_list = SmsNumber::paginate(15);
        return view('sms.index', compact('my_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SmsNumberRequest $request)
    {
        SmsNumber::create($request->all());
        return redirect()->route('sms.index')->with('message', 'item added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('sms.edit')->with('sms', $sms);
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
        $this->validate($request, [
            'sms_number' => 'phone:US'
        ]);

        $sms = SmsNumber::find($id);
        $sms->sms_number = $request->input('sms_number');
        $sms->assign_to = $request->input('assign_to');
        $sms->comment = $request->input('comment');
        $sms->save();
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
        return redirect('sms')->with('success', 'Post Rmoved');
    }
}
