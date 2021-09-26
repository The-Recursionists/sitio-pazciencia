<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="{{ asset('argon') }}/img/brand/white.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/original-logo.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('lessons.list') }}">
                        <i class="fas fa-book-open"></i>
                        <span class="nav-link-inner--text">Lecciones</span>
                    </a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('register') }}">
                        <i class="ni ni-circle-08"></i>
                        <span class="nav-link-inner--text">{{ __('Registrarse') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                        <i class="ni ni-key-25"></i>
                        <span class="nav-link-inner--text">{{ __('Iniciar Sesión') }}</span>
                    </a>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="userActionsButton">
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="fas fa-user mr-2"></i>
                                <span class="mb-0">{{ auth()->user()->name }}</span>
                            </div>
                            <span class="align-middle">
                                <i class="ml-2 fas fa-chevron-down"></i>
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="userActionsButton">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">{{ __('Bienvenido!') }}</h6>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>{{ __('Mi Perfil') }}</span>
                        </a>
                        @role(['manager'])
                            <a href="{{ route('home') }}" class="dropdown-item">
                                <i class="ni ni-key-25"></i>
                                <span>Dashboard</span>
                            </a>
                        @endrole
                        <!--
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>{{ __('Configuraciones') }}</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>{{ __('Actividad') }}</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>{{ __('Soporte') }}</span>
                        </a>
                        -->
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>{{ __('Salir') }}</span>
                        </a>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
