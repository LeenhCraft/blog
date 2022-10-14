<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('pos_status', '1')->latest('idpost')->paginate(8);
        // $posts = Post::where('idpost',1)->get();
        // dd($posts);
        return view('posts.index', compact('posts'));
    }
}
