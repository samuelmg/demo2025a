<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Mensajes Recibidos</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>

        @foreach ($mensajes as $mensaje)
            <tr>
                <td>
                    <a href="{{ route('mensajes.show', $mensaje->id) }}">{{ $mensaje->id }}</a>
                </td>
                <td>{{ $mensaje->nombre }}</td>
                <td>{{ $mensaje->correo }}</td>
                <td>{{ $mensaje->created_at }}</td>
                <td>
                    <a href="{{ route('mensajes.edit', $mensaje) }}">Editar</a>
                </td>
            </tr>
        @endforeach

    </table>

</body>
</html>