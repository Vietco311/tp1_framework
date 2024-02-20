@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Espace Personnel</h1>
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mt-3 mb-3">Déconnexion</button>
        </form>
        
        <a href="{{ route('create-site') }}" class="btn btn-primary mt-3 mb-3">Créer un site</a>
        
        <h2>Mes Blogs</h2>
        @if ($user->blogs->isEmpty())
            <p>Vous n'avez pas encore créé de blogs.</p>
        @else
            <div class="row">
                @foreach ($user->blogs as $blog)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">{{ $blog->nom_blog }}</h4>
                                <p class="card-text">URL: {{ $blog->url_blog }}</p>
                                <p class="card-text">Sujet: {{ $blog->sujet_blog }}</p>
                                <p class="card-text">Couleur: {{ ucfirst($blog->couleur_blog) }}</p>
                                <p class="card-text">Couleur des séparations <span style="background-color: {{ $blog->couleur_separation_blog }}; color: {{ $blog->couleur_separation_blog }}; border: 2px solid black;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span></p>
                                <p class="card-text">Taille des séparations : {{ $blog->taille_separation_blog}}</p>
                                <p class="card-text">Image du titre: 
                                                    @if ($blog->param_image_blog_id == 0)
                                                        Banniere
                                                    @elseif ($blog->param_image_blog_id == 1)
                                                        Parchemin
                                                    @elseif ($blog->param_image_blog_id == 2)
                                                        Bulle
                                                    @else
                                                        Image Inconnue
                                                    @endif
                                </p>
                                <p class="card-text">Couleur du titre: <span style="background-color : {{ $blog->couleur_titre_blog}}; color: {{ $blog->couleur_titre_blog}}; border: 2px solid black;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>  </p>
                                <p class="card-text">Police du titre: 
                                                    @if ($blog->police_titre_blog == "OpenSans-VariableFont_wdth,wght")
                                                        Open Sans
                                                    @elseif ($blog->police_titre_blog == "Montserrat-VariableFont_wght")
                                                        Montserrat
                                                    @elseif ($blog->police_titre_blog == "Lora-VariableFont_wght")
                                                        Lora
                                                    @else
                                                        Police Inconnue
                                                    @endif
                                </p>
                                <p class="card-text">Template: {{ ucfirst($blog->template_blog) }}</p>

                                <a href="{{ route('view-blog', ['id' => $blog->id_blog]) }}" class="btn btn-primary mb-2">Voir le blog</a>
                                <a href="{{ route('create-article', ['blog' => $blog->id_blog]) }}" class="btn btn-success mb-2">Créer un article</a>
                                <a href="{{ route('edit-blog', ['id' => $blog->id_blog]) }}" class="btn btn-warning mb-2">Modifier le blog</a>
                                <form action="{{ route('delete-blog', ['id' => $blog->id_blog]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-2 w-100">Supprimer le blog</button>
                                </form>
                                <a href="{{ route('moderate-comments-blog', ['idBlog' => $blog->id_blog]) }}" class="btn btn-primary mb-2">Modérer les commentaires</a>
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
