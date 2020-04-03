<?php

namespace App\Http\Controllers;

use App\Category;
use function view;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        return view('pages.home', [
            'title' => __("Publicaciones de la categoría '{$category->name}'"),
            'posts' => $category->posts()->paginate(5),
        ]);
    }


}
