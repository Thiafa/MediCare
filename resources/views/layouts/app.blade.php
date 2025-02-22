<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary app-loaded sidebar-collapse">
    <div id="app" class="app-wrapper">
        @auth
            {{-- Navbar --}}
            @include('layouts._partials.navbar')
            {{-- Sidebar --}}
            @include('layouts._partials.sidebar')
        @endauth
        <main class="app-main py-4">
            @yield('content')
        </main>
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
