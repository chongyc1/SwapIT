<!--index.html-->

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href ="{{asset('frontend/css/bootstrap-social.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/images/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/indexStyles.css')}}">
    <title>Home Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}">


</head>

<body class="main">
<header>
    <div class="topnav" id="myTopnav">
        <a href="index.html">
            <img src="{{asset('frontend/images/SwapitLogo_horizontal.png')}}" alt="SWAPIT Logo" width="200">
        </a>
        <a href="post-item" class="hoverColor">Post Item</a>
        <a href="#trending" class="hoverColor">Trending</a>
        <a href="#about" class="hoverColor">About</a>
        <a href="#contactUs" class="hoverColor">Contact Us</a>
        <a class="loginNav" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Hello, {{Auth::user()->name}}</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
</header>

<div>
    <img src="{{asset('frontend/images/coverPic.jpg')}}" alt="cover picture" width="100%">
</div>

<div class="mostPopular">
    <h2> MOST POPULAR </h2>
    <p class="popDesc"> The most click items in this week. </p>

    <div class="row popItemsSec">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <a href="#">
                <img src="{{asset('frontend/images/watch.jpg')}}" class="popItems" alt="watch" width="300px" height="300px">
                <p class="popItemsDesc"> Cluse Watch </p>
            </a>
        </div>

        <div class="col-sm-4 col-md-4 col-lg-4">
            <a href="#">
                <img src="{{asset('frontend/images/phoneCase.jpg')}}" class="popItems" alt="Phone Case" width="300px" height="300px">
                <p class="popItemsDesc"> Iphone Case - You will forever be my always </p>
            </a>
        </div>

        <div class="col-sm-4 col-md-4 col-lg-4 ">
            <a href="#">
                <img src="{{asset('frontend/images/mug.jpg')}}" class="popItems" alt="mug" width="300px" height="300px">
                <p class="popItemsDesc"> Floral Mug and Plate Set </p>
            </a>
        </div>

    </div>

    <footer>
        <div align="center">
            Copyright &copy; SWAPIT 2018
        </div><br />
        <div align="center">
            <a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/"> <span class="fa fa-linkedin"></span></a>
            <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/"> <span class="fa fa-facebook"></span></a>
            <a class="btn btn-social-icon btn-instagram" href="https://www.instagram.com/"> <span class="fa fa-instagram"></span></a>
            <a class="btn btn-social-icon btn-twitter" href="https://twitter.com/"> <span class="fa fa-twitter"></span></a>
        </div>
        <br />
        <div align="center">
            <script type="text/javascript" language="JavaScript">
                document.write("Last Modified : " + document.lastModified);
            </script>
        </div>
    </footer>
</body>
</html>

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-md-8">--}}
{{--<div class="card">--}}
{{--<div class="card-header">Dashboard</div>--}}

{{--<div class="card-body">--}}
{{--@if (session('status'))--}}
{{--<div class="alert alert-success" role="alert">--}}
{{--{{ session('status') }}--}}
{{--</div>--}}
{{--@endif--}}

{{--You are logged in!--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
