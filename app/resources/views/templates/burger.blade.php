<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/menu/burger.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/' . $blog->couleur_blog . '.css') }}">
    <style>
        .intersection {
            height: 50px; /* valeur variable dans le dashboard */
            background-color : #ffffff; /* valeur variable dans le dashboard */
        }
    </style>
</head>
<body><header>
        <!-- Contenu de l'en-tête -->
        <div class="burger-menu" onclick="toggleMenu()">☰</div>
        <nav class="hide">
            <!-- Menu burger -->
            <ul>
                <li><a class="menu-button burger-button" href="{{ route('view-blog', ['id' => $blog->id_blog]) }} ">Accueil</a></li>
                
                @foreach ($articles as $article)
                    <li><a class="menu-button burger-button" href="{{ route('view-article', ['articleId' => $article->id_article]) }}">{{ $article->nom_article }}</a></li>
                @endforeach
            </ul>

        </nav>
    </header>

    <!-- Ajoute tes scripts ici -->
    <script>
        function toggleMenu() {
            const burgerMenu = document.querySelector('.burger-menu');
            const nav = document.querySelector('nav');
                   
            burgerMenu.classList.toggle('open');

            nav.classList.toggle('show');
            nav.classList.toggle('hide');
        }
    </script>
</body>
</html>
