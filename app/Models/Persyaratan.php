<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    protected $table = 'persyaratan';

    protected $fillable = [
		'label', 
		'status'
    ];

    public function scopeStatus($query, $status) 
    {
    	return $query->whereStatus($status);
    }
    
}