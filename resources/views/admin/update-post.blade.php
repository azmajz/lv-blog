@extends('admin.main')
@section('admin-content')
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
        <form class="custom-style" action="{{route('post.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="1" placeholder="">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title"  class="form-control" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="body"> Description</label>
                <textarea name="body" class="form-control" rows="5">{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    <option> Select Category</option>
                    @foreach ($categories as $cat)
                    <option {{$cat->id==$post->category_id ? 'selected':''}} value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <br>
                <img src="data:image/jpeg;base64,{{ base64_encode($post->post_image) }}" height="150px" />
                <input type="file" name="post_image">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
   @endsection
