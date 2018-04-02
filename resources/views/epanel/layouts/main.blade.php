<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') &bullet; {{ config('app.name') }}</title>

    <meta name="author" content="Noviyanto Rachmady <novay@enterwind.com>">
    <meta name="keyword" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('backend/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">
</head>
<body class="horizontal-navigation @yield('body')">
    
    @include('epanel.layouts.partials.nav')
    @include('epanel.layouts.partials.sidebar')

    <div class="page-content">
        @yield('content')
    </div>

    <div class="statusbar">
        <div class="statusbar-item title">
            <strong>Hackathon Engine by The Enterwind Inc.</strong>
        </div> 
        <div class="statusbar-item">
            <strong>Selamat Datang, </strong> {!! auth()->user()->nama !!}
        </div> 
        <div class="statusbar-item">
            <strong>Jam</strong> 
            <time class="waktu">
                <span class="jam">12</span>
                <span>:</span>
                <span class="menit">28</span>
                <span>:</span>
                <span class="detik">32</span>
            </time>
        </div>
    </div>

    <script src="{{ asset('backend/js/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/lib/tether/tether.min.js') }}"></script>
    <script src="{{ asset('backend/js/lib/bootstrap/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
    <script src="{{ asset('backend/js/plugins.js') }}"></script>
    
    @yield('js')

    <script type="" src="{{ asset('backend/js/app.js') }}"></script>
    
    @if(notify()->ready())
    <script type="text/javascript">
        swal({
            title: 'Perhatian!',
            type: '{!! notify()->type() !!}',
            html: '{!! notify()->message() !!}'
        });
    </script>
    @endif

</body>
</html>