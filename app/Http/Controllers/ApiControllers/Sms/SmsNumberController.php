<?php

namespace App\Http\Controllers\ApiControllers\Sms;

use App\Models\Sms\SmsNumber;
use App\Http\Controllers\ApiControllers\ApiController;

class SmsNumberController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sms_list = SmsNumber::all();
        return $this->showAll($sms_list);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sms = SmsNumber::findOrFail($id);
        return $this->showOne($sms);
    }
}
