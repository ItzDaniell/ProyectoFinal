<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar Contraseña</title>
</head>
<body>
    <h1>Configurar Contraseña</h1>
    <form action="{{ route('password.save') }}" method="POST">
        @csrf
        <label for="password">Nueva Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <br>
        <button type="submit">Guardar Contraseña</button>
    </form>
</body>
</html>
