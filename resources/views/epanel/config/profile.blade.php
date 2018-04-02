@extends('epanel.config.index')

@section('title')
Profil
@stop

@section('profile')
active
@stop

@section('form')
{!! Form::model($data, ['method' => 'put', 'autocomplete' => 'off']) !!}
	<fieldset class="form-group {{ $errors->first('nama', 'form-group-error') }}">
		{!! Form::label('nama', 'Nama', ['class' => 'form-label']) !!}
		<div class="form-control-wrapper">
			{!! Form::text('nama', null, ['class' => 'form-control']) !!}
			{!! $errors->first('nama', '<div class="form-tooltip-error sm">:message</div>') !!}
		</div>
	</fieldset>

	<fieldset class="form-group {{ $errors->first('username', 'form-group-error') }}">
		{!! Form::label('username', 'Username', ['class' => 'form-label']) !!}
		<div class="form-control-wrapper">
			{!! Form::text('username', null, ['class' => 'form-control']) !!}
			{!! $errors->first('username', '<div class="form-tooltip-error sm">:message</div>') !!}
		</div>
	</fieldset>

	<fieldset class="form-group">
		{!! Form::submit('Simpan', ['class' => 'btn']) !!}
	</fieldset>
{!! Form::close() !!}
@stop