@extends('home.layout')
@section('content')
<div id="login" class="animated fadeInDown">

    <div id="main" role="main" style="margin-top: 50px;">

        <!-- MAIN CONTENT -->
        <div id="content" class="container" style="padding-top: 50px;">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                    <h1 class="txt-color-red login-header-big">DexCaff</h1>
                    <div class="hero">

                        <div class="pull-left login-desc-box-l">
                            <h4 class="paragraph-header">Sign in at DexCaff.com to check out our logged section with all sorts of fun.</h4>
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