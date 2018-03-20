<?php

namespace App\Http\Controllers\Download;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Employees\Employee;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
	public function downloadPDF($id) {
		$employee = Employee::with('Accounts')->get()->find($id);
        view()->share('employee',$employee);

        $pdf = PDF::loadView('employee.pdf');
        return $pdf->download('New Hire Checklist and Welcome Sheet ' . strtoupper($employee->name) . '.pdf');
  }
}
