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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('dashboard/employees', 'Dashboard\EmployeesController');
Route::resource('dashboard/departments', 'Dashboard\DepartmentsController');
Route::resource('dashboard/salaries', 'Dashboard\SalariesController');
Route::resource('dashboard/titles', 'Dashboard\TitlesController');
