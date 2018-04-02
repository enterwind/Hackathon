<?php

/* Author : Noviyanto Rachmady 
 * E-mail : novay@about.me
 * Copyright 2017 EnterWind Co. */

namespace App\Http\Controllers\Epanel\Module;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Team;

class PesertaController extends Controller 
{
    public function __construct(Team $data) 
    {
        $this->middleware('auth');
    
        $this->data = $data;
    }
    
    public function index(Request $request) 
    {
        # Tampilkan seluruh data berurutan
        $data = $this->data->latest()->get();

        # Tampilkan View
        return view('epanel.modules.peserta.index', compact('data'));
    }

    public function create() 
    {
        return abort(404);
    }

    public function store(Request $request) 
    {
        return abort(404);
    }

    public function show(Request $request, $easter_egg) 
    {
        $detail = $this->data->whereEasterEgg($easter_egg)->firstOrFail();

        if($request->has('purpose')) {
            $detail->update([
                'status' => $detail->status == 1 ? 2 : 1
            ]);
            return redirect()->back();
        }

        return view('epanel.modules.peserta.detail', compact('detail'));
    }

    public function edit($id) 
    {
        return abort(404);
    }

    public function update(Request $request, $id) 
    {
        return abort(404);
    }

    public function destroy(Request $request, $id) 
    {
        return abort(404);
    }
}
