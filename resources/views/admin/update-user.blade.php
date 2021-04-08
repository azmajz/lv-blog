@extends('admin.main')
@section('admin-content')
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  @if ($errors->any())
                  @foreach ($errors->all() as $error)
                     <div class="alert alert-danger">{{ $error }}</div>
                  @endforeach
              @endif
                  <form class="custom-style"  action="/admin/update-user/{{$user->id}}" method ="POST">
                    @csrf
                    @method('PUT')
                          <div class="form-group">
                            <label>Full Name</label>
                          <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>User Email</label>
                          <input type="text" name="email" class="form-control" value="{{$user->email}}" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="{{$user->role}}">
                              <option {{ $user->role==0 ? 'selected' : ''}} value="0">User</option>
                              <option {{ $user->role==1 ? 'selected' : ''}} value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit" class="btn btn-primary" value="Update" />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
   @endsection
