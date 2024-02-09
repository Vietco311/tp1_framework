<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/menu/burger.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/bordeau.css') }}">
</head>
<body>
    <header>
        <!-- Contenu de l'en-tête -->
        <div class="burger-menu" onclick="toggleMenu()">☰</div>
        <nav class="hide">
            <!-- Menu burger -->
            <ul>
                <li><button class="menu-button burger-button" href="#">Accueil</button></li>
                <li><button class="menu-button burger-button" href="#">Page 1</button></li>
                <li><button class="menu-button burger-button" href="#">Page 2</button></li>
                <!-- Ajoute d'autres éléments du menu selon tes besoins -->
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>

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
