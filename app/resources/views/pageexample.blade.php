<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/marin.css') }}">

    <!-- Inclure tes fichiers CSS, scripts, etc. ici -->
</head>

<body>
    @include('burger')
    <div class="base-container">
        <h1 class="titre-page">Titre de la page</h1>
        
        @include('comment')
    </div>

</body>

</html>
