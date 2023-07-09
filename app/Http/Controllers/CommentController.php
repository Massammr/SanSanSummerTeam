<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Cloudinary;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Post $post, Comment $comment)
    {
        return view('comments/create')->with(['post' => $post], ['comment => $comment']);
    }
    
    public function store(Request $request, Comment $comment, Post $post)
    {
        $input=$request['comment'];
        $comment->fill($input)->save();
        return redirect('/posts/' . $comment->post_id);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('/posts/' . $comment->post_id);
    }
}
