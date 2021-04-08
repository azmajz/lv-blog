@extends('admin.main')
@section('admin-content')
        
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">
                    @if (auth()->user()->role === 1) All Posts
                    @else <span class="text-uppercase">{{auth()->user()->name}}'s</span> Posts
                    @endif 
                  </h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="/admin/add-post">add post</a>
              </div>
              <div class="col-md-12">
                @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                @if (session('success-msg'))
                <div class="alert alert-success">{{ session('success-msg') }}</div>
                 @endif
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                          @foreach ($posts as $key => $post)
                          <tr>
                              <td class='id'>{{$key+1}}</td>
                              <td>{{$post->title}}</td>
                              <td>{{$post->category->name}}</td>
                              <td>{{date('d M, Y', strtotime($post->created_at))}}</td>
                              <td>{{$post->user->email}}</td>
                              <td class='edit'><a href='/admin/update-post/{{$post->id}}'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'>
                                  <form action="/admin/delete-post/{{$post->id}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit"><i class='fa fa-trash-o'></i></button>
                                  </form>
                              </td>
                            </tr>
                          @endforeach
                      </tbody>
                  </table>
                  {{$posts->links()}}
                  {{-- <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul> --}}
              </div>
          </div>
      </div>
  </div>
@endsection