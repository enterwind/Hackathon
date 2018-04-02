@extends('epanel.layouts.main')

@section('css')
	<link rel="stylesheet" href="{{ asset('backend/css/separate/pages/files.min.css') }}">
	<style type="text/css">
		.files-manager-side {
			height: 640px!important
		}
	</style>
@stop

@section('js')
	@yield('js-extra')
@stop

@section('content')
<section class="box-typical files-manager">
	<nav class="files-manager-side">
	<header class="files-manager-side-title">PENGATURAN</header>
		<ul class="files-manager-side-list">
			<li><a href="{{ route('epanel.profile') }}" class="@yield('profile')">Profil</a></li>
			<li><a href="{{ route('epanel.password') }}" class="@yield('password')">Ubah Password</a></li>
			<li><a href="{{ route('epanel.setting') }}" class="@yield('setting')">Sistem</a></li>
			<li><a href="{{ route('epanel.syarat') }}" class="@yield('syarat')">Syarat &amp; Ketentuan</a></li>
			<li><a href="{{ route('epanel.press') }}" class="@yield('press')">Press Release</a></li>
			<li><a href="{{ route('epanel.landing') }}" class="@yield('landing')">Landing Page</a></li>
		</ul>
	</nav>
	<div class="files-manager-panel">
		<div class="files-manager-panel-in">
			<header class="files-manager-header">
				<h5 class="text-center" style="margin:5px"><b>@yield('title')</b></h5>
			</header>
			<div class="files-manager-content" style="padding: 50px 100px;">
				@yield('form')
			</div>
		</div>
	</div>
</section>
@stop