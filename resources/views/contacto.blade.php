<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/mensajes" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        <br>
        <label for="correo">Correo</label>
        <input type="email" name="correo" value="{{ old('correo') }}">
        <br>
        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" cols="30" rows="10">{{ old('mensaje') }}</textarea>
        <br>
        <button type="submit">
            Enviar
        </button>
    </form>
</body>
</html>