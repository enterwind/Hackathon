<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */
/*
|--------------------------------------------------------------------------
| Landing Routes
|-------------------------------------------------------------------------- */
Route::group(['domain' => env('EW_SITE'), 'namespace' => 'Landing'], function() {
	
	Route::get('/', 'IndexController@index')->name('landing.index');

	Route::get('tutorial', 'IndexController@tutorial')->name('landing.tutorial');

	Route::get('news', 'NewsController@index')->name('landing.news.index');
	Route::get('news/{slug?}', 'NewsController@detail')->name('landing.news.detail');

	Route::get('register', 'RegisterController@index')->name('landing.team.register');
	Route::put('register', 'RegisterController@process');

	Route::get('login', 'TeamController@login')->name('landing.team.login');
	Route::post('login', 'TeamController@process');
	Route::get('logout', 'TeamController@logout')->name('landing.team.logout');

	Route::group(['middleware' => ['twostep']], function() {
		
		Route::get('dashboard', 'TeamController@dashboard')->name('landing.team.dashboard');

		Route::get('challenge', 'TeamController@challenge')->name('landing.team.challenge');
		Route::post('challenge', 'TeamController@sendCode');

		Route::get('profile', 'TeamController@profile')->name('landing.team.profile');
		Route::put('profile', 'TeamController@updateProfile');
		Route::get('password', 'TeamController@password')->name('landing.team.password');
		Route::put('password', 'TeamController@updatePassword');
		
		Route::get('peserta', 'TeamController@peserta')->name('landing.team.peserta');
		Route::get('peserta/{id?}/edit', 'TeamController@editPeserta')->name('landing.team.peserta.edit');
		Route::put('peserta/{id?}/edit', 'TeamController@updatePeserta');
		
		Route::get('pengalaman', 'TeamController@pengalaman')->name('landing.team.pengalaman');
		Route::get('pengalaman/tambah', 'TeamController@tambahPengalaman')->name('landing.team.pengalaman.tambah');
		Route::post('pengalaman/tambah', 'TeamController@simpanPengalaman');
		Route::delete('pengalaman/{id?}/hapus', 'TeamController@hapusPengalaman')->name('landing.team.pengalaman.hapus');

		Route::get('cetak', 'TeamController@cetak')->name('landing.team.cetak');
	});

	Route::get('verify/{code?}', 'TeamController@verify')->name('landing.team.verify');

});

/*
|--------------------------------------------------------------------------
| Epanel Routes
|-------------------------------------------------------------------------- */
Route::group(['prefix' => 'epanel', 'namespace' => 'Epanel'], function() {

	Route::get('/', 'IndexController@index')->name('epanel.index');

	Route::get('login', 'AuthController@login')->name('epanel.login');
	Route::put('login', 'AuthController@process');
	Route::get('logout', 'AuthController@logout')->name('epanel.logout');

	Route::get('profile', 'ConfigController@profile')->name('epanel.profile');
	Route::put('profile', 'ConfigController@updateProfile');

	Route::get('password', 'ConfigController@password')->name('epanel.password');
	Route::put('password', 'ConfigController@updatePassword');

	Route::get('setting', 'ConfigController@setting')->name('epanel.setting');
	Route::put('setting', 'ConfigController@updateSetting');

	Route::get('landing', 'ConfigController@landing')->name('epanel.landing');
	Route::put('landing', 'ConfigController@updateLanding');

	Route::get('syarat', 'ConfigController@syarat')->name('epanel.syarat');
	Route::put('syarat', 'ConfigController@updateSyarat');

	Route::get('press', 'ConfigController@press')->name('epanel.press');
	Route::put('press', 'ConfigController@updatePress');

	Route::group(['namespace' => 'Module', 'as' => 'epanel.'], function() {
		Route::resources([
			'peserta' => 'PesertaController',
			'faq' => 'FaqController',
			'juri' => 'JuriController',
			'periode' => 'PeriodeController',
			'persyaratan' => 'PersyaratanController',
			'prize' => 'PrizeController',
			'procedure' => 'ProcedureController',
			'sponsor' => 'SponsorController', 
			'tutorial' => 'TutorialController'
		]);
	});
});