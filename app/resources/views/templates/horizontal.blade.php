<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/menu/horizontal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/' . $couleur . '.css') }}">
    
</head>
<body>
    <header>
        <nav>
            
            <ul>
                @include('titre-site')
                <li class="button-container"><form style="height: 100%" action="{{ route('view-blog', ['id' => $blog->id_blog]) }}"><button type="submit" class="menu-button horizontal-button">Accueil</button></form></li>
                @foreach ($articles as $article)
                    <li class="button-container"><form style="height: 100%" action="{{ route('view-article', ['articleId' => $article->id_article]) }}"><button type="submit" class="menu-button horizontal-button">{{ $article->nom_article }}</button></form></li>
                @endforeach
            </ul>
        </nav>
    </header>

</body>
</html>
