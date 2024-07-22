<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'posts' => Post::orderByDesc('id')->with('type', 'language')->paginate(6),
        ]);
    }

    public function latest()
    {
        return response()->json([
            'success' => true,
            'post' => Post::with('type', 'language')->orderByDesc('id')->take(3)->get()
        ]);
    }

    public function show($id)
    {
        $post = Post::with('type', 'language')->where('id', $id)->first();


        if ($post) {
            return response()->json([
                'success' => true,
                'post' => $post
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'not found'
            ]);
        }
    }
}
