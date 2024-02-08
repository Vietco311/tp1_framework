<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Verticale Gauche</title>
    <link rel="stylesheet" href="{{ asset('css/menu/vertgauche.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/vintage.css') }}">
    <!-- Ajoute tes liens CSS ici -->
</head>
<body>
    <header>
        <nav>
            <!-- Menu vertical gauche -->
            <ul>
                <li><button class="menu-button vertical-button" href="#">Accueil</button></li>
                <li><button class="menu-button vertical-button" href="#">Page 1</button></li>
                <li><button class="menu-button vertical-button" href="#">Page 2</button></li>
                <!-- Ajoute d'autres éléments du menu selon tes besoins -->
            </ul>
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Contenu du pied de page -->
    </footer>

    <!-- Ajoute tes scripts ici -->
</body>
</html>
