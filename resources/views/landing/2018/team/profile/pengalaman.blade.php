@extends('landing.2018.team.profile._main')

@section('judul')
Update Pengalaman
@stop

@section('sPengalaman')
active
@stop

@section('isi-profile')

	<style type="text/css">
		.btn-hapus {
			background: #ad1f26;
			line-height: 0;
			height: 1.7rem;
    		padding: 0 10px;
    		letter-spacing: 0;
    		font-size: 0.8rem;
		}
	</style>

	<h3>
		Daftar Pengalaman
		<button style="float: right" class="btn" onclick="location.href='{{ route('landing.team.pengalaman.tambah') }}'">
			Upload
		</button>
	</h3>
	<p>
		Silahkan upload bukti pengalaman kalian sebanyak mungkin, bisa berupa sertifikat, project dan lain-lain. 
		Lampirkan sebanyak-banyaknya agar penilaian kalian lebih baik.
	</p>

	<table class="table">
		<thead>
			<tr>
				<th width="1" align="center">No</th>
				<th>Keterangan</th>
				<th>File</th>
				<th width="1"></th>
			</tr>
		</thead>
		<tbody>
			@forelse($peserta->pengalaman as $i => $temp)
			<tr>
				<td align="center">{{ ++$i }}</td>
				<td>{{ $temp->keterangan }}</td>
				<td>
					<a href="{{ asset('upload/pengalaman/'.$temp->file) }}" target="_blank">
						{{ $temp->file }}
					</a>
				</td>
				<td>
					{!! Form::open(['method' => 'delete', 'route' => ['landing.team.pengalaman.hapus', $temp->id], 'onsubmit' => 'return confirm("Anda yakin ingin menghapus pengalaman ini?")']) !!}
						<button class="btn btn-hapus" type="submit">
							Hapus
						</button>
					{!! Form::close() !!}
				</td>
			</tr>
			@empty
			<tr>
				<td colspan="3">
					<center>
						- Belum Ada Pengalaman -<br/>
						<small>
							Upload sekarang juga karena ini akan mempengaruhi nilai Anda.
						</small>
					</center>
				</td>
			</tr>
			@endforelse
		</tbody>
	</table>
	
@stop