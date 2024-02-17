<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/menu/burger.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/' . $blog->couleur_blog . '.css') }}">
</head>
<body><header>
        <!-- Contenu de l'en-tête -->
        <div class="burger-menu" onclick="toggleMenu()">☰</div>
        @include('titre-site')
        <nav class="hide">
            <!-- Menu burger -->
            
            <ul>
                <li><form style="height: 100%" action="{{ route('view-blog', ['id' => $blog->id_blog]) }}"><button type="submit" class="menu-button burger-button">Accueil</button></form></li>
                
                @foreach ($articles as $article)
                    <li><form style="height: 100%" action="{{ route('view-article', ['articleId' => $article->id_article]) }}"><button type="submit" class="menu-button burger-button">{{ $article->nom_article }}</button></form></li>
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
