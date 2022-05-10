@extends('dashboard.layout.master')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('employee.index')}}" class="btn btn-sm btn-primary">All Departments</a>
<form action="{{route('employee.update',$employee->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row align-items-center mt-3">
        <div class="col-3">
            <label for="name" class="">Enter Employee Name</label>
        </div>
        <div class="col-6">
            <input type="text" name="name" class="form-control" id="name" value="{{$employee->name}}">
        </div>
    </div>
    <div class="row align-items-center mt-3">
        <div class="col-3">
            <label for="email" class="">Enter Employee Email</label>
        </div>
        <div class="col-6">
            <input type="email" name="email" class="form-control" id="email" value="{{$employee->email}}">
        </div>
    </div>
    <div class="row align-items-center mt-3">
        <div class="col-3">
            <label for="phone" class="">Enter Employee Ph.no</label>
        </div>
        <div class="col-6">
            <input type="number" name="phone" class="form-control" id="phone" value="{{$employee->phone}}">
        </div>
    </div>
    <div class="row align-items-center mt-3">
        <div class="col-3">
            <label for="address" class="">Enter Employee Address</label>
        </div>
        <div class="col-6">
            <input type="text" name="address" class="form-control" id="address" value="{{$employee->address}}">
        </div>
    </div>
    <div class="row align-items-center mt-3">
        <div class="col-3">
            <label for="image" class="">Enter Employee Photo</label>
        </div>
        <div class="col-6">
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <div class="col-3">
            <img src="{{asset($employee->photo)}}" style="width: 50px;" alt="" srcset="">
        </div>
    </div>

    <div class="row align-items-center mt-3">
        <div class="col-3">
            <label for="dob" class="">Enter Date of Birth</label>
        </div>
        <div class="col-6">
            <input type="date"  name="dob" class="form-control" id="dob" value="{{$employee->dob}}">
        </div>
    </div>
    <div class="row align-items-center mt-3">
        <div class="col-3">
            <label for="position" class="">Choose Position</label>
        </div>
        <div class="col-6">
            <select name="position_id" class="form-select" id="position">
                @foreach ($positions as $p)
                    <option value="{{$p->id}}" @if ($employee->position_id == $p->id)
                        selected
                    @endif>{{$p->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group mt-3">
        <input type="submit" value="Update" class="btn btn btn-dark">
    </div>
</form>
    </div>
</div>
@endsection
