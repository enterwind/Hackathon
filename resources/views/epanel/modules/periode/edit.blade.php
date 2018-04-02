@extends('epanel.layouts.main')

@section('title')
    Ubah Informasi Periode 
@stop

@section('mPeriode') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::model($edit, ['route' => ['epanel.periode.update', $edit->id], 'autocomplete' => 'off', 'method' => 'put']) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Buat Baru',
                'subjudul' => 'Periode',
                'kembali' => route('epanel.periode.index')
            ])

            @include('epanel.modules.periode.form')

            @include('epanel.layouts.components.submit')
            
        {!! Form::close() !!}

    </section>
@stop