@extends('layouts.app')

@section('title', 'POST FORM')

@section('content')
    <div class="container">
        <div class="row pt-5">
            @foreach ($posts as $post)
                <div class="card p-4 m-3  " style="width: 18rem; background-color:rgb(255, 154, 154)">
                    <img src="{{ $post['thumb'] }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['project_title'] }}</h5>
                        <p class="card-text">{{ $post['description'] }}</p>
                        <div class="row d-flex">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Dettaglio</a>

                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100 ">Delete</a>
                            </form>


                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endSection
