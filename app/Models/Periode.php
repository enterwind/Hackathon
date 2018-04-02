<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';

    protected $fillable = [
		'tahun', 
		'status'
    ];

    public function scopeActive($query) 
    {
    	return $query->whereStatus(1)->first();
    }
    
}