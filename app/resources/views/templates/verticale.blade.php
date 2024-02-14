<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Vertical Gauche</title>
    <link rel="stylesheet" href="{{ asset('css/menu/vertgauche.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/' . $couleur . '.css') }}">
    <!-- Ajoute tes liens CSS ici -->
</head>
<body>
    <header>
        <nav>
            <!-- Menu horizontal -->
            <ul>
                <li class="button-container"><a class="menu-link horizontal-link" href="{{ route('view-blog', ['id' => $blog->id_blog]) }}">Accueil</a></li>
                @foreach ($articles as $article)
                    <li class="button-container"><a class="menu-link horizontal-link" href="{{ route('view-article', ['articleId' => $article->id_article]) }}">{{ $article->nom_article }}</a></li>
                @endforeach
            </ul>
            <!-- Ajoute d'autres éléments du menu selon tes besoins -->
        </nav>
    </header>

    <footer>
        <!-- Contenu du pied de page -->
    </footer>

    <!-- Ajoute tes scripts ici -->
</body>
</html>
