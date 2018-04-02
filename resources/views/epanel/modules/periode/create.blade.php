@extends('epanel.layouts.main')

@section('title')
    Buat Periode Baru
@stop

@section('mPeriode') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::open(['route' => 'epanel.periode.store', 'autocomplete' => 'off']) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Buat Baru',
                'subjudul' => 'Periode Hackathon',
                'kembali' => route('epanel.periode.index')
            ])

            @include('epanel.modules.periode.form')

            @include('epanel.layouts.components.submit')
            
        {!! Form::close() !!}

    </section>
@stop