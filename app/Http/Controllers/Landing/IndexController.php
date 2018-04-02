<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	protected $tahun;

    public function __construct() 
    {
    	$this->tahun = '2018';
    }

    public function index() 
    {
    	return view("landing.{$this->tahun}.index");
    }

    public function tutorial() 
    {
        return view("landing.{$this->tahun}.tutorial");
    }

}