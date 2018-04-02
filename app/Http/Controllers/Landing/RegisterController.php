<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Team, Peserta;
use Auth;

class RegisterController extends Controller
{
	protected $tahun;
	
    public function __construct(Team $team, Peserta $peserta) 
    {
    	$this->tahun = '2018';

        $this->team = $team;
        $this->peserta = $peserta;
    }

    public function index() 
    {
    	return view("landing.{$this->tahun}.register");
    }

    public function process(Request $request) 
    {
        $this->validate($request, [
            'nama_team' => 'required',
            'email_team' => 'required', 
            'password' => 'required|min:5', 
            'asal' => 'required', 
            'alamat' => 'required', 
            'setuju' => 'required'
        ]);

        $team = $this->team->create([
            'nama' => $request->nama_team, 
            'email' => $request->email_team, 
            'password' => bcrypt($request->password), 
            'plain' => $request->password, 
            'asal' => $request->asal, 
            'alamat' => $request->alamat, 
            'status' => 0, 
            'easter_egg' => base64_encode(str_random(20))
        ]);


        foreach($request->nama as $i => $temp) 
        {
            $this->peserta->create([
                'team_id' => $team->id, 
                'nama' => $temp, 
                'telp' => $request->telepon[$i], 
                'email' => $request->email[$i], 
                'status' => $request->status[$i], 
                'leader' => $i == 1 ? 1 : 0
            ]);
        }

        Auth::guard('team')->login($team);

        $cek = Auth::guard('team')->check();
        if($cek) {
            return redirect()->route('landing.team.dashboard');    
        } else {
            notify()->flash('Login Otomatis tidak berhasil, coba gunakan form login diatas.', 'error');
            return redirect()->back();
        }
    }

}