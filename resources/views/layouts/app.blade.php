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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap");


body {
    background: rgb(219, 219, 219);
}

.header {
    height: 60px;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
}

.header .left,
.left .search-box,
.header .right {
    display: flex;
    align-items: center;
}

.left a {
    font-size: 25px;
    font-weight: 600;
    color: #000;
    margin: 2rem 8rem 2rem 2rem;
}





.profile img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    cursor: pointer;
}

.wrapper .nav {
    background: #fff;
    height: 135%;
    width: 234px;
    overflow-y: auto;
    position: absolute;
}


.nav .sidebar {
    padding: 1px;
    display: flex;
    flex-direction: column;
}

.sidebar span {
    font-size: 14px;
    color: grey;
    margin: 1rem 3rem;
}

.sidebar a {
    width: 100%;
    padding: 0.8rem 3rem;
    font-size: 16px;
    font-weight: 500;
    color: rgb(100, 100, 100);
    text-decoration:none;
}

.sidebar .bottom {
    margin-top: 4rem;
    padding-bottom: 7rem;
    display: flex;
    flex-direction: column;
}

.bottom a {
    font-size: 14px;
    text-decoration:none;
}

.sidebar a:hover {
    background: rgb(235, 235, 235);
    
}


.sidebar a.active {
    border-left: 2px solid rgb(100, 100, 100);
}

.wrapper .main {
    width: 80%;
    position: relative;
    left: 230px;
    padding: 1rem;
}

.main .banner {
    width: 100%;
    /*background: rgb(42, 40, 68);*/
    background:rgb(5, 38, 83);
    color: #fff;
    padding: 0.5rem 1rem 1rem 3rem;
    border-radius: 5px;
    margin-top: 10px;
}

.banner h1,
.banner p,
.banner button {
    margin: 10px;
}
.banner button {
    display: block;
    padding: 6px 12px;
    border-radius: 5px;
    cursor: pointer;
}
.main .table-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
nav img {
  height: 50px; /* Hauteur du logo */
  width: auto; /* Maintient les proportions */
  margin-right: 10px; /* Espace à droite du logo */
}


/*hada profile */
/* Styles généraux */




.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -15px; /* Pour gérer les gouttières */
}

.col-md-8 {
    flex: 0 0 66.67%; /* Occupe 8/12 de la largeur */
    max-width: 66.67%;
    padding: 0 15px;
}

.col-md-4 {
    flex: 0 0 33.33%; /* Occupe 4/12 de la largeur */
    max-width: 33.33%;
    padding: 0 15px;
}

.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.card-header {
    padding: 15px;
    border-bottom: 1px solid #eee;
}

.card-title {
    font-size: 1.25rem;
    margin-bottom: 0;
}

.card-body {
    padding: 15px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: 500;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 10px;
    width: 100%;
}
a{
    text-decoration:none;
}

.btn-fill {
    background-color: #007bff; /* Couleur de bouton principale */
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-fill:hover {
    background-color: #0056b3; /* Couleur de bouton au survol */
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 15px;
}


/* Styles spécifiques pour le profil utilisateur */
.card-user .avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%; /* Image de profil ronde */
    object-fit: cover; /* Pour éviter la déformation de l'image */
    margin-bottom: 10px;
    border: 3px solid white; /* Ajout d'une bordure blanche */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); /* Ajout d'une ombre */
}

.card-user .author {
    text-align: center;
    margin-bottom: 20px;
}

.card-user .title {
    margin-bottom: 5px;
}

.card-user .description {
    color: #777;
    font-size: 0.9rem;
}

.card-user .button-container {
    text-align: center;
}

.btn-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin: 0 5px;
    background-color: transparent;
    border: none;
    cursor: pointer;
}

.btn-icon i {
    font-size: 1.2rem;
}

.btn-facebook { color: #3b5998; }
.btn-twitter { color: #00aced; }
.btn-google { color: #dd4b39; }




/* Responsive Design (pour les petits écrans) */
@media (max-width: 768px) {
    .col-md-8, .col-md-4 {
        flex: 0 0 100%; /* Occupe toute la largeur */
        max-width: 100%;
    }
}
    </style>
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
        <main >
           
            <div class="wrapper">
        <nav class="nav">
            <div class="sidebar">
                <span>Your Channel</span>
                <a href="#" class="active" id="openPopup" onclick="showPopup()">Nouveau Besoin</a>
                            <a href="#">Modifier Besoin</a>
                            <a href="{{ route('besoin.index') }}">Consulter Besoin</a>
                            <a href="{{ route('profile') }}">Profile</a>
                <div class="bottom">
                    <span>More Links</span>
                    <a href="#">Notifications</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </nav>
        <div class="main">
          @yield('content')
        </div>
        </main>
    </div>
</body>
</html>