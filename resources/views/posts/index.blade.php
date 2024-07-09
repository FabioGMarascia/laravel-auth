@extends('layouts.app')

@section('title', 'POST FORM')

@section('content')
    <div class="container">
        <div class="row pt-5">
             @foreach ($posts as $post)
             <div class="card" style="width: 18rem;">
                <img src="{{$post['thumb']}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$post['project_title']}}</h5>
                  <p class="card-text">{{$post['description']}}</p>
                  <a href="#" class="btn btn-primary">Da definire</a>
                </div>
              </div>
              

            @endforeach
        </div>
    </div>

@endSection