<?php

namespace App\Http\Controllers;

use App\Tag;
use function view;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        return view('welcome', [
            'title' => __("Publicaciones de la categoría '{$tag->name}'"),
            'posts' => $tag->posts()->paginate(5),
        ]);
    }
}
