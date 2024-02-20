

@extends('layouts.app')


@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/editpage.css') }}"/>
    <x-head.tinymce-config-article />
</head>
    <div class="container">
        <h1>Créer un Nouvel Article pour {{ $blog->nom_blog }}</h1>
        
        @include('components/forms/tinymce-edit')
    </div>
@endsection
