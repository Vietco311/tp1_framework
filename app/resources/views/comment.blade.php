<!-- Commentaires.blade.php (ou le nom que tu souhaites) -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/menu/comment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/' . $blog->couleur_blog . '.css') }}">
    <x-head.tinymce-config-comment />


</head>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@include('components/intersection')
<div class="comment-section">
    <h2>Commentaires</h2>

    <!-- Liste des commentaires -->
    <ul class="comment-list">
        @if(isset($blog))
            @foreach ($commentsApprouve as $commentaire)
                <li class="comment">
                    <div class="comment-author">{{ $commentaire->pseudo_commentaire_blog }}</div>
                    <div class="comment-content">
                        {!! $commentaire->contenu_commentaire_blog !!}
                    </div>
                </li>
            @endforeach
        @elseif (isset($article))
            @foreach ($commentsApprouve as $commentaire)
                <li class="comment">
                    <div class="comment-author">{{ $commentaire->pseudo_commentaire }}</div>
                    <div class="comment-content">
                        {!! $commentaire->contenu_commentaire !!}
                    </div>
                </li>
            @endforeach
        
        @endif
    </ul>

    <!-- Formulaire pour ajouter un nouveau commentaire -->
    <div class="comment-form">
        <h3>Ajouter un commentaire</h3>

        @include('components/forms/tinymce-comment')
