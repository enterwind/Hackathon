@extends('landing.2018.layouts.main')

@section('judul')
Tutorial!
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
		#registrasi {
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
			width: 115%;
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
	  					<li class="visible-lg visible-md">
	  						<a href="#" data-toggle="modal" data-target="#login">
	  							Masuk
	  						</a>
	  					</li>
	  					<li class="hidden-lg hidden-md"><div class="mobile_nav_open_button "><a href="" id="showRight"><div data-icon="&#xe2f3;" class="button_icon close_icon"></div></a></div></li>
	  				</ul>
	  			</nav>
			</div>
		</header>
		<!-- // Menu bar -->


		<!-- TENTANG HACKATHON #################### -->
		<section id="tentang" class="menu_bar-waypoint subsection background_color2" style="margin-top: 70px">
			<div class="container">
			    <!-- INTRO -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center">
						<div class="intro">
							<h3>Tutorial Hackathon Samarinda</h3>
						</div>
					</div>
				</div>
				<!-- //INTRO -->
				
				<!-- Video -->
				<div class="row">
					@foreach(Tutorial::all() as $temp)
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="tentang_player">
								<iframe src="{{ $temp->video_url }}" width="100%" height="400" allowfullscreen></iframe>
								<h4 class="text-center"><b>{{ $temp->label }}</b></h4>
							</div>
						</div>
					@endforeach
				</div>
				<!-- //Video -->
									
			</div>		
		</section>
		<!-- //TENTANG HACKATHON -->




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
@stop