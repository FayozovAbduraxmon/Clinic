<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function view_posts()
    {
        $posts = Post::all();

        return view('posts', ['posts' => $posts]);
    }

    function create(Request $req)
    {
        $validate = $req->validate([
            'text' => 'required|max:255'
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'text' => $validate['text'],
        ]);

        return back()->with('success', 'New post created successfully');
    }
}
