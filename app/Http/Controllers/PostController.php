<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function showAll() {

        $posts = [
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
            ];

        return view('posts', ['posts' => $posts]); //ezt a viewt létre kell hozni
    }

    public function show($id) {
        return view('post', ['id' => $id]); //ezt a viewt létre kell hozni, megkapja az id változót
    }
}
