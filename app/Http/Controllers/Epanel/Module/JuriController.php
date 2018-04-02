<?php

/* Author : Noviyanto Rachmady 
 * E-mail : novay@about.me
 * Copyright 2017 EnterWind Co. */

namespace App\Http\Controllers\Epanel\Module;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File, Image;
use Juri;

class JuriController extends Controller 
{
    public function __construct(Juri $data) 
    {
        $this->middleware('auth');
    
        $this->data = $data;
    }
    
    public function index(Request $request) 
    {
        # Tampilkan seluruh data berurutan
        $data = $this->data->latest()->get();

        # Tampilkan View
        return view('epanel.modules.juri.index', compact('data'));
    }

    public function create() 
    {
        return view('epanel.modules.juri.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'foto' => 'required|mimes:jpg,jpeg,png',
            'nama' => 'required',
            'profesi' => 'required'
        ]);

        $data = $request->all();

        if($request->hasFile('foto')):
            $direktori = public_path().'/upload/juri/';
            makeImgDirectory($direktori);
            $file = $request->file('foto');
            $nama = str_slug($request->nama) . str_random(5) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save($direktori . $nama);
            $data['foto'] = $nama;
        endif;

        $this->data->create($data);

        notify()->flash('Data Juri berhasil ditambah!', 'success');
        return redirect(route('epanel.juri.index'));
    }

    public function show($id) 
    {
        return abort(404);
    }

    public function edit($id) 
    {
        $edit = $this->data->find($id);

        return view('epanel.modules.juri.edit', compact('edit'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'foto' => 'required|mimes:jpg,jpeg,png',
            'nama' => 'required',
            'profesi' => 'required'
        ]);

        $data = $request->all();

        if($request->hasFile('foto')):
            $direktori = public_path().'/upload/juri/';
            makeImgDirectory($direktori);
            if(File::exists($direktori . $this->data->findOrFail($id)->foto)):
                File::delete($direktori . $this->data->findOrFail($id)->foto);
            endif;
            $file = $request->file('foto');
            $nama = str_slug($request->label) . str_random(5) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save($direktori . $nama);
            $data['foto'] = $nama;
        endif;
        
        $this->data->findOrFail($id)->update($data);

        notify()->flash('Data Juri berhasil diubah!', 'success');
        return redirect(route('epanel.juri.index'));
    }

    public function destroy(Request $request, $id) 
    {
        $direktori = public_path().'/upload/juri/';

        if($request->has('pilihan')):

            foreach($request->pilihan as $temp):
                $each = $this->data->find($temp);
                if(File::exists($direktori . $each->foto)):
                    File::delete($direktori . $each->foto);
                endif;
                $each->delete();
            endforeach;

            notify()->flash('Beberapa data berhasil dihapus sekaligus!', 'success');
            return redirect()->back();

        endif;

        $satu = $this->data->find($id);
        if(File::exists($direktori . $satu->foto)):
            File::delete($direktori . $satu->foto);
        endif;
        $satu->delete();
        
        return 'success';
    }
}
