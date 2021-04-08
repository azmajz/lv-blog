@extends('admin.main')
@section('admin-content')
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  @if ($errors->any())
                    @foreach ($errors->all() as $error)
                      <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                  <form class="custom-style"  action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                    <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" name="title" value="{{old('title')}}" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="body"> Description</label>
                          <textarea name="body" class="form-control" rows="5">{{old('body')}}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="category_id">Category</label>
                          <select name="category_id" class="form-control">
                              <option selected> Select Category</option>
                              @foreach ($categories as $cat)
                              <option value="{{$cat->id}}">{{$cat->name}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="post_image">Post image</label>
                          <input type="file" name="post_image">
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
@endsection
