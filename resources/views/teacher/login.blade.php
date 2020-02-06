<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->


<!-- Mirrored from keenthemes.com/preview/metronic/theme/admin_2/page_user_login_5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 18:12:02 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <title>Metronic Admin Theme #2 | User Login 5</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #2 for " name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mentor/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mentor/css/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mentor/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mentor/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('mentor/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mentor/css/login.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mentor/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">
    <!-- BEGIN : LOGIN PAGE 5-1 -->
    <div class="user-login-5">
        <div class="row bs-reset">
            <div class="col-md-6 bs-reset mt-login-5-bsfix">
                <div class="login-bg" style="background-image:url({{ asset('mentor/images/loginbg.jpg') }})">
                    <img class="login-logo" src="{{ asset('mentor/images/logo.png') }}" /> </div>
            </div>
            <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                <div class="login-content">
                    <div id="login-div">
                        <form action="{{ route('mentor.mentorLogin') }}" class="login-form" method="post">
                            @if(count($errors)>0)
                                <div class="errors">
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-warning" role="alert">{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            <h1>GYAN SCHOOL MENTOR LOGIN</h1>
                            <p> “Teaching is not a lost art, but the regard for it is a lost tradition.” <br/></p>
                            <div class="clearfix"></div>
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="email" autocomplete="off" placeholder="Email" name="email" required/> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/> </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-sm-4 signUp">
                                    <a href="#register" id="mentorRegister">Not a User? Sign Up</a>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                                    </div>
                                    <button class="btn green" type="submit">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- BEGIN FORGOT PASSWORD FORM -->
                    <div id="register">
                        <form class="register-form" action="{{ route('mentor.signup') }}" method="post">
                            <h1>SIGN UP TO GYAN SCHOOL</h1>
                            <p> "Share your knowledge. It is a way to achieve immortality." </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="First Name" name="firstName" required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Last Name" name="lastName" required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" type="email" autocomplete="off" placeholder="Email" name="email" required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn green btn-outline">Back To Login</button>
                                <button type="submit" class="btn btn-success uppercase pull-right">SIGN UP</button>
                            </div>
                        </form>
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="social-login">
                        <button class="btn btn-default" id="facebook-button">LOGIN WITH FACEBOOK</button>
                        <button class="btn btn-default" id="google-button">LOGIN WITH GOOGLE</button>
                    </div>
                </div>
                <div class="login-footer">
                    <div class="row bs-reset">
                        <div class="col-xs-5 bs-reset">
                            <ul class="login-social">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-7 bs-reset">
                            <div class="login-copyright text-right">
                                <p>Copyright &copy; Gyan School 2017</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('mentor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('mentor/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('mentor/js/app.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('mentor/js/login-5.min.js') }}" type="text/javascript"></script>
    <script>
        $('#register').hide();
        $('#mentorRegister').click(function (e) {
            e.preventDefault();
            $('#login-div').fadeOut(500).delay(200).hide();
            $('#register').fadeIn(500);
        });
        $('#back-btn').click(function (e) {
            e.preventDefault();
            $('#register').fadeOut(500).delay(200).hide();
            $('#login-div').fadeIn(500);
        });
    </script>
    <!-- End -->
</body>
</html>