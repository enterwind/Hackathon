@extends('landing.2018.layouts.main')

@section('judul')
Selamat Datang di Samarinda Hackathon!
@stop

@section('css')
<style type="text/css">
		.logo-login {
			margin: 0 auto;
		    width: 100%;
		    padding: 0 125px;
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

<style type="text/css">
	.feature_content img {
		width: 200px;
    	margin-bottom: 30px;
	}
</style>

	<!-- Mobile nav -->      
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
	    <div class="mobile_nav_close_button">
	    	<a href="" id="hideRight">
	    		<div data-icon="&#xe13f;" class="button_icon close_icon"></div>
	    	</a>
	    </div>
	    <nav id="mobile_menu_content">
	    	<a href="#tentang" >About</a>
	    	<a href="#prize" >Prize</a>
	    	<a href="#prosedur" >Procedure</a>
	    	<a href="#juri" >Judges</a>
	    	<a href="#api_samarinda" >API</a>
	    	<a href="#contact" >Contact</a>
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
	
	
		<!-- Fullscreen homepage -->
		<section class="hero_fullscreen background_single menu_bar-waypoint" 
			data-animate-down="menu_bar-hide" data-animate-up="menu_bar-hide" id="home">

			<!-- Logo and navigation -->
		  	<div class="container top_bar" >
		  		<div class="row">
		  			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center home_anim1">
		  				<img src="{{ asset('img/logo_home.png') }}" alt="Logo Hackathon Samarinda" class="logo_home"/>
		  			</div>
		  		</div>
			</div>
			<!-- //Logo and navigation -->


			<!-- Main content -->
		  	<div class="container align-center" id="main_content">
				<div class="content_container row" >
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 home_content">
					
						<div class="available_area home_anim2">
							<h2 class="slogan">{{ landing()->slogan }}</h2>
						</div>

						<h2 class="home_anim3">{{ landing()->sub_slogan }}</h2>
						
						<div class="cta_button_area home_anim4">
							<div>
								<a class="btn" href="{{ route('landing.team.register') }}">DAFTARKAN TIM ANDA</a>
							</div>
							<br/>
							<a href="#" data-toggle="modal" data-target="#syarat-ketentuan">
								*Syarat &amp; Ketentuan Berlaku
							</a>
						</div>
									
					</div>
				</div>			
			</div>  
			<!-- //Main content -->
			
			<!-- Single Image Background -->
			<div id="maximage_single">
				<img src="{{ asset('upload/'.landing()->header_image) }}" alt=""/>
			</div>
			<!-- //Single Image Background -->	
		</section>
		<!-- //Homepage -->

		<!-- Menu bar -->
		<header id="menu_bar" class="menu_bar">
			<div class="container">
				<a href="" class="go_to_home logo_dark logo">
					<img src="{{ asset('img/logo.png') }}" alt="Logo Hackathon" class="logo-menu" />
				</a>
				<nav class="menu_bar_navigation">
	  				<ul>
	  					<li class="visible-lg visible-md"><a href="#tentang" >About</a></li>
	  					<li class="visible-lg visible-md"><a href="#prize" >Prize</a></li>
	  					<li class="visible-lg visible-md"><a href="#prosedur" >Procedure</a></li>
	  					<li class="visible-lg visible-md"><a href="#juri" >Judges</a></li>
	  					<li class="visible-lg visible-md"><a href="#api_samarinda" >API</a></li>
	  					<li class="visible-lg visible-md"><a href="#contact" >Contact</a></li>
	  					<li class="hidden-lg hidden-md"><div class="mobile_nav_open_button "><a href="" id="showRight"><div data-icon="&#xe2f3;" class="button_icon close_icon"></div></a></div></li>
	  				</ul>
	  			</nav>
			</div>
		</header>
		<!-- // Menu bar -->
		
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

		<!-- TENTANG HACKATHON #################### -->
		<section id="tentang" class="menu_bar-waypoint subsection background_color2" data-animate-down="menu_bar-show" data-animate-up="menu_bar-hide">
			<div class="container">
			    <!-- INTRO -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center tentang_anim1">
						<div class="intro">
							<h3>Tentang Hackathon Samarinda</h3>
							<p>{{ landing()->profile_desc }}</p>
						</div>
					</div>
				</div>
				<!-- //INTRO -->
				
				<!-- Video -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 align-center tentang_anim2">
						<div class="tentang_player">
							<iframe src="https://www.youtube.com/embed/afJuNVDmB8w" width="500" height="281"></iframe>
						</div>
					</div>
				</div>
				<!-- //Video -->
									
			</div>		
		</section>
		<!-- //TENTANG HACKATHON -->

		<!-- PRIZE #################### -->
		<section id="prize" class="subsection">
			<div class="container">
			
			    <!-- INTRO -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center prize_anim1">
						<div class="intro">
							<h3>Prize</h3>
							<h5>Dapatkan kesempatan menang beragam hadiah menarik!</h5>
						</div>
					</div>
				</div>
				<!-- //INTRO -->
				
				<div class="row">
					<br/><br/>
					@foreach(Prize::all() as $temp)
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 align-center prize_anim2">
						<img src="{{ asset('upload/prize/'.$temp->icon) }}" class="img_responsive icon-prize" alt="{{ $temp->label }}">
						<div class="prize_member_info">
							<h4>{{ $temp->label }}</h4>
							<h6>{{ $temp->desc }}</h6>
						</div>
					</div>
					@endforeach
					
				</div>
			</div>		
		</section>
		<!-- //PRIZE -->		

		<!-- PROCEDURE #################### -->
		<section id="prosedur" class="subsection background_color2">
			<div class="container">
			
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center prosedur_anim1">
						<div class="intro">
							<h3>Procedure</h3>
							<h5>Pahami <b>Step by Step</b> untuk mendaftarkan diri sebagai calon peserta</h5>
						</div>
					</div>
				</div>

				<div class="row">

					@foreach(Procedure::all() as $temp)
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 align-center prosedur_anim2">
						<div class="feature_content">
							<img src="{{ asset('upload/procedure/'.$temp->icon) }}" alt="{{ $temp->label }}" width="100%">
							<h6>{{ $temp->label }}</h6>
							<p>{{ $temp->desc }}</p>
						</div>
					</div>
					@endforeach

				</div>
									
			</div>		
		</section>
		<!-- //PROCEDURE -->

		<section id="cta_download" class="subsection background_color3">
			<div class="container">
			
			    <!-- INTRO -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center cta_download_anim1 animated fadeInUp">
						<div class="intro">
							<h3>
								<small>Butuh Informasi Tambahan ?</small><br/>
								<b>Buka Halaman</b> Tutorial!
							</h3>
						</div>
					</div>
				</div>
				<!-- //INTRO -->

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
				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center">
						
						<div class="store_button cta_download_anim2 animated fadeInUp">
							<div class="btn btn_with_icon" onclick="location.href='{{ route('landing.tutorial') }}'">
								<center>
									<div class="btn_content">
										<span>Klik Disini</span>
										<h6>TUTORIAL</h6>
									</div>
								</center>
							</div>
						</div>
					
					</div>
				</div>				
			</div>		
		</section>
		
		<!-- JUDGES #################### -->
		<section id="juri" class="subsection background_color1">
			<div class="container">
			    <!-- INTRO -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center juri_pranim1">
						<div class="intro">
							<h3>The Judges</h3>
							<h5>Mereka yang akan memberikan penilaian untuk Anda</h5>
						</div>
					</div>
				</div>
			    <!-- //INTRO -->	
				
				<div class="row">

					@foreach(Juri::all() as $temp)
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 align-center prize_anim3 animated fadeInLeft">
						<img src="{{ asset('upload/juri/'.$temp->foto) }}" class="img_responsive" alt="" width="275">
						<div class="prize_member_info">
							<h4>{!! $temp->nama !!}</h4>
							<h6>{!! $temp->profesi !!}</h6>
						</div>
						<div class="social_icons_container align-center">
						  	<div class="social_icons">
				                <ul>
				                    <li>
				                    	<a href="https://facebook.com/{{ $temp->facebook }}" target="_blank">
				                    		<i class="fa fa-facebook-square"></i>
				                    	</a>
				                    </li>
				                    <li>
				                    	<a href="https://twitter.com/{{ $temp->twitter }}" target="_blank">
				                    		<i class="fa fa-twitter"></i>
				                    	</a>
				                    </li>
				                    <li>
				                    	<a href="https://instagram.com/{{ $temp->instagram }}" target="_blank">
				                    		<i class="fa fa-instagram"></i>
				                    	</a>
				                    </li>
				                </ul>
						    </div>
					    </div>
					</div>
					@endforeach

				</div>		
									
			</div>		
		</section>
		<!-- //JUDGES -->

        <!-- SEKILASI API SAMARINDA #################### -->
		<section id="api_samarinda" class="subsection background_color3">
			<div class="container">
			
				<!-- INTRO -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center api_samarinda_anim1">
						<div class="intro">
							<h3>Sekilas Samarinda API</h3>
							<h5>Samarinda API adalah sebuah layanan yang menyediakan informasi data yang ada di lingkungan Pemerintah Kota Samarinda. Data-data ini mencakup segala bidang yang ada di Kota Samarinda. Dengan adanya Samarinda API ini, diharapkan para developer dapat fokus dalam pengembangan aplikasi mobile atau website menggunakan API yang telah kami sediakan.</h5>
						</div>
					</div>
				</div>
				<!-- //INTRO -->
				
				
				<!-- Feature 1 - right image -->
				<div class="row feature_box" id="feature1">
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 align-center api_samarinda_anim2">
						<div class="feature_content">
							<h6>Integrated</h6>
							<p class="o1">Kami berupaya untuk mengintegrasikan seluruh data yang ada dilingkungan pemerintah kota kedalam satu platform.</p>

							<h6>Easy to Use</h6>
							<p class="o1">Dikemas dengan dokumentasi yang lengkap sehingga para pelaku industri kreatif ini mudah untuk memanfaatkannya.</p>

							<h6>Laravel Friendly</h6>
							<p class="o1">Untuk memudahkan, kami menyediakan sebuah package untuk para pengembang Laravel dan PHP. Untuk bahasa program lain akan segera menyusul.</p>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 align-center api_samarinda_anim3">
						<div class="feature_image">
							<img src="img/api-samarinda.png" alt="" class="img_responsive img-api">
						</div>
					</div>	
				</div>
				<!-- //Feature 1 - right image -->
			</div>		
		</section>
		<!-- //SEKILASI API SAMARINDA -->
		
		<!-- SPONSOR #################### -->
		<section id="contact" class="subsection background_color1 pb0">
			<div class="container">

				@foreach(kerjaSama() as $i => $temp)

				@if(Sponsor::whereJenis($i)->count())
			
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center">
						<div class="intro">
							<h6>{{ $temp }}</h6>
						</div>
					</div>
				</div>
				
				<div class="row">
					@foreach(Sponsor::whereJenis($i)->get() as $temp)
					<div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 juri_logo ">
						<a href="{{ $temp->url }}" target="_blank">
							<img src="{{ asset('upload/sponsor/'.$temp->logo) }}" alt="{{ $temp->label }}">
						</a>
					</div>
					@endforeach
				</div>
				<br/>

				@endif

				@endforeach
					
			</div>
		</section>
		<!-- //SPONSOR-->
		
		<!-- Contact #################### -->
		<section id="contact" class="subsection background_color1 pt0">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 jadwal contact_anim1" >
						<div class="intro">
							<h3>Schedule</h3>
						</div>

						<h5>OPEN REGISTRATION &amp; SUBMITION</h5>
						<p>{{ tgl_indo(landing()->schedule_oprec) }} s/d {{ tgl_indo(landing()->schedule_close) }}</p>

						<h5>HACKATHON DAY &amp; GRAND FINAL</h5>
						<p>{{ tgl_indo(landing()->schedule_day) }}</p>

						<h5>WINNER ANNOUNCEMENT</h5>
						<p>{{ tgl_indo(landing()->schedule_winner) }}</p>

					</div>
				
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 contact_anim2">
						<div class="intro">
							<h3>Contact Info</h3>
						</div>
						<ul class="icon_list" style="padding-left: 0">
							<li>
								<div data-icon="&#xe1b4;" class="icon_small float-left"></div>
								<h6>{!! landing()->address !!}</h6>
							</li>
							<li>
								<div data-icon="&#xe23a;" class="icon_small float-left"></div>
								<h6>{!! landing()->phone !!}</h6>
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
		<!-- //Contact -->
		
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