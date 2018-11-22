<!--myItems.html-->

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
    <title>Trader's Home Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}">

</head>

<body class="main">

<header>
    <div class="topnav" id="myTopnav">
        <a href="/home">
            <img src="{{asset('frontend/images/SwapitLogo_horizontal.png')}}" alt="SWAPIT Logo" width="200">
        </a>
        <a href="post-item" class="hoverColor">Post Item</a>
        <a href="my-item" class="hoverColor">My Item</a>
        <a href="#about" class="hoverColor">History</a>
        <a class="loginNav" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Hello, {{Auth::user()->name}}</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

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


<section>
    <div class="myItems">
        <h2 style="text-align: center"> MY ITEMS </h2>
        <p class="popDesc"> All of your lovely babies here </p>

        @if(Session::has('msg'))
            <div class="row">
                <div class="alert alert-success" style="text-align: center">
                    <h4>{{Session::get('msg')}}</h4>
                </div>
            </div>
        @endif
        <div class="row popItemsSec">
            @foreach($items as $item)
            <div class="col-sm-4 col-md-4 col-lg-4">
                <a href="/item/{{$item['id']}}">
                    <img src="{{asset('images')}}/{{$item['image_url']}}" class="popItems" alt="white table" width="100px" height="100px">
                    <p class="popItemsDesc"> {{$item['item_title']}} </p>
                </a>
            </div>
            @endforeach
            <div class="col-sm-4 col-md-4 col-lg-4">
                <a href="post-item">
                    <img src="{{asset('frontend/images/white.jpg')}}" class="popItems" alt="White" width="100px" height="100px">
                    <p class="popItemsDesc"> Add more items </p>
                </a>
            </div>
        </div>
    </div>
</section>

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
