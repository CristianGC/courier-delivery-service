<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static function getPosts()
    {
        $posts = Post::all();

        return response()->json([
            'posts' => $posts,
        ]);
    }
}
