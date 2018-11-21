<!--login.html-->

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href ="{{asset('frontend/css/bootstrap-social.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/images/favicon.ico')}}">
    {{--<link rel="stylesheet" type="text/css" href="styles.css">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/signupStyles.css')}}">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

</head>

<body class="main">

<header>

</header>

<div class="main">

    <!-- Login form -->
    <section class="login">
        <div class="container">
            <div class="login-content">
                <div class="login-image">
                    <figure><img src="{{asset('frontend/images/loginImg.png')}}" alt="login image"></figure>
                    <a href="register" class="signup-image-link">Create an account</a>
                </div>
                <div class="login-form">
                    <h2 class="loginForm-title">Login</h2>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="register-form" id="register-form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="email"><i class="fa fa-envelope"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" required autofocus value="{{old('email')}}"/>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert" style="color:red">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="form-group">
                            <label for="pass"><i class="fa fa-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" required/>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert" style="color:red">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                        <div class="form-group form-button">
                            <input type="submit" name="login" id="login" class="form-submit" value="Login"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

</body>
</html>