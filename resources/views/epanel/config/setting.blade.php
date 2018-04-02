@extends('epanel.config.index')

@section('title')
Pengaturan
@stop

@section('setting')
active
@stop

@section('form')
{!! Form::open(['method' => 'put', 'autocomplete' => 'off']) !!}

	<h5>Basic <b>Information</b></h5>

	<fieldset class="form-group {{ $errors->first('slogan', 'form-group-error') }}">
		{!! Form::label('slogan', 'Slogan', ['class' => 'form-label']) !!}
		<div class="form-control-wrapper">
			{!! Form::text('slogan', landing()->slogan, ['class' => 'form-control']) !!}
			{!! $errors->first('slogan', '<div class="form-tooltip-error sm">:message</div>') !!}
		</div>
	</fieldset>

	<fieldset class="form-group {{ $errors->first('sub_slogan', 'form-group-error') }}">
		{!! Form::label('sub_slogan', 'Sub Slogan', ['class' => 'form-label']) !!}
		<div class="form-control-wrapper form-control-icon-left">
			{!! Form::text('sub_slogan', landing()->sub_slogan, ['class' => 'form-control']) !!}
			<i class="font-icon font-icon-lamp"></i>
			{!! $errors->first('sub_slogan', '<div class="form-tooltip-error sm">:message</div>') !!}
		</div>
	</fieldset>

	<div class="row">
		<div class="col-md-6">
			<fieldset class="form-group {{ $errors->first('phone', 'form-group-error') }}">
				{!! Form::label('phone', 'Phone Number', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper form-control-icon-left">
					{!! Form::text('phone', landing()->phone, ['class' => 'form-control']) !!}
					<i class="font-icon font-icon-phone"></i>
					{!! $errors->first('phone', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
		<div class="col-md-6">
			<fieldset class="form-group {{ $errors->first('email', 'form-group-error') }}">
				{!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper form-control-icon-left">
					{!! Form::text('email', landing()->email, ['class' => 'form-control']) !!}
					<i class="font-icon font-icon-mail"></i>
					{!! $errors->first('email', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<fieldset class="form-group {{ $errors->first('address', 'form-group-error') }}">
				{!! Form::label('address', 'Address', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper">
					{!! Form::textarea('address', landing()->address, ['class' => 'form-control', 'rows' => 3]) !!}
					{!! $errors->first('address', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
	</div>
	
	<br/>
	<h5>Social <b>Media</b></h5>

	<style>
		.form-control-wrapper.form-control-icon-left .fa {
			top: -2px;
		}
	</style>

	<div class="row">
		<div class="col-md-3">
			<fieldset class="form-group {{ $errors->first('facebook', 'form-group-error') }}">
				{!! Form::label('facebook', 'Facebook', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper form-control-icon-left">
					{!! Form::text('facebook', landing()->facebook, ['class' => 'form-control']) !!}
					<i class="fa fa-facebook-square"></i>
					{!! $errors->first('facebook', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
		<div class="col-md-3">
			<fieldset class="form-group {{ $errors->first('twitter', 'form-group-error') }}">
				{!! Form::label('twitter', 'Twitter', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper form-control-icon-left">
					{!! Form::text('twitter', landing()->twitter, ['class' => 'form-control']) !!}
					<i class="fa fa-twitter"></i>
					{!! $errors->first('twitter', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
		<div class="col-md-3">
			<fieldset class="form-group {{ $errors->first('instagram', 'form-group-error') }}">
				{!! Form::label('instagram', 'Instagram', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper form-control-icon-left">
					{!! Form::text('instagram', landing()->instagram, ['class' => 'form-control']) !!}
					<i class="fa fa-instagram"></i>
					{!! $errors->first('instagram', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
		<div class="col-md-3">
			<fieldset class="form-group {{ $errors->first('youtube', 'form-group-error') }}">
				{!! Form::label('youtube', 'Youtube', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper form-control-icon-left">
					{!! Form::text('youtube', landing()->youtube, ['class' => 'form-control']) !!}
					<i class="fa fa-youtube"></i>
					{!! $errors->first('youtube', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
	</div>

	<br/><br/>

	{{-- <fieldset class="form-group">
		<div class="form-control-wrapper">
			<div class="checkbox-toggle -large">
				<input type="checkbox" id="maintenance" name="maintenance" value="1" 
					{{ env('MAINTENANCE') == 1 ? 'checked' : '' }}>
				{!! Form::label('maintenance', 'Maintenance', ['class' => 'form-label']) !!}
			</div>
			<p class="small">Dengan mengaktifkan maintenance, artinya website untuk sementara tidak dapat diakses publik dan akan dialikan ke mode perawatan.</p>
		</div>
	</fieldset> --}}

	<fieldset class="form-group">
		{!! Form::submit('Simpan', ['class' => 'btn']) !!}
	</fieldset>
{!! Form::close() !!}
@stop