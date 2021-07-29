<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name')}}</title>
        <link rel="stylesheet" href="{{ str_replace('http://','https://',url('css/bootstrap.min.css')) }}" />
        <link rel="stylesheet" href="{{ str_replace('http://','https://',url('css/font-awesome.css')) }}" />
        <link rel="stylesheet" href="{{ str_replace('http://','https://',url('css/style.css')) }}" />
</head>
<body>
<div id="header">
    <div class="container">
        <div class="row">
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="{{asset('images/blogger-site.jpg')}}"></a>
            </div>
        </div>
    </div>
</div>
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                    <li><a href='/'>Home</a></li>
                    @foreach ($categories as $cat)                        
                    <li><a href='/category/{{$cat->id}}'>{{$cat->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @yield('post-container')
            </div>

            <div id="sidebar" class="col-md-4">
                @include('inc.sidebar')
            </div>
            
        </div>
    </div>
</div>

<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright {{date('Y')}} {{config('app.name')}}</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
