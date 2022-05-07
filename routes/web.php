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

// Auth::routes();
Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/classroom', 'ClassroomController@index')->name('getClassroom');
    Route::get('/classroomdelete/{id}', 'ClassroomController@destroy');
    Route::post('/classroomstore', 'ClassroomController@store')->name('classroom.post');

    Route::get('/subject', 'SubjectController@index');
    Route::get('/subjectdelete/{id}', 'SubjectController@destroy');
    Route::post('/subjectstore', 'SubjectController@store')->name('subject.post');

    Route::get('/assignment', 'AssignmentController@index');

    Route::get('accompaniment/index', 'AccompanimentController@index');
    Route::get('accompaniment/create/{id}', 'AccompanimentController@show')->name('accCreate');
    Route::post('accompaniment/store/{id}', 'AccompanimentController@store')->name('acc.store');
    Route::get('accompaniment/delete/{id}', 'AccompanimentController@destroy')->name('accDel');
});
