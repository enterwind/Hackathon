<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';

    protected $fillable = [
		'answer', 
		'question', 
        'order'
    ];
    
}
