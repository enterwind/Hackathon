<?php

Route::group(['prefix' => 'v1'], function () {

	Route::get('hackathon', function() {	
		if(!request()->has('verify'))
			return abort(404);

        $kode = request()->verify;
        if(\Team::whereEasterEgg($kode)->first()):
        	return 'success';
        else:
        	return 'failed';
        endif;
    });

});