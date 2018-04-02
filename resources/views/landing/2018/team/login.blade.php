@extends('landing.2018.layouts.main')

@section('judul')
Login Page!
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
		@media (max-width: 479px) { 
			.menu_bar {
			    margin-top: 65px;
			}
			#hideRight {
				margin-top: -5px;
			}
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
	    	<a href="{{ route('landing.index') }}">Beranda</a>
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
	  					<li class="visible-lg visible-md"><a href="{{ route('landing.index') }}">Beranda</a></li>
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


		<h1 style="margin-top: 200px;margin-bottom: 200px" class="text-center">HALAMAN CHALLENGE</h1>






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