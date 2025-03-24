<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Mensaje # {{ $mensaje->id }}</h1>

    <ul>
        <li>Nombre: {{ $mensaje->nombre }}</li>
        <li>Correo: {{ $mensaje->correo }}</li>
    </ul>
    <p>
        Mensaje: <br>
        {{ $mensaje->mensaje }}
    </p>
    <hr>
    <h3>Respuestas</h3>
    <ul>
        @foreach ($mensaje->respuestas as $respuesta)
            <li>{{ $respuesta->contenido }}</li>
        @endforeach
    </ul>

    <hr>
    <h3>Responder</h3>
    <form action="{{ route('respuesta.store') }}" method="POST">
        @csrf
        <label for="contenido">Respuesta:</label><br>
        <textarea name="contenido" id="contenido" cols="40" rows="5"></textarea>
        <br>
        <input type="hidden" name="mensaje_id" value="{{ $mensaje->id }}">
        <input type="submit" value="Responder Mensaje">
    </form>

    <hr>
    <a href="{{ route('mensajes.edit', $mensaje) }}">Editar</a>

    <form action="{{ route('mensajes.destroy', $mensaje) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>

</body>
</html>