@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Espace Personnel</h1>
        
        <!-- Bouton de déconnexion -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Déconnexion</button>
        </form>
        
        <a href="{{ route('create-site') }}" class="btn btn-primary">Créer un site</a>
        
        <!-- Liste des blogs de l'utilisateur -->
        <h2>Mes Blogs</h2>
        @if ($user->blogs->isEmpty())
            <p>Vous n'avez pas encore créé de blogs.</p>
        @else
            <div class="row">
                @foreach ($user->blogs as $blog)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->nom_blog }}</h5>
                                <p class="card-text">URL: {{ $blog->url_blog }}</p>
                                <p class="card-text">Sujet: {{ $blog->sujet_blog }}</p>
                                <p class="card-text">Couleur: {{ $blog->couleur_blog }}</p>
                                <p class="card-text">Template: {{ $blog->template_blog }}</p>
                                <!-- Ajoutez d'autres informations du blog ici -->
                                <a href="{{ route('view-blog', ['id' => $blog->id_blog]) }}" class="btn btn-primary">Voir le blog</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
