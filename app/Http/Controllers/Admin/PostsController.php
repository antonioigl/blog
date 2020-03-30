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
use function dd;
use function is_null;
use function str_slug;
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'excerpt' => 'required',
        ]);

        //$post = Post::created($request);
        $post = new Post;
        $post->title = $request->title;
        //$post->title = $request->get('title');
        $post->url = str_slug($request->title);
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        //$post->published_at = is_null($request->published_at) ? Carbon::parse($request->published_at) : null;
        $post->published_at = $request->published_at ? Carbon::parse($request->published_at) : null;
        $post->category_id = $request->category;

        $post->save();

        $post->tags()->attach($request->tags);

        return back()->with('flash', 'Tu publicación ha sido creada');



    }
}
