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


Route::get('/', function (){
    return view('welcome');
});

Route::resource('projects', 'ProjectsController');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{tasks}', 'ProjectTasksController@update');

//Route::get('/projects', 'PagesController@index');
//Route::post('/projects', 'PagesController@store');
//Route::get('/projects/create', 'PagesController@create');
//Route::get('/projects/{project}', 'PagesController@show');
//Route::patch('/projects/{project}', 'PagesController@update');
//Route::delete('/projects/{project}', 'PagesController@destroy');
//Route::get('/projects/{project}/edit', 'PagesController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
