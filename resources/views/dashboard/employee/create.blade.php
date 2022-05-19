@extends('dashboard.layout.master')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('employee.index')}}" class="btn btn-sm btn-primary">Employee List</a>
        <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="name" class="">Enter Employee Name</label>
                </div>
                <div class="col-3">
                    <input type="text" name="name" class="form-control" id="name">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="department" class="">Department</label>
                </div>
                <div class="col-3">
                    <select name="department_id" class="form-select" id="department">
                        <option value="" hidden>Choose Department</option>
                        @foreach ($dep as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="position" class="">Position</label>
                </div>
                <div class="col-3">
                    <select name="position_id" class="form-select" id="position">
                    </select>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="email" class="">Enter Employee Email</label>
                </div>
                <div class="col-3">
                    <input type="email" name="email" class="form-control" id="email">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="phone" class="">Enter Employee Ph.no</label>
                </div>
                <div class="col-3">
                    <input type="text" name="phone" class="form-control" id="phone">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="state" class="">State / Region</label>
                </div>
                <div class="col-3">
                    <select name="state" id="state" class="form-select">
                        <option value="state" hidden>Choose State</option>
                        @foreach ($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach


                    </select>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="city" class="">City </label>
                </div>
                <div class="col-3">
                    <select name="city" id="city" class="form-select">

                    </select>
                </div>
            </div>

            <div class="row align-items-top mt-3">
                <div class="col-2">
                    <label for="address" class="">Enter Employee Address</label>
                </div>
                <div class="col-3">
                    <textarea name="address" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="image" class="">Enter Employee Photo</label>
                </div>
                <div class="col-3">
                    <input type="file" name="image" class="form-control" id="image">
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="dob" class="">Enter Date of Birth</label>
                </div>
                <div class="col-3">
                    <input type="date" value="2000-01-01" name="dob" class="form-control" id="dob" >
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="skill" class="">Enter Employee Skill</label>
                </div>
                <div class="col-3">
                    <input type="text" name="skill" class="form-control" id="skill" >
                </div>
            </div>

            <hr>
            <section class="workhistory">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-danger mt-3 d-inline">Work History</h5>
                        <span class="btn btn-info float-end text-light" id="newWorkHistory">New Work History</span>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Position</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="work_history_position[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Company Name</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="work_history_company_name[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="work_history_start_date[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="work_history_end_date[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-10">
                        <textarea name="work_history_description[]" id="" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <hr>
            </section>
            <section class="education">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-danger mt-3 d-inline">Education</h5>
                        <span class="btn btn-info float-end text-light" id="addEducation">Add Education</span>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for=""class="form-label">School</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="edu_school[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Degree</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="edu_degree[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="edu_start_date[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="edu_end_date[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-10">
                        <textarea name="edu_note[]" id="" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            <hr>
        </section>

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
            let url = "{{url('')}}"+'/api/getPosition/'+department_id;
            console.log(url);
            if(department_id) {
                $.ajax({
                    url: "{{url('')}}"+'/api/getPosition/'+department_id,
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
        $('#state').on('change', function() {
            let state_id = $(this).val();
            if(state_id) {
                $.ajax({
                    url: "{{url('')}}"+'/api/getCity/'+state_id,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#city').empty();
                            $('#city').append('<option hidden>Choose City</option>');
                            $.each(data, function(key , city){
                                $('#city').append('<option value="'+ city.id +'">' + city.name + '</option>');
                            });
                        }else{
                            $('#city').empty();
                        }
                    }
                });
            }else{
                $('#city').empty();
            }
        });
    });







    $("#newWorkHistory").click(function(){
        $(".workhistory").append(`
            <div id="anotherWorkHistory">
                <div class="row">
                    <div class="col-12">
                        <h6 class="text-info mt-3 d-inline">Another Work History</h6>
                        <span class="btn btn-info float-end text-light del-workhistory"><i class="fa-solid fa-trash-can"></i></span>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Position</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="work_history_position[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Company Name</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="work_history_company_name[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="work_history_start_date[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="work_history_end_date[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-10">
                        <textarea name="work_history_description[]" id="" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <hr>
            </div>
        `);
    });
    $(".workhistory").delegate(".del-workhistory","click",function(){
            $(this).parentsUntil(".workhistory").remove();
    });

    $("#addEducation").click(function(){
        $(".education").append(`
                <div id="anotherEducation">
                    <div class="row">
                    <div class="col-12">
                        <h6 class="text-info mt-3 d-inline">Another Education</h6>
                        <span class="btn btn-info float-end text-light del-education"><i class="fa-solid fa-trash-can"></i></span>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">School</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="edu_school[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Degree</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="edu_degree[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="edu_start_date[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="edu_end_date[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-10">
                        <textarea name="edu_note[]" id="" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            <hr>
                </div>
        `);
    })
    $(".education").delegate(".del-education","click",function(){
            $(this).parentsUntil(".education").remove();
    });



</script>
@endsection
