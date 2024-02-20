<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/editpage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/marin.css') }}">
    <x-head.tinymce-config-article />
</head>

<body>
    @include('burger')
    <div class="base-container">
        <x-forms.tinymce-edit />
        
    </div>

</body>

</html>