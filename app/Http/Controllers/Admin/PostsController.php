<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function compact;
use function redirect;
use function view;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    //public function create()
    //{
    //    $categories = Category::all();
    //    $tags = Tag::all();
    //    return view('admin.posts.create', compact('categories', 'tags'));
    //}

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $post = Post::create($request->only('title'));

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
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
        //$post = new Post;
        $post->title = $request->title;
        //$post->title = $request->get('title');
        $post->body = $request->body;
        $post->iframe = $request->iframe;
        $post->excerpt = $request->excerpt;
        //$post->published_at = is_null($request->published_at) ? Carbon::parse($request->published_at) : null;
        $post->published_at = $request->published_at ? Carbon::parse($request->published_at) : null;

        $post->category_id = Category::find($cat = $request->category)
                                ? $cat
                                : Category::create(['name' => $cat])->id;

        $post->save();

        $tags = [];

        foreach ($request->tags as $tag) {
            $tags[] = Tag::find($tag)
                        ? $tag
                        : Tag::create(['name' => $tag])->id;

        }

        $post->tags()->sync($tags);

        return redirect()->route('admin.posts.edit', $post)->with('flash', __('Tu publicación ha sido guardada'));



    }
}
