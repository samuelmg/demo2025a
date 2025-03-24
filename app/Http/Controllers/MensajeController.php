<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lista-mensajes', [
            'mensajes' => Mensaje::all(),
            'mensajesBorrados' => Mensaje::onlyTrashed()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'correo' => ['required', 'email', 'max:255'],
            'mensaje' => ['required', 'min:15']
        ]);
    
        // Forma manual de crear registro de mensaje
        // $mensaje = new Mensaje();
        // $mensaje->nombre = $request->nombre;
        // $mensaje->correo = $request->correo;
        // $mensaje->mensaje = $request->mensaje;
        // $mensaje->save();

        Mensaje::create($request->all());

        return redirect('/mensajes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mensaje $mensaje)
    {
        return view('mensajes.show-mensaje', compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mensaje $mensaje)
    {
        return view('mensajes.edit-mensaje', compact('mensaje'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'correo' => ['required', 'email', 'max:255'],
            'mensaje' => ['required', 'min:15']
        ]);

        // $mensaje->nombre = $request->nombre;
        // $mensaje->correo = $request->correo;
        // $mensaje->mensaje = $request->mensaje;
        // $mensaje->save();
        $mensaje->update($request->all());

        return redirect()->route('mensajes.show', $mensaje);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();
        return redirect()->route('mensajes.index');
    }
}
