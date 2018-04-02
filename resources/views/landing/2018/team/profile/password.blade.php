@extends('landing.2018.team.profile._main')

@section('judul')
Update Password
@stop

@section('sUbahPassword')
active
@stop

@section('isi-profile')

	<h3>Update Password</h3>
	<p>Silahkan lakukan perubahan password Anda bila dirasa perlu.</p>

	{!! Form::model($peserta, ['id' => 'contact-form', 'method' => 'put']) !!}

		<div class="contact_form">
			<br/>
			<div class="input-field">
  				{{ Form::password('old_password') }}
  				{{ Form::label('old_password', 'Password Lama', ['style' => 'margin-top: -30px;']) }}
  				{!! $errors->first('old_password', '<p class="small" style="margin-top: -10px">:message</p>') !!}
  			</div>
  			<div class="input-field">
  				{{ Form::password('new_password') }}
  				{{ Form::label('new_password', 'Password Baru', ['style' => 'margin-top: -30px;']) }}
  				{!! $errors->first('new_password', '<p class="small" style="margin-top: -10px">:message</p>') !!}
  			</div>
  			<div class="input-field">
  				{{ Form::password('new_password_confirmation') }}
  				{{ Form::label('new_password_confirmation', 'Ulangi Password Baru', ['style' => 'margin-top: -30px;']) }}
  				{!! $errors->first('new_password_confirmation', '<p class="small" style="margin-top: -10px">:message</p>') !!}
  			</div>
		</div>	

		<button class="btn waves-effect waves-light" type="submit" name="action">Simpan Perubahan</button>

	{!! Form::close() !!}

@stop