@extends('admin.main')
@section('admin-content')
        
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="{{route('category.create')}}">add category</a>
            </div>
            <div class="col-md-12">
                @if (session('success-msg'))
                <div class="alert alert-success">{{ session('success-msg') }}</div>
                @endif
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td class='id'>{{$key+1}}</td>
                            <td style="text-align: center">{{$category->name}}</td>
                            <td>{{($category->posts->count())}}</td>
                            <td class='edit'><a href='/admin/update-category/{{$category->id}}'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'>
                                <form action="/admin/delete-category/{{$category->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class='fa fa-trash-o'></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{$categories->links()}}
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