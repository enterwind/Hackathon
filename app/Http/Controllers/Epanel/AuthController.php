<?php

namespace App\Http\Controllers\Epanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller {

    public function __construct() 
    {
        $this->middleware('auth', ['except' => ['login', 'process']]);
        $this->middleware('guest', ['only' => ['login', 'process']]);
    }

    public function login() 
    {
        return view('epanel.login');
    }

    public function process(Request $request) 
    {
        $v = validator()->make($request->all(), [
            'username' => 'required|min:3',
            'password' => 'required|min:3'
        ]);

        if($v->fails()):

            notify()->flash('Mohon periksa kembali inputan anda!', 'error');
            return redirect()->back()->withInput()->withErrors($v);

        else:
            
            $verifikasi = [
                'username' => $request->username, 
                'password' => $request->password
            ];
            
            if(auth()->attempt($verifikasi)):
                return redirect(route('epanel.index'));
            endif;
            
            notify()->flash('Username dan Password tidak valid!', 'error');
            return redirect()->back()->withInput();

        endif;
    }

    public function logout() 
    {
        auth()->logout();
        session()->flush();
        
        return redirect(route('epanel.login'));
    }

}