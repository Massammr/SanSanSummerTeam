<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>詳細画面</h1>
        <div>
            <p>タイトル：{{ $post->title }}</p>
            @if($post->image_url)
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                </div>
            @endif
            <p>本文：{{ $post->body }}</p>
            <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
        </div>
        <div>
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            <p class="comment">[<a href="/posts/{{ $post->id }}/create">コメント作成]</p>
            <a href="/">戻る</a>
        </div>
        <div>
            <!--@if (!(isset($comment)))-->
            <!--    <p>コメント：{{ $comment->body }}</p>-->
            <!--@endif-->
            @foreach ($comment as $i)
                <p>コメント：{{ $i->body }}</p>
            @endforeach
        </div>
    </body>
</html>
