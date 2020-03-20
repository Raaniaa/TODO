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
Route::get('/todos' , 'todoscontroller@index');
Route::get('/todos/{todo}' , 'todoscontroller@show');
Route::get('/create' , 'todoscontroller@create');
Route::post('/create' , 'todoscontroller@store');
Route::get('/todos/{todo}/edit' , 'todoscontroller@edit');
Route::post('/todos/{todo}' , 'todoscontroller@update');
Route::get('/todos/{todo}/delete' , 'todoscontroller@destroy');
Route::get('/todos/{todo}/complete' , 'todoscontroller@complete');