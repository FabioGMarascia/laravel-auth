<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Type;
use App\Models\Language;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderByDesc('id')->paginate();

        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $types = Type::all();
        return view('admin.posts.create', compact('types'));
    }


    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        if ($request->has('thumb')) {
            $img_path = Storage::put('uploads', $request->thumb);

            $data['thumb'] = $img_path;
        }

        $newPost = Post::create($data);

        if ($request->has('languages')) {
            $newPost->languages()->attach($request->languages);
        }

        return to_route('admin.posts.index')->with('message', 'Post created');
    }

    public function show(Post $post)
    {
        $data = [
            "post" => $post
        ];
        return view("admin.posts.show", $data);
    }

    public function edit(Post $post)
    {
        $types = Type::all();

        $data = [
            "post" => $post,
            'types' => $types
        ];

        return view('admin.posts.edit', $data);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($request->has('thumb')) {

            $img_path = Storage::put('uploads', $request->thumb);

            $data['thumb'] = $img_path;

            if ($post->thumb && !Str::startsWith($post->thumb, 'http')) {

                Storage::delete($post->thumb);
            }
        }

        $post->update($data);

        return to_route('admin.posts.index', $post)->with('message', 'Post updated');
    }


    public function destroy(Post $post)
    {
        if ($post->thumb && !Str::startsWith($post->thumb, 'http')) {

            Storage::delete($post->thumb);
        }
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
