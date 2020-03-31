<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PhotosController extends Controller
{
    public function store(Post $post)
    {
        $photo = request()->file('photo');

        $this->validate(request(), [
            //'photo' => 'image|max:2048|dimensions:min_width',
            //'photo' => 'image|max:2048|dimensions:min_height',
            'photo' => 'required|image|max:2048'
        ]);

        return 'procesando imagen...';
    }
}
