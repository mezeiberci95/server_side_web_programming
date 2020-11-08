<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;

class TagController extends Controller
{
    public function show($id) {
        $tag = Tag::find($id);
        if ($tag === null){
            return view('tag');
        }
        else {
            $posts = $tag->posts;
            return view('tag', compact('tag', 'posts'));
        }

    }
}
