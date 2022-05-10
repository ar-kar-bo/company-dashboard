@extends('dashboard.layout.master')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('employee.index')}}" class="btn btn-sm btn-primary">All Employees</a>
        <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label for="name" class="">Enter Employee Name</label>
                </div>
                <div class="col-6">
                    <input type="text" name="name" class="form-control" id="name">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label for="email" class="">Enter Employee Email</label>
                </div>
                <div class="col-6">
                    <input type="email" name="email" class="form-control" id="email">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label for="phone" class="">Enter Employee Ph.no</label>
                </div>
                <div class="col-6">
                    <input type="number" name="phone" class="form-control" id="phone">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label for="address" class="">Enter Employee Address</label>
                </div>
                <div class="col-6">
                    <input type="text" name="address" class="form-control" id="address">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label for="image" class="">Enter Employee Photo</label>
                </div>
                <div class="col-6">
                    <input type="file" name="image" class="form-control" id="image">
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label for="dob" class="">Enter Date of Birth</label>
                </div>
                <div class="col-6">
                    <input type="date"  name="dob" class="form-control" id="dob">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-3">
                    <label for="department" class="">Department & Position</label>
                </div>
                <div class="col-4">
                    <select name="department_id" class="form-select" id="department">
                        <option value="" hidden>Choose Department</option>
                        @foreach ($dep as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <select name="position_id" class="form-select" id="position">
                    </select>
                </div>
            </div>
            <div class="form-group mt-3">
                <input type="submit" value="Create" class="btn btn btn-dark">
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
            $('#department').on('change', function() {
               let department_id = $(this).val();
               if(department_id) {
                   $.ajax({
                       url: '/getPosition/'+department_id,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $('#position').empty();
                            $('#position').append('<option hidden>Choose Position</option>');
                            $.each(data, function(key , position){
                                $('#position').append('<option value="'+ position.id +'">' + position.name + '</option>');
                            });
                        }else{
                            $('#position').empty();
                        }
                     }
                   });
               }else{
                 $('#position').empty();
               }
            });
            });
        </script>
@endsection

