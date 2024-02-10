<!-- resources/views/welcome.blade.php -->

@extends('layouts.app') <!-- Assurez-vous d'avoir un layout de base, si utilisé -->

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Bienvenue sur notre CMS</h1>
            <p class="lead">Gérez votre contenu en toute simplicité avec notre système de gestion de contenu (CMS).</p>

            <!-- Options de connexion et d'inscription -->
            @guest
                <p>
                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Connexion</a>
                    <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Inscription</a>
                </p>
            @endguest

            <!-- Contenu supplémentaire pour les utilisateurs connectés -->
            @auth
                <p>
                    Bienvenue, {{ Auth::user()->nom_compte }}! <!-- Utilisez le nom de l'utilisateur connecté -->
                    <a class="btn btn-primary btn-lg" href="{{ route('dashboard') }}" role="button">Accéder à votre espace ici</a>
                </p>
                <!-- Ajoutez ici le contenu supplémentaire réservé aux utilisateurs connectés -->
            @endauth
        </div>
    </div>
@endsection
