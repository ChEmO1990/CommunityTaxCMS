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
		//$pdf = App::make('dompdf.wrapper');
		//$pdf->loadHTML('<h1>Test</h1>');
		//return $pdf->download($file_name);

		//$pdf = PDF::loadView('employee.pdf');
		//return $pdf->download('invoice.pdf');

		$employee = Employee::with('Accounts')->get()->find($id);
        view()->share('employee',$employee);

        $pdf = PDF::loadView('employee.pdf');
        return $pdf->download('invoice22.pdf');
  }
}
