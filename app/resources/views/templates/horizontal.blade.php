<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Ajoute tes liens CSS ici -->
    <link rel="stylesheet" href="{{ asset('css/menu/horizontal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/' . $couleur . '.css') }}">
</head>
<body>
    <header>
        <nav>
            <!-- Menu horizontal -->
            <ul>
                <li class="button-container"><button class="menu-button horizontal-button" href="{{ route('view-blog', ['id' => $blog->id_blog]) }}">Accueil</button></li>
            @foreach ($articles as $article)
                <li class="button-container"><button class="menu-button horizontal-button" href="{{ route('view-article', ['articleId' => $article->id_article]) }}">{{ $article->nom_article }}</button></li>
            @endforeach
            </ul>
                <!-- Ajoute d'autres éléments du menu selon tes besoins -->
        </nav>
    </header>

    <!-- Ajoute tes scripts ici -->
</body>
</html>
