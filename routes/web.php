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
    return redirect('login');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'AdminController@admin');
    Route::get('/dashboard', 'AdminController@index');

    Route::resource('patients', 'PatientController');

    Route::resource('materials', 'MaterialController');

    Route::resource('healthUnits', 'HealthUnitController');

    Route::get('reports', 'ReportController@index');

    Route::get('reports/patients', 'ReportController@patients')->name('reports.patients');

    Route::get('reports/healthUnits', 'ReportController@healthUnits')->name('reports.healthUnits');
});
/** END Admin Routes */

Route::get('/home', 'HomeController@index')->name('home');
