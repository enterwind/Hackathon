@extends('epanel.layouts.main')

@section('title')
    Ubah Informasi Sponsor 
@stop

@section('mSponsor') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::model($edit, ['route' => ['epanel.sponsor.update', $edit->id], 'autocomplete' => 'off', 'method' => 'put', 'files' => true]) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Buat Baru',
                'subjudul' => 'Sponsor',
                'kembali' => route('epanel.sponsor.index')
            ])

            @include('epanel.modules.sponsor.form')

            @include('epanel.layouts.components.submit')
            
        {!! Form::close() !!}

    </section>
@stop