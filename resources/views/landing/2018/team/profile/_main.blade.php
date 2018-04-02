@extends('landing.2018.team._main')

@section('mProfile')
active
@stop

@section('isi')

	<style type="text/css">
		.icon_list {
			margin-top: 40px;
			padding-left: 0
		}
		.icon_list li h4 {
			margin: 0;
			font-weight: 400;
		}
		.icon_list li h4.active {
			font-weight: 600;
		}
	</style>

	<section id="registrasi" class="subsection background_color1" style="margin-top: 70px">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<ul class="icon_list">
						<li>
							<h4 class="@yield('sProfil')">
								<a href="{{ route('landing.team.profile') }}">PROFIL TIM</b></a>
							</h4>
						</li>
						<li>
							<h4 class="@yield('sAnggotaTim')">
								<a href="{{ route('landing.team.peserta') }}">ANGGOTA TIM</b></a>
							</h4>
						</li>
						<li>
							<h4 class="@yield('sPengalaman')">
								<a href="{{ route('landing.team.pengalaman') }}">PENGALAMAN</b></a>
							</h4>
						</li>
						<li>
							<h4 class="@yield('sUbahPassword')">
								<a href="{{ route('landing.team.password') }}">UBAH PASSWORD</b></a>
							</h4>
						</li>
					</ul>
				</div>

				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 contact_form_container">
					
					@yield('isi-profile')
					
				</div>
			
			
			</div>				
		</div>
	</section>

@stop