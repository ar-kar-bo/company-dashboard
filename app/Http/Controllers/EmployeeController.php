<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('dashboard.employee.index',compact('employees'));
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
        Employee::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'photo'=>$file_path,
            'dob'=>$request->dob,
            'position_id'=>$request->position_id,
        ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $positions = Position::all();
        $employee = Employee::where('id',$employee->id)->first();
        return view('dashboard.employee.edit',compact('employee','positions'));
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
