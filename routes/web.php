<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PositionController;
use App\Models\City;
use App\Models\Position;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PageController::class,'index']);
Route::get('/employee_list/search', [PageController::class,'search']);
Route::get('/employee_list/department/{department_id}',[PageController::class,'byDepartment']);
Route::get('/employee_edit/eduction/{education_id}',[PageController::class,'destoryEducation']);
Route::get('/employee_edit/department/{department_id}',[PageController::class,'destoryWorkHistory']);

Route::resource("department", DepartmentController::class);
Route::resource("position", PositionController::class);
Route::resource("employee",EmployeeController::class);

Route::get('/getPosition/{department_id}',function($department_id){
    $position = Position::where('department_id',$department_id)->get();
    return response()->json($position);
});

Route::get('/getCity/{state_id}',function($state_id){
    $city = City::where('state_id',$state_id)->get();
    return response()->json($city);
});

