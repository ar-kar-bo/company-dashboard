@extends('dashboard.layout.master')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('employee.index')}}" class="btn btn-sm btn-primary">Employee List</a>
        <h3 class="mt-3">Employee Edit</h3>
        <form action="{{route('employee.update',$employee->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="name" class="">Enter Employee Name</label>
                </div>
                <div class="col-3">
                    <input type="text" name="name" value="{{$employee->name}}" class="form-control" id="name">
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
                            <option value="{{$d->id}}" @if ($d->id == $dep_id)
                                selected
                            @endif>{{$d->name}}</option>
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
                    <input type="email" value="{{$employee->email}}" name="email" class="form-control" id="email">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="phone" class="">Enter Employee Ph.no</label>
                </div>
                <div class="col-3">
                    <input type="text" name="phone" value="{{$employee->phone}}" class="form-control" id="phone">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="state" class="">State / Region</label>
                </div>
                <div class="col-3">
                    <select name="state" id="state" class="form-select">
                        <option value="" hidden>Choose State</option>
                        @foreach ($states as $state)
                            <option value="{{$state->id}}" @if ($state->id == $employee->state_id)
                                selected
                            @endif > {{$state->name}}</option>
                        @endforeach


                    </select>
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="city" class="">City</label>
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
                    <textarea name="address" id="" cols="30" rows="2" class="form-control">{{$employee->address}}</textarea>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="image" class="">Enter Employee Photo</label>
                </div>
                <div class="col-3">
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="col-3">
                    <img src="{{asset($employee->photo)}}" style="width: 50px;" alt="" srcset="">
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="dob" class="">Enter Date of Birth</label>
                </div>
                <div class="col-3">
                    <input type="date" name="dob" class="form-control" id="dob" value="{{$employee->dob}}">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="skill" class="">Enter Employee Skill</label>
                </div>
                <div class="col-3">
                    <input type="text" value="{{$employee->skill}}" name="skill" class="form-control" id="skill" >
                </div>
            </div>

            <hr>
            <section class="workhistory">
                <div class="row my-3">
                    <div class="col-12">
                        <h5 class="text-danger mt-3 d-inline">Work History</h5>
                        <span class="btn btn-info float-end text-light" id="newWorkHistory">New Work History</span>
                    </div>
                </div>
                @foreach ($employee->work_history as $work_history)

                <div>
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-info mt-3 d-inline">Another Work History</h6>
                            <a href="{{url("/employee_edit/department/$work_history->id")}}" class="btn btn-info float-end text-light del-workhistory"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                <input type="text" name="work_history_id[]" value="{{$work_history->id}}" class="work_history_id" hidden>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Position</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="work_history_position[]" value="{{$work_history->position}}" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Company Name</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="work_history_company_name[]" value="{{$work_history->company}}" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="work_history_start_date[]" value="{{$work_history->start_date}}" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="work_history_end_date[]" value="{{$work_history->end_date}}" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-10">
                        <textarea name="work_history_description[]"  id="" cols="135" rows="2" class="form-control">{{$work_history->description}}</textarea>
                    </div>
                </div>
                <hr>
            </div>
                @endforeach
            </section>
            <section class="education">
                <div class="row my-3">
                    <div class="col-12">
                        <h5 class="text-danger mt-3 d-inline">Education</h5>
                        <span class="btn btn-info float-end text-light" id="addEducation">Add Education</span>
                    </div>
                </div>
                @foreach ($employee->education as $education)

                <div>
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-info mt-3 d-inline">Another Education</h6>
                            <a href="{{url("/employee_edit/eduction/$education->id")}}" class="btn btn-info float-end text-light del-education"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                <input type="text" name="education_id[]" value="{{$education->id}}" class="education_id" hidden>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for=""class="form-label">School</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="edu_school[]" value="{{$education->school}}" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Degree</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="edu_degree[]" value="{{$education->degree}}" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="edu_start_date[]" value="{{$education->start_date}}" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="edu_end_date[]" value="{{$education->end_date}}" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-10">
                        <textarea name="edu_note[]" id="" cols="135" rows="2" class="form-control">{{$education->note}}</textarea>
                    </div>
                </div>
            <hr>
        </div>
            @endforeach
        </section>

            <div class="form-group mt-3">
                <input type="submit" value="Update" class="btn btn btn-dark">
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>

function change() {
                    let department_id = $("#department").val();
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
                                            let selected = (<?php echo $employee->position_id; ?> == position.id)?"selected":"";
                                            $('#position').append('<option value="'+ position.id +'" '+selected+'>' + position.name + '</option>');
                                        });
                                    }else{
                                        $('#position').empty();
                                    }
                                }
                            });
                        }else{
                            $('#position').empty();
                        }
            }
    $(document).ready(function() {
            change();
            $('#department').on("change",function(){
                change();
            });
        });
        function changeCity() {
                    let state_id = $("#state").val();
                        if(state_id) {
                            $.ajax({
                                url: '/getCity/'+state_id,
                                type: "GET",
                                data : {"_token":"{{ csrf_token() }}"},
                                dataType: "json",
                                success:function(data)
                                {

                                    if(data){
                                        $('#city').empty();
                                        $('#city').append('<option hidden>Choose City</option>');
                                        $.each(data, function(key , city){
                                            let selected = (<?php echo $employee->city_id ?> == city.id)?"selected":"";
                                            $('#city').append('<option value="'+ city.id +'"'+selected+' >' + city.name + '</option>');
                                        });
                                    }else{
                                        $('#city').empty();

                                    }
                                }
                            });
                        }else{
                            $('#city').empty();
                        }
            }
    $(document).ready(function() {
            changeCity();
            $('#state').on("change",function(){
                changeCity();
            });
        });
    $("#newWorkHistory").click(function(){
        $(".workhistory").append(`
            <div id="anotherWorkHistory">
                <input type="text" name="work_history_id[]" class="work_history_id" hidden>
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
                <input type="text" name="education_id[]" class="education_id" value="" hidden>

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

