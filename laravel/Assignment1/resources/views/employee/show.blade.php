@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header fs-2 text-center">
                    Employee Data
                </div>
                <div class="card-body fs-4 ms-5 ps-5">
                    <div class="">
                        <label>ID</label> : <label>{{ $employee[0]->id}}</label>
                    </div>
                    <div class="">
                        <label>Name</label> : <label>{{ $employee[0]->name}}</label>
                    </div>
                    <div class="">
                        <label>Region</label> : <label>{{ $employee[0]->region}}</label>
                    </div>
                    <div class="">
                        <label>City</label> : <label>{{ $employee[0]->city}}</label>
                    </div>
                    <div class="">
                        <label>Date Of Joining</label> : <label>{{ $employee[0]->dateOfJoin}}</label>
                    </div>
                    <div class="">
                        <label>Department</label> : <label>{{ $employee[0]->department}}</label>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                    <a href="{{ route('list')}}"><button class="btn btn-sm bg-dark text-white">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection