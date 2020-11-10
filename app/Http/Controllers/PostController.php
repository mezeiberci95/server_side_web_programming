<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Storage;


class PostController extends Controller
{
    //
    public function showAll() {

        /*$posts = [
            [
                'id' => 1,
                'title' => 'Cim1',
                'author' => 'David',
                'text' => 'Bejegyzes szovege',
            ],
            [
                'id' => 2,
                'title' => 'Cim2',
                'author' => 'David',
                'text' => 'Bejegyzes szovege',
            ],
            [
                'id' => 3,
                'title' => 'Cim3',
                'author' => 'David',
                'text' => 'Bejegyzes szovege',
            ]
            ];*/
            $posts = Post::all();

        return view('posts', compact('posts')); //ezt a viewt létre kell hozni
    }

    public function show($id) {
        $post = Post::find($id);
        return view('post', compact('post')); //ezt a viewt létre kell hozni, megkapja az id változót
    }

    public function showNewPost() {
        return view('new-post');
    }

    public function storeNewPost(PostFormRequest $request) {
        /*$data = $request->validate([
            'title' => 'required|min:3',
            'text' => 'required|min:12',
        ]);*/
        $data = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $hashName = $file->hashName();
            Storage::disk('public')->put('images/post_images/'.$hashName, file_get_contents($file));
            $data['image_url'] = $hashName;
        }

        $data['author'] = 'David';

        $post = Post::create($data);
        return redirect()->route('posts')->with('post_added', true);
    }
}
