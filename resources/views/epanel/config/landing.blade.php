@extends('epanel.config.index')

@section('title')
Landing Page
@stop

@section('landing')
active
@stop

@section('js-extra')
<link rel="stylesheet" href="{{ asset('backend/css/separate/vendor/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/separate/vendor/bootstrap-daterangepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">
<script type="text/javascript" src="{{ asset('backend/js/lib/moment/moment-with-locales.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('backend/js/lib/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('backend/js/lib/clockpicker/bootstrap-clockpicker-init.js') }}"></script>
<script src="{{ asset('backend/js/lib/daterangepicker/daterangepicker.js') }}"></script>
<script>
    $(function() {
        $('#schedule_oprec').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD-MM-YYYY'
            },
        });
        $('#schedule_close').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD-MM-YYYY'
            },
        });
        $('#schedule_day').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD-MM-YYYY'
            },
        });
        $('#schedule_winner').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD-MM-YYYY'
            },
        });
    });
</script>
@stop

@section('form')
{!! Form::open(['method' => 'put', 'autocomplete' => 'off', 'files' => true]) !!}
	
	<h5>About <b>Hackathon</b></h5>

	<div class="row">
		<div class="col-md-5">
			<fieldset class="form-group {{ $errors->first('header_image', 'form-group-error') }}">
				{!! Form::label('header_image', 'Header Image', ['class' => 'form-label']) !!}
				<img src="{{ asset('upload/'.landing()->header_image) }}" width="100%" class="img-thumbnail">
				<div class="form-control-wrapper">
					{!! Form::file('header_image', ['class' => 'form-control']) !!}
					{!! $errors->first('header_image', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
		<div class="col-md-7">
			<fieldset class="form-group {{ $errors->first('profile_video', 'form-group-error') }}">
				{!! Form::label('profile_video', 'Profile Video', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper form-control-icon-left">
					{!! Form::text('profile_video', landing()->profile_video, ['class' => 'form-control']) !!}
					<i class="fa fa-youtube"></i>
					{!! $errors->first('profile_video', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
			<fieldset class="form-group {{ $errors->first('profile_desc', 'form-group-error') }}">
				{!! Form::label('profile_desc', 'Profile Description', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper">
					{!! Form::textarea('profile_desc', landing()->profile_desc, ['class' => 'form-control', 'rows' => 8]) !!}
					{!! $errors->first('profile_desc', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
	</div>

	<br/><br/>

	<h5>Setting <b>Schedule</b></h5>

	<style>
		.form-control-wrapper.form-control-icon-left .fa {
			top: -2px;
		}
	</style>

	<div class="row">
		<div class="col-md-3">
			<fieldset class="form-group {{ $errors->first('schedule_oprec', 'form-group-error') }}">
				{!! Form::label('schedule_oprec', 'Open Registration', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper">
					<div class="input-group">
	                    {!! Form::text('schedule_oprec', date('d-m-Y', strtotime(landing()->schedule_oprec)), ['class' => 'form-control', 'id' => 'schedule_oprec']) !!}
	                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
	                </div>
					{!! $errors->first('schedule_oprec', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
		<div class="col-md-3">
			<fieldset class="form-group {{ $errors->first('schedule_close', 'form-group-error') }}">
				{!! Form::label('schedule_close', 'Close Registration', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper">
					<div class="input-group">
	                    {!! Form::text('schedule_close', date('d-m-Y', strtotime(landing()->schedule_close)), ['class' => 'form-control', 'id' => 'schedule_close']) !!}
	                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
	                </div>
					{!! $errors->first('schedule_close', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
		<div class="col-md-3">
			<fieldset class="form-group {{ $errors->first('schedule_day', 'form-group-error') }}">
				{!! Form::label('schedule_day', 'Hackathon Day', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper">
					<div class="input-group">
	                    {!! Form::text('schedule_day', date('d-m-Y', strtotime(landing()->schedule_day)), ['class' => 'form-control', 'id' => 'schedule_day']) !!}
	                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
	                </div>
					{!! $errors->first('schedule_day', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
		<div class="col-md-3">
			<fieldset class="form-group {{ $errors->first('schedule_winner', 'form-group-error') }}">
				{!! Form::label('schedule_winner', 'Winner Announcement', ['class' => 'form-label']) !!}
				<div class="form-control-wrapper">
					<div class="input-group">
	                    {!! Form::text('schedule_winner', date('d-m-Y', strtotime(landing()->schedule_winner)), ['class' => 'form-control', 'id' => 'schedule_winner']) !!}
	                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
	                </div>
					{!! $errors->first('schedule_winner', '<div class="form-tooltip-error sm">:message</div>') !!}
				</div>
			</fieldset>
		</div>
	</div>

	<br/><br/>

	<fieldset class="form-group">
		{!! Form::submit('Simpan', ['class' => 'btn']) !!}
	</fieldset>
{!! Form::close() !!}
@stop