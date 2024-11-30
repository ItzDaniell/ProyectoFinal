<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usted esta Baneado</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        // Ejecutar inmediatamente
        window.history.replaceState({}, '', '{{ route('baneado.banned') }}');
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "AR One sans", sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Acceso Restringido</h1>
        <p class="text-gray-700">Hola, {{ $user->name }}. Tu cuenta ha sido suspendida.</p>
        @if ($ban)
            <p class="text-red-500">Razón: {{ $ban->comment }}</p>
            <p class="text-gray-500">Fecha de baneo: {{ $ban->created_at }}</p>
            @if ($ban->expires_at)
                <p class="text-gray-500">Tu baneo expira el: {{ $ban->expires_at }}</p>
            @else
                <p class="text-red-600">El baneo es permanente.</p>
            @endif
        @endif
    </div>
</body>
</html>
