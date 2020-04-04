<?php

namespace App\Http\Controllers;

use App\Post;
use function abort;
use function auth;
use function compact;
use function view;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        if ($post->isPublished() || auth()->check()){
            return view('posts.show', compact('post'));
        }

        abort(404);
    }
}
