<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = 'team_pengalaman';

    protected $fillable = [
		'team_id', 
		'keterangan', 
		'file'
    ];

    public function team() 
    {
    	return $this->belongsTo('Team', 'team_id');
    }
}