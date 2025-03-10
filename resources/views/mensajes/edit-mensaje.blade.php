<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
</head>
<body>
    <h1>Editar mensaje # {{ $mensaje->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mensajes.update', $mensaje) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ $mensaje->nombre }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="correo">Correo</label>
        <input type="email" name="correo" value="{{ $mensaje->correo }}">
        @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" cols="30" rows="10">{{ $mensaje->mensaje }}</textarea>
        @error('mensaje')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">
            Enviar
        </button>
    </form>
</body>
</html>