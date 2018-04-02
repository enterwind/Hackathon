<?php

namespace App\Http\Controllers\Epanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller {

    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index() 
    {
    	$data = null;
        return view('epanel.index', compact('data'));
    }

}