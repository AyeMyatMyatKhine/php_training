@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-md-6 margin-tb offset-3 mb-3">
        <div class="pull-left">
            <h2>Add New Data</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
               <strong>Whoops!</strong> There were some problems with your input.<br><br>
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
            </div>
        @endif
        @if (Session::has('insertSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('insertSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
   </div>
</div>
   

<form action="{{ route('salaryCreate') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="form-group mb-3">
                <strong>Position:</strong>
                <input type="text" name="position" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <strong>Salary:</strong>
                <input type="number" name="salary" class="form-control">
            </div>
            <div class="form-group float-end">
                <button type="submit" class="btn btn-primary">Add</button>
                <a class="btn btn-primary" href="{{ route('Salarylist') }}"> Back</a>
            </div>
        </div>
    </div>
</form>
@endsection