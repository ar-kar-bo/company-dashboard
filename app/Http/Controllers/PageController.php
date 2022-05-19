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
        $search = $request->search;
        $employees = Employee::with("position")->where('name','like',"%{$search}%")->latest()->get();
        return response()->json($employees);
    }

    public function byDepartment($department_id)
    {
        $employees = Department::with('employee')->where('id',$department_id)->first()->employee;
        for($i=0;$i<count($employees);$i++)
        {
            $position =  Position::where('id',$employees[$i]->position_id)->first();
            $employees[$i]->position = $position;
        }
        return response()->json($employees);
    }

    public function destoryEducation($education_id)
    {
        Education::where('id',$education_id)->delete();
        return ['success'=>'Deleted Education of Employee!'];
    }

    public function destoryWorkHistory($work_history_id)
    {
        WorkHistory::where('id',$work_history_id)->delete();
        return ['success'=>'Deleted Work History of Employee!'];
    }
}
