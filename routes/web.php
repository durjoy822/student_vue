<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return Inertia::render ('create');
//});
Route::get('/',[StudentController::class,'index'])->name('student.index');
Route::get('students/create',[StudentController::class,'create']);
Route::post('students',[StudentController::class,'store']);
Route::get('/students/{student}/edit',[StudentController::class,'edit']);
Route::put('/students/{student}',[StudentController::class,'update']);
Route::delete('students/{student}',[StudentController::class,'destroy']);
Route::get('/students/{id}/show',[StudentController::class,'show']);

//https://github.com/opusaha/management

