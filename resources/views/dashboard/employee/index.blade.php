@extends('dashboard.layout.master')
@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="css-box">Employee Lists</h4>
        </div>
    </div>
    <div class="row mt-3 justify-content-between">
        <div class="col-4">
            <label for="search" class="form-label">Search</label>
            <form method="get" action="{{url('/employee_list/search')}}">
                <div class="input-group">
                    <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search" id="search">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>

        </div>
        <div class="col-4">
            <label for="Department" class="form-label">Department</label>
            <select name="department_id" id="" class="form-select dep">
                <option value="" hidden>Choose Department</option>
                @foreach ($department as $d)
                    <option value="{{$d->id}}">{{$d->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-5 show-data">
        @foreach ($employees as $employee )
            <div class="col-2">
                <div class="card card-box" >
                    <figure class="imghvr-zoom-in bg-light">
                        <img src="{{asset($employee->photo)}}" class="card-img-top img-fluid imghvr-zoom-in bg-light text-black-50" style="height: 135px;" alt="empty image">
                        <figcaption class="bg-opacity-50 bg-black pt-5 text-center">
                                    <div class="btn btn-info text-light"><a href="{{route('employee.edit',$employee->id)}}" class="badge"><i class="fa-solid fa-pen-to-square"></i></a></div>
                                    <div class="btn btn-info text-light"><a href="{{route('employee.show',$employee->id)}}" class="badge"><i class="fa-solid fa-eye"></i></a></div>

                        </figcaption>
                    </figure>
                    <div class="card-body text-center">
                    <h6>{{$employee->name}}</h6>
                    <span class="badge bg-success w-75">{{$employee->position->name}}</span><br>
                    <a class="btn btn-info btn-sm w-100 mt-1 text-light">{{$employee->position->name}}</a>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</div>
@endsection

@section('script')
<script>
$('.dep').on('change',function(){
    let department_id = $(this).val();
    if(department_id) {
        $.ajax({
            url: "{{url('')}}"+'/api/employee_list/department/'+department_id,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data)
                    {
                        if(data){
                            $('.show-data').empty();

                            $.each(data, function(key , employee){
                                $('.show-data').append(`
<div class="col-2">
    <div class="card card-box" >
        <figure class="imghvr-zoom-in bg-light">
            <img src="`+employee.photo+`" class="card-img-top img-fluid imghvr-zoom-in bg-light text-black-50" style="height: 135px;" alt="empty image">
            <figcaption class="bg-opacity-50 bg-black pt-5 text-center">
                        <div class="btn btn-info text-light"><a href="employee/`+employee.id+`/edit" class="badge"><i class="fa-solid fa-pen-to-square"></i></a></div>
                        <div class="btn btn-info text-light"><a href="employee/`+employee.id+`/show" class="badge"><i class="fa-solid fa-eye"></i></a></div>

            </figcaption>
        </figure>
        <div class="card-body text-center">
        <h6>`+employee.name+`</h6>
        <span class="badge bg-success w-75">`+employee.position.name+`</span><br>
        <a class="btn btn-info btn-sm w-100 mt-1 text-light">`+employee.position.name+`</a>
        </div>
    </div>
</div>
                                `);
                            });
                        }else{
                            $('.show-data').empty();
                        }
                    }
        });
    }
});

</script>
@endsection
