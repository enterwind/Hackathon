@extends('epanel.layouts.main')

@section('title')
    Ubah Informasi Persyaratan 
@stop

@section('mPersyaratan') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::model($edit, ['route' => ['epanel.persyaratan.update', $edit->id], 'autocomplete' => 'off', 'method' => 'put']) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Buat Baru',
                'subjudul' => 'Persyaratan',
                'kembali' => route('epanel.persyaratan.index')
            ])

            @include('epanel.modules.persyaratan.form')

            @include('epanel.layouts.components.submit')
            
        {!! Form::close() !!}

    </section>
@stop