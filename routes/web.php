<?php

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



Route::group(['middleware' => 'auth'], function() {
Route::resource('projects', 'ProjectsController');
Route::get('projects/{project}/assign','ProjectsController@assign');
//Route::post('projects/{project}','ProjectsController@match');
Route::match(['get', 'post'], 'projects/{project}', 'ProjectsController@match');

Route::resource('tasks', 'TasksController');
Route::get('excel','ExcelController@personalExport');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
