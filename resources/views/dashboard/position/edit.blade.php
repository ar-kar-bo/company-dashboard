@extends('dashboard.layout.master')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('position.index')}}" class="btn btn-sm btn-primary">All Positions</a>
        <form action="{{route('position.update',$position->id)}}" method="post">
        @csrf
        @method('PUT')
        @csrf
            <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label for="name" class="">Enter Position Name</label>
                </div>
                <div class="col-6">
                    <input type="text" name="name" class="form-control" id="name" value="{{$position->name}}">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label for="salary" class="">Enter Salary</label>
                </div>
                <div class="col-6">
                    <input type="number" min="0"  name="salary" class="form-control" id="salary" value="{{$position->salary}}">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label for="deps" class="">Choose Department</label>
                </div>
                <div class="col-6">
                    <select name="department_id" class="form-select" id="deps">
                        @foreach ($deps as $d)
                            <option value="{{$d->id}}" @if ($d->id == $position->department_id)selected

                                @endif>{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group mt-3">
                <input type="submit" value="Update" class="btn btn-sm btn-dark">
            </div>
</form>
    </div>
</div>
@endsection
