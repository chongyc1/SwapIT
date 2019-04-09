<!--myItems.html-->

<html>
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href ="{{asset('frontend/css/bootstrap-social.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/images/favicon.ico')}}">
    {{--<link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}">--}}
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

<section class="ItemDesc">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 postItem-imageSec">
                <img src="{{asset('images')}}/{{$item->image_url}}" class="postItem-image" alt="Bedside Table image" width="450px">
            </div>


            <div class=" col-xs-12 col-md-4 col-lg-5 col-md-offset-1 Item-content">
                <h2 class="ItemDesc-title">Item Description</h2>
                <div class="itemDesc-group">
                    <label class="ItemTitle"> Item Name &nbsp:  </label>
                    <label class="Item_Description"> {{$item->item_title}} </label>
                </div>
                <div class="itemDesc-group">
                    <label class="ItemTitle"> Description : </label>
                    <label class="Item_Description"> {{$item->item_desc}} </label>
                </div>
                <div class="itemDesc-group">
                    <label class="ItemTitle"> Category &nbsp &nbsp : </label>
                    <label class="Item_Description"> {{$item->catName}} </label>
                </div>
                <div class="itemDesc-group">
                    <label class="ItemTitle"> Owner &nbsp &nbsp : </label>
                    <label class="Item_Description"> {{$item->name}} </label>
                </div>

                <div class="itemDesc-group">
                    <label class="ItemTitle"> Item Period : </label>
                    <label class="Item_Description"> {{$item->item_pred}} (Years) </label>
                </div>

                <div class="btnContainer">
                    <a href="/my-item" class="btn btn-primary" >Go back</a>

                    <button class="btn btn-success" type="button" id="contactBtn">Contact {{$item->name}}</button>

                    <a href="/setAppointment" class="btn appoinmentBtn"> 
                        Set Appoinment
                    </a>
                   
            </div>

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
            console.log(btoa('{{$item->name}}'));
            let name = btoa('{{$item->name}}');
            let userName = btoa('{{Auth::user()->name}}');
            window.open("http://127.0.0.1:3000/"+name+"/"+userName + "/n", "", "width=405,height=602");
        });
    });
</script>
</body>
</html>
