<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/marin.css') }}">
    <link rel="styleshhet" href="{{ asset('css/police/open-sans.css') }}">

    <!-- Inclure tes fichiers CSS, scripts, etc. ici -->
</head>
@include('templates/burger')
<body>

    <div class="base-container">
        <h1 class="titre-acceuil">Nom du site</h1>
        <ul class="page-container">
            <li><a class="acceuil-button" href="/page-example">Page 1</a ></li>
            <li><a class="acceuil-button" href="#">Page 2</a ></li>
            <!-- Ajoute d'autres éléments du menu selon tes besoins -->
        </ul>
        @include('comment')
    </div>

</body>

</html>
