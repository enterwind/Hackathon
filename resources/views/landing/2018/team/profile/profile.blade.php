@extends('landing.2018.team.profile._main')

@section('judul')
Update Profile
@stop

@section('sProfil')
active
@stop

@section('isi-profile')

	<h3>Update Profil Tim</h3>
	<p>Silahkan lakukan perubahan sesuai dengan kebutuhan tim kalian.</p>

	{!! Form::model($peserta, ['id' => 'contact-form', 'method' => 'put']) !!}
    <br/>
		<div class="contact_form">
			<div class="input-field">
  				{{ Form::text('nama', null) }}
  				{{ Form::label('nama', 'Nama Team', ['style' => 'margin-top: -30px;']) }}
          {!! $errors->first('nama', '<p class="small" style="margin-top: -10px">:message</p>') !!}
  			</div>
  			<div class="input-field">
  				{{ Form::email('email', null, ['required', 'disabled']) }}
  				{{ Form::label('email', 'Email', ['style' => 'margin-top: -30px;']) }}
  			</div>
  			<div class="input-field">
  				{{ Form::text('asal', null) }}
  				{{ Form::label('asal', 'Asal Instansi / Sekolah / Perguruan Tinggi', ['style' => 'margin-top: -30px;']) }}
          {!! $errors->first('asal', '<p class="small" style="margin-top: -10px">:message</p>') !!}
  			</div>
  			<div class="input-field">
  				{{ Form::textarea('alamat', null, ['class' => 'materialize-textarea', null]) }}
  				{{ Form::label('alamat', 'Alamat (Basecamp)', ['style' => 'margin-top: -20px;']) }}
          {!! $errors->first('alamat', '<p class="small" style="margin-top: -10px">:message</p>') !!}
	  		</div>
			</div>	

			<button class="btn waves-effect waves-light" type="submit" name="action">Simpan Perubahan</button>

	{!! Form::close() !!}

@stop