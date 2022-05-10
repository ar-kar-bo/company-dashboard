@extends('dashboard.layout.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Employee</h4>
        <a href="{{route('employee.create')}}" class="btn btn-sm btn-primary">Create Employee</a>

    </div>
    <div class="card-body">
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Photo</th>
            <th>Date of Birth</th>
            <th>Position</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $e)
        <tr>
            <td>{{$e->id}}</td>
            <td>{{$e->name}}</td>
            <td>{{$e->email}}</td>
            <td>{{$e->phone}}</td>
            <td>{{$e->address}}</td>
            <td>
                <img src="{{asset($e->photo)}}" style="width: 40px;" alt="" srcset="">
            </td>
            <td>{{$e->dob}}</td>
            <td>{{$e->position->name}}</td>
            <td>
                <a href="{{route('employee.edit',$e->id)}}" class="badge bg-success">Edit</a>
                <form action="{{route('employee.destroy',$e->id)}}" method="post" class="d-inline" id="delete{{$e->id}}">
                @csrf
                @method('DELETE')
                    <a href="#{{$e->id}}" onclick="confirm('Delete?')? document.getElementById('delete{{$e->id}}').submit():false;" class="badge bg-danger">Delete</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>
@endsection
