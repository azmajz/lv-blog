@extends('admin.main')
@section('admin-content')
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
                  <form class="custom-style" action="{{route('category.update', ['id' => $category->id])}}" method ="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                          <input type="hidden" name="id"  class="form-control" value="{{$category->id}}" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="name" class="form-control" value="{{$category->name}}"  placeholder="Category Name" >
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
   @endsection
