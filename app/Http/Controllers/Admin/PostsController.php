<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function view;

class PostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }
}
