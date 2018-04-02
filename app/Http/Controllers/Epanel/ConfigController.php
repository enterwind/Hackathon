<?php

namespace App\Http\Controllers\Epanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use File, Image;

class ConfigController extends Controller {

    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function profile() 
    {
        $data = auth()->user();
        return view('epanel.config.profile', compact('data'));
    }

    public function updateProfile(Request $request) 
    {
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required|unique:users,username,'.auth()->user()->id,
        ]);

        $data = $request->all();
        
        if($request->has('password')):
            $data['password'] = bcrypt($request->password);
            $data['plain'] = $request->password;
        else:
            $data['password'] = auth()->user()->password;
            $data['plain'] = auth()->user()->plain;
        endif;

        auth()->user()->update($data);
        
        notify()->flash('Informasi akun berhasil diubah!', 'success');
        return redirect()->back();
    }

    public function password() 
    {
        $data = auth()->user();
        return view('epanel.config.password', compact('data'));
    }

    public function updatePassword(Request $request) 
    {
        # Validasi
        $this->validate($request, [
            'old_password' => 'required|old_password:'.auth()->user()->password,
            'new_password' => 'required|min:5|different:old_password',
            'new_password_confirmation' => 'required|same:new_password',
        ]);
    
        # Kondisi
        if($request->has('new_password')):
            $password = bcrypt($request->new_password);
            $plain = $request->new_password;
        else:
            $password = auth()->user()->password;
            $plain = auth()->user()->plain;
        endif;
    
        # Store data into database
        $ubah = auth()->user();
        $ubah->password = $password;
        $ubah->plain = $plain;
        $ubah->save();
    
        # Notify Alert
        notify()->flash('Perubahan sandi berhasil!', 'success');
        return redirect()->back();
    }

    public function setting() 
    {
        return view('epanel.config.setting');
    }

    public function updateSetting(Request $request) 
    {
        $this->validate($request, [
            'slogan' => 'required',
            'sub_slogan' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required'
        ]);

        landing()->update($request->all());        
        notify()->flash('Informasi umum berhasil diubah!', 'success');
        return redirect()->back();
    }

    public function landing() 
    {
        $data = auth()->user();
        return view('epanel.config.landing', compact('data'));
    }

    public function updateLanding(Request $request) 
    {
        $this->validate($request, [
            'header_image' => 'mimes:jpg,jpeg,png', 
            'profile_video' => 'required', 
            'profile_desc' => 'required', 
            'schedule_oprec' => 'required', 
            'schedule_close' => 'required', 
            'schedule_day' => 'required', 
            'schedule_winner' => 'required', 
        ]);

        $data = $request->all();
        
        $data['schedule_oprec'] = date('Y-m-d', strtotime($request->schedule_oprec));
        $data['schedule_close'] = date('Y-m-d', strtotime($request->schedule_close));
        $data['schedule_day'] = date('Y-m-d', strtotime($request->schedule_day));
        $data['schedule_winner'] = date('Y-m-d', strtotime($request->schedule_winner));

        if($request->hasFile('header_image')):
            $direktori = public_path().'/upload/';
            $file = $request->file('header_image');
            $nama = 'header_image' . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save($direktori . $nama);
            $data['header_image'] = $nama;
        else:
            $data['header_image'] = landing()->header_image;
        endif;

        landing()->update($data);
        
        notify()->flash('Informasi Landing Page berhasil diubah!', 'success');
        return redirect()->back();
    }

    public function syarat() 
    {
        $data = auth()->user();
        return view('epanel.config.syarat', compact('data'));
    }

    public function updateSyarat(Request $request) 
    {
        $this->validate($request, [
            'term_condition' => 'required'
        ]);

        $data = $request->all();
        landing()->update($data);
        
        notify()->flash('Informasi syarat dan ketentuan berhasil diubah!', 'success');
        return redirect()->back();
    }

    public function press() 
    {
        $data = auth()->user();
        return view('epanel.config.press', compact('data'));
    }

    public function updatePress(Request $request) 
    {
        $this->validate($request, [
            'press_release' => 'required'
        ]);

        $data = $request->all();
        landing()->update($data);
        
        notify()->flash('Informasi Press Release berhasil diubah!', 'success');
        return redirect()->back();
    }

}