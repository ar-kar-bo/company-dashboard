@extends('dashboard.layout.master')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('department.index')}}" class="btn btn-sm btn-primary">All Departments</a>
<form action="{{route('department.store')}}" method="post" class="row mt-3 align-items-center">
    @csrf
    <div class="col-6">
        <input type="text" name="name" placeholder="Enter Department Name" class="form-control" id="name">
    </div>
    <div class="col-2">
        <input type="submit" value="Create" class="btn btn-dark">
    </div>
</form>
    </div>
</div>
@endsection
