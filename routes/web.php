<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

Route::resource('departamentos', DepartamentoController::class);
Route::resource('empleados', EmpleadoController::class);

Route::get('/', function () {
    return view('departamentos.index'); 
});