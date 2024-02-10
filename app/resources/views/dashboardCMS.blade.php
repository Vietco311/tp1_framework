@extends('layouts.app') <!-- Assurez-vous d'avoir un layout de base, si utilisé -->

@section('content')
    <div class="container">
        <h1>Page de déconnexion</h1>
        
        <!-- Bouton de déconnexion -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Déconnexion</button>
        </form>
    </div>
@endsection