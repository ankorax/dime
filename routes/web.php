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

Route::group(['prefix' => 'admin'], function () {
    Route::get('empleados', 'EmpleadoController@index')->name('empleados');
    Route::get('empleados/create', 'EmpleadoController@create')->name('empleados.create');
    Route::post('empleados/store', 'EmpleadoController@store')->name('empleados.store');
    Route::get('empleados/edit/{empleado}', 'EmpleadoController@edit')->name('empleados.edit');
    Route::put('empleados/update/{empleado}', 'EmpleadoController@update')->name('empleados.update');
    Route::get('empleados/destroy/{empleado}', 'EmpleadoController@destroy')->name('empleados.destroy');
});
