<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index(){
        return view('excelImport',['ext' => 'xlsx']);
    }

    public function importExcel(Request $request){
        $validate = $request->Validate([
            'file' => 'required',
        ]);

        Excel::import(new EmployeeImport , $request->file('file'));
        return redirect('excelImport')->with('status' , 'The file has been imported!');
    }

    public function exportExcel($slug){
        return Excel::download(new EmployeeExport , 'Employee.' .$slug);
    }
}
