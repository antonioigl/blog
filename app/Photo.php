<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use function count;
use function explode;

class Photo extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($photo){
            $path = explode('/', $photo->url);
            $nameFile = $path[count($path)-1];
            Storage::disk('public')->delete('posts/'.$nameFile);
        });
    }
}
