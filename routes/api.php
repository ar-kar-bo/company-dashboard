<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Models\City;
use App\Models\Employee;
use App\Models\Position;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employee_list/search', [PageController::class,'search']);
Route::get('/employee_list/department/{department_id}',[PageController::class,'byDepartment']);
Route::get('/employee_edit/eduction/{education_id}',[PageController::class,'destoryEducation']);
Route::get('/employee_edit/department/{department_id}',[PageController::class,'destoryWorkHistory']);


Route::apiResource("department",DepartmentController::class)->except('edit');
Route::apiResource("position",PositionController::class)->except('edit');
Route::apiResource("employee",EmployeeController::class)->except('edit');

Route::get('department/{id}/edit',[DepartmentController::class,'edit']);
Route::get('position/{id}/edit',[PositionController::class,'edit']);
Route::get('employee/{id}/edit',[EmployeeController::class,'edit']);

Route::get('state',function(){
    return response()->json(State::all());
});

Route::get('city',function(){
    return response()->json(City::all());
});

Route::get('/getPosition/{department_id}',function($department_id){
    $position = Position::where('department_id',$department_id)->get();
    return response()->json($position);
});

Route::get('/getCity/{state_id}',function($state_id){
    $city = City::where('state_id',$state_id)->get();
    return response()->json($city);
});
