<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>
        @hasSection('title')
        @yield('title') - TheNews
        @else
            Welcome to TheNews
        @endif
    </title>
</head>
<body>
<div class="container">
    <div class="row">
        @include('layouts.nav')
    </div>
    <div class="row">
        @section('sidebar')
            <div class="col-md-4">
                @include('layouts.sidebar')
            </div>
        @show

        <div class="col-md-8">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>