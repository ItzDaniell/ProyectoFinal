<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usted esta Baneado</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        window.history.replaceState({}, '', '{{ route('baneado.banned') }}');
    </script>
    <?php
    $user = Auth::user();
    $ban = $user->bans()->latest()->first();
    ?>
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
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <h1 class="mt-4 text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Acceso
                Restringido</h1>
            <p class="mt-4 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Hola, {{ $user->name }}. Tu
                cuenta ha sido suspendida.</p>
            <p class="mt-4 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Razón: {{ $ban->comment }}</p>
            @if ($ban->expired_at)
                <p class="mt-4 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Tu suspención expira el :
                    {{ $ban->expired_at }}</p>
            @else
                <p class="mt-4 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">La suspención es permanente.
                </p>
            @endif
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ route('Bienvenida') }}"
                    class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Volver</a>
                <a href="{{ route('Contactanos') }}" class="text-sm font-semibold text-gray-900">Contactanos<span
                        aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </main>
</body>
</html>
