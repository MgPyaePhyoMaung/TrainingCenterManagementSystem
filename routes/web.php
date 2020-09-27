<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/detail',function(){
    return view('students.detail_students');
});
Route::get('/index', function () {
    return view('index');
});
Route::post('/getajax','AjaxController@index');
Route::resource('/courses','CourseController');

Route::resource('/batches','BatchController');


Route::get('/findcourse/{id}','AjaxController@findByCourse');

Route::resource('/students','StudentController');
Route::get('/student_batch','StudentController@student_batch');
Route::get('/studentsByBatch/{id}','StudentController@studentsByBatch');
Route::resource('/attendences','AttendenceController');
Route::get('/attendence_course/{id}','AttendenceController@findByCourse');
Route::match(array('GET','POST'),'/attendence_batch/{id}','AttendenceController@findByBatch');
Route::resource('/payments','PaymentController');

Route::resource('/teachers','TeacherController');
Route::get('/teacher_batch','TeacherController@teacher_batch');
Route::get('/teachersByBatch/{id}','TeacherController@teachersByBatch');

Route::resource('/routines','RoutineController');
Route::get('/routine_course/{id}','RoutineController@findByCourse');

Route::resource('/expenses','ExpenseController');
Route::resource('/categories','CategoryController');


Route::get('/test','AjaxController@test');