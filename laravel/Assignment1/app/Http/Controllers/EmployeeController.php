<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    //main page
    public function list(){
        $data = Employee::paginate(5);
        return view('employee.list')->with(['employee' => $data]);
    }

    public function insert(){
        return view('employee.create');
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => "required" ,
            'region' => "required" ,
            'city' => "required" ,
            'dateOfJoin' => "required" ,
            'department' => "required" ,
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $this->getEmployeeData($request);
        Employee::create($data); 
        return back()->with(['insertSuccess' => "Employee information recorded.."]);

    }

    private function getEmployeeData($request){
        return [
            'name' => $request->name ,
            'region' => $request->region ,
            'city' => $request->city ,
            'dateOfJoin' => $request->dateOfJoin ,
            'department' => $request->department ,
        ];
    }

    public function edit($id){
        $data = Employee::where('id',$id)->first();
        return view('employee.edit')->with(['employee'=>$data]);
    }

    public function update($id,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => "required" ,
            'region' => "required" ,
            'city' => "required" ,
            'dateOfJoin' => "required" ,
            'department' => "required" ,
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $UpdateData = $this->getEmployeeData($request);
        Employee::where('id' , $id)->update($UpdateData);
        return back()->with(['updateSuccess' => 'Update Successed!']);
    }

    public function delete($id){
        Employee::where('id',$id)->delete();
        return back()->with(['deleteSuccess' => "Delete data successfully!."]);
    }


    public function show($id){
        $data = Employee::where('id','=',$id)->get();
        return view('employee.show')->with(['employee'=>$data]);

    }




}
