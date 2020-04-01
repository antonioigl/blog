<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use function compact;
use function view;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        return view('welcome', [
            'category' => $category,
            'posts' => $category->posts()->paginate(5),
        ]);
    }


}
