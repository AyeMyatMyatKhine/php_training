@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-3">
            @if (Session::has('deleteSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('deleteSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if (Session::has('updateSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('updateSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <table class="table table-hover text-center">
                <thead class="bg-dark text-white">
                  <th>ID</th>
                  <th>Name</th>
                  <th>NIC number</th>
                  <th>Region</th>
                  <th>City</th>
                  <th>Date of joining</th>
                  <th>Department</th>
                  <th width="280px">Action</th>
                </thead>

                <tbody>
                    @foreach ($employee as $item)
                    <tr>
                        <td>{{ $item->employee_id}}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->nicNumber}}</td>
                        <td>{{ $item->Region}}</td>
                        <td>{{ $item->city }}</td>
                        <td>{{ $item->dateOfJoin }}</td>
                        <td>{{ $item->department }}</td>
                        <td>
                        <a href="{{ route('employee#edit',$item->employee) }}"><button class="btn btn-warning btn-sm ">Edit</button></a>
                            <a href="{{ route('employee#delete',$item->employee) }}"><button class="btn btn-danger btn-sm ">Delete</button></a>
                            <a href="{{ url('customer/seeMore/'.$item->customer_id) }}"><button class="btn btn-secondary btn-sm ">See More</button></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="">
                {{ $customer->links()}}
            </div>
        </div>
    </div>

@endsection


