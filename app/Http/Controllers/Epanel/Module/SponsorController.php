<?php

/* Author : Noviyanto Rachmady 
 * E-mail : novay@about.me
 * Copyright 2017 EnterWind Co. */

namespace App\Http\Controllers\Epanel\Module;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File, Image;
use Sponsor;

class SponsorController extends Controller 
{
    public function __construct(Sponsor $data) 
    {
        $this->middleware('auth');
    
        $this->data = $data;
    }
    
    public function index(Request $request) 
    {
        # Tampilkan seluruh data berurutan
        $data = $this->data->latest()->get();

        # Tampilkan View
        return view('epanel.modules.sponsor.index', compact('data'));
    }

    public function create() 
    {
        return view('epanel.modules.sponsor.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'label' => 'required',
            'url' => 'required',
            'jenis' => 'required',
            'logo' => 'required|mimes:jpg,pge,png'
        ]);

        $data = $request->all();

        if($request->hasFile('logo')):
            $direktori = public_path().'/upload/sponsor/';
            makeImgDirectory($direktori);
            $file = $request->file('logo');
            $nama = str_slug($request->label) . str_random(5) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save($direktori . $nama);
            $data['logo'] = $nama;
        endif;

        $this->data->create($data);

        notify()->flash('Data Sponsor berhasil ditambah!', 'success');
        return redirect(route('epanel.sponsor.index'));
    }

    public function show($id) 
    {
        return abort(404);
    }

    public function edit(Request $request, $id) 
    {
        $edit = $this->data->find($id);

        return view('epanel.modules.sponsor.edit', compact('edit'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'label' => 'required',
            'url' => 'required',
            'jenis' => 'required',
            'logo' => 'mimes:jpg,pge,png'
        ]);

        $data = $request->all();
        
        if($request->hasFile('logo')):
            $direktori = public_path().'/upload/sponsor/';
            makeImgDirectory($direktori);
            if(File::exists($direktori . $this->data->findOrFail($id)->logo)):
                File::delete($direktori . $this->data->findOrFail($id)->logo);
            endif;
            $file = $request->file('logo');
            $nama = str_slug($request->label) . str_random(5) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save($direktori . $nama);
            $data['logo'] = $nama;
        endif;
        $this->data->findOrFail($id)->update($data);

        notify()->flash('Data Sponsor berhasil diubah!', 'success');
        return redirect(route('epanel.sponsor.index'));
    }

    public function destroy(Request $request, $id) 
    {
        $direktori = public_path().'/upload/sponsor/';

        if($request->has('pilihan')):

            foreach($request->pilihan as $temp):
                $each = $this->data->find($temp);
                if(File::exists($direktori . $each->logo)):
                    File::delete($direktori . $each->logo);
                endif;
                $each->delete();
            endforeach;

            notify()->flash('Beberapa data berhasil dihapus sekaligus!', 'success');
            return redirect()->back();

        endif;

        $satu = $this->data->find($id);
        if(File::exists($direktori . $satu->logo)):
            File::delete($direktori . $satu->logo);
        endif;
        $satu->delete();
        
        return 'success';
    }

}
