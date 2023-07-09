<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create()
    {
        return view('comments/create');
    }
    
    public function store(Request $request, Comment $comment, Post $post)
    {
        $input=$request['comment'];
        $post->fill($input)->save();
        return redirect('/posts');
    }

}
