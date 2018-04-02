<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'team_peserta';

    protected $fillable = [
		'team_id', 
        'foto', 
		'nama', 
		'telp', 
		'email', 
		'status', 
		'leader'
    ];

    public function team() 
    {
    	return $this->belongsTo('Team', 'team_id');
    }
}