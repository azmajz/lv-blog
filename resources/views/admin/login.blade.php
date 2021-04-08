<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>ADMIN {{config('app.name')}}</title>
            <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
            <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
            <link rel="stylesheet" href="{{asset('css/style.css')}}">
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

                        <form class="custom-style" action="{{route('admin.login')}}" method ="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                            <a href="/admin/register" class="btn btn-primary">Register</a>
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
