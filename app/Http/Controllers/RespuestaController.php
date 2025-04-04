<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required',
            'mensaje_id' => 'required|exists:mensajes,id',
        ]);

        $respuesta = new Respuesta();
        $respuesta->contenido = $request->contenido;
        // $respuesta->mensaje_id = $request->mensaje_id;
        // $respuesta->save();

        $mensaje = Mensaje::find($request->mensaje_id);
        $mensaje->respuestas()->save($respuesta);

        return redirect()->route('mensajes.show', $respuesta->mensaje_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Respuesta $respuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Respuesta $respuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Respuesta $respuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Respuesta $respuesta)
    {
        //
    }
}
