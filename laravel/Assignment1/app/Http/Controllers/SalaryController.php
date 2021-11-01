<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalaryController extends Controller
{
    public function showTable(){
        $data = Salary::paginate(5);
        return view('salary.list')->with(['salary'=>$data]);
    }

    public function insert(){
        return view('salary.create');
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'position' => "required" ,
            'salary' => "required" ,
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $this->getSalaryData($request);
        Salary::create($data); 
        return back()->with(['insertSuccess' => "New recorde is created successfully.."]);

    }

    private function getSalaryData($request){
        return [
            'position' => $request->position ,
            'salary' => $request->salary ,
        ];
    }

    public function edit($id){
        $data = Salary::where('id',$id)->first();
        return view('salary.edit')->with(['salary'=>$data]);
    }

    public function update($id,Request $request){
        $validator = Validator::make($request->all(), [
            'position' => "required" ,
            'salary' => "required" ,
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $UpdateData = $this->getSalaryData($request);
        Salary::where('id' , $id)->update($UpdateData);
        return back()->with(['updateSuccess' => 'Update Successed!']);
    }

    public function delete($id){
        Salary::where('id',$id)->delete();
        return back()->with(['deleteSuccess' => "Delete data successfully!."]);
    }


    public function show($id){
        $data = Salary::where('id','=',$id)->get();
        return view('salary.show')->with(['salary'=>$data]);

    }
}
