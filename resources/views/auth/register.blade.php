<!--signUp.html-->

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href ="{{asset('frontend/css/bootstrap-social.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/images/favicon.ico')}}">
    {{--<link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/signupStyles.css')}}">
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
</head>

<body class="main">


<header>

</header>

<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="signupForm-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" action="{{route('register')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name"><i class="fa fa-user"></i></label>
                            <input type="text" name="name" id="fullname" placeholder="Your Full Name" value="{{old('name')}}"/>
                            @if ($errors->has('name'))
                                <small class="help-block" style="color:red;">
                                    {{ $errors->first('name') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">
                                <i class="fa fa-envelope"></i>
                            </label>
                            <input type="email" name="email" id="email" placeholder="Your Email" value="{{old('email')}}"/>
                            @if ($errors->has('email'))
                                <small class="help-block" style="color:red;">
                                    {{ $errors->first('email') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="DOB"><i class="fa fa-birthday-cake"></i></label>
                            <input type="Date" name="DOB" id="DOB" placeholder="Your Date Of Birth" value="{{old('DOB')}}"/>
                            @if ($errors->has('DOB'))
                                <small class="help-block" style="color:red;">
                                    {{ $errors->first('DOB') }}
                                </small>
                            @endif
                        </div>

                        <div class="form-radio">
                            <label class="radio-inline"><input type="radio" name="gender" value="F" checked>Female</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="M">Male</label>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="fa fa-lock"></i></label>
                            <input type="password" name="password" id="pswd" placeholder="Password"/>
                            @if ($errors->has('password'))
                                <small class="help-block" style="color:red;">
                                    {{ $errors->first('password') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="fa fa-lock"></i></label>
                            <input type="password" name="password_confirmation" id="confirmPswd" placeholder="Confirm your password"/>
                        </div>
                        <div>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="termCheckbox" value="agreedTerm">I agree all the statements in Term of Service
                            </label>
                        </div>
                        <div class="form-group form-button">
                            <button type="submit" name="signup" id="signupBtn" class="form-submit" disabled value="Register">Register</button>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('frontend/images/signupimg.png')}}" alt="sing up image"></figure>
                    <a href="login.html" class="signup-image-link">I already have an account.</a>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    $(document).ready(function(){
        $(function() {
            $('#termCheckbox').click(function() {
                if ($(this).is(':checked')) {
                    $('#signupBtn').removeAttr('disabled');
                } else {
                    $('#signupBtn').attr('disabled', 'disabled');
                }
            });
        });
    });
</script>

</body>
</html>