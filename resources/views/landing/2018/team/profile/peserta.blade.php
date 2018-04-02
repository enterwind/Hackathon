@extends('landing.2018.team.profile._main')

@section('judul')
Update Peserta
@stop

@section('sAnggotaTim')
active
@stop

@section('isi-profile')

<style type="text/css">
	.btn-edit {
		line-height: 0;
		height: 1.7rem;
		padding: 0 10px;
		letter-spacing: 0;
		font-size: 0.8rem;
	}
</style>

<h3>Personil Inti Team</h3>
<p>
	Berikut ini adalah list peserta dalam tim Anda. Anda berkesempatan untuk melakukan perubahan bila dibutuhkan.
</p>

<table class="table">
	<thead>
		<tr>
			<th width="1" align="center">No</th>
			<th>Nama</th>
			<th>Telepon</th>
			<th>Email</th>
			<th>Status</th>
			<th width="1"></th>
		</tr>
	</thead>
	<tbody>
		@forelse($peserta->peserta as $i => $temp)
		<tr>
			<td align="center">{{ ++$i }}</td>
			<td>{{ $temp->nama }}</td>
			<td>{{ $temp->telp }}</td>
			<td>{{ $temp->email }}</td>
			<td>{{ pilihStatusJob($temp->status) }}</td>
			<td>
				<button class="btn btn-edit" onclick="location.href='{{ route('landing.team.peserta.edit', $temp->id) }}'">
					Edit
				</button>
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