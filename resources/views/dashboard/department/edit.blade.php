@extends('dashboard.layout.master')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('department.index')}}" class="btn btn-sm btn-primary">All Departments</a>
<form action="{{route('department.update',$department->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Enter Name</label>
        <input type="text" value="{{$department->name}}" name="name" class="form-controll" id="name">
    </div>
    <input type="submit" value="Update" class="btn btn-sm btn-dark">
</form>
    </div>
</div>
@endsection
