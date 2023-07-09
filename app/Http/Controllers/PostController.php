<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Cloudinary;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post, Comment $comment)
    {
        return view('posts/show')->with(['post' => $post, 'comment' => $post->comments()->get()]);
    }

    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }

   public function store(Request $request, Post $post)
    {
         $input = $request['post'];
        //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
       if($request->file('image')){ 
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        
       }
        $post->user_id = Auth::id();
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
         //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
       if($request->file('image')){ 
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            // $post->image_url = $image_url;
            $input_post += ['image_url' => $image_url];
        }else{
            $image_url = NULL;
             $input_post += ['image_url' => $image_url];
        }
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    public function account(User $user){
        return view ('accounts/account')->with(['user' => $user]);
    }
public function delete(Post $post)
{
    $post->delete();
    return redirect('/');
}
}
