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

//Route::get('/', 'PagesController@home');
Route::get('/', 'ProjectsController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

/*
Route::get('projects', 'ProjectsController@index');
Route::get('projects/create', 'ProjectsController@create');
Route::get('project/{project}', 'ProjectsController@show');
Route::post('projects', 'ProjectsController@store');
Route::get('projects/{project}/edit', 'ProjectsController@edit');
Route::patch('projects/{project}', 'ProjectsController@upate');
Route::delete('projects/{project}', 'ProjectsController@destroy');
*/

Route::resource('projects', 'ProjectsController')/*->middleware('can:update,project')*/;

Route::post('projects/{project}/tasks', 'ProjectTasksController@store');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');

Auth::routes();

Route::get('/serviceProvider', function (\App\Repositories\UserRepository $userRepository) {
    dd($userRepository);
});
