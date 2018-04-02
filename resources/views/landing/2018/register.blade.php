@extends('landing.2018.layouts.main')

@section('judul')
Registrasi Peserta Hackathon!
@stop

@section('css')
	<style type="text/css">
		.logo-login {
			margin: 0 auto;
		    width: 100%;
		    padding: 0 125px;
		}
		.menu_bar {
			margin-top: 90px;
		}
		#cta_download {
			padding-top: 7rem;
		}
		ul.icon_list {
			padding-left: 0;
		}
		.icon_small {
			margin: 0;
			margin-right: 10px
		}
		.icon_list li {
			margin-bottom: 15px;
		}
		.icon_list li h6 {
			font-weight: 400;
			font-size: .9rem;
			line-height: 1rem;
		}
		.btn_with_icon {
			width: 100%;
    		position: relative;
		}
		.btn.btn_with_icon .btn_content {
			width: 100%;
    		text-align: center;
		}
		.mb0 {
			margin-bottom: 0!important;
		}
		.mt-10 {
			margin-top: -10px!important;
		}
		.contact_form input[type=text].mb0 {
			margin-bottom: 0!important;
		}
		.input-field .tabel {
			top: 1.3rem;
		}
		.form-login {
			padding: 0 40px 20px;
		}

		@media (max-width: 479px) { 
			.menu_bar {
			    margin-top: 65px;
			}
			#hideRight {
				margin-top: -5px;
			}
		}
		#clockdiv{
			font-family: sans-serif;
			color: #fff;
			display: inline-block;
			font-weight: 100;
			text-align: center;
			font-size: 4rem;
		}

		#clockdiv > div{
			padding: 10px;
			border-radius: 3px;
			background: #2d8e41;
			display: inline-block;
			font-weight: 800
		}
		#clockdiv div > span.days {

		}

		#clockdiv div > span{
			padding: 15px;
			border-radius: 3px;
			background: #2ba546;
			display: inline-block;
		}

		.smalltext{
			padding-top: 5px;
			font-size: 16px;
		}
		.open-registrasi {
			margin: 0 auto;
		    text-align: center;
		    margin-top: 200px;
		    margin-bottom: 200px;
		}
	</style>
@stop

@section('js')
    <script type="text/javascript">
    	var url_login = '{{ route('landing.team.login') }}';
    	var url_home  = '{{ route('landing.team.dashboard') }}';

    	// untuk mengenali fungsi "Enter" setelah username danpassword di inputkan, gunakan fungsi berikut :
		$('input').keypress(function(k) { if (k.which == 13) login(); });

		// logika fungsi Login
		function login() {
			// koleksi variabel dari form
			var email = $('#email').val();
			var password = $('#password').val();
			var token = '{{ csrf_token() }}';
			// eksekusi
			$.post(url_login, { email:email, password:password, _token:token }, function(r) {
				// jika status yg diterima ''
				if (r.status == '') {
					// jika email tidak sama dengan ''
					if (r.email != '') {
						// ubah class berdasarkan id  masing-masing
						$('#error-email').text(r.email);
						$('#password').val('');
					// sedang, bila email = ''
					} else {
						// tambah class jadi has-success berdasarkan id
						$('#error-email').text('');
					};
					// untuk password, penjelasan sama
					if (r.password != '') {
						$('#error-password').text(r.password);
						$('#password').val('');
					} else {
						$('#error-password').text('');
					};
				// sedang, jika status tidak kosong
				} else {
					// untuk nilai value sukses
					if (r.status == 'sukses') {
						// rujuk ke url_home
						$(location).prop('href', url_home);
					// selain sukses, eksekusi ini
					} else {
						// hapus semua class dan pesan has-error kmudian fokuskan kursor ke email
						swal({
				    		title: 'Perhatian!',
				    		type: 'error',
				    		html: 'Username dan Password Ngawur!'
				    	});
						$('#email').focus();
					};
				};
			}, "json");
		}
    </script>
    <script type="text/javascript">
    	function getTimeRemaining(endtime) {
		  var t = Date.parse(endtime) - Date.parse(new Date());
		  var seconds = Math.floor((t / 1000) % 60);
		  var minutes = Math.floor((t / 1000 / 60) % 60);
		  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
		  var days = Math.floor(t / (1000 * 60 * 60 * 24));
		  return {
		    'total': t,
		    'days': days,
		    'hours': hours,
		    'minutes': minutes,
		    'seconds': seconds
		  };
		}

		function initializeClock(id, endtime) {
		  var clock = document.getElementById(id);
		  var daysSpan = clock.querySelector('.days');
		  var hoursSpan = clock.querySelector('.hours');
		  var minutesSpan = clock.querySelector('.minutes');
		  var secondsSpan = clock.querySelector('.seconds');

		  function updateClock() {
		    var t = getTimeRemaining(endtime);

		    daysSpan.innerHTML = t.days;
		    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
		    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
		    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

		    if (t.total <= 0) {
		      clearInterval(timeinterval);
		    }
		  }

		  updateClock();
		  var timeinterval = setInterval(updateClock, 1000);
		}

		var deadline = new Date(Date.parse("{{ landing()->schedule_close }}"));
		initializeClock('clockdiv', deadline);
    </script>
