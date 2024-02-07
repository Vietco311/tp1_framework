<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Ajoute tes liens CSS ici -->
    <link rel="stylesheet" href="../css/horizontal.css">
</head>
<body>
    <header>
        <!-- Contenu de l'en-tête -->
    </header>

    <nav>
        <!-- Menu horizontal -->
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

    <!-- Ajoute tes scripts ici -->
</body>
</html>
