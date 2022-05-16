<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Position;
use App\Models\WorkHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use stdClass;

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
        $department = Department::all();
        return view('dashboard.employee.index',compact('employees','department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dep = Department::with('position')->get();
        return view('dashboard.employee.create',compact('dep'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
/*
        $work_history = [];

        for($i=0;$i<count($request->work_history_position);$i++)
        {
            $work_history[$i] = new stdClass();
            $work_history[$i]->position = $request->work_history_position[$i];
            $work_history[$i]->company = $request->work_history_company_name[$i];
            $work_history[$i]->start_date = $request->work_history_start_date[$i];
            $work_history[$i]->end_date = $request->work_history_end_date[$i];
        $work_history = [];
        return $work_history;


 */
        // return $request;

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,ico,svg',
            'dob'=>'required',
            'position_id'=>"required",

        ]);

        $file = $request->file('image');
        $file_name = uniqid(time()).$file->getClientOriginalName();
        $file_path = 'images/'.$file_name;
        $file->storeAs('images',$file_name);
        $employee = Employee::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'photo'=>$file_path,
            'dob'=>$request->dob,
            'position_id'=>$request->position_id,
        ]);



        for($i=0;$i<count($request->work_history_position);$i++)
        {
            if($request->work_history_position[$i] && $request->work_history_company_name[$i] && $request->work_history_start_date[$i] && $request->work_history_end_date[$i])
            {
                WorkHistory::create([
                    'employee_id'=> $employee->id,
                    'position'  =>  $request->work_history_position[$i],
                    'company'   =>  $request->work_history_company_name[$i],
                    'start_date'=>  $request->work_history_start_date[$i],
                    'end_date'  =>  $request->work_history_end_date[$i],
                    'description'  =>  $request->work_history_description[$i]
                ]);
            }else{
                $bug = new stdClass();
                $bug->wh_position = $request->work_history_position[$i];
                $bug->wh_company_name = $request->work_history_company_name[$i];
                $bug->wh_start_date = $request->work_history_start_date[$i];
                $bug->wh_end_date = $request->work_history_end_date[$i];
                $bug->wh_description      =   $request->work_history_description[$i];
                return $bug;
            }
        }

        for($i=0;$i<count($request->edu_school);$i++)
        {
            if($request->edu_school[$i] && $request->edu_degree[$i] && $request->edu_start_date[$i] && $request->edu_end_date[$i])
            {
                $education = Education::create([
                    'employee_id'   => $employee->id,
                    'school'        =>  $request->edu_school[$i],
                    'degree'        =>  $request->edu_degree[$i],
                    'start_date'    =>  $request->edu_start_date[$i],
                    'end_date'      =>  $request->edu_end_date[$i],
                    'note'          =>  $request->edu_note[$i]
                ]);
            }else{
                $bug = new stdClass();
                $bug->edu_school = $request->edu_school[$i];
                $bug->edu_degree = $request->edu_degree[$i];
                $bug->edu_start_date = $request->edu_start_date[$i];
                $bug->edu_end_date = $request->edu_end_date[$i];
                $bug->edu_note      =   $request->edu_note[$i];
                return $bug;
            }
        }




        return redirect(route('employee.index'))->with('success','Employee Created Success!');
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
        $employee->department = Position::with('department')->where('id',$employee->position_id)->first()->department->name;
        return view('dashboard.employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $dep = Department::with('position')->get();

        $employee = Employee::where('id',$employee->id)->first();
        $employee->work_history = WorkHistory::where('employee_id',$employee->id)->get();
        $employee->education = Education::where('employee_id',$employee->id)->get();

        $dep_id = Position::with('department')->where('id',$employee->position_id)->first()->department_id;
        return view('dashboard.employee.edit',compact('employee','dep','dep_id'));
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
        if(isset($request->work_history_id))
        {
            for($i=0;$i<count($request->work_history_id);$i++)
            {
                if(isset($request->work_history_id[$i]))
                {
                    WorkHistory::where('id',$request->work_history_id[$i])->update([
                        'company'=>$request->work_history_company_name[$i],
                        'position'=>$request->work_history_position[$i],
                        'start_date'=>$request->work_history_start_date[$i],
                        'end_date'=>$request->work_history_end_date[$i],
                        'description'=>$request->work_history_description[$i]
                    ]);
                }else{
                    WorkHistory::create([
                        'employee_id'=>$employee->id,
                        'company'=>$request->work_history_company_name[$i],
                        'position'=>$request->work_history_position[$i],
                        'start_date'=>$request->work_history_start_date[$i],
                        'end_date'=>$request->work_history_end_date[$i],
                        'description'=>$request->work_history_description[$i]
                    ]);
                }
            }
        }
        if(isset($request->education_id))
        {
            for($i=0;$i<count($request->education_id);$i++)
            {
                if(isset($request->education_id[$i]))
                {
                    Education::where('id',$request->edu_id[$i])->update([
                        'school'=>$request->edu_school[$i],
                        'degree'=>$request->edu_degree[$i],
                        'start_date'=>$request->edu_start_date[$i],
                        'end_date'=>$request->edu_end_date[$i],
                        'note'=>$request->edu_note[$i]
                    ]);
                }else{

                    Education::create([
                        'employee_id'=>$employee->id,
                        'school'=>$request->edu_school[$i],
                        'degree'=>$request->edu_degree[$i],
                        'start_date'=>$request->edu_start_date[$i],
                        'end_date'=>$request->edu_end_date[$i],
                        'note'=>$request->edu_note[$i]
                    ]);
                }
            }
        }
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'mimes:png,jpg,jpeg,ico',
            'dob'=>'required',
            'position_id'=>"required",

        ]);
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
            'address'=>$request->address,
            'photo'=>$file_path,
            'dob'=>$request->dob,
            'position_id'=>$request->position_id,
        ]);
        return redirect()->back()->with('success','Employee Updated Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $image_arr = explode('/',$employee->photo);
        Storage::disk('images')->delete($image_arr[1]);
        Employee::where('id',$employee->id)->delete();
        return redirect()->back()->with('success','Employee Deleted Success!');
    }
}
