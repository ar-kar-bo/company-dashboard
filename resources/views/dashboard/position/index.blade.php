@extends('dashboard.layout.master')
@section('content')
<div class="card mx-4 mt-5">
    <div class="card-header">
        <h4>Position</h4>
        <a href="{{route('position.create')}}" class="btn btn-sm btn-primary">Create Position</a>

    </div>
    <div class="card-body">
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Department</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($positions as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->salary}}</td>
            <td>{{$p->department->name}}</td>
            <td>
                <a href="{{route('position.edit',$p->id)}}" class="badge bg-success">Edit</a>
                <form action="{{route('position.destroy',$p->id)}}" method="post" class="d-inline" id="delete{{$p->id}}">
                @csrf
                @method('DELETE')
                    <a href="#{{$p->id}}" onclick="confirm('Delete?')? document.getElementById('delete{{$p->id}}').submit():false;" class="badge bg-danger">Delete</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>
@endsection
