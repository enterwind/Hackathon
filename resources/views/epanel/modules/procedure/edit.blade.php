@extends('epanel.layouts.main')

@section('title')
    Ubah Informasi Procedure 
@stop

@section('mProcedure') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::model($edit, ['route' => ['epanel.procedure.update', $edit->id], 'autocomplete' => 'off', 'method' => 'put', 'files' => true]) !!}

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