<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="../css/burger.css"
   
</head>
<body>
    <header>
        <!-- Contenu de l'en-tête -->
        <div class="burger-menu" onclick="toggleNav()">☰</div>
        <nav class="hide">
            <!-- Menu burger -->
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <!-- Ajoute d'autres éléments du menu selon tes besoins -->
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Ajoute tes scripts ici -->
    <script>
        function toggleNav() {
            var nav = document.querySelector('nav');
            nav.classList.toggle('show');
        }
    </script>
</body>
</html>
