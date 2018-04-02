@extends('epanel.layouts.main')

@section('title')
    Buat Procedure Baru
@stop

@section('mProcedure') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::open(['route' => 'epanel.procedure.store', 'autocomplete' => 'off', 'files' => true]) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Buat Baru',
                'subjudul' => 'Procedure',
                'kembali' => route('epanel.procedure.index')
            ])

            @include('epanel.modules.procedure.form')

            @include('epanel.layouts.components.submit')
            
        {!! Form::close() !!}

    </section>
@stop