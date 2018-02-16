<?php

namespace App\Http\Controllers\Download;

use Illuminate\Http\Request;
use App\Models\Employees\Employee;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
	public function download($file_name) {
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML('<h1>Test</h1>');
		return $pdf->download($file_name);
  }
}
