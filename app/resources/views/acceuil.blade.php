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
        @include('titre-site')
        <ul class="page-container">
            <li class="button-container"><a class="menu-link horizontal-link" href="{{ route('view-blog', ['id' => $blog->id_blog]) }}">Accueil</a></li>
                @foreach ($articles as $articles)
                    <li class="button-container"><a class="menu-link horizontal-link" href="{{ route('view-article', ['articleId' => $articles->id_article]) }}">{{ $articles->nom_article }}</a></li>
                @endforeach
        </ul>
        @include('comment') 
    </div>
</body>

</html>
