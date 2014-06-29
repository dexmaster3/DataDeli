@extends('home.layout')

@section('head')

<!-- Basic Styles -->
{{ HTML::style('css/font-awesome.min.css'); }}

<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
{{ HTML::style('css/smartadmin-production.css') }}
{{ HTML::style('css/smartadmin-skins.css') }}

<!-- FAVICONS -->
<link rel="shortcut icon" href="{{ asset('/img/favicon/favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('/img/favicon/favicon.ico') }}" type="image/x-icon">

<!-- GOOGLE FONT -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
@stop

@section('content')
<div id="login" class="animated fadeInDown">

    <div id="main" role="main" style="margin-top: 50px;">

        <!-- MAIN CONTENT -->
        <div id="content" class="container" style="padding-top: 50px;">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                    <h1 class="txt-color-red login-header-big">SmartAdmin</h1>
                    <div class="hero">

                        <div class="pull-left login-desc-box-l">
                            <h4 class="paragraph-header">It's Okay to be Smart. Experience the simplicity of SmartAdmin, everywhere you go!</h4>
                            <div class="login-app-icons">
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm">Frontend Template</a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm">Find out more</a>
                            </div>
                        </div>

                        <img src="img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="about-heading">About SmartAdmin - Are you up to date?</h5>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="about-heading">Not just your average template!</h5>
                            <p>
                                Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi voluptatem accusantium!
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                    <div class="well no-padding">
                        {{ Form::open(array('url' => 'register', 'class' => 'smart-form client-form', 'id' => 'login-form')) }}
                        <header>
                            Register
                            @if($errors->has())
                                @foreach ($errors->all() as $error)
                                    <div class="bg-danger" style="margin: 5px;padding:10px;">{{ $error }}</div>
                                @endforeach
                            @endif
                        </header>
                        <fieldset>
                            <section>
                                <p class="bg-danger" style="text-align: center;font-size:20px;">
                                    {{Session::get('loginfailed')}}
                                </p>
                                <label class="label">Your E-mail</label>
                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'email@domain.com')) }}
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Verification will be sent here!</b></label>
                            </section>

                            <section>
                                <label class="label">Password</label>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    {{ Form::password('password') }}
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Choose your password</b> </label>
                            </section>
                            <section>
                                <label class="label">Repeat Password</label>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    {{ Form::password('password_confirmation') }}
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Confirm password</b>
                                </label>
                            </section>
                        </fieldset>
                        <footer>{{ Form::submit('Register') }}
                        </footer>
                        {{ Form::close() }}

                    </div>

                    <h5 class="text-center"> - Or sign in using -</h5>

                    <ul class="list-inline text-center">
                        <li>
                            <a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
</div>
@stop

@section('scripts')
<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script src="js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script> if (!window.jQuery) { document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');} </script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

<!-- BOOTSTRAP JS -->
<script src="/js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="/js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="/js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="/js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="/js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="/js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="/js/plugin/fastclick/fastclick.js"></script>

<!--[if IE 7]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->
<!-- MAIN APP JS FILE -->
<script src="/js/app.js"></script>

<script type="text/javascript">
    runAllForms();

    $(function() {
        // Validation
        $("#login-form").validate({
            // Rules for form validation
            rules : {
                email : {
                    required : true,
                    email : true
                },
                password : {
                    required : true,
                    minlength : 3,
                    maxlength : 20
                }
            },

            // Messages for form validation
            messages : {
                email : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
                },
                password : {
                    required : 'Please enter your password'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>
@stop