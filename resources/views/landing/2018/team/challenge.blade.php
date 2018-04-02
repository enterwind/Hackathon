@extends('landing.2018.team._main')

@section('judul')
Challenge Page
@stop

@section('mChallenge')
active
@stop

@section('js')
<script type="text/javascript">
	function bukaKlik() {
		swal({
    		title: 'Ingat Ya! Klik disini',
    		type: 'info',
    	});
	}
	function nextClue() {
		$('#klikDisini').show();
	}

	var url_cek  = '{{ route('landing.team.challenge') }}';
	$('input').keypress(function(k) { if (k.which == 13) login(); });
	function cekKode() {
		var kode = $('#kode').val();
		var token = '{{ csrf_token() }}';
		$.post(url_cek, { kode:kode, _token:token }, function(r) {
			console.log('tes')
			if (r.status == '') {
				if (r.kode != '') {
					$('#error-kode').text(r.kode);
				} else {
					$('#error-kode').text('');
				};
			} else {
				if (r.status == 'sukses') {
					$(location).prop('href', url_cek);
				} else {
					swal({
			    		title: 'Perhatian!',
			    		type: 'error',
			    		html: 'Kode Verifikasi Tidak Cocok!'
			    	});
					$('#kode').focus();
				};
			};
		}, "json");
	}
</script>
@stop

@section('isi')

	@if($peserta->status == 0)

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<style type="text/css">
			#klikDisini{
			     position:fixed;
			     bottom:20px;
			     right:20px;
			     z-index: 9;
			     display: none;
			     cursor: pointer;
			}
			@media (min-width: 576px) {
				.modal-dialog {
				    max-width: 700px;
				}
			}
		</style>

		<img src="{{ asset('klik-disini.png') }}" id="klikDisini" onclick="javascript:bukaKlik()" class="animated infinite pulse">

		<section id="more_info" class="subsection background_color1" style="margin-top: 100px">
			<div class="container">
			
				<!-- INTRO -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 more_info_anim1 animated fadeInUp">
						<div class="intro">
							<h3>Welcoming Challenges</h3>
							<br/>
							<h5>
								Perkenalkan, saya <b>Hacky!</b> dan yang pasti saya bukan manusia, namun saya lah yang akan memandu Anda dalam challenge pertama hackathon tahun ini <span style="color:#9e9e9e;font-size:90%">(Bantu Do'a agar kegiatan ini bisa jadi kegiatan tahunan kita bersama)</span>. 
							</h5>

							<h5>
								Sebelumnya pastikan Anda menggunakan laptop atau komputer agar challenge kali ini bisa di kerjakan lebih optimal.
							</h5>

							<h5>
								Untuk challenge pertama ini, saya hanya ingin memastikan bahwa kalian (calon peserta) dapat melakukan koneksi ke API Samarinda <span style="color:#9e9e9e;font-size:90%">(baca: itu;doank)</span>.
							</h5>

							<h5>
								Untuk itu, <a href="#" data-toggle="modal" data-target="#clue" style="color:#212529;cursor:text;">disini</a> kami menyediakan sebuah form input yang isinya perlu kalian cari tahu sendiri. <br/>
								Silahkan <a href="#" onclick="javascript:nextClue()">klik ini</a> untuk memunculkan petunjuk berikutnya.
							</h5>

							<br/><br/>
							<small>
								*Pastikan kalian mengikuti petunjuk yang ada. <br/>
								**Gunakan cara apapun untuk menemukan petunjuk dari clue yang ada (kan katanya programmer ^.^).
							</small>

						</div>
					</div>
				</div>
				<!-- //INTRO -->
					
				</div>
			</div>		
		</section>

		<div class="modal fade" id="clue" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body" style="padding: 1rem 3rem;">

						<h2 class="align-center"><b>Hai!</b></h2>
						<h5 class="align-center">Dapatkan kode verifikasi challenge ini dengan melakukan <br/>Request ke API dengan ketentuan:</h5>
						<style type="text/css">
							code {
								padding-left: 20px;
							}
						</style>
						<code>Accept: application/json</code><br/>
						<code>Content-Type: application/json</code><br/>
						<code>Authorization: Bearer <b>TOKEN_ANDA</b></code>

						<br/><br/>

						<table class="table">
							<tr>
								<td width="10%"><code style="padding-left:0">GET</code></td>
								<td><code style="padding-left:0">http://api.samarindakota.go.id/api/v1/hackathon?kode={{$peserta->easter_egg}}</code></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>

						<form action="" method="post" autocomplete="off">
							<div class="contact_form form-login">
					  			<div class="form-group">
					  				{{ Form::label('kode', 'MASUKKAN KODE VERIFIKASI DARI RESPONSE API DIATAS', ['class' => 'tabel mb0']) }}
						  			{{ Form::password('kode', ['class' => 'mt-10', 'required']) }}
						  			<p class="small mt-10 text-dangers" id="error-kode"></p>
					  			</div>
					  			<br/>
					  			<a class="btn btn-md btn-block waves-effect waves-light" onclick="cekKode()" style="color:white">CEK KODE</a>
					  		</div>
					  	</form>
					</div>
				</div>
			</div>
		</div>

	@else

	<img src="{{ asset('landing/images/congratulation.png') }}" style="width: 100%;padding: 150px 25% 50px;">

	@endif

@stop