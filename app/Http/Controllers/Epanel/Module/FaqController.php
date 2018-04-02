<?php

/* Author : Noviyanto Rachmady 
 * E-mail : novay@about.me
 * Copyright 2017 EnterWind Co. */

namespace App\Http\Controllers\Epanel\Module;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Faq;

class FaqController extends Controller 
{
    public function __construct(Faq $data) 
    {
        $this->middleware('auth');
    
        $this->data = $data;
    }
    
    public function index(Request $request) 
    {
        # Tampilkan seluruh data berurutan
        $data = $this->data->latest()->get();

        # Tampilkan View
        return view('epanel.modules.faq.index', compact('data'));
    }

    public function create() 
    {
        return view('epanel.modules.faq.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required'
        ]);

        $data = $request->all();
        $this->data->create($data);

        notify()->flash('Data FAQ berhasil ditambah!', 'success');
        return redirect(route('epanel.faq.index'));
    }

    public function show($id) 
    {
        return abort(404);
    }

    public function edit($id) 
    {
        $edit = $this->data->find($id);

        return view('epanel.modules.faq.edit', compact('edit'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required'
        ]);

        $data = $request->all();
        
        $this->data->find($id)->update($data);

        notify()->flash('Data FAQ berhasil diubah!', 'success');
        return redirect(route('epanel.faq.index'));
    }

    public function destroy(Request $request, $id) 
    {
        if($request->has('pilihan')):

            foreach($request->pilihan as $temp):
                $each = $this->data->find($temp);
                $each->delete();
            endforeach;

            notify()->flash('Beberapa data berhasil dihapus sekaligus!', 'success');
            return redirect()->back();

        endif;

        $satu = $this->data->find($id);
        $satu->delete();
        
        return 'success';
    }
}
