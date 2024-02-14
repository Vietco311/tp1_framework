<form class="tinymce-article" action="{{ route('store-article', ['blog' => $blog->id_blog]) }}" method="post"
    enctype="multipart/form-data">
    @csrf
    <!-- Champs du formulaire (nom_article, contenu_article, etc.) -->
    <label for="nom_article">Nom de l'article:</label>
    <input type="text" name="nom_article" required>

    <label for="image_article">Image de l'article:</label>
    <input type="file" name="image_article" required>

    <label for="auteur_article">Auteur de l'article:</label>
    <input type="text" name="auteur_article" required>

    <label for="contenu_article">Contenu de l'article:</label>
    <textarea name="contenu_article" id="myeditorinstance" placeholder="Editez l'article..." required></textarea>
    <button type="submit" class="btn btn-primary">Créer l'article</button>
</form>
