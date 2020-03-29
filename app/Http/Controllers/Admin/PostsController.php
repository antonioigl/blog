<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function back;
use function compact;
use function view;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        //Validation

        //$post = Post::created($request);
        $post = new Post;
        $post->title = $request->title;
        //$post->title = $request->get('title');
        $post->title = $request->title;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->published_at = Carbon::parse($request->published_at);
        $post->category_id = $request->category;

        $post->save();

        $post->tags()->attach($request->tags);

        return back()->with('flash', 'Tu publicación ha sido creada');



    }
}
