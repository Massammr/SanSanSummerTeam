<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <x-slot name="header">
        Index
    </x-slot>
    <body>
        <h1>チーム開発会へようこそ！</h1>
        <h2>投稿一覧画面</h2>
        <br>
        <a href='/posts/create' style='font-weight : 600; font-size : 1.2em; background : blue; color : white;'>新規投稿</a>
        <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-top: 50px;'>
                    <p>
                        アカウント名:<a href="/users/{{$post->user->id}}">{{$post->user->name}}</a>
                    </p>
                    <p>
                        タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </p>
                    <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                </div>
           <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
    @csrf
    @method('DELETE')
    <button type="button" style='color : red;'onclick="deletePost({{ $post->id }})">delete</button> 
            @endforeach
        </div>
        <div>
            {{ $posts->links() }}
        </div>
        <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </body>
    </x-app-layout>
</html>
