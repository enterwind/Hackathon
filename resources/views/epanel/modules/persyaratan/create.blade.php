@extends('epanel.layouts.main')

@section('title')
    Buat Persyaratan Baru
@stop

@section('mPersyaratan') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::open(['route' => 'epanel.persyaratan.store', 'autocomplete' => 'off']) !!}

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