<!-- resources/views/create-site.blade.php -->

@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="container">
        <h1>Création de site</h1>

        <!-- Formulaire de création de site -->
        <form class="d-flex flex-column align-items-start" action="{{ route('store-site') }}" method="post">
            @csrf
            <!-- Champs du formulaire (nom_blog, url_blog, sujet_blog, etc.) -->
            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="nom_blog">Nom du site</label>
                <input class="form-control" type="text" name="nom_blog" id="nom_blog" onchange="updateImagePreview()">
            </div>
            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="sujet_blog">Sujet du blog</label>
                <input class="form-control" type="text" name="sujet_blog">
            </div>
            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="couleur_blog">Couleur du blog</label>
                <select class="form-select" name="couleur_blog">
                    <option value="bordeau">Bordeau</option>
                    <option value="marin">Marin</option>
                    <option value="vintage">Vintage</option>
                </select>
            </div>
            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="couleur_separation_blog">Couleur des séparations</label>
                <input class="form-control" type="color" name="couleur_separation_blog">
            </div>

            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="taille_separation_blog">Taille des séparations</label>
                <input class="form-control" type="number" name="taille_separation_blog">
            </div>

            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="image_blog">Image du titre du blog</label>
                <select class="form-select" name="image_blog" id="image_blog_select" onchange="updateImagePreview()">
                    <option value="0">Banniere</option>
                    <option value="1">Parchemin</option>
                    <option value="2">Bulle</option>
                </select>
            </div>
            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="image_couleur">Couleur du titre</label>
                <input class="form-control" type="color" name="image_couleur" id="image_couleur" onchange="updateImagePreview()">
            </div>
            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="image_police">Police du titre</label>
                <select class="form-select" name="image_police" id="image_police" onchange="updateImagePreview()">
                    <option value="OpenSans-VariableFont_wdth,wght">Open Sans</option>
                    <option value="Montserrat-VariableFont_wght">Montserrat</option>
                    <option value="Lora-VariableFont_wght">Lora</option>
                </select>
            </div>
            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="template_blog">Template du blog</label>
                <select class="form-select" name="template_blog">
                    <option value="burger">Burger</option>
                    <option value="horizontal">Horizontal</option>
                    <option value="verticale">Vertical</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer le blog</button>
        </form>

        <div class="input-group w-50 mb-2">
            <label class="input-group-text" for="image_preview">Prévisualisation de l'image</label>
            <div id="image_preview_container" style="position: relative;">
                <img id="image_preview" class="img-fluid" alt="Aperçu de l'image" style="max-height: 200px;">
                <div id="site_name_overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                    <span id="site_name"></span>
                </div>
            </div>
        </div>

    </div>
    
    
@endsection

<script>
    function updateImagePreview() {
    var imageSelect = document.getElementById('image_blog_select');
    var imagePreview = document.getElementById('image_preview');
    var siteName = document.getElementById('nom_blog').value;
    var siteNameSpan = document.getElementById('site_name');
    var selectedPolice = document.getElementById('image_police').value;

    // Ajoutez les chemins d'accès complets à vos images correspondantes ici
    var imagePaths = [
        'image/banniere.png',
        'image/parchemin.png',
        'image/bulle.png'
    ];

    // Mettez à jour l'attribut src de l'image en fonction de l'option sélectionnée
    imagePreview.src = imagePaths[imageSelect.value];

    siteNameSpan.innerText = siteName;
    var fontPath = "police/" + selectedPolice + ".ttf";
    console.log(fontPath);
    var fontFaceStyle = "@font-face { font-family: 'CustomFont'; src: url('" + fontPath + "'); }";
    var style = document.createElement('style');
    style.appendChild(document.createTextNode(fontFaceStyle));
    document.head.appendChild(style);
    siteNameSpan.style.fontFamily = "'CustomFont', sans-serif";
    siteNameSpan.style.fontSize = "25px";
    siteNameSpan.style.color = document.getElementById('image_couleur').value;
}
    window.onload = updateImagePreview;
</script>

