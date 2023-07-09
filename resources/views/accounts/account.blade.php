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
        Account page
    </x-slot>
    <body>
         <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <p>{{$user->name}}</p>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <p>{{$user->introduction}}</p>
                </div>
            </div>
    </body>
    </x-app-layout>
</html>