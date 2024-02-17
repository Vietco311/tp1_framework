<!-- resources/views/editblog.blade.php -->

@extends('layouts.app')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@section('content')
    <div class="container">
        <h1>Modifier les paramètres du blog</h1>

        <form method="post" action="{{ route('blog.update', ['id' => $blog->id_blog]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom_blog">Nom du blog:</label>
                <input type="text" name="nom_blog" value="{{ $blog->nom_blog }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sujet_blog">Sujet du blog:</label>
                <input type="text" name="sujet_blog" value="{{ $blog->sujet_blog }}" class="form-control">
            </div>

            <label for="couleur_blog">Couleur du blog:</label>
            <select name="couleur_blog"  value="{{ $blog->couleur_blog }}">
                <option value="bordeau">Bordeau</option>
                <option value="marin">Marin</option>
                <option value="vintage">Vintage</option>
            </select>

            <label for="couleur_separation_blog">Couleur des séparations:</label>
            <input type="color" name="couleur_separation_blog" value="{{ $blog->couleur_separation_blog }}">


            <label for="taille_separation_blog">Taille des séparations:</label>
            <input type="number" name="taille_separation_blog" value="{{ rtrim($blog->taille_separation_blog, 'px') }}">


            <label for="image_blog">Image du titre du blog:</label>
            <select name="image_blog" value="{{ $blog->param_image_blog_id }}">
                <option value="0">Banniere</option>
                <option value="1">Parchemin</option>
                <option value="2">Bulle</option>
            </select>

            <label for="image_couleur">Couleur du titre:</label>
            <input type="color" name="image_couleur" value="{{ $blog->couleur_titre_blog }}">

            <label for="image_police">Police du titre:</label>
            <select name="image_police" value="{{ $blog->police_titre_blog }}">
                <option value="OpenSans-VariableFont_wdth,wght">Open Sans</option>
                <option value="Montserrat-VariableFont_wght">Montserrat</option>
                <option value="Lora-VariableFont_wght">Lora</option>
            </select>

            <label for="template_blog">Template du blog:</label>
            <select name="template_blog" value="{{ $blog->template_blog }}">
                <option value="burger">Burger</option>
                <option value="horizontal">Horizontal</option>
                <option value="verticale">Vertical</option>
            </select>

            <!-- Ajoutez les autres champs du formulaire en fonction de vos besoins -->

            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
@endsection
