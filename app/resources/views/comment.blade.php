<!-- Commentaires.blade.php (ou le nom que tu souhaites) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/menu/comment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/' . $blog->couleur_blog . '.css') }}">
    <x-head.tinymce-config-comment />

    <!-- Inclure tes fichiers CSS, scripts, etc. ici -->
</head>
<div class="comment-section">
    <h2>Commentaires</h2>

    <!-- Liste des commentaires -->
    <ul class="comment-list">
        @foreach($article->commentaires as $commentaire)
            <li class="comment">
                <div class="comment-author">{{ $commentaire->pseudo_commentaire }}</div>
                <div class="comment-content">
                    {{ $commentaire->contenu_commentaire }}
                </div>
            </li>
        @endforeach
    </ul>


    <!-- Formulaire pour ajouter un nouveau commentaire -->
    <div class="comment-form">
    <h3>Ajouter un commentaire</h3>
    
    <form method="post" action="{{ route('comment.store') }}">
        @csrf
        <input type="hidden" name="id_article" value="{{ $article->id_article }}">
        
        <div class="form-group">
            <label for="pseudo_commentaire">Nom de l'auteur:</label>
            <input type="text" name="pseudo_commentaire" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="contenu_commentaire">Contenu du commentaire:</label>
            <textarea name="contenu_commentaire" class="form-control" required>
            </textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
    </form>
</div>


</div>
