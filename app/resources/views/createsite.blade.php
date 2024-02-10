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
        <form action="{{ route('store-site') }}" method="post">
            @csrf
            <!-- Champs du formulaire (nom_blog, url_blog, sujet_blog, etc.) -->
            <label for="nom_blog">Nom du blog:</label>
            <input type="text" name="nom_blog" required>

            <label for="url_blog">URL du blog:</label>
            <input type="url" name="url_blog" required>

            <label for="sujet_blog">Sujet du blog:</label>
            <input type="text" name="sujet_blog">

            <label for="couleur_blog">Couleur du blog:</label>
            <select name="couleur_blog">
                <option value="Bordeau">Bordeau</option>
                <option value="Marin">Marin</option>
                <option value="Vintage">Vintage</option>
            </select>

            <label for="template_blog">Template du blog:</label>
            <select name="template_blog">
                <option value="Burger">Burger</option>
                <option value="Horizontal">Horizontal</option>
                <option value="Vertical">Vertical</option>
            </select>

            <button type="submit" class="btn btn-primary">Créer le blog</button>
        </form>
    </div>
@endsection
