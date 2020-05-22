@extends('layouts.app')
@section('content')
    <div class="container">
        @if(count($posts))
            @foreach ($posts as $post)
                <div class="jumbotron text-center">
                    <h1 class="display-4">{{ $post->title }}</h1>
                    <p class="lead">{{ $post->description }}</p>
                    <hr class="my-4 pl-3 pr-3">
                    <ul class="list-inline">
                        <li class="list-inline-item"><p>投稿者： {{ $post->user->name }}</p></li>
                        @if($post->user_id === Auth::user()->id)
                            <li class="list-inline-item"><a href="{{ route('posts.edit',['post' => $post->id]) }}" class="btn btn-primary">編集する</a></li>
                            <li class="list-inline-item">
                                <form action="{{route('posts.destroy',['post' => $post->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs">削除する</button>
                                </form>
                            </li>
                        @endif
                        <li class="list-inline-item">
                            @if(!Auth::user()->ownFavorite($post->id))
                                <form action="{{ route('posts.ownFavorite',['post'=>$post->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-default">
                                        <i class="far fa-heart"></i>
                                    </button>
                                 </form>
                            @else
                                <form action="{{ route('posts.deleteFavorite',['post'=>$post->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </form>
                            @endif   
                        </li>
                        <li class="list-inline-item"> {{ $post->favorites->count() }}</li>
                    </ul>
                </div>
                <hr class="hr">
            @endforeach
        @else
            <div class="card text-center">
                <h2>まだ投稿はありません。</h2>
            </div>
        @endif
    </div>

    
@endsection