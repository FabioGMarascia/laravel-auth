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
            'posts' => Post::with('type', 'language')->paginate(),
        ]);
    }
}