@stop

@section('konten')
	
	<!-- Mobile nav -->      
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
	    <div class="mobile_nav_close_button">
	    	<a href="" id="hideRight">
	    		<div data-icon="&#xe13f;" class="button_icon close_icon"></div>
	    	</a>
	    </div>
	    <nav id="mobile_menu_content">
	    	<a href="{{ route('landing.index') }}" >Beranda</a>
	    	<a href="#" data-toggle="modal" data-target="#syarat-ketentuan">Syarat &amp; Ketentuan</a>
	    </nav>
	</div>
	<!-- //Mobile nav -->

	<div id="preloader_container">
	    
	    <!-- Preloader Screen -->
		<header class="preloader_header">	 
	        <div class="preloader_loader">
	            <svg class="preloader_inner" width="60px" height="60px" viewBox="0 0 80 80">
	                <path class="preloader_loader_circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
	                <path id="preloader_loader_circle" class="preloader_loader_circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
	            </svg>
	        </div>
	    </header>
	    <!-- //Preloader Screen -->

	    <!-- Menu bar -->
		<header class="menu_bar">
			<div class="container">
				<a href="{{ route('landing.index') }}" class="go_to_home logo_dark logo">
					<img src="{{ asset('img/logo.png') }}" alt="Logo Hackathon" class="logo-menu" />
				</a>
				<nav class="menu_bar_navigation">
	  				<ul>
	  					<li class="visible-lg visible-md"><a href="{{ route('landing.index') }}" >Beranda</a></li>
	  					<li class="visible-lg visible-md">
	  						<a href="#"  data-toggle="modal" data-target="#syarat-ketentuan">
	  							Syarat &amp; Ketentuan
	  						</a>
	  					</li>
	  					<li class="hidden-lg hidden-md"><div class="mobile_nav_open_button "><a href="" id="showRight"><div data-icon="&#xe2f3;" class="button_icon close_icon"></div></a></div></li>
	  				</ul>
	  			</nav>
			</div>
		</header>
		<!-- // Menu bar -->

		@if(landing()->schedule_oprec <= date('Y-m-d'))

		<section id="cta_download" class="subsection background_color3">
			<div class="container">

				<style type="text/css">
					.btn.btn_with_icon {
						line-height: 1.5rem;
						padding-left:30px;
						padding-right:30px;
					}
					.btn.btn_with_icon h6 {
						line-height: .8;
						font-size: 1.5rem;
					}
				</style>
			
			    <!-- INTRO -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center cta_download_anim1 animated fadeInUp">
						<div class="intro" style="    margin-top: -15px;margin-bottom: -5px;">
							<h3><b>Sudah Punya</b> Akun ?</h3>
						</div>
					</div>
				</div>
				<!-- //INTRO -->
				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center">
						
						<div class="store_button cta_download_anim2 animated fadeInUp">
							<div class="btn btn_with_icon" onclick="location.href='#login'"
								data-toggle="modal" data-target="#login">
								<center>
									<div class="btn_content"><span>Klik Disini untuk</span>
									<h6>LOGIN</h6></div>
								</center>
							</div>
						</div>

						<style type="text/css">
							#clockdiv {
								font-size: 2rem;
							}
						</style>

						<div class="open-registrasi" style="margin-top: 0px;margin-bottom: 0;">
							<h5><b>Pendaftaran akan ditutup dalam :</b></h5>
							<div id="clockdiv">
								<div>
									<span class="days" style="font-size: 2rem;padding: 5px;width: 50px;"></span>
									<div class="smalltext" style="padding-top: 0px;font-size: 12px;">Hari</div>
								</div>
								<div>
									<span class="hours" style="font-size: 2rem;padding: 5px;width: 50px;"></span>
									<div class="smalltext" style="padding-top: 0px;font-size: 12px;">Jam</div>
								</div>
								<div>
									<span class="minutes" style="font-size: 2rem;padding: 5px;width: 50px;"></span>
									<div class="smalltext" style="padding-top: 0px;font-size: 12px;">Menit</div>
								</div>
								<div>
									<span class="seconds" style="font-size: 2rem;padding: 5px;width: 50px;"></span>
									<div class="smalltext" style="padding-top: 0px;font-size: 12px;">Detik</div>
								</div>
							</div>
						</div>
					
					</div>
				</div>				
			</div>		
		</section>

		<section id="registrasi" class="subsection background_color1">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 contact_form_container contact_anim1 animated fadeInUp">
						<h3>Formulir Registrasi</h3>
						<p>Silahkan lengkapi formulir berikut ini untuk mendaftarkan diri sebagai calon peserta.</p>

						<!-- Contact Form -->
						{!! Form::open(['id' => 'contact-form', 'method' => 'put']) !!}

							<div class="contact_form">
								<div class="input-field">
					  				{{ Form::text('nama_team', null, ['required']) }}
					  				{{ Form::label('nama_team', 'Nama Team') }}
					  			</div>
					  			<div class="input-field">
					  				{{ Form::email('email_team', null, ['required']) }}
					  				{{ Form::label('email_team', 'Email') }}
					  			</div>
					  			<div class="input-field">
					  				{{ Form::password('password', ['required']) }}
					  				{{ Form::label('password', 'Password (Kata Sandi)') }}
					  			</div>
					  			<div class="input-field">
					  				{{ Form::text('asal', null, ['required']) }}
					  				{{ Form::label('asal', 'Asal Instansi / Sekolah / Perguruan Tinggi') }}
					  			</div>
					  			<div class="input-field">
					  				{{ Form::textarea('alamat', null, ['class' => 'materialize-textarea', null, 'required']) }}
					  				{{ Form::label('alamat', 'Alamat (Basecamp)') }}
						  		</div>
				  			</div>	

				  			<h3>Personil Inti Team</h3>

				  			<div class="contact_form">
					  			<table class="table table-condensed table-bordered">
					  				<tr>
					  					<th rowspan="4" class="text-center">1</th>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('nama[1]', 'Nama Personil', ['class' => 'tabel mb0']) }}
					  							{{ Form::text('nama[1]', null, ['id' => 'nama[1]', 'class' => 'mb0 mt-10', 'required']) }}
					  						</div>
					  					</td>
					  				</tr>
					  				<tr>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('telepon[1]', 'Telepon Personil', ['class' => 'tabel mb0']) }}
					  							{{ Form::text('telepon[1]', null, ['id' => 'telepon[1]', 'class' => 'mb0 mt-10', 'required']) }}
					  						</div>
					  					</td>
					  				</tr>
					  				<tr>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('email[1]', 'Email Personil', ['class' => 'tabel mb0']) }}
					  							{{ Form::email('email[1]', null, ['id' => 'email[1]', 'class' => 'mb0 mt-10', 'required']) }}
					  						</div>
					  					</td>
					  				</tr>
					  				<tr>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('status[1]', 'Status Job', ['class' => 'tabel']) }}
					  							{{ Form::select('status[1]', statusJob(), null, ['id' => 'status[1]', 'class' => 'form-control', 'required']) }}
					  						</div>
					  					</td>
					  				</tr>
					  			</table>

					  			<table class="table table-condensed table-bordered">
					  				<tr>
					  					<th rowspan="4" class="text-center">2</th>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('nama[2]', 'Nama Personil', ['class' => 'tabel mb0']) }}
					  							{{ Form::text('nama[2]', null, ['id' => 'nama[2]', 'class' => 'mb0 mt-10']) }}
					  						</div>
					  					</td>
					  				</tr>
					  				<tr>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('telepon[2]', 'Telepon Personil', ['class' => 'tabel mb0']) }}
					  							{{ Form::text('telepon[2]', null, ['id' => 'telepon[2]', 'class' => 'mb0 mt-10']) }}
					  						</div>
					  					</td>
					  				</tr>
					  				<tr>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('email[2]', 'Email Personil', ['class' => 'tabel mb0']) }}
					  							{{ Form::text('email[2]', null, ['id' => 'email[2]', 'class' => 'mb0 mt-10']) }}
					  						</div>
					  					</td>
					  				</tr>
					  				<tr>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('status[2]', 'Status Job', ['class' => 'tabel']) }}
					  							{{ Form::select('status[2]', statusJob(), null, ['id' => 'status[2]', 'class' => 'form-control']) }}
					  						</div>
					  					</td>
					  				</tr>
					  			</table>

					  			<table class="table table-condensed table-bordered">
					  				<tr>
					  					<th rowspan="4" class="text-center">3</th>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('nama[3]', 'Nama Personil', ['class' => 'tabel mb0']) }}
					  							{{ Form::text('nama[3]', null, ['id' => 'nama[3]', 'class' => 'mb0 mt-10']) }}
					  						</div>
					  					</td>
					  				</tr>
					  				<tr>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('telepon[3]', 'Telepon Personil', ['class' => 'tabel mb0']) }}
					  							{{ Form::text('telepon[3]', null, ['id' => 'telepon[3]', 'class' => 'mb0 mt-10']) }}
					  						</div>
					  					</td>
					  				</tr>
					  				<tr>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('email[3]', 'Email Personil', ['class' => 'tabel mb0']) }}
					  							{{ Form::text('email[3]', null, ['id' => 'email[3]', 'class' => 'mb0 mt-10']) }}
					  						</div>
					  					</td>
					  				</tr>
					  				<tr>
					  					<td>
					  						<div class="mb0">
					  							{{ Form::label('status[3]', 'Status Job', ['class' => 'tabel']) }}
					  							{{ Form::select('status[3]', statusJob(), null, ['id' => 'status[3]', 'class' => 'form-control']) }}
					  						</div>
					  					</td>
					  				</tr>
					  			</table>
					  		</div>

				  			<div class="clearfix"></div>

				  			<div class="contact_form">
					  			<div class="input-field">
					  				<label>
										<input type="checkbox" class="check" name="setuju" required> Saya telah membaca dan telah menyetujui <a href="#" data-toggle="modal" data-target="#syarat-ketentuan"> syarat &amp; ketentuan</a>.
									</label>
					  			</div>
					  		</div>
				  			<br/><br/><br/>
				  			<button class="btn waves-effect waves-light" type="submit" name="action">Register</button>

						{!! Form::close() !!}
						<!-- //Contact Form -->

						<div id="message"><div id="alert"></div></div><!-- Message container --> 
					</div>
				
				
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 contact_anim2 animated fadeInUp">
						<h3>Persyarat Kompetisi</h3>
						
						<ul class="icon_list">
							@foreach(Persyaratan::all() as $temp)
							<li>
								<div data-icon="" class="icon_small float-left"></div>
								<h6>{!! $temp->label !!}</h6>
							</li>
							@endforeach
						</ul>

						<br/><br/><hr/><br/>
						<h3>Contact Info</h3>
						<ul class="icon_list">
							<li>
								<div data-icon="&#xe1b4;" class="icon_small float-left"></div>
								<h6>{{ landing()->address }}</h6>
							</li>
							<li>
								<div data-icon="&#xe23a;" class="icon_small float-left"></div>
								<h6>{{ landing()->phone }}</h6>
							</li>
							<li>
								<div data-icon="&#xe242;" class="icon_small float-left"></div>
								<h6><a href="mailto:{{ landing()->email }}">{{ landing()->email }}</a></h6>
							</li>
							<li>
								<h3>
									<div data-icon="&#xe1b4;" class="icon_small float-left" style="color: transparent;"></div>
									<a href="https://facebook.com/{{ landing()->facebook }}" class="facebook">
										<i class="fa fa-facebook-square"></i> &nbsp;&nbsp;
									</a>
									<a href="https://twitter.com/{{ landing()->twitter }}" class="twitter">
										<i class="fa fa-twitter"></i> &nbsp;&nbsp;
									</a>
									<a href="https://instagram.com/{{ landing()->instagram }}" class="instagram">
										<i class="fa fa-instagram"></i> &nbsp;&nbsp;
									</a>
									<a href="https://youtube.com/{{ landing()->youtube }}" class="youtube">
										<i class="fa fa-youtube"></i> 
									</a>
								</h3>
							</li>
						</ul>
					</div>
				</div>				
			</div>
		</section>

		@else

		<div class="open-registrasi">
			<h1><b>Open Registration</b></h1>
			<div id="clockdiv">
				<div>
					<span class="days"></span>
					<div class="smalltext">Hari</div>
				</div>
				<div>
					<span class="hours"></span>
					<div class="smalltext">Jam</div>
				</div>
				<div>
					<span class="minutes"></span>
					<div class="smalltext">Menit</div>
				</div>
				<div>
					<span class="seconds"></span>
					<div class="smalltext">Detik</div>
				</div>
			</div>
		</div>

		@endif

		<section id="footer" class="subsection">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p>Copyright © 2018 Kominfo Samarinda | The Enterwind Inc.<br class="visible-xs" /> All Right Reserved.</p>	
					</div>
				</div>				
			</div>
		</section>

	</div>

	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div >
						<img src="{{ asset('img/logo_home.png') }}" alt="Logo Hackathon Samarinda" class="logo-login" />
					</div>
					<form action="" method="post" autocomplete="off">
						<div class="contact_form form-login">
							<div class="form-group">
								{{ Form::label('email', 'Email', ['class' => 'tabel mb0']) }}
					  			{{ Form::email('email', null, ['class' => 'mt-10', 'required']) }}
					  			<p class="small mt-10 text-dangers" id="error-email"></p>
				  			</div>
				  			<div class="form-group">
				  				{{ Form::label('password', 'Password', ['class' => 'tabel mb0']) }}
					  			{{ Form::password('password', ['class' => 'mt-10', 'required']) }}
					  			<p class="small mt-10 text-dangers" id="error-password"></p>
				  			</div>
				  			<br/>
				  			<a class="btn btn-md btn-block waves-effect waves-light" onclick="login()" style="color:white">Login</a>
				  		</div>
				  	</form>
				</div>
			</div>
		</div>
	</div>

@stop