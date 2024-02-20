<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/' . $blog->couleur_blog . '.css') }}">
    <link rel="stylesheet" href="{{ asset(('police/montserrat.css'))}}">

</head>

<body>
    @include('templates.' . $blog->template_blog)
    
    <div class="base-container"> 
        @include('titre-site')
        <div class="section-article">    
            <h1 class="titre-page">{{ $article->nom_article }}</h1>        
            <p class="auteur-article">Auteur: {{ $article->auteur_article }}</p>
            <img src="{{ asset('storage/' . $article->image_article) }}" alt="Image de l'article" class="image-article">
            <p class="date-article">Date de publication: {{ $article->date_article }}</p>
            <div class="contenu-article">
                {!! $article->contenu_article !!}
            </div>
        </div>
        @include('components/intersection')
        @include('comment')
    </div>

</body>

</html>
