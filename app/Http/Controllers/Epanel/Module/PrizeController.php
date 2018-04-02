<?php

/* Author : Noviyanto Rachmady 
 * E-mail : novay@about.me
 * Copyright 2017 EnterWind Co. */

namespace App\Http\Controllers\Epanel\Module;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File, Image;
use Prize;

class PrizeController extends Controller 
{
    public function __construct(Prize $data) 
    {
        $this->middleware('auth');
    
        $this->data = $data;
    }
    
    public function index(Request $request) 
    {
        # Tampilkan seluruh data berurutan
        $data = $this->data->latest()->get();

        # Tampilkan View
        return view('epanel.modules.prize.index', compact('data'));
    }

    public function create() 
    {
        return view('epanel.modules.prize.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'label' => 'required',
            'desc' => 'required', 
            'icon' => 'required|mimes:jpg,pge,png'
        ]);

        $data = $request->all();

        if($request->hasFile('icon')):
            $direktori = public_path().'/upload/prize/';
            makeImgDirectory($direktori);
            $file = $request->file('icon');
            $nama = str_slug($request->label) . str_random(5) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save($direktori . $nama);
            $data['icon'] = $nama;
        endif;

        $this->data->create($data);

        notify()->flash('Data Prize berhasil ditambah!', 'success');
        return redirect(route('epanel.prize.index'));
    }

    public function show($id) 
    {
        return abort(404);
    }

    public function edit(Request $request, $id) 
    {
        $edit = $this->data->find($id);

        return view('epanel.modules.prize.edit', compact('edit'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'label' => 'required',
            'desc' => 'required', 
            'icon' => 'mimes:jpg,pge,png'
        ]);

        $data = $request->all();
        
        if($request->hasFile('icon')):
            $direktori = public_path().'/upload/prize/';
            makeImgDirectory($direktori);
            if(File::exists($direktori . $this->data->findOrFail($id)->icon)):
                File::delete($direktori . $this->data->findOrFail($id)->icon);
            endif;
            $file = $request->file('icon');
            $nama = str_slug($request->label) . str_random(5) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save($direktori . $nama);
            $data['icon'] = $nama;
        endif;
        $this->data->findOrFail($id)->update($data);

        notify()->flash('Data Prize berhasil diubah!', 'success');
        return redirect(route('epanel.prize.index'));
    }

    public function destroy(Request $request, $id) 
    {
        $direktori = public_path().'/upload/prize/';

        if($request->has('pilihan')):

            foreach($request->pilihan as $temp):
                $each = $this->data->find($temp);
                if(File::exists($direktori . $each->icon)):
                    File::delete($direktori . $each->icon);
                endif;
                $each->delete();
            endforeach;

            notify()->flash('Beberapa data berhasil dihapus sekaligus!', 'success');
            return redirect()->back();

        endif;

        $satu = $this->data->find($id);
        if(File::exists($direktori . $satu->icon)):
            File::delete($direktori . $satu->icon);
        endif;
        $satu->delete();
        
        return 'success';
    }

}
