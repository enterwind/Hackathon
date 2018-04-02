<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Database\Eloquent\Model;

class Juri extends Model
{
    protected $table = 'juri';

    protected $fillable = [
		'foto', 
		'nama', 
		'profesi', 
		'facebook', 
		'twitter', 
		'instagram'
    ];
    
}
