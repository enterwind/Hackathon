@extends('landing.2018.team._main')

@section('judul')
Selamat Datang, {{ auth()->guard('team')->user()->nama }}!
@stop

@section('mBeranda')
active
@stop

@section('js')
    <script type="text/javascript">
    	function getTimeRemaining(endtime) {
		  var t = Date.parse(endtime) - Date.parse(new Date());
		  var seconds = Math.floor((t / 1000) % 60);
		  var minutes = Math.floor((t / 1000 / 60) % 60);
		  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
		  var days = Math.floor(t / (1000 * 60 * 60 * 24));
		  return {
		    'total': t,
		    'days': days,
		    'hours': hours,
		    'minutes': minutes,
		    'seconds': seconds
		  };
		}

		function initializeClock(id, endtime) {
		  var clock = document.getElementById(id);
		  var daysSpan = clock.querySelector('.days');
		  var hoursSpan = clock.querySelector('.hours');
		  var minutesSpan = clock.querySelector('.minutes');
		  var secondsSpan = clock.querySelector('.seconds');

		  function updateClock() {
		    var t = getTimeRemaining(endtime);

		    daysSpan.innerHTML = t.days;
		    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
		    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
		    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

		    if (t.total <= 0) {
		      clearInterval(timeinterval);
		    }
		  }

		  updateClock();
		  var timeinterval = setInterval(updateClock, 1000);
		}

		var deadline = new Date(Date.parse("{{ landing()->schedule_day }}"));
		initializeClock('clockdiv', deadline);
    </script>
@stop

