<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex h-100 text-center text-bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">Medicare</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-1 px-0 me-3" href="{{ route('login') }}">Entrar</a>
                    <a class="nav-link fw-bold py-1 px-0 me-3" href="{{ route('register') }}">Registrar</a>
                </nav>
            </div>
        </header>

        <main class="px-3">
            <h1>Medicare</h1>
            <h3>Software de Gestão de Atendimentos</h3>
            <p class="lead">Tenha a gestão dos seus atendimentos de forma prática e segura.</p>
            <p class="lead">
                <a href="{{ route('register') }}"
                    class="btn btn-lg btn-light fw-bold border-white bg-white">Registrar</a>
            </p>
        </main>

        <footer class="mt-auto text-white-50">
            <p>Desenvolvido por <a href="https://guim.docawave.com.br/" class="text-white">Thiago César</a>.</p>
        </footer>
    </div>
</body>

</html>
