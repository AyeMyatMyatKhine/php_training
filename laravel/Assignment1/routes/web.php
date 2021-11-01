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

Route::get('/' , 'EmployeeController@list')->name('list');
Route::group(['prefix'=>'employee'],function(){
    Route::get('insert' , 'EmployeeController@insert')->name('insert');
    Route::post('create' , 'EmployeeController@create')->name('create');
    Route::get('edit/{id}' , 'EmployeeController@edit')->name('edit');
    Route::post('update/{id}' , 'EmployeeController@update')->name('update');
    Route::get('delete{id}' , 'EmployeeController@delete')->name('delete');
    Route::get('show/{id}' , 'EmployeeController@show')->name('show');
});

Route::group(['prefix'=>'salary'] , function(){
    Route::get('list' , 'SalaryController@showTable')->name('Salarylist');
    Route::get('insert' , 'SalaryController@insert')->name('salaryInsert');
    Route::post('create' , 'SalaryController@create')->name('salaryCreate');
    Route::get('edit/{id}' , 'SalaryController@edit')->name('salaryEdit');
    Route::post('update/{id}' , 'SalaryController@update')->name('salaryUpdate');
    Route::get('delete{id}' , 'SalaryController@delete')->name('salaryDelete');
    Route::get('show/{id}' , 'SalaryController@show')->name('salaryShow');
});

