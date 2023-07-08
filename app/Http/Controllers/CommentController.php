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
    
    public function store(Request $request, Comment $comment)
    {
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        return redirect('/posts');
    }

}
