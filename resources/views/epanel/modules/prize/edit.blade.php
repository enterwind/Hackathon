@extends('epanel.layouts.main')

@section('title')
    Ubah Informasi Prize 
@stop

@section('mPrize') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::model($edit, ['route' => ['epanel.prize.update', $edit->id], 'autocomplete' => 'off', 'method' => 'put', 'files' => true]) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Buat Baru',
                'subjudul' => 'Prize',
                'kembali' => route('epanel.prize.index')
            ])

            @include('epanel.modules.prize.form')

            @include('epanel.layouts.components.submit')
            
        {!! Form::close() !!}

    </section>
@stop