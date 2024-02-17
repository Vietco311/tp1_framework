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
                <label class="input-group-text" for="nom_blog">Nom du blog</label>
                <input class="form-control" type="text" name="nom_blog" required>
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
                <select class="form-select" name="image_blog">
                    <option value="0">Banniere</option>
                    <option value="1">Parchemin</option>
                    <option value="2">Bulle</option>
                </select>
            </div>
            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="image_couleur">Couleur du titre</label>
                <input class="form-control" type="color" name="image_couleur">
            </div>
            <div class="input-group w-50 mb-2">
                <label class="input-group-text" for="image_police">Police du titre</label>
                <select class="form-select" name="image_police">
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
    </div>
@endsection
