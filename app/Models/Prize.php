<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    protected $table = 'prize';

    protected $fillable = [
		'icon', 
		'label', 
		'desc', 
		'order'
    ];
}