<!DOCTYPE html>
<html>
  <head>
	<title>@yield('judul')</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>  
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic%7CMerriweather:400,300,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	
	
	<!-- CSS Files comes here -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="{{ asset('landing/css/main.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('landing/css/rapid-icons.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('landing/css/js_styles/jquery.maximage.min.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('landing/css/responsivity.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('landing/css/animate.css') }}" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Modernizer and IE specyfic files -->  
	<script src="{{ asset('landing/js/modernizr.custom.js') }}"></script>
	
	<!--[if IE 9]>
    	<link href="{{ asset('landing/css/ie.css') }}" rel="stylesheet" media="screen">
    <![endif]--> 

    @yield('css')	
	   
  </head>
  
  <body>
  
	@yield('konten')

	<div class="modal fade" id="syarat-ketentuan" tabindex="-1" role="dialog" aria-labelledby="syaratKetentuan" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="syaratKetentuan">
						<b>Syarat &amp; Ketentuan Berlaku</b>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					{!! landing()->term_condition !!}
				</div>
			</div>
		</div>
	</div>

    <script src="{{ asset('landing/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    @yield('js')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
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