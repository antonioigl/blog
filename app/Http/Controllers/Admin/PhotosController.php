<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use function back;
use function request;

class PhotosController extends Controller
{
    public function store(Post $post)
    {

        $this->validate(request(), [
            //'photo' => 'image|max:2048|dimensions:min_width',
            //'photo' => 'image|max:2048|dimensions:min_height',
            'photo' => 'required|image|max:2048'
        ]);

        $photoPath = request()->file('photo')->store('posts', 'public');

        $post->photos()->create([
            //'url' => request()->file('photo')->store('posts', 'public'),
            'url' => Storage::url($photoPath),
        ]);

        //Photo::create([
        //    'url' => request()->file('photo')->store('posts', 'public'),
        //    'post_id' => $post->id,
        //]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        return back()->with(['flash' => __('Foto eliminada')]);
    }
}
