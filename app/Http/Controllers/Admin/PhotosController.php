<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use function back;
use function str_replace;


class PhotosController extends Controller
{
    public function store(Post $post)
    {

        $this->validate(request(), [
            //'photo' => 'image|max:2048|dimensions:min_width',
            //'photo' => 'image|max:2048|dimensions:min_height',
            'photo' => 'required|image|max:2048'
        ]);

        $photo = request()->file('photo')->store('public');

        Photo::create([
            'url' => Storage::url($photo),
            'post_id' => $post->id,
        ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        $photoPath = str_replace('storage', 'public', $photo->url);
        Storage::delete($photoPath);

        return back()->with(['flash' => __('Foto eliminada')]);
    }
}