<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Team extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'team';

    protected $fillable = [
		'nama', 
		'email', 
        'password', 
		'plain', 
		'asal', 
		'alamat', 
		'status', 
        'easter_egg',
		'tgl_konek'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function peserta() 
    {
    	return $this->hasMany('Peserta', 'team_id');
    }

    public function pengalaman() 
    {
        return $this->hasMany('Pengalaman', 'team_id');
    }
}