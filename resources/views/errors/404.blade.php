@extends('landing.2018.layouts.main')

@section('judul')
Selamat Datang di Samarinda Hackathon!
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
							<h2 class="slogan">404 NOT FOUND</h2>
						</div>

						<h2 class="home_anim3">Sepertinya Anda Tersesat!</h2>
						
						<div class="cta_button_area home_anim4">
							<div>
								<a class="btn" href="{{ route('landing.index') }}">KEMBALI</a>
							</div>
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
	</div>

@stop