@extends('layouts.app')
@section('content')
    <div class="container">
        @if(count($errors) > 0)
            <ul class="list-group">
                @foreach($errors->all() as $errors)
                     <li class="list-group-item text-danger">{{$errors}}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{isset($post)? route('posts.update',['post'=>$post->id]) : route('posts.store')}}" method="POST">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif
            <div class="form-group"> 
                <label for="title">タイトル</label>
                <input type="text" name="title" class="form-control" value="{{isset($post)?$post->title : ""}}">
            </div>
            <div class="form-group">
                <label for="description">コンテンツ</label>
                <textarea name="description" cols="30" rows="10" class="form-control" >{{isset($post)? $post->description : ""}}</textarea>
            </div>
            <input type="submit" value="{{isset($post)? "編集完了" : "新規投稿"}}" class="btn btn-success">
        </form>

    </div>
@endsection