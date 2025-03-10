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
    <a href="{{ route('mensajes.edit', $mensaje) }}">Editar</a>
</body>
</html>