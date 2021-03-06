<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('dashboard.department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.department.create');
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
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            // return $validator->errors();
            return response()->json($validator->errors(),401);
        }else{
            $department = new Department();
            $department->name = $request->name;
            $result = $department->save();
            if($result)
            {
                return redirect(route('department.index'))->with('success','Department Created Success!');
            }else{
                return redirect(route('department.index'))->with('warning','Department Creation has been failed!');
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('dashboard.department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = array(
            'name'=>'required'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors());
        }else{
            $department = Department::find($id);
            $department->name = $request->name;
            $result = $department->save();
            if($result)
            {
                return redirect()->back()->with('success','Department Updated Success!');
            }else{
                return redirect()->back()->with('warning','Department Update failed!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::where('id',$id)->delete();
        return redirect()->back()->with('success','Department Deleted Success!');
    }
}
