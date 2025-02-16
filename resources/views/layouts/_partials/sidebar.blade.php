<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand"> <a class="brand-link" href="/dist/pages/">
            <span class="brand-text fw-light">{{ env('APP_NAME', 'MediCare') }}</span>
        </a>
    </div>
    <div class="sidebar-wrapper" data-overlayscrollbars="host">
        <div class="os-size-observer os-size-observer-appear">
            <div class="os-size-observer-listener ltr"></div>
        </div>
        <div>
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('pacientes.index') }}"
                            class="nav-link @if (Route::is('pacientes*')) active @endif">
                            <i class="nav-icon fa-solid fa-user"></i>
                            <p>
                                {{ __('Pacientes') }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('medicos.index') }}"
                            class="nav-link @if (Route::is('medicos*')) active @endif">
                            <i class="nav-icon fa-solid fa-user-doctor"></i>
                            <p>
                                {{ __('Médicos') }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('atendimentos.index') }}"
                            class="nav-link @if (Route::is('atendimentos*')) active @endif">
                            <i class="nav-icon fa-solid fa-hospital-user"></i>
                            <p>
                                {{ __('Atendimentos') }}
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>
