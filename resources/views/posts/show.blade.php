@extends('layouts.app')
@section('post-container')

<div class="post-container">
    <div class="post-content single-post">
        <h3>{{$post->title}}</h3>
        <div class="post-information">
            <span>
                <i class="fa fa-tags" aria-hidden="true"></i>
                <a href='/category/{{$post->category->id}}'> {{$post->category->name}}</a>
            </span>
            <span>
                <i class="fa fa-user" aria-hidden="true"></i>
                <a href='/author/{{$post->user->id}}'> {{$post->user->name}}</a>
            </span>
            <span>
                <i class="fa fa-calendar" aria-hidden="true"></i>
                {{date('d M, Y', strtotime($post->created_at))}}
            </span>
        </div>
        {{-- <img class="single-feature-image" src="data:image/jpeg;base64,{{ base64_encode($post->post_image) }}" />
        --}}

        <img class="single-feature-image" src="{{ $post->post_image }}" />

        <p class="description">
            {{$post->body}}
        </p>
    </div>
</div>

@endsection
