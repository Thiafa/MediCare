<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="fa-solid fa-bars"></i> </a> </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span> </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-footer">
                        <ul class="navbar-nav">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                    <i class="mr-2"></i>{{ __('Sair') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown"> <button
                    class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                    id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown"
                    data-bs-display="static" aria-label="Toggle theme (dark)"> <span class="theme-icon-active">
                        <i class="bi bi-moon-fill me-2"></i> </span> <span class="d-lg-none ms-2"
                        id="bd-theme-text">Toggle theme</span> </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text"
                    style="--bs-dropdown-min-width: 8rem;">
                    <li> <button type="button" class="dropdown-item d-flex align-items-center"
                            data-bs-theme-value="light" aria-pressed="false"> <i class="me-1 fa-solid fa-sun"></i>
                            Light
                            <i class="bi bi-check-lg ms-auto d-none"></i> </button> </li>
                    <li> <button type="button" class="dropdown-item d-flex align-items-center active"
                            data-bs-theme-value="dark" aria-pressed="true"> <i class="me-1 fa-solid fa-moon"></i>
                            Dark
                            <i class="bi bi-check-lg ms-auto d-none"></i> </button> </li>
                    <li> <button type="button" class="dropdown-item d-flex align-items-center"
                            data-bs-theme-value="auto" aria-pressed="false">
                            <i class="me-1 fa-solid fa-desktop"></i>
                            Auto </button> </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
