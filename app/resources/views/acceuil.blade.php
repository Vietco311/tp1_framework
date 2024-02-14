<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="styleshhet" href="{{ asset('css/police/open-sans.css') }}">

</head>
<body>
    @include('templates/'. $blog->template_blog) 
    <div class="base-container">
        <h1 class="titre-acceuil">Nom du site</h1>
        <ul>
                <li class="button-container"><a class="menu-link horizontal-link" href="{{ route('view-blog', ['id' => $blog->id_blog]) }}">Accueil</a></li>
                @foreach ($articles as $article)
                    <li class="button-container"><a class="menu-link horizontal-link" href="{{ route('view-article', ['articleId' => $article->id_article]) }}">{{ $article->nom_article }}</a></li>
                @endforeach
            </ul>
     
    </div>
    @include('comment') 
</body>

</html>
