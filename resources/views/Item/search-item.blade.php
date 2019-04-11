<!--myItems.html-->

<html>
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href ="{{asset('frontend/css/bootstrap-social.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/images/favicon.ico')}}">
    <title>Trader's Home Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/styles.css')}}">

</head>

<body class="main">

<header>
    <div class="topnav" id="myTopnav">
        <a href="/home">
            <img src="{{asset('frontend/images/SwapitLogo_horizontal.png')}}" alt="SWAPIT Logo" width="200">
        </a>
        <a href="post-item" class="hoverColor">Post Item</a>
        <a href="/my-item" class="hoverColor">My Item</a>
        <a href="/myAppointment" class="hoverColor">My appointment</a>
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
        <h2 style="text-align: center"> Search Results
        @if(isset($catName))
            of {{$catName}}
        @else
            :
        @endif
        </h2>

        <div class="row popItemsSec">
            @if(empty($items))
                <h3 style="margin-top: 100px">No Record Found</h3>
                <br><br><br><br><br><br><br><br><br><br><br><br>
            @endif
            @foreach($items as $item)

            <div class="col-sm-4 col-md-4 col-lg-4">
                <a onclick="addCountItem('{{$item->id}}')">
                    <img src="{{asset('images')}}/{{$item->image_url}}" class="popItems" alt="white table" height="400px">
                    <p class="popItemsDesc"> {{$item->item_title}} </p>
                </a>
            </div>
            @endforeach
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

<script>
    function addCountItem(id){
        $.ajax({
            url : '/itemCount',
            type : 'post',
            data : {
                '_token' : '{{csrf_token()}}',
                'id' : id,
            }
        });
        window.location.href =  '/item/'+id;


    }
</script>
</body>
</html>
