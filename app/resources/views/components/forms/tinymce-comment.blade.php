
@if(isset($article))
<form class="tinymce" method="post" action="{{ route('comment-store') }}">
    @csrf
    <input type="hidden" name="id_article" value="{{ $article->id_article }}">
    <div class="input-group mb-1 w-50">
        <span class="input-group-text" for="pseudo_commentaire">Nom de l'auteur:</span>
        <input type="text" name="pseudo_commentaire" class="form-control" required>
    </div>
    <textarea name="contenu_commentaire" id="myeditorinstance" placeholder="Ecrivez votre commentaire..."></textarea>
    <button class="submit-comment" type="submit">Poster le commentaire</button>
@elseif(isset($blog))
<form method="post" action="{{ route('commentBlog.store') }}">
    @csrf
    <input type="hidden" name="id_blog" value="{{ $blog->id_blog }}">
    <div class="input-group mb-1 w-50">
        <span class="input-group-text" for="pseudo_commentaire_blog">Nom de l'auteur:</span>
        <input type="text" name="pseudo_commentaire_blog" class="form-control" required>
    </div>
    <textarea name="contenu_commentaire_blog" id="myeditorinstance" placeholder="Ecrivez votre commentaire..."></textarea>
    <button class="submit-comment" type="submit">Poster le commentaire</button>   
    
    </div>
</form>
@endif
