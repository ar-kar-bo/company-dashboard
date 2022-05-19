<?php

namespace App\Http\Controllers\API;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::with('department')->get();
        return response()->json($positions);
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
            'salary'=>'required',
            'department_id'=>'required'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors());
        }else{
            $position = new Position();
            $position->name = $request->name;
            $position->salary = $request->salary;
            $position->department_id = $request->department_id;
            $result = $position->save();
            if($result)
            {
                return ['result'=>'Position Created Success!'];
            }else{
                return ['result'=>'Create position failed!'];
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::where('id',$id)->with('department')->first();
        return response()->json($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $rules = array(
            'name'=>'required',
            'salary'=>'required',
            'department_id'=>'required'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors());
        }else{
            $position = Position::find($position->id);
            $position->name = $request->name;
            $position->salary = $request->salary;
            $position->department_id = $request->department_id;
            $result = $position->save();
            if($result)
            {
                return ['result','Position Created Success!'];
            }else{
                return ['result','Create position failed!'];
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        Position::where('id',$position->id)->delete();
        return response()->json(['result'=>'Position Deleted Success']);
    }
}
