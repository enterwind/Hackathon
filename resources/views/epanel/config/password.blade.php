@extends('epanel.config.index')

@section('title')
Ubah Sandi
@stop

@section('password')
active
@stop

@section('js-extra')
<script src="{{ asset('backend/js/lib/hide-show-password/bootstrap-show-password.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#old_password').password();
    $('#new_password').password();
    $('#new_password_confirmation').password();
});
</script>
@stop

@section('form')
{!! Form::open(['method' => 'put', 'autocomplete' => 'off']) !!}
	
	<fieldset class="form-group {{ $errors->first('old_password', 'form-group-error') }}">
		{!! Form::label('old_password', 'Old Password', ['class' => 'form-label']) !!}
		<div class="form-control-wrapper">
			{!! Form::password('old_password', ['class' => 'form-control']) !!}
			{!! $errors->first('old_password', '<div class="form-tooltip-error sm">:message</div>') !!}
		</div>
	</fieldset>

	{!! $errors->first('new_password', '<br/>') !!}

	<fieldset class="form-group {{ $errors->first('new_password', 'form-group-error') }}">
		{!! Form::label('new_password', 'New Password', ['class' => 'form-label']) !!}
		<div class="form-control-wrapper">
			{!! Form::password('new_password', ['class' => 'form-control']) !!}
			{!! $errors->first('new_password', '<div class="form-tooltip-error sm">:message</div>') !!}
		</div>
	</fieldset>

	{!! $errors->first('new_password_confirmation', '<br/>') !!}

	<fieldset class="form-group {{ $errors->first('new_password_confirmation', 'form-group-error') }}">
		{!! Form::label('new_password_confirmation', 'Confirm New Password', ['class' => 'form-label']) !!}
		<div class="form-control-wrapper">
			{!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
			{!! $errors->first('new_password_confirmation', '<div class="form-tooltip-error sm">:message</div>') !!}
		</div>
	</fieldset>

	<fieldset class="form-group">
		{!! Form::submit('Simpan', ['class' => 'btn']) !!}
	</fieldset>
{!! Form::close() !!}
@stop