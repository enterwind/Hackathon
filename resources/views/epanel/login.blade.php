<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login Page - {{ env('APP_NAME') }}</title>

	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png?v=RyMly03xdz') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png?v=RyMly03xdz') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png?v=RyMly03xdz') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json?v=RyMly03xdz') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg?v=RyMly03xdz') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico?v=RyMly03xdz') }}">
    <meta name="apple-mobile-web-app-title" content="{{ env('EW_INSTANSI') }}">
    <meta name="application-name" content="{{ env('EW_INSTANSI') }}">
    <meta name="theme-color" content="#ffffff">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="{{ asset('backend/css/separate/pages/login.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">
</head>
<body class="bg">

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                {!! Form::open(['class' => 'sign-box', 'autocomplete' => 'off', 'method' => 'put']) !!}
                    <div class="sign-avatar">
                        <img src="{{ asset('img/logo.png') }}" alt="">
                    </div>
                    <header class="sign-title">
                        <b>Hai, Silahkan Masuk</b>
                    </header>
                    <div class="form-group {{ $errors->first('username', 'error') }}">
                        {!! Form::text('username', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Nama Pengguna'
                        ]) !!}
                        {!! $errors->first('username', '<center class="error-list"><small>:message</small></center>') !!}
                    </div>
                    <div class="form-group {{ $errors->first('password', 'error') }}">
                        {!! Form::password('password', [
                            'class' => 'form-control',
                            'placeholder' => 'Kata Sandi'
                        ]) !!}
                        {!! $errors->first('password', '<center class="error-list"><small>:message</small></center>') !!}
                    </div>
                    <div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="remember" value="1" name="remember" />
                            <label for="remember">Ingatkan Saya</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block">MASUK</button>
                    <p class="sign-note mb0">
                        Supported by <a href="">The Enterwind Inc.</a>
                    </p>
                    <button type="button" class="close">
                        <span aria-hidden="true"><i class="fa fa-quote-right"></i></span>
                    </button>
                    {!! Form::hidden('redirect', request()->has('redirect')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div><!--.page-center-->


    <script src="{{ asset('backend/js/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/lib/tether/tether.min.js') }}"></script>
    <script src="{{ asset('backend/js/lib/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
    <script src="{{ asset('backend/js/js/app.js') }}"></script>
    @if(notify()->ready())
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
    <script type="text/javascript">
        swal({
            type: '{!! notify()->type() !!}',
            html: '<h4>{!! notify()->message() !!}</h4>'
        });
    </script>
    @endif
</body>
</html>