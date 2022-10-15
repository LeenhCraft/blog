<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('pos_status', '1')->latest('idpost')->paginate(8);
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::where('idpost', $id)->firstOrFail();
        $similares = Post::where('idcategorie', $post->idcategorie)
            ->where('pos_status', '1')
            ->where('idpost', '!=', $post->idpost)
            ->latest('idpost')
            ->take(4)
            ->get();
        return view('posts.show', compact('post', 'similares'));
    }
}
