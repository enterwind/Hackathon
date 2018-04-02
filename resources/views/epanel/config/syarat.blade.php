@extends('epanel.config.index')

@section('title')
Syarat &amp; Ketentuan
@stop

@section('syarat')
active
@stop

@section('js-extra')
<link rel="stylesheet" href="{{ asset('backend/css/lib/summernote/summernote.css') }}"/>
<script src="{{ asset('backend/js/lib/summernote/summernote.min.js') }}"></script>
<script>
$(document).ready(function() {
	$('.summernote').summernote({
		height: 400
	});
});
</script>
@stop

@section('form')
<style type="text/css">
	dl, menu, ol, ul {
	    -webkit-padding-start: 20px;
	}
	ul li {
		list-style-type: disc;
		margin-left: 20px;
	}
	.files-manager-side-list li {
		list-style-type: none;
		margin-left: 0;
	}
</style>
{!! Form::open(['method' => 'put', 'autocomplete' => 'off']) !!}
	
	<fieldset class="form-group {{ $errors->first('term_condition', 'form-group-error') }}">
		{!! Form::label('term_condition', 'Syarat &amp; Ketentuan', ['class' => 'form-label']) !!}
		<div class="form-control-wrapper">
			{!! Form::textarea('term_condition', landing()->term_condition, ['class' => 'form-control summernote']) !!}
			{!! $errors->first('term_condition', '<div class="form-tooltip-error sm">:message</div>') !!}
		</div>
	</fieldset>

	<fieldset class="form-group">
		{!! Form::submit('Simpan', ['class' => 'btn']) !!}
	</fieldset>
{!! Form::close() !!}
@stop