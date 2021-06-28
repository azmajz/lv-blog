<!-- search box -->
<div class="search-box-container">
    <h4>Search</h4>
    <form class="search-post" action="/search" method="GET">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search .....">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-danger">Search</button>
            </span>
        </div>
    </form>
</div>

<div class="search-box-container">
    <h4>Login or Register</h4>
    <div class="input-group">
        <div class="search-post">
            <a href="/admin/login" class="btn btn-danger">Login</a>
            <a href="/admin/register" class="btn btn-danger">Register</a>
        </div>
    </div>
</div>
<!-- /search box -->
<!-- recent posts box -->
<div class="recent-post-container">
    <h4>Popular Posts</h4>
    @foreach ($latest_posts as $post)

    <div class="recent-post">
        <a class="post-img" href="/post/{{$post->id}}">
            {{-- <img src="data:image/jpeg;base64,{{ base64_encode($post->post_image) }}" /> --}}
            <img class="img-thumbnail" src="{{$post->post_image}}" />
        </a>
        <div class="post-content">
            <h5><a href="/post/{{$post->id}}">{{$post->title}}</a></h5>
            <span>
                <i class="fa fa-tags" aria-hidden="true"></i>
                <a href='/category/{{$post->category->id}}'>{{$post->category->name}}</a>
            </span>
            <span>
                <i class="fa fa-calendar" aria-hidden="true"></i>
                {{date('d M, Y', strtotime($post->created_at))}}
            </span>
            <a class="read-more" href="/post/{{$post->id}}">read more</a>
        </div>
    </div>
    @endforeach

</div>
<!-- /recent posts box -->
