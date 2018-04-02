@extends('epanel.layouts.main')

@section('title')
	Hai, {{ auth()->user()->nama }}!
@stop

@section('mBeranda')
	active
@stop

@section('css')
<style type="text/css">
	.chart-statistic-box {
		margin-bottom: 15px!important;
	}
	.statistic-box {
		margin-bottom: 20px!important;
	}
	body {
		background-image: url("{{ asset('img/bg.svg') }}")!important;
	}
</style>
@stop

@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
	$(document).ready(function() {
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			var dataTable = new google.visualization.DataTable();
			dataTable.addColumn('string', 'Day');
			dataTable.addColumn('number', 'Values');
			// A column for custom tooltip content
			dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
			dataTable.addRows([
				['SEN',  5, ' '],
				['SEL',  10, '10'],
				['RAB',  35, '35'],
				['KAM',  50, '50'],
				['JUM',  6, '6'],
				['SAB',  22, '22'],
				['MIN',  16, '16'],
				['SEN',  55, '55'],
				['SEL',  55, ' ']
			]);

			var options = {
				height: 314,
				legend: 'none',
				areaOpacity: 0.18,
				axisTitlesPosition: 'out',
				hAxis: {
					title: '',
					textStyle: {
						color: '#fff',
						fontName: 'San Francisco',
						fontSize: 11,
						bold: true,
						italic: false
					},
					textPosition: 'out'
				},
				vAxis: {
					minValue: 0,
					textPosition: 'out',
					textStyle: {
						color: '#fff',
						fontName: 'San Francisco',
						fontSize: 11,
						bold: true,
						italic: false
					},
					baselineColor: '#16b4fc',
					ticks: [0,5,10,15,20,25,30,35,40,45,50,55,60,65,70],
					gridlines: {
						color: '#1ba0fc',
						count: 15
					}
				},
				lineWidth: 2,
				colors: ['#fff'],
				curveType: 'function',
				pointSize: 5,
				pointShapeType: 'circle',
				pointFillColor: '#f00',
				backgroundColor: {
					fill: '#008ffb',
					strokeWidth: 0,
				},
				chartArea:{
					left:0,
					top:0,
					width:'100%',
					height:'100%'
				},
				fontSize: 11,
				fontName: 'San Francisco',
				tooltip: {
					trigger: 'selection',
					isHtml: true
				}
			};

			var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
			chart.draw(dataTable, options);
		}
		$(window).resize(function(){
			drawChart();
			setTimeout(function(){
			}, 1000);
		});
	});
</script>
@stop

