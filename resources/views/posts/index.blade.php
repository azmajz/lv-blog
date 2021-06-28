@extends('layouts.app')
@section('post-container')
<div class="post-container">

    @isset($category)
    <h2 class="page-heading">{{$posts[0]->category->name}}</h2>
    @endisset

    @isset($user)
    <h2 class="page-heading">Posts By : {{$posts[0]->user->name}}</h2>
    @endisset

    @isset($search)
    <h2 class="page-heading">Search : {{$search}}</h2>
    @endisset

    @foreach ($posts as $post)
    <div class="post-content">
        <div class="row">
            <div class="col-md-4">
                <a class="post-img" href="/post/{{$post->id}}">
                    {{-- <img src="data:image/jpeg;base64,{{ base64_encode($post->post_image) }}" /> --}}
                    <img class="img-thumbnail" src="{{$post->post_image}}" />
                </a>
            </div>
            <div class="col-md-8">
                <div class="inner-content clearfix">
                    <h3><a href='/post/{{$post->id}}'>{{$post->title}}</a></h3>
                    <div class="post-information">
                        <span>
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <a href='/category/{{$post->category->id}}'>{{$post->category->name}}</a>
                        </span>
                        <span>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <a href='/author/{{$post->user->id}}'>{{$post->user->name}}</a>
                        </span>
                        <span>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            {{date('d M, Y', strtotime($post->created_at))}}
                        </span>
                    </div>
                    <p class="description truncate">
                        {{$post->body}}
                    </p>
                    <a class='read-more pull-right' href='/post/{{$post->id}}'>read more</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @if(!isset($search))
    {{$posts->links()}}
    @endif


    {{-- <ul class='pagination admin-pagination'>
                <li class="active"><a>1</a></li>
                <li><a>2</a></li>
                <li><a>3</a></li>
            </ul> --}}
</div><!-- /post-container -->
@endsection
