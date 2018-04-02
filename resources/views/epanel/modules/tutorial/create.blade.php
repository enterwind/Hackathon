@extends('epanel.layouts.main')

@section('title')
    Buat Tutorial Baru
@stop

@section('mTutorial') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::open(['route' => 'epanel.tutorial.store', 'autocomplete' => 'off', 'files' => true]) !!}

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