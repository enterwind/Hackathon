@extends('epanel.layouts.main')

@section('title')
    Ubah Informasi Tutorial 
@stop

@section('mTutorial') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::model($edit, ['route' => ['epanel.tutorial.update', $edit->id], 'autocomplete' => 'off', 'method' => 'put', 'files' => true]) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Buat Baru',
                'subjudul' => 'Tutorial',
                'kembali' => route('epanel.tutorial.index')
            ])

            @include('epanel.modules.tutorial.form')

            @include('epanel.layouts.components.submit')
            
        {!! Form::close() !!}

    </section>
@stop