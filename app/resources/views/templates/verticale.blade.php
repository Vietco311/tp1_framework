<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Verticale Gauche</title>
    <link rel="stylesheet" href="{{ asset('css/menu/vertgauche.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/' . $couleur . '.css') }}">
    <style>
        * {
            border-color : $blog->couleur_separation_blog;
        }
    </style>
    <!-- Ajoute tes liens CSS ici -->
</head>
<body>
    <header>
        <nav>
            <!-- Menu vertical gauche -->
            <ul>
                <li class="button-container"><button class="menu-button horizontal-button" href="{{ route('view-article', ['articleId' => $article->id_article]) }}">Accueil</button></li>
            @foreach ($articles as $article)
                <li class="button-container"><button class="menu-button horizontal-button" href="{{ route('view-article', ['articleId' => $article->id_article]) }}">{{ $article->nom_article }}</button></li>
            @endforeach
            </ul>
        </nav>
    </header>
    
    <footer>
        <!-- Contenu du pied de page -->
    </footer>

    <!-- Ajoute tes scripts ici -->
</body>
</html>
