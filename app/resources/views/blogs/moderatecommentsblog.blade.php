@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modération des Commentaires pour le blog "{{ $blog->nom_blog }}"</h1>

        @if ($comments->isEmpty())
            <p>Aucun commentaire à modérer pour ce blog.</p>
        @else
            <ul>
                <h3>Commentaires Affichés</h3>
                @foreach ($commentsApprouve as $comment)
                    <li>
                        <strong>{{ $comment->pseudo_commentaire_blog }}</strong>   {!! $comment->contenu_commentaire_blog !!}
                        
                        <form action="{{ route('approve-comment-blog', ['id' => $comment->id_commentaire_blog]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success disabled btn-sm">Approuver</button>
                        </form>
                        
                        <form action="{{ route('disapprove-comment-blog', ['id' => $comment->id_commentaire_blog]) }}" method="POST" style="display: inline;">
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
                        <strong>{{ $comment->pseudo_commentaire_blog }}</strong>   {!! $comment->contenu_commentaire_blog !!}
                        
                        <form action="{{ route('approve-comment-blog', ['id' => $comment->id_commentaire_blog]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                        </form>
                        
                        <form action="{{ route('disapprove-comment-blog', ['id' => $comment->id_commentaire_blog]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning disabled btn-sm">Désapprouver</button>
                        </form>

                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
