@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $blog->nom_blog }}</h1>
        <p>URL: {{ $blog->url_blog }}</p>
        <p>Sujet: {{ $blog->sujet_blog }}</p>
        <p>Couleur: {{ $blog->couleur_blog }}</p>
        <p>Template: {{ $blog->template_blog }}</p>
        <!-- Ajoutez d'autres informations du blog ici -->
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Retour au tableau de bord</a>
    </div>
@endsection
