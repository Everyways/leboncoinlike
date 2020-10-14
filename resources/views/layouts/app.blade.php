<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Les meilleures annonces</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                </li>
                @else
                @admin
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">Administration</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">Mon compte</a>
                </li>
                @endadmin
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Les meilleures annonces</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Deconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        <nav class="navbar navbar-expand fixed-bottom navbar-dark">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link " href="{{ route('legal') }}">Mentions légales</a>
                <a class="nav-item nav-link " href="{{ route('confidentialite') }}">Politique de confidentialité</a>
            </div>
        </nav>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>

</html>