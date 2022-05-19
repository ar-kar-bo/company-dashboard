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
        return response()->json($departments);
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
                return ['result'=>'Department Created Success!'];
            }else{
                return ['result'=>'Department create operation has been failed!'];
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
        $department = Department::find($department->id);
        return response()->json($department);
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
        return response()->json($department);
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
                return ['result'=>"Department Updated Success!"];
            }else{
                return ['result'=>'Update Operation has been failed!'];
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
        return response()->json(['result'=>'Department Deleted Success!']);
    }
}
