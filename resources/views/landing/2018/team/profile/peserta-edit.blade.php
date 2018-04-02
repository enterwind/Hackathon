@extends('landing.2018.team.profile._main')

@section('judul')
Update Peserta
@stop

@section('sAnggotaTim')
active
@stop

@section('isi-profile')

<h3>
    Update Anggota Tim
    <button style="float: right" class="btn" onclick="location.href='{{ route('landing.team.peserta') }}'">
        Kembali
    </button>
</h3>
<p>
    Silahkan lakukan perubahan sesuai dengan kebutuhan tim Anda.
</p>

{!! Form::model($peserta, ['id' => 'contact-form', 'method' => 'put', 'autocomplete' => 'off', 'files' => true]) !!}
<br/><br/>

@if(!is_null($peserta->foto))
<img src="{{ asset('upload/peserta/'.$peserta->foto) }}" width="150px" style="float: right;margin-top: -70px;">
@endif

<div class="contact_form">

    <div class="input-field">
        {{ Form::file('foto') }}
        {{ Form::label('foto', 'Upload Foto (Bila Ada)', ['style' => 'margin-top: -50px;']) }}
        {!! $errors->first('foto', '<p class="small" style="margin-top: 10px">:message</p>') !!}
    </div>

    <br/>

    <div class="input-field">
        {{ Form::text('nama') }}
        {{ Form::label('nama', 'Nama Team', ['style' => 'margin-top: -30px;']) }}
        {!! $errors->first('nama', '<p class="small" style="margin-top: -10px">:message</p>') !!}
    </div>

    <div class="input-field">
        {{ Form::text('telp') }}
        {{ Form::label('telp', 'Nomor Telepon', ['style' => 'margin-top: -30px;']) }}
        {!! $errors->first('telp', '<p class="small" style="margin-top: -10px">:message</p>') !!}
    </div>

    <div class="input-field">
        {{ Form::email('email') }}
        {{ Form::label('email', 'Email', ['style' => 'margin-top: -30px;']) }}
        {!! $errors->first('email', '<p class="small" style="margin-top: -10px">:message</p>') !!}
    </div>

    <br/>
    <div class="input-field">
        {{ Form::label('status', 'Status', ['style' => 'margin-top: -45px;']) }}
        {{ Form::select('status', statusJob(), null, ['id' => 'status[1]', 'class' => 'form-control', 'required']) }}
    </div>

</div>	

<button class="btn waves-effect waves-light" type="submit" name="action">Simpan Perubahan</button>

{!! Form::close() !!}
@stop