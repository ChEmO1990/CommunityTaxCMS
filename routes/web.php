<?php

use Snowfire\Beautymail\Beautymail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'Home\HomeController@index');
Route::resource('dashboard', 'Dashboard\DashboardController');
Route::resource('sms', 'Sms\SmsNumberController');
Route::resource('employees', 'Employee\EmployeeController', ['except' => ['edit']]);
Route::get('employees/edit/{id}/{termination}', ['as' => 'employees.edit', 'uses' => 'Employee\EmployeeController@edit']);
Route::get('employees/download/{id}', 'Download\DownloadController@downloadPDF')->middleware('auth');
Route::get('employees/termination/{id}', 'Employee\EmployeeController@termination')->middleware('auth');

Route::get('/test', function()
{
	$beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
    $beautymail->send('emails.terminate_user', [], function($message)
    {
        $message
			->from('anhernandez@communitytax.com')
			->to('chemo.baza@gmail.com', 'John Smith')
			->subject('Welcome!');
    });

});