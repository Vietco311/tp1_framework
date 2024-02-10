<!-- Commentaires.blade.php (ou le nom que tu souhaites) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/menu/comment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/vintage.css') }}">
    <x-head.tinymce-config-comment />

    <!-- Inclure tes fichiers CSS, scripts, etc. ici -->
</head>
<div class="comment-section">
    <h2>Commentaires</h2>

    <!-- Liste des commentaires -->
    <ul class="comment-list">
        <!-- Chaque commentaire est un élément de la liste -->
        <li class="comment">
            <div class="comment-author">Nom de l'auteur</div>
            <div class="comment-content">
                Contenu du commentaire. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </div>
        </li>

        <!-- Ajoute d'autres commentaires ici... -->
    </ul>

    <!-- Formulaire pour ajouter un nouveau commentaire -->
    <div class="comment-form">
        <h3>Ajouter un commentaire</h3>
        <x-forms.tinymce-comment />
    </div>
</div>
