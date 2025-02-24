<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('landing');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::post('/crear-contacto', function (Request $request)
{
    dd( $request->all(), $request->correo );
    // dd('si llego a esta ruta');

    // Validar formulario

    // Guardar a DB

    // Redirigir
});
