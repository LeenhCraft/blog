<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

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

    public function category($id)
    // public function category($slug)
    {
        $category = Category::where('idcategorie', $id)->firstOrFail();
        $posts = Post::where('idcategorie', $id)
            ->where('pos_status', '1')
            ->latest('idpost')
            ->paginate(6);
        // $posts = Post::whereHas('category', function ($query) use ($slug) {
        //     $query->where('cat_slug', $slug);
        // })
        //     ->where('pos_status', '1')
        //     ->latest('idpost')
        //     ->paginate(8);
        // return [$category,$posts];
        return view('posts.category', compact('posts', 'category'));
    }
}
