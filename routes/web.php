<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PositionController;
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
Route::resource("department", DepartmentController::class);
Route::resource("position", PositionController::class);
Route::resource("employee",EmployeeController::class);

Route::get('/getPosition/{id}',function($id){
    $position = Position::where('department_id',$id)->get();
    return response()->json($position);
});
