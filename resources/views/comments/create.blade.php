<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Comment</title>
    </head>
    <body>
        <h1>コメントお願いします！</h1>
        <h2>コメント作成</h2>
        <form action="/comments" method="POST">
            @csrf
            <div>
                <h2>コメント本文</h2>
                <textarea name="comment[body]" placeholder="コメントありがとうございます。"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div><a href="/">戻る</a></div>
    </body>
</html>
