@php
use Illuminate\Support\Facades\Auth;
@endphp

<!doctype html>
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
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/stylenavbar.css'])

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img src="{{ asset('images/cnss.png') }}" alt="CNSS Logo" style="height: 50px; width: auto;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"> 
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <div class="wrapper">
                <nav class="nav">
                    <div class="sidebar">
                        <span>Your Channel</span>
                        <a href="{{ route('besoin.create') }}" class="active" id="openPopup" onclick="showPopup(event)">Nouveau Besoin</a>
                            <a href="#">Modifier Besoin</a>
                            <a href="{{ route('besoin.index') }}">Consulter Besoin</a>
                            <a href="{{ route('profile') }}">Profile</a>

                        <div class="bottom">
                            <span>More Links</span>
                            <a href="#">Notifications</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </nav>
                <div class="main">
                    <div class="banner">
                        <h1> Bonjour {{ Auth::user()->name }}, heureux de vous revoir !</h1>
                        <p> Prêt à gérer vos besoins aujourd'hui ? </p>
                    </div>
                </div>
            </div>
        </main>
        <div id="popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 400px; background: #fff; padding: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); z-index: 1000;">
    <h3>Créer un nouveau besoin</h3>
    @if(isset($besoin) && $marcheActif)
    <form method="POST" action="{{ route('besoin.update', $besoin->ref) }}">
        @csrf
        @method('PUT')
        <label for="ref">Référence :</label>
        <input type="text" id="reference" name="reference" value="{{ $besoin->ref }}" style="width: 100%; margin-bottom: 10px; padding: 5px;" readonly>

        <label for="idMarche">Marché actif :</label>
        <input type="text" id="idMarche" name="idMarche" value="{{ $marcheActif->id }}" style="width: 100%; margin-bottom: 10px; padding: 5px;" readonly>

        <label for="date">Date de création :</label>
        <input type="date" id="date" name="date" style="width: 100%; margin-bottom: 10px; padding: 5px;" required>

        <button type="submit" style="margin-right: 10px;">Enregistrer</button>
        <button type="button" onclick="closePopup()">Annuler</button>
    </form>
    @else
        <p>Aucun besoin trouvé.Veuillez en créer un.</p>
    @endif
</div>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div id="popupMask" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;" onclick="closePopup()"></div>
<script>
    function showPopup(event) {
        event.preventDefault();  // Empêche l'action par défaut du bouton (si nécessaire)
        document.getElementById('popup').style.display = 'block';
        document.getElementById('popupMask').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('popupMask').style.display = 'none';
    }
</script>



</body>
</html>