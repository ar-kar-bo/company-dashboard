<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Position;
use App\Models\WorkHistory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view("dashboard.index");
    }

    public function search(Request $request)
    {
        $department = Department::all();
        $search = $request->search;
        $employees = Employee::where('name','like',"%{$search}%")->latest()->get();
        return view('dashboard.employee.index',compact('employees','department'));
    }

    public function byDepartment($department_id)
    {
        $department = Department::all();
        $employees = Department::with('employee')->where('id',$department_id)->first()->employee;
        for($i=0;$i<count($employees);$i++)
        {
            $position =  Position::where('id',$employees[$i]->id)->first();
            $employees[$i]->position = $position;
        }
        return response()->json($employees);
        // return view('dashboard.employee.index',compact('employees','department'));
    }

    public function destoryEducation($education_id)
    {
        Education::where('id',$education_id)->delete();
        return redirect()->back()->with('success','Deleted Education of Employee!');
    }

    public function destoryWorkHistory($work_history_id)
    {
        WorkHistory::where('id',$work_history_id)->delete();
        return redirect()->back()->with('success','Deleted Work History of Employee!');
    }
}