@section('isi')

	<section id="cta_download" class="subsection background_color3 atas">
		<div class="container">

			<style type="text/css">
				.btn.btn_with_icon {
					line-height: 1.5rem;
					padding-left:30px;
					padding-right:30px;
				}
				.btn.btn_with_icon h6 {
					line-height: .8;
					font-size: 1.5rem;
				}
			</style>
		
		    
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-center">

					<style type="text/css">
						#clockdiv {
							font-size: 2rem;
						}
					</style>

					<div class="open-registrasi" style="margin-top: 0px;margin-bottom: 0;">
						<h5>
							<b>Hackathon Samarinda akan diselenggarakan dalam :</b>
						</h5>
						<div id="clockdiv">
							<div>
								<span class="days" style="font-size: 2rem;padding: 5px;width: 50px;"></span>
								<div class="smalltext" style="padding-top: 0px;font-size: 12px;">Hari</div>
							</div>
							<div>
								<span class="hours" style="font-size: 2rem;padding: 5px;width: 50px;"></span>
								<div class="smalltext" style="padding-top: 0px;font-size: 12px;">Jam</div>
							</div>
							<div>
								<span class="minutes" style="font-size: 2rem;padding: 5px;width: 50px;"></span>
								<div class="smalltext" style="padding-top: 0px;font-size: 12px;">Menit</div>
							</div>
							<div>
								<span class="seconds" style="font-size: 2rem;padding: 5px;width: 50px;"></span>
								<div class="smalltext" style="padding-top: 0px;font-size: 12px;">Detik</div>
							</div>
						</div>
					</div>
				
				</div>

				<style type="text/css">
					#ribbon {
						padding: .34em 1em;
						margin: 0;
						margin-top: -20px;
						position:relative;
						color: #ffffff;
						text-align: center;
						text-shadow: 0px -1px 0px rgba(0,0,0,0.3);
						box-shadow: inset 0px 1px 0px rgba(255,255,255,.3),
						inset 0px 0px 20px rgba(0,0,0,0.1),
						0px 1px 1px rgba(0,0,0,0.4);
						display: inline-block;
						letter-spacing: 1px;
					    font: 32px 'Lato', sans-serif;
					    font-weight: 600;
					}
					#ribbon:before, #ribbon:after {
						content: "";
						width:1.84em;
						bottom:-.5em;
						position:absolute;
						display:block;
						box-shadow:0px 1px 0px rgba(0,0,0,0.4);
						z-index:-2;
					}
					#ribbon:before {
						left:-1.35em;
						border-right-width: .75em;
						border-left-color:transparent;
					}
					
					#ribbon:after {
						right:-1.35em;
						border-left-width: .75em;
						border-right-color:transparent;
					}
					
					#content:before, #content:after {
						content:"";
						bottom:-.5em;
						position:absolute;
						display:block;
						border-style:solid;
						z-index:-1;
					}
					#content:before {
						left: 0;
						border-width: .5em 0 0 .5em;
					}
					
					#content:after {
						right: 0;
						border-width: .5em .5em 0 0;
					}

					#ribbon.status0 {
						background: -webkit-linear-gradient(top,#ff9803, #ff9c0c);
					}
					#ribbon.status0:before, #ribbon.status0:after {
						border: .9em solid #ffa624;
					}
					#content.status0:before, #content.status0:after {
						border-color: #a5670f transparent transparent transparent;
					}

					#ribbon.status1 {
						background: -webkit-linear-gradient(top,#2623e8, #2e2caf);
					}
					#ribbon.status1:before, #ribbon.status1:after {
						border: .9em solid #171592;
					}
					#content.status1:before, #content.status1:after {
						border-color: #020227 transparent transparent transparent;
					}

					#ribbon.status2 {
						background: -webkit-linear-gradient(top,#2bd232, #14d81c);
					}
					#ribbon.status2:before, #ribbon.status2:after {
						border: .9em solid #14e21d;
					}
					#content.status2:before, #content.status2:after {
						border-color: #0f7113 transparent transparent transparent;
					}

					.foo {
					  width: 20px;
					  height: 20px;
					  margin: 5px;
					  border: 2px solid rgb(255, 255, 255);
					}

					.sstatus0 {
					  background: #ff9803;
					}

					.sstatus1 {
					  background: #2623e8;
					}

					.sstatus2 {
					  background: #2bd232;
					}

				</style>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-center">
					<div class="open-registrasi" style="margin-top: 0px;margin-bottom: 0;">
						<h5>
							<b>Status kalian saat ini adalah:</b>
						</h5>

						@if($peserta->status == 0)
							<div id="ribbon" class="status0">
								<span id="content" class="status0">{!! pilihStatusPeserta($peserta->status) !!}</span>
							</div>
						@endif

						@if($peserta->status == 1)
							<div id="ribbon" class="status1">
								<span id="content" class="status1">{!! pilihStatusPeserta($peserta->status) !!}</span>
							</div>
						@endif

						@if($peserta->status == 2)
							<div id="ribbon" class="status2">
								<span id="content" class="status2">{!! pilihStatusPeserta($peserta->status) !!}</span>
							</div>
						@endif

						<br/><br/>

						@if($peserta->status != 2)
							<p style="margin-bottom: 0;margin-top: 5px;opacity: 1">
								<span class="foo sstatus0">&nbsp;&nbsp;&nbsp;<b>{{ $peserta->status == 1 ? '√' : '' }}</b>&nbsp;&nbsp;&nbsp;</span> Belum Ikut Challenge&nbsp;&nbsp;&nbsp;&nbsp;
								<span class="foo sstatus1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Tahap Seleksi&nbsp;&nbsp;&nbsp;&nbsp;
								<span class="foo sstatus2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Lolos
							</p>
						@else
							<p style="margin-bottom: 0;margin-top: 15px;opacity: 1;font-size: 1.5rem;font-weight: 400">
								<a href="{{ route('landing.team.cetak') }}" style="color: #fff;background: #16d31c;border-radius: 5px;padding: 5px 10px;" target="_blank">
									<i class="fa fa-print"></i> Cetak Kartu Registrasi
								</a>
							</p>
						@endif
					</div>
				</div>
			</div>				
		</div>		
	</section>
	

	<section id="juri" class="subsection background_color1">
		<div class="container">
		    <!-- INTRO -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center">
					<div class="intro">
						<h3><b>Selamat Datang,</b> {{ auth()->guard('team')->user()->nama }}!</h3>
						<h5>
							Tinggal selangkah lagi kalian akan resmi menjadi peserta <b>Hackathon Samarinda</b>.
						</h5>
						<br/><br/>
					</div>
				</div>
			</div>
		    <!-- //INTRO -->	
			
			<div class="row">

				@foreach($peserta->peserta as $temp)
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 align-center prize_anim3 animated fadeInLeft">

					@if(!is_null($temp->foto))
						<img src="{{ asset('upload/peserta/'.$temp->foto) }}" class="img_responsive" width="175" height="175" style="object-fit: cover;">
					@else
						<img src="{{ Avatar::create($temp->nama) }}" class="img_responsive" alt="" width="175">
					@endif

					<div class="prize_member_info">
						<h4>{!! $temp->nama !!}</h4>
						<h6>{!! pilihStatusJob($temp->status) !!}</h6>
					</div>
					<div class="social_icons_container align-center">
					  	<div class="social_icons">
			                <ul>
			                    <li>
			                    	<a href="">
			                    		<i class="fa fa-phone"></i> {{ $temp->telp }}
			                    	</a>
			                    </li>
			                    <li>
			                    	<a href="">
			                    		<i class="fa fa-envelope"></i> {{ $temp->email }}
			                    	</a>
			                    </li>
			                </ul>
					    </div>
				    </div>
				</div>
				@endforeach

			</div>	
								
		</div>		
	</section>

	<section id="cta_download" class="subsection background_color3">
		<div class="container">
		
		    <!-- INTRO -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center cta_download_anim1 animated fadeInUp">
					<div class="intro">
						<h3><b>Siap untuk menyelesaikan</b> <br/>Challenge Pertama <b>dari kami ?</b></h3>
					</div>
				</div>
			</div>
			<!-- //INTRO -->
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-center">
					
					<div class="store_button cta_download_anim2 animated fadeInUp">
						<div class="btn btn_with_icon" onclick="location.href='{{ route('landing.team.challenge') }}'" style="padding-left:30px;padding-right:30px;">
							<center>
								<div class="btn_content"><span>Klik Disini untuk Menyelesaikan</span>
								<h6>Challenge Pertama</h6></div>
							</center>
						</div>
					</div>
				
				</div>
			</div>				
		</div>		
	</section>

@stop