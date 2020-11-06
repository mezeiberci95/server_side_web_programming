<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index() {
        $post_count = Post::all()->count();
        $user_count = User::count();
        return view('main', compact('post_count', 'user_count'));
    }
}
