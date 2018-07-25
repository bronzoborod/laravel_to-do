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

use App\Task;
use Illuminate\Http\Request;

//Получение
Route::get('/','TaskController@mainPage');

//Добавление
Route::post('/task', 'TaskController@addTask');

//Удаление
Route::delete('/task/{task}', 'TaskController@deleteTask');
