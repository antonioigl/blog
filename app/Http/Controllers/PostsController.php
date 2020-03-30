<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use function compact;
use function view;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
