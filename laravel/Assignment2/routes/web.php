<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;

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

Route::get('excel-file', 'ExcelController@index')->name('excelFile');
Route::post('import-excel-file', 'ExcelController@importExcel')->name('importExcel');
Route::get('export-excel-file/{slug}', 'ExcelController@exportExcel')->name('exportExcel');
