@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-1 clearfix">
            <div class="pull-left">
                <h2>Employee Table</h2>
                <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('insert') }}">Create New Record</a>
                <a href="{{ route('Salarylist') }}" class="btn btn-primary">Salary Table</a>
                </div>
            </div>

            <table class="table table-hover text-center">
                <thead class="bg-dark text-white">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Reigon</th>
                    <th>City</th>
                    <th>Date Of Joining</th>
                    <th>Department</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    @foreach ($employee as $item)
                    <tr>
                    <td>{{ $item->id}}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->region}}</td>
                        <td>{{ $item->city}}</td>
                        <td>{{ $item->dateOfJoin}}</td>
                        <td>{{ $item->department }}</td>
                        <td>
                        <a href="{{ route('edit' , $item->id) }}"><button class="btn btn-warning btn-sm ">Edit</button></a>
                        <a href="{{ route('delete' , $item->id) }}"><button class="btn btn-danger btn-sm ">Delete</button></a>
                        <a href="{{ route('show' , $item->id) }}"><button class="btn btn-secondary btn-sm ">Show</button></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="">
                {{ $employee->links()}}
            </div>
        </div>
    </div>

@endsection