@extends('dashboard.layout.master')
@section('content')
<div class="card mt-5 mx-4">
    <div class="card-header">
        <h4>Department Lists</h4>
        <a href="{{route('department.create')}}" class="btn btn-sm btn-primary">Create Department</a>

    </div>
    <div class="card-body">
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departments as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->name}}</td>
            <td>
                <a href="{{route('department.edit',$d->id)}}" class="badge bg-success">Edit</a>
                <form action="{{route('department.destroy',$d->id)}}" method="post" class="d-inline" id="delete{{$d->id}}">
                @csrf
                @method('DELETE')
                    <a href="#{{$d->id}}" onclick="confirm('Delete?')? document.getElementById('delete{{$d->id}}').submit():false;" class="badge bg-danger">Delete</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>
@endsection
