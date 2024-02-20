@extends('layouts.app') 

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Bienvenue sur notre CMS</h1>
            <p class="lead">Gérez votre contenu en toute simplicité avec notre système de gestion de contenu (CMS).</p>

            @guest
                <p>
                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Connexion</a>
                    <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Inscription</a>
                </p>
            @endguest

            @auth
                <p>
                    Bienvenue, {{ Auth::user()->nom_compte }}! 
                    <a class="btn btn-primary btn-lg" href="{{ route('dashboard') }}" role="button">Accéder à votre espace ici</a>
                </p>
            @endauth
        </div>
    </div>
@endsection
