@extends('epanel.layouts.main')

@section('title')
    Buat Peserta Baru
@stop

@section('mPeserta') active @stop

@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/lib/summernote/summernote.css') }}"/>
@stop

@section('js')
<script src="{{ asset('backend/js/lib/summernote/summernote.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 100
        });
    });
</script>
@stop

@section('content')
    <section class="box-typical">
        @include('epanel.layouts.components.top', [
            'judul' => 'Detail Tim',
            'subjudul' => $detail->nama,
            'kembali' => route('epanel.peserta.index')
        ])
    </section>
    <section class="tabs-section">
                <div class="tabs-section-nav">
                    <div class="tbl">
                        <ul class="nav" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" href="#tabs-2-tab-1" role="tab" data-toggle="tab" aria-selected="false">
                                    <span class="nav-link-in">
                                        Profil Tim
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabs-2-tab-2" role="tab" data-toggle="tab" aria-selected="true">
                                    <span class="nav-link-in">
                                        Anggota Tim
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabs-2-tab-3" role="tab" data-toggle="tab">
                                    <span class="nav-link-in">
                                        Pengalaman Tim
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!--.tabs-section-nav-->

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="tabs-2-tab-1">

                        <table class="table table-sm table-bordered">
                            <tr>
                                <th width="30%">Nama Team</th>
                                <td>{{ $detail->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><a href="mailto:{{ $detail->email }}">{{ $detail->email }}</a></td>
                            </tr>
                            <tr>
                                <th>Asal Instansi / Sekolah / Perguruan Tinggi</th>
                                <td>{{ $detail->asal }}</td>
                            </tr>
                            <tr>
                                <th>Alamat (Basecamp)</th>
                                <td>{{ $detail->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Status Keikutsertaan</th>
                                <td>
                                    @if($detail->status == 0)
                                        <span class="label label-danger">{{ pilihStatusPeserta(0) }}</span>
                                    @endif
                                    @if($detail->status == 1)
                                        <span class="label label-warning">{{ pilihStatusPeserta(1) }}</span> ({{ tgl_indo(date('Y-m-d', strtotime($detail->tgl_konek))) }})
                                    @endif
                                    @if($detail->status == 2)
                                        <span class="label label-success">{{ pilihStatusPeserta(2) }}</span>
                                    @endif
                                </td>
                            </tr>
                        </table>

                    </div><!--.tab-pane-->
                    <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-2">

                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th width="1" align="center">No</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($detail->peserta as $i => $temp)
                                <tr>
                                    <td align="center">{{ ++$i }}</td>
                                    <td>{{ $temp->nama }}</td>
                                    <td>{{ $temp->telp }}</td>
                                    <td><a href="mailto:{{ $temp->email }}">{{ $temp->email }}</a></td>
                                    <td>{{ pilihStatusJob($temp->status) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <center>
                                            - Belum Ada Peserta -
                                        </center>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div><!--.tab-pane-->
                    <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-3">

                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th width="1" align="center">No</th>
                                    <th>Keterangan</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($detail->pengalaman as $i => $temp)
                                <tr>
                                    <td align="center">{{ ++$i }}</td>
                                    <td>{{ $temp->keterangan }}</td>
                                    <td>
                                        <a href="{{ asset('upload/pengalaman/'.$temp->file) }}" target="_blank">
                                            {{ $temp->file }}
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">
                                        <center>
                                            - Belum Ada Pengalaman -<br/>
                                            <small>
                                                Himbau para calon peserta untuk melampirkan lampiran sebanyak yang mereka miliki.
                                            </small>
                                        </center>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div><!--.tab-pane-->
                </div><!--.tab-content-->
            </section>
@stop