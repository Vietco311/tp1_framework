<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Ajoute tes liens CSS ici -->
    <link rel="stylesheet" href="{{ asset('css/menu/horizontal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/vintage.css') }}">
</head>
<body>
    <header>
        <nav>
            <!-- Menu horizontal -->
            <ul>
                <li><button class="menu-button horizontal-button" href="#">Accueil</button></li>
                <li><button class="menu-button horizontal-button" href="#">Page 1</button></li>
                <li><button class="menu-button horizontal-button" href="#">Page 2</button></li>
                <!-- Ajoute d'autres éléments du menu selon tes besoins -->
            </ul>
        </nav>
    </header>

    

    <main>
        @yield('content')
    </main>

    <!-- Ajoute tes scripts ici -->
</body>
</html>
