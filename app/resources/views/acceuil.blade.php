<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="styleshhet" href="{{ asset('css/police/open-sans.css') }}">

</head>
<body>
    @include('templates/'. $blog->template_blog) 
    <div class="base-container">
        <h1 class="titre-acceuil">Nom du site</h1>
        <ul class="page-container">
            <li><a class="acceuil-button" href="/page-example">Page 1</a ></li>
            <li><a class="acceuil-button" href="#">Page 2</a ></li>
        </ul>
     
    </div>
    @include('comment') 
</body>

</html>
