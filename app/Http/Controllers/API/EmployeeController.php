<?php

namespace App\Http\Controllers\API;

use App\Models\City;
use App\Models\Department;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Position;
use App\Models\State;
use App\Models\WorkHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('position')->get();
        foreach($employees as $employee)
        {
            $employee->department = Position::with('department')->where('id',$employee->position_id)->first()->department;
        }
        return response()->json($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $rules = array(
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,ico,svg',
            'dob'=>'required',
            'position_id'=>"required",
            'work_histories.*.position'=>"required",
            'work_histories.*.company'=>"required",
            'work_histories.*.start_date'=>"required",
            'work_histories.*.end_date'=>"required",
            'work_histories.*.description'=>"required",
            'education.*.school'=>"required",
            'education.*.degree'=>"required",
            'education.*.start_date'=>"required",
            'education.*.end_date'=>"required",
            'education.*.note'=>"required",
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors());
        }else{
            // $state = State::find($request->state)->name;
            // $city = City::find($request->city)->name;

            // $file = $request->file('image');
            // $file_name = uniqid(time()).$file->getClientOriginalName();
            // $file_path = 'images/'.$file_name;
            // $file->storeAs('images',$file_name);
            $file_path = 'something';
            $employee = Employee::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'state'=>$request->state,
                'city'=>$request->city,
                'address'=>$request->address,
                'photo'=>$file_path,
                'dob'=>$request->dob,
                'position_id'=>$request->position_id,
                'skill'=>$request->skill
            ]);
            if($employee)
            {
                foreach($request->work_histories as $wh)
                {
                    WorkHistory::create([
                        'employee_id'=>$employee->id,
                        'position'=>$wh->position,
                        'company'=>$wh->company,
                        'start_date'=>$wh->start_date,
                        'end_date'=>$wh->end_date,
                        'description'=>$wh->description
                    ]);
                }

                foreach($request->education as $edu)
                {
                    Education::create([
                        'employee_id'   => $employee->id,
                        'school'        =>  $edu->school,
                        'degree'        =>  $edu->degree,
                        'start_date'    =>  $edu->start_date,
                        'end_date'      =>  $edu->end_date,
                        'note'          =>  $edu->note
                    ]);
                }
                return ['result'=>"Employee has been Created!"];
            }else{
                return ['result'=>"Employee created has been failed!"];
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $employee = Employee::with('position')->where('id',$employee->id)->first();
        $employee->work_history = WorkHistory::where('employee_id',$employee->id)->get();
        $employee->education = Education::where('employee_id',$employee->id)->get();
        $employee->department = Position::with('department')->where('id',$employee->position_id)->first()->department;
        $employee->department_id = $employee->department->id;
        $employee->position =Position::where('id',$employee->position_id)->first();
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return $employee->id;

        // $employee = Employee::where('id',$employee->id)->first();
        // $employee->work_history = WorkHistory::where('employee_id',$employee->id)->get();
        // $employee->education = Education::where('employee_id',$employee->id)->get();
        // $employee->city_id = City::where('name',$employee->city)->first()->id;
        // $employee->state_id = State::where('name',$employee->state)->first()->id;

        // $dep_id = Position::with('department')->where('id',$employee->position_id)->first()->department_id;
        // return view('dashboard.employee.edit',compact('employee','dep','dep_id','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = array(
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,ico,svg',
            'dob'=>'required',
            'position_id'=>"required",
            'work_histories.*.position'=>"required",
            'work_histories.*.company'=>"required",
            'work_histories.*.start_date'=>"required",
            'work_histories.*.end_date'=>"required",
            'work_histories.*.description'=>"required",
            'education.*.school'=>"required",
            'education.*.degree'=>"required",
            'education.*.start_date'=>"required",
            'education.*.end_date'=>"required",
            'education.*.note'=>"required",
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors());
        }else{
            $employee = Employee::find($employee->id);
            if($request->file('image')){
                if($employee->photo){
                    $image_arr = explode('/',$employee->photo);
                    Storage::disk('images')->delete($image_arr[1]);
                }
                $file = $request->file('image');
                $file_name = uniqid(time()).$file->getClientOriginalName();
                $file_path = 'images/'.$file_name;
                $file->storeAs('images',$file_name);
            }else{
                $file_path = $employee->photo;
            }
            Employee::where('id',$employee->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'state'=>$request->state,
                'city'=>$request->city,
                'address'=>$request->address,
                'photo'=>$file_path,
                'dob'=>$request->dob,
                'position_id'=>$request->position_id,
                'skill'=>$request->skill,
            ]);

            foreach($request->work_histories as $wh)
            {
                if(isset($wh->id))
                {
                    WorkHistory::where('id',$wh->id)->update([
                        'company'=>$wh->company,
                        'position'=>$wh->position,
                        'start_date'=>$wh->start_date,
                        'end_date'=>$wh->end_date,
                        'description'=>$wh->description
                    ]);
                }else{
                    WorkHistory::create([
                        'employee_id'=>$employee->id,
                        'company'=>$wh->company,
                        'position'=>$wh->position,
                        'start_date'=>$wh->start_date,
                        'end_date'=>$wh->end_date,
                        'description'=>$wh->description
                    ]);
                }
            }
            foreach($request->educations as $edu)
            {
                if(isset($edu->id))
                {
                    Education::where('id',$wh->id)->update([
                        'school'=>$edu->school,
                        'degree'=>$edu->degree,
                        'start_date'=>$edu->start_date,
                        'end_date'=>$edu->end_date,
                        'note'=>$edu->note
                    ]);
                }else{
                    Education::create([
                        'employee_id'=>$employee->id,
                        'school'=>$edu->school,
                        'degree'=>$edu->degree,
                        'start_date'=>$edu->start_date,
                        'end_date'=>$edu->end_date,
                        'note'=>$edu->note
                    ]);
                }
            }
            return ['result'=>"Employee updated success!"];

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        // $image_arr = explode('/',$employee->photo);
        // Storage::disk('images')->delete($image_arr[1]);
        // Employee::where('id',$employee->id)->delete();
        // return redirect()->back()->with('success','Employee Deleted Success!');
    }
}
