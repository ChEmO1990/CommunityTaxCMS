<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('smsnumbers', 'ApiControllers\Sms\SmsNumberController', ['only' => ['index', 'show']]);
Route::resource('employees', 'ApiControllers\Employee\EmployeeController', ['only' => ['index', 'show']]);