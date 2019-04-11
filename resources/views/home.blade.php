<!--index.html-->

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href ="{{asset('frontend/css/bootstrap-social.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/images/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/indexStyles.css')}}">
    <title>Home Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    {{--<link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}">--}}


</head>

<body class="main">
<header>
    <div class="topnav" id="myTopnav">
        <a href="/home">
            <img src="{{asset('frontend/images/SwapitLogo_horizontal.png')}}" alt="SWAPIT Logo" width="200">
        </a>
        <a href="post-item" class="hoverColor">Post Item</a>
        <a href="my-item" class="hoverColor">My Item</a>
        <a href="/myAppointment" class="hoverColor">My Appointment</a>

         <form class="searchForm" action="/search" method="POST" role="search" >
            {{ csrf_field() }}
            <input type="text" placeholder="Search..." name="search" class="searchInput">
            <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
        </form>

        {{--<a id="goChat"><img width="40px" height="40px" src="https://images.vexels.com/media/users/3/139957/isolated/preview/8a87599b006bf48d87643a7499710d31-cloud-chat-by-vexels.png"></a>--}}
        {{--<span id="chatCount" class="badge badge-danger">0</span>--}}

        <a class="loginNav" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Hello, {{Auth::user()->name}}</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    <style>
        .cat_btn {
            width:250px
        }
    </style>

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

{{--<div>--}}
    {{--<img src="{{asset('frontend/images/coverPic.jpg')}}" alt="cover picture" width="100%">--}}
{{--</div>--}}
<div class="container">
    <div class="row" id="chatAlert">
        {{--<div class="col-md-3">--}}
            {{--<div class="alert alert-success" role="alert">--}}
                {{--This is a secondary alert—check it out!--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
<div class="mostPopular">
    <h2> MOST POPULAR </h2>
    <p class="popDesc"> The most click items in this week. </p>


    <div class="row popItemsSec">
        {{--@if(Auth::user()->name != 'yc')--}}
            {{--<div class="col-sm-4 col-md-4 col-lg-4">--}}
                {{--<a href="/tradeitem/240">--}}
                    {{--<img src="{{asset('frontend/images/watch.jpg')}}" class="popItems" alt="watch" width="300px" height="300px">--}}
                    {{--<p class="popItemsDesc"> Cluse Watch </p>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--@else--}}
            {{--<div class="col-sm-4 col-md-4 col-lg-4">--}}
            {{--<a href="#">--}}
            {{--<img src="{{asset('frontend/images/phoneCase.jpg')}}" class="popItems" alt="Phone Case" width="300px" height="300px">--}}
            {{--<p class="popItemsDesc"> Iphone Case - You will forever be my always </p>--}}
            {{--</a>--}}
            {{--</div>--}}
        {{--@endif--}}

        @foreach($items as $item)
        @if(Auth::user()->id != $item->owner)
            <div class="col-md-4">
                <a href="/item/{{$item->id}}" onclick="addItemClick('{{$item->id}}')">
                    <img src="{{asset('images/'.$item->image_url)}}" class="popItems" alt="Phone Case" width="300px" height="300px">
                    <p class="popItemsDesc"> {{$item->item_title}}</p>
                </a>
            </div>
            @endif
        @endforeach





        {{--<div class="col-sm-4 col-md-4 col-lg-4">--}}
            {{--<a href="#">--}}
                {{--<img src="{{asset('frontend/images/phoneCase.jpg')}}" class="popItems" alt="Phone Case" width="300px" height="300px">--}}
                {{--<p class="popItemsDesc"> Iphone Case - You will forever be my always </p>--}}
            {{--</a>--}}
        {{--</div>--}}

        {{--<div class="col-sm-4 col-md-4 col-lg-4 ">--}}
            {{--<a href="#">--}}
                {{--<img src="{{asset('frontend/images/mug.jpg')}}" class="popItems" alt="mug" width="300px" height="300px">--}}
                {{--<p class="popItemsDesc"> Floral Mug and Plate Set </p>--}}
            {{--</a>--}}
        {{--</div>--}}

    </div>
</div>

<div class="mostPopular">
    <h2>Other Items</h2>
    <p class="popDesc"> Category </p>

    <div class="container">
        <div class="row">
            @foreach($categories as $key => $cat)
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary btn-lg" onclick="goToCat('{{$cat->id}}')" style="width: 250px; margin-bottom:20px">{{$cat->catName}}</button>
                </div>
            @endforeach
        </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>

    <script>

        $(document).ready(function(){
            var socket = io.connect('http://127.0.0.1:3000/');

            let currentBuyer = ['_ww'];

            socket.on('buyer connected',(data)=>{
                let owner =  atob(data.owner);
                let buyer =  atob(data.buyer);
                let loggedOnUser = '{{Auth::user()->name}}';
                    // <div class="col-md-3">
                    // <div class="alert alert-success" role="alert">
                    // This is a secondary alert—check it out!
                    // </div>
                    // </div>
                let html =  '<div class="col-md-3">' +
                                '<div class="alert alert-success" role="alert">' +
                                'Buyer: <a onclick="gotoChat(\''+buyer+'\',\''+owner+'\')"><b>'+ buyer + '</b></a> want to chat with you' +
                            '</div></div>';
                if(owner == loggedOnUser){
                    if( currentBuyer.indexOf(buyer) == -1){
                        $('#chatAlert').append(html);
                    }
                    else{
                        console.log('no');
                    }
                    currentBuyer.push(buyer);

                }
                console.log(owner,buyer,loggedOnUser);
            });


            socket.on('buyer connected',(data)=>{
                console.log(data);
            })



        });

        function goToCat(id){
            $.ajax({
                url : '/categoryCount',
                type : 'post',
                data : {
                    '_token' : '{{csrf_token()}}',
                    'id' : id,
                }
            });
            window.location.href = '/category/' + id;
        }

        function addItemClick(id){
            $.ajax({
                url : '/itemCount',
                type : 'post',
                data : {
                    '_token' : '{{csrf_token()}}',
                    'id' : id,
                }
            });
        }

        function gotoChat(owner,buyer){
            window.open("http://127.0.0.1:3000/"+btoa(owner)+"/"+btoa(buyer) + "/ogi", "", "width=405,height=602");
            console.log(owner,buyer);
        }



    </script>
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