@section('content')
	<div class="row">
		<div class="col-md-5">
			<div class="chart-statistic-box">
                <div class="chart-txt">
                    <div class="chart-txt-top">
                        <p><span class="number">1.540</span> <span class="unit">Kali</span></p>
                        <p class="caption">Total Kunjungan</p>
                    </div>
                    <table class="tbl-data">
                        <tbody><tr>
                            <td class="price color-purple">12</td>
                            <td>Hari Ini</td>
                        </tr>
                        <tr>
                            <td class="price color-yellow">150</td>
                            <td>Minggu Ini</td>
                        </tr>
                        <tr>
                            <td class="price color-lime">553</td>
                            <td>Bulan Ini</td>
                        </tr>
                    </tbody></table>
                </div>
                <div class="chart-container">
                    <div class="chart-container-in">
                        <div id="chart_div"></div>
                        <header class="chart-container-title">Pengunjung</header>
                        <div class="chart-container-x">
                            <div class="item"></div>
                            <div class="item">tue</div>
                            <div class="item">wed</div>
                            <div class="item">thu</div>
                            <div class="item">fri</div>
                            <div class="item">sat</div>
                            <div class="item">sun</div>
                            <div class="item">mon</div>
                            <div class="item"></div>
                        </div>
                        <div class="chart-container-y">
                            <div class="item">70</div>
                            <div class="item"></div>
                            <div class="item">60</div>
                            <div class="item"></div>
                            <div class="item">50</div>
                            <div class="item"></div>
                            <div class="item">40</div>
                            <div class="item"></div>
                            <div class="item">30</div>
                            <div class="item"></div>
                            <div class="item">20</div>
                            <div class="item"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <article class="statistic-box red">
                        <div>
                            <div class="number">0</div>
                            <div class="caption"><div>Team</div></div>
                        </div>
                    </article>
                </div><!--.col-->
                <div class="col-sm-6">
                    <article class="statistic-box purple">
                        <div>
                            <div class="number">0</div>
                            <div class="caption"><div>Peserta</div></div>
                        </div>
                    </article>
                </div><!--.col-->
                <div class="col-sm-6">
                    <article class="statistic-box yellow">
                        <div>
                            <div class="number">{{ Sponsor::count() }}</div>
                            <div class="caption"><div>Sponsor</div></div>
                        </div>
                    </article>
                </div><!--.col-->
                <div class="col-sm-6">
                    <article class="statistic-box green">
                        <div>
                            <div class="number">0</div>
                            <div class="caption"><div>Berita</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </div>
		</div>
		<div class="col-md-7">

			<section class="box-typical faq-page">
			    <header class="box-typical-header">
			        <div class="tbl-row">

			            <div class="tbl-cell tbl-cell-title">
			                <h3>
			                    <small>Daftar Terbaru</small><br/>
			                    <b>CALON PESERTA</b>
			                </h3>
			            </div>
		                <div class="tbl-cell tbl-cell-action-bordered">
		                    <a class="action-btn" href="{{ route('epanel.peserta.index') }}">
		                        <i class="font-icon font-icon-users"></i> Lengkap
		                    </a>
		                </div>
			        </div>
			    </header>
			    <table class="display table table-striped table-sm" cellspacing="0" width="100%">
	                <thead>
	                    <tr>
	                        <th width="1" class="text-center">
	                            #
	                        </th>
	                        <th width="30%">DAFTAR TEAM</th>
	                        <th width="15%"></th>
	                        <th>ASAL</th>
	                        {{-- <th></th> --}}
	                        <th width="5%"></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach(Team::latest()->get() as $i => $temp)
	                	<tr>
	                		<td>{{ ++$i }}</td>
	                		<td>
	                			{!! $temp->nama !!}
	                			<div class="font-11 color-blue-grey-lighter">
	                				<i class="font-icon font-icon-mail"></i> &nbsp;
	                                <a href="mailto:{!! $temp->email !!}" target="_blank">{!! $temp->email !!}</a>
	                            </div>
	                		</td>
	                		<td>
	                			<div class="font-11 color-blue-grey-lighter uppercase">
	                                Total Peserta
	                            </div>
	                			{!! $temp->peserta ? $temp->peserta->count() : 0 !!} Orang
	                		</td>
	                		<td>
	                			<div class="font-11 color-blue-grey-lighter uppercase">
	                                Kampus
	                            </div>
	                			{!! $temp->asal !!}
	                		</td>
	                		{{-- <td>
	                			<div class="font-11 color-blue-grey-lighter uppercase">
	                                Basecamp
	                            </div>
	                			<small>{!! $temp->alamat !!}</small>
	                		</td> --}}
	                		<td>
	                			@if($temp->status == 2)
		                			<a href="#" role="button" data-toggle="tooltip" data-placement="top" title="Lolos"
		                                class="btn btn-sm btn-success">
		                                <span class="fa fa-check"></span>
		                            </a>
	                            @elseif($temp->status == 1)
	                            	<a href="#" role="button" data-toggle="tooltip" data-placement="top" title="Tahap Seleksi"
		                                class="btn btn-sm btn-warning">
		                                <span class="fa fa-refresh"></span>
		                            </a>
	                            @else
	                            	<a href="#" role="button" data-toggle="tooltip" data-placement="top" title="Menunggu <br/>Challenge"
		                                class="btn btn-sm btn-danger">
		                                <span class="fa fa-times"></span>
		                            </a>
	                            @endif
	                		</td>
	                	</tr>
	                	@endforeach
	                </tbody>
	            </table>
	            <header class="box-typical-header">
				    <div class="modal-footer">
						<p class="pull-right text-left" style="margin-bottom:0">
							Total terdaftar <b><span class="color-red">{{ Peserta::count() }} Peserta dari {{ Team::count() }} Tim</span></b>
						</p>
					</div>
				</header>
			</section>
		</div>
	</div>
@stop