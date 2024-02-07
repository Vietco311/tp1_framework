<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Verticale Gauche</title>
    <link rel="stylesheet" href="../css/vertgauche.css">
    <!-- Ajoute tes liens CSS ici -->
</head>
<body>
    <header>
        <!-- Contenu de l'en-tête -->
    </header>
    <nav>
        <!-- Menu vertical gauche -->
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <!-- Ajoute d'autres éléments du menu selon tes besoins -->
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Contenu du pied de page -->
    </footer>

    <!-- Ajoute tes scripts ici -->
</body>
</html>
