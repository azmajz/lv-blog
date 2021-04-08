@extends('admin.main')
@section('admin-content')
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                  <form class="custom-style" action="/admin/add-user" method="POST">
                      @csrf
                          <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Full Name">
                      </div>
                      <div class="form-group">
                          <label>User Email</label>
                          <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="User Email">
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
   @endsection