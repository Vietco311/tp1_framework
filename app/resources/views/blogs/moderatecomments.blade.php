@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modération des Commentaires pour l'article "{{ $article->nom_article }}"</h1>

        @if ($comments->isEmpty())
            <p>Aucun commentaire à modérer pour cet article.</p>
        @else
            <ul>
                <h3>Commentaires Affichés</h3>
                @foreach ($commentsApprouve as $comment)
                    <li>
                        <strong>{{ $comment->pseudo_commentaire }}</strong>   {!! $comment->contenu_commentaire !!}
                        
                        <!-- Ajoutez des boutons pour approuver ou supprimer le commentaire -->
                        <form action="{{ route('approve-comment', ['id' => $comment->id_commentaire]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success disabled btn-sm">Approuver</button>
                        </form>
                        
                        <form action="{{ route('disapprove-comment', ['id' => $comment->id_commentaire]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Désapprouver</button>
                        </form>

                    </li>
                @endforeach
            </ul>
            <ul>
                <h3>Commentaires Cachés</h3>
                @foreach ($commentsNonApprouve as $comment)

                    <li>
                        <strong>{{ $comment->pseudo_commentaire }}</strong>   {!! $comment->contenu_commentaire !!}
                        
                        <form action="{{ route('approve-comment', ['id' => $comment->id_commentaire]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                        </form>
                        
                        <form action="{{ route('disapprove-comment', ['id' => $comment->id_commentaire]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning disabled btn-sm">Désapprouver</button>
                        </form>

                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
