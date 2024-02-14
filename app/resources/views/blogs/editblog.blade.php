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
            <select name="image_blog" value="{{ $blog->image_blog }}">
                <option value="image1">Image 1</option>
                <option value="image2">Image 2</option>
                <option value="image3">Image 3</option>
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
