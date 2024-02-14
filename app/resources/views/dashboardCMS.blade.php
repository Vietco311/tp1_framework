@extends('layouts.app')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                                <h4 class="card-title">{{ $blog->nom_blog }}</h4>
                                <p class="card-text">URL: {{ $blog->url_blog }}</p>
                                <p class="card-text">Sujet: {{ $blog->sujet_blog }}</p>
                                <p class="card-text">Couleur: {{ $blog->couleur_blog }}</p>
                                <p class="card-text">Couleur des séparations : {{ $blog->couleur_separation_blog}}</p>
                                <p class="card-text">Taille des séparations : {{ $blog->taille_separation_blog}}</p>
                                <p class="card-text">Template: {{ $blog->template_blog }}</p>

                                <!-- Ajoutez d'autres informations du blog ici -->
                                <a href="{{ route('view-blog', ['id' => $blog->id_blog]) }}" class="btn btn-primary">Voir le blog</a>
                                <a href="{{ route('create-article', ['blog' => $blog->id_blog]) }}" class="btn btn-success">Créer un article</a>
                                <a href="{{ route('edit-blog', ['id' => $blog->id_blog]) }}" class="btn btn-warning">Modifier le blog</a>
                                <form action="{{ route('delete-blog', ['id' => $blog->id_blog]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer le blog</button>
                                </form>
                                <!-- Section pour afficher la liste des articles -->
                                <h4>Articles</h4>
                                @if ($blog->articles->isEmpty())
                                    <p>Vous n'avez pas encore créé d'articles pour ce blog.</p>
                                @else
                                    <ul>
                                        @foreach ($blog->articles as $article)
                                            <li>
                                                {{ $article->nom_article }}
                                                
                                                <form action="{{ route('delete-article', ['id' => $article->id_article]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                                </form>
                                                <form action="{{ route('moderate-comments', ['idArticle' => $article->id_article]) }}" method="GET" style="display: inline;">
                                                    <button type="submit" class="btn btn-primary btn-sm">Modérer les commentaires</button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
