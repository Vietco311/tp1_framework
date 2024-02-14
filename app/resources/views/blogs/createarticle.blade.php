

@extends('layouts.app')


@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/editpage.css') }}"/>
    <x-head.tinymce-config-article />
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
    <div class="container">
        <h1>Créer un Nouvel Article pour {{ $blog->nom_blog }}</h1>
        
        <!-- Formulaire de création d'article -->
        @include('components/forms/tinymce-edit')
    </div>
@endsection
