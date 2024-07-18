@extends('layouts.app')

@section('title', 'POST FORM')

@section('content')
    <div class="container">
        <div class="row pt-5 justify-content-center">
            @foreach ($posts as $post)
                <div class="col-3 card p-4 m-3 text-white" style=" background-color:#333333">

                    @if (Str::startsWith($post->thumb, 'http'))
                        <img src="{{ $post->thumb }}" class="card-img-top">
                    @else
                        <img src="{{ asset('storage/' . $post->thumb) }}" class="card-img-top" alt="...">
                    @endif



                    <div class="card-body">
                        <h5 class="card-title">{{ $post['project_title'] }}</h5>
                        <p class="card-text">{{ $post['description'] }}</p>

                        <div class="row d-flex justify-content-center">

                            <a href="{{ route('admin.posts.show', $post->id) }}"
                                class="btn btn-warning mb-2 w-75 px-0 fw-bold text-white">INFO</a>

                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                                class="btn btn-success mb-2 w-75 fw-bold">EDIT</a>

                            <div class="px-0 w-75">

                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100 fw-bold">DELETE</a>
                                </form>

                            </div>

                        </div>

                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endSection
