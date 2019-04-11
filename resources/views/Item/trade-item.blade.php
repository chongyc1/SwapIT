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
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/styles.css')}}">

</head>

<body class="main">

<header>
        <div class="topnav" id="myTopnav">
            <a href="/home">
                <img src="{{asset('frontend/images/SwapitLogo_horizontal.png')}}" alt="SWAPIT Logo" width="200">
            </a>
            <a href="/post-item" class="hoverColor">Post Item</a>
            <a href="/my-item" class="hoverColor">My Item</a>
            <a href="/myAppointment" class="hoverColor">My Appointment</a>
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

<section class="ItemDesc">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 postItem-imageSec">
                <img src="http://127.0.0.1:8000/frontend/images/watch.jpg" class="postItem-image" alt="Bedside Table image" width="450px">
            </div>


            <div class=" col-xs-12 col-md-4 col-lg-5 col-md-offset-1 Item-content">
                <h2 class="ItemDesc-title">Item Description</h2>
                <div class="itemDesc-group">
                    <label class="ItemTitle"> Item Name &nbsp: </label>
                    <label class="Item_Description">Cluse Watch </label>
                </div>
                <div class="itemDesc-group">
                    <label class="ItemTitle"> Description :</label>
                    <label class="Item_Description">A beautiful Watch</label>
                </div>
                <div class="itemDesc-group">
                    <label class="ItemTitle"> Category &nbsp &nbsp : </label>
                    <label class="Item_Description">Lifestyle</label>

                </div>

                <div class="itemDesc-group">
                    <label class="ItemTitle"> Item Period : </label>
                    <label class="Item_Description"> 1 Years </label>
                </div>


                <div class="itemDesc-group">
                    <label class="ItemTitle"> Item Owner : </label>
                    <label class="Item_Description">yc</label>
                </div>

                <a onclick="history.back();" class="btn btn-primary" >Go back</a>
                <button class="btn btn-success" type="button" id="contactBtn">Contact yc</button>

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

<script>
    $(document).ready(function(){
       $('#contactBtn').on('click',function(){
           window.open("http://127.0.0.1:3000/yc", "", "width=350px,height=700px");
       });
    });
</script>
</body>
</html>
