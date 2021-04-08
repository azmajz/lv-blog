@extends('admin.main')
    @section('admin-content')
    <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="/admin/add-user">add user</a>
              </div>
              <div class="col-md-12">
                @if (session('success-msg'))
                    <div class="alert alert-success">{{ session('success-msg') }}</div>
                @endif
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th># Posts</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        @foreach ($users as $key => $user)
                          <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{($user->role)?'Admin':'User'}}</td>
                              <td>{{$user->posts->count()}}</td>
                              <td class='edit'><a href='/admin/update-user/{{$user->id}}'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'>
                                <form action="/admin/delete-user/{{$user->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class='fa fa-trash-o'></i></button>
                                </form>
                            </td>
                          </tr>
                        @endforeach                  
                      </tbody>
                  </table>
                  {{$users->links()}}
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
