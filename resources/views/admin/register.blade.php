<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>ADMIN {{config('app.name')}}</title>
            <link rel="stylesheet" href="{{ str_replace('http://','https://',url('css/bootstrap.min.css')) }}" />
            <link rel="stylesheet" href="{{ str_replace('http://','https://',url('css/font-awesome.css')) }}" />
            <link rel="stylesheet" href="{{ str_replace('http://','https://',url('css/style.css')) }}" />
    </head>
    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                    <img class="logo" src="{{asset('images//blogger-site.jpg')}}">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        @if (session('login_error'))
                            <div class="alert alert-danger">{{session('login_error')}}</div>
                        @endif
                            
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif

                        <form class="custom-style" action="{{route('register')}}" method="POST">
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
                                <label>Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                            </div>
                            {{-- <div class="form-group">
                                <label>User Role</label>
                                <select class="form-control" name="role" >
                                    <option value="0">Normal User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div> --}}
                            <input type="submit" class="btn btn-primary" value="Save" required />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
