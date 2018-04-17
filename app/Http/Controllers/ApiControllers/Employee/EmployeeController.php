<?php

namespace App\Http\Controllers\ApiControllers\Employee;

use App\Models\Employees\Employee;
use App\Http\Controllers\ApiControllers\ApiController;

class EmployeeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all()->where('status', 1);
        return $this->showAll($employees);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return $this->showOne($employee);
    }
}
