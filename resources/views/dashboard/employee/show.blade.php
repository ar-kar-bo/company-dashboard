@extends('dashboard.layout.master')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('employee.index')}}" class="btn btn-sm btn-primary">Employee List</a>
        <h3 class="mt-3">Employee Profile</h3>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <p>Name :</p>
                </div>
                <div class="col-3">
                    <h6>{{$employee->name}}</h6>
                </div>


            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <p>Department :</p>
                </div>
                <div class="col-3">
                    <h6>{{$employee->department}}</h6>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <p>Position :</p>
                </div>
                <div class="col-3">
                    <h6>{{$employee->position->name}}</h6>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <p>Email :</p>
                </div>
                <div class="col-3">
                    <h6>{{$employee->email}}</h6>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <p>Phone :</p>
                </div>
                <div class="col-3">
                    <h6>{{$employee->phone}}</h6>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <p>Region / State :</p>
                </div>
                <div class="col-3">
                    <h6>{{$employee->state}}</h6>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <p>City :</p>
                </div>
                <div class="col-3">
                    <h6>{{$employee->city}}</h6>
                </div>
            </div>

            <div class="row align-items-top mt-3">
                <div class="col-2">
                    <p>Address :</p>
                </div>
                <div class="col-3">
                    <h6>{{$employee->address}}</h6>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <p>Photo :</p>
                </div>
                <div class="col-3">
                    <img src="{{asset($employee->photo)}}" style="width: 100px;height:100px;border-radius:50px;" alt="" srcset="">
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <p>Date of Birth :</p>
                </div>
                <div class="col-3">
                    <h6>{{$employee->dob}}</h6>
                </div>
            </div>

            <hr>
            <section class="workhistory">
                <div class="row my-3">
                    <div class="col-12">
                        <h5 class="text-danger mt-3 d-inline">Work History</h5>
                    </div>
                </div>
                @foreach ($employee->work_history as $work_history)

                <div>
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-info mt-3 d-inline">Another Work History</h6>
                        </div>
                    </div>
                <input type="text" name="work_history_id[]" value="{{$work_history->id}}" class="work_history_id" hidden>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <p>Position :</p>
                    </div>
                    <div class="col-3">
                        <h6>{{$work_history->position}}</h6>
                    </div>
                    <div class="col-2">
                        <p>Company Name :</p>
                    </div>
                    <div class="col-3">
                        <h6>{{$work_history->company}}</h6>
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <p>Start Date :</p>
                    </div>
                    <div class="col-3">
                        <h6>{{$work_history->start_date}}</h6>
                    </div>
                    <div class="col-2">
                        <p>End Date :</p>
                    </div>
                    <div class="col-3">
                        <h6>{{$work_history->end_date}}</h6>
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <p>Description :</p>
                    </div>
                    <div class="col-8">
                        <h6>{{$work_history->description}}</h6>
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
                    </div>
                </div>
                @foreach ($employee->education as $education)

                <div>
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-info mt-3 d-inline">Another Education</h6>

                        </div>
                    </div>
                <input type="text" name="education_id[]" value="{{$education->id}}" class="education_id" hidden>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <p>School :</p>
                    </div>
                    <div class="col-3">
                        <h6>{{$education->school}}</h6>
                    </div>
                    <div class="col-2">
                        <p>Degree</p>
                    </div>
                    <div class="col-3">
                        <h6>{{$education->degree}}</h6>
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <p>Start Date</p>
                    </div>
                    <div class="col-3">
                        <h6>{{$education->start_date}}</h6>
                    </div>
                    <div class="col-2">
                        <p>End Date</p>
                    </div>
                    <div class="col-3">
                        <h6>{{$education->end_date}}</h6>
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <p>Note :</p>
                    </div>
                    <div class="col-8">
                        <h6>{{$education->note}}</h6>
                    </div>
                </div>
            <hr>
        </div>
            @endforeach
        </section>

    </div>
</div>
@endsection

