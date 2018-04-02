<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $table = 'landing';

    protected $fillable = [
		'periode_id', 
		'header_image', 
		'slogan', 
		'sub_slogan', 
		'profile_video', 
		'profile_desc', 
		'term_condition', 
		'press_release', 
		'schedule_oprec', 
		'schedule_close', 
		'schedule_day', 
		'schedule_winner', 
		'address', 
		'phone', 
		'email', 
		'facebook', 
		'twitter', 
		'instagram', 
		'youtube'
    ];

    public function periode() 
    {
    	return $this->belongsTo('Periode', 'periode_id');
    }
    
}