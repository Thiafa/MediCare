<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex h-100 text-center text-bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0"> <a href="/">Medicare</a> </h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    @if (Route::is('register'))
                        <a class="nav-link fw-bold py-1 px-0 me-3" href="{{ route('login') }}">Entrar</a>
                    @else
                        <a class="nav-link fw-bold py-1 px-0 me-3" href="{{ route('register') }}">Registrar</a>
                    @endif
                </nav>
            </div>
        </header>
        <main class="px-3">
            @yield('content')
        </main>

        <footer class="mt-auto text-white-50">
            <p>Desenvolvido por <a href="https://guim.docawave.com.br/" class="text-white">Thiago César</a>.</p>
        </footer>
    </div>

    <script src="{{ asset('js/jquery-3.7.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    title: 'Pronto!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: true,
                    timerProgressBar: true,
                });
            })
        </script>
    @endif

    @if ($errors->any())
        @php
            $mensagem = '';
            foreach ($errors->all() as $error) {
                $mensagem .= $error . '<br>';
            }
        @endphp
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    title: 'Error!',
                    html: "{!! $mensagem !!}",
                    icon: 'error',
                    timer: 5000,
                    showConfirmButton: true,
                    timerProgressBar: true,
                });
            })
        </script>
    @endif

    <script>
        (() => {
            "use strict";

            const storedTheme = localStorage.getItem("theme");

            const getPreferredTheme = () => {
                if (storedTheme) {
                    return storedTheme;
                }

                return window.matchMedia("(prefers-color-scheme: dark)").matches ?
                    "dark" :
                    "light";
            };

            const setTheme = function(theme) {
                if (
                    theme === "auto" &&
                    window.matchMedia("(prefers-color-scheme: dark)").matches
                ) {
                    document.documentElement.setAttribute("data-bs-theme", "dark");
                } else {
                    document.documentElement.setAttribute("data-bs-theme", theme);
                }
            };

            setTheme(getPreferredTheme());

            const showActiveTheme = (theme, focus = false) => {
                const themeSwitcher = document.querySelector("#bd-theme");

                if (!themeSwitcher) {
                    return;
                }

                const themeSwitcherText = document.querySelector("#bd-theme-text");
                const activeThemeIcon = document.querySelector(".theme-icon-active i");
                const btnToActive = document.querySelector(
                    `[data-bs-theme-value="${theme}"]`
                );
                const svgOfActiveBtn = btnToActive.querySelector("i").getAttribute("class");

                for (const element of document.querySelectorAll("[data-bs-theme-value]")) {
                    element.classList.remove("active");
                    element.setAttribute("aria-pressed", "false");
                }

                btnToActive.classList.add("active");
                btnToActive.setAttribute("aria-pressed", "true");
                activeThemeIcon.setAttribute("class", svgOfActiveBtn);
                const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`;
                themeSwitcher.setAttribute("aria-label", themeSwitcherLabel);

                if (focus) {
                    themeSwitcher.focus();
                }
            };

            window
                .matchMedia("(prefers-color-scheme: dark)")
                .addEventListener("change", () => {
                    if (storedTheme !== "light" || storedTheme !== "dark") {
                        setTheme(getPreferredTheme());
                    }
                });

            window.addEventListener("DOMContentLoaded", () => {
                showActiveTheme(getPreferredTheme());

                for (const toggle of document.querySelectorAll("[data-bs-theme-value]")) {
                    toggle.addEventListener("click", () => {
                        const theme = toggle.getAttribute("data-bs-theme-value");
                        localStorage.setItem("theme", theme);
                        setTheme(theme);
                        showActiveTheme(theme, true);
                    });
                }
            });
        })();
    </script>

    @stack('scripts')
    @livewireScripts
</body>

</html>
