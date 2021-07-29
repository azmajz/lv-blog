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
    <!-- HEADER -->
    <div id="header-admin">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-2">
                    <a href="post.php"><img class="logo" src="{{asset('images/blogger-site.jpg')}}"></a>
                </div>
                <!-- /LOGO -->
                <!-- LOGO-Out -->
                <div class="col-md-offset-9  col-md-1">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-primary admin-logout" type="submit">Logout</button>
                    </form>
                    {{-- <a href="logout.php" class="" >logout</a> --}}
                </div>
                <!-- /LOGO-Out -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="admin-menubar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="admin-menu">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/admin/posts?user=1">{{auth()->user()->name}}'s Posts</a>
                        </li>
                        @auth
                        @if (auth()->user()->role === 1)
                        <li>
                            <a href="/admin/posts">All Posts</a>
                        </li>
                        <li>
                            <a href="/admin/category">Category</a>
                        </li>
                        <li>
                            <a href="/admin/users">Users</a>
                        </li>
                        @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->

    @yield('admin-content')

    <!-- Footer -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span>© Copyright {{date('Y')}} {{config('app.name')}}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer -->
</body>

</html>
