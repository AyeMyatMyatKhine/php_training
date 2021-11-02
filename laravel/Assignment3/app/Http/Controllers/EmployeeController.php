<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
      return view('showData');
    }

    public function show(Request $request){
        $firstDate = Carbon::createFromTimestamp(strtotime($request->firstDate));
        $secondDate = Carbon::createFromTimestamp(strtotime($request->secondDate));

        $result = DB::table('employees')
                  ->select('*')
                  ->whereBetween('created_at',[$firstDate, $secondDate])
                  ->get();

        return view('showData',['employee'=>$result]);

    }
}
