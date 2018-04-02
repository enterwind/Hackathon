@extends('landing.2018.team.profile._main')

@section('judul')
Update Pengalaman
@stop

@section('sPengalaman')
active
@stop

@section('isi-profile')

	<h3>
		Tambah Pengalaman Baru
		<button style="float: right" class="btn" onclick="location.href='{{ route('landing.team.pengalaman') }}'">
			Kembali
		</button>
	</h3>
	<p>
		Silahkan lengkapi form berikut untuk menambahkan pengalaman baru tim Anda.
	</p>

	{!! Form::open(['id' => 'contact-form', 'files' => true]) !!}

		<br/>
		<div class="contact_form">

  			<div class="input-field">
  				{{ Form::textarea('keterangan', null, ['class' => 'materialize-textarea', null]) }}
  				{{ Form::label('keterangan', 'Keterangan', ['style' => 'margin-top: -20px;']) }}
          		{!! $errors->first('keterangan', '<p class="small" style="margin-top: -10px">:message</p>') !!}
	  		</div>

	  		<br/>

	  		<div class="input-field">
  				{{ Form::file('lampiran') }}
  				{{ Form::label('lampiran', 'Upload File*', ['style' => 'margin-top: -50px;']) }}
          		{!! $errors->first('lampiran', '<p class="small" style="margin-top: 10px">:message</p>') !!}
  			</div>

		</div>	

		<p>
			* Lampiran bisa berupa sertifikat, kontrak kerja dan lain-lain. (Pastikan file berformat <b>.pdf</b>)<br/>
			Kalian juga bisa sertakan link bila project berupa website di form keterangan.
		</p>

		<button class="btn waves-effect waves-light" type="submit" name="action">Simpan Perubahan</button>

	{!! Form::close() !!}
	
@stop