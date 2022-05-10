<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

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
        return view('dashboard.position.index',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deps = Department::all();
        return view('dashboard.position.create',compact('deps'));
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
            'salary'=>'required',
            'department_id'=>'required'
        ]);
        Position::create([
            'name'=>$request->name,
            'salary'=>$request->salary,
            'department_id'=>$request->department_id
        ]);
        return redirect(route('position.index'))->with('success','Position Created Success!');
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
    public function edit(Position $position)
    {
        $deps = Department::all();
        $position = Position::where('id',$position->id)->with('department')->first();
        return view('dashboard.position.edit',compact('deps','position'));

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
        $request->validate([
            'name'=>'required',
            'salary'=>'required',
            'department_id'=>'required'
        ]);

        Position::where('id',$position->id)->update([
            'name'=>$request->name,
            'salary'=>$request->salary,
            'department_id'=>$request->department_id
        ]);
        return redirect()->back()->with('success','Position Updated Success!');
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
        return redirect()->back()->with('success','Position Deleted Success');
    }
}
