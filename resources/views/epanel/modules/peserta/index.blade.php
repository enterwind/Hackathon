@extends('epanel.layouts.main')

@section('title')
    Module Peserta
@stop

@section('mPeserta') active @stop

@section('js')  
    <script src="{{ asset('backend/js/lib/datatables-net/datatables.min.js') }}"></script>
    <script>
        $(function() {
            $('#datatable').DataTable();
        });
    </script>
@stop

@section('css')
    @include('epanel.layouts.partials.datatables')
    <style type="text/css">
        p {
            margin-bottom: 0!important;
        }
    </style>
@stop

@section('content')
    @if(!$data->count())

        @include('epanel.layouts.components.kosong', [
            'icon' => 'font-icon font-icon-event',
            'judul' => 'Module Peserta',
            'subjudul' => 'Sepertinya belum ada Peserta yang mendaftar.'
        ])

    @else
        
        {!! Form::open(['method' => 'delete', 'route' => ['epanel.peserta.destroy', 'hapus-all'], 'id' => 'submit-all']) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Module',
                'subjudul' => 'Peserta'
            ])

            <div class="card">
                <div class="card-block">
                    <table id="datatable" class="display table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center" width="1">
                                    #
                                </th>
                                <th width="20%">DAFTAR TEAM</th>
                                <th width="10%"></th>
                                <th>ASAL</th>
                                <th>BASECAMP</th>
                                <th>STATUS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tables">
                        @foreach($data as $i => $temp)
                            <tr>
                                <td align="center">{{ ++$i }}</td>
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
                                        Kampus / Instansi
                                    </div>
                                    {!! $temp->asal !!}
                                </td>
                                <td>
                                    <div class="font-11 color-blue-grey-lighter uppercase">
                                        Alamat / Basecamp
                                    </div>
                                    {!! $temp->alamat !!}
                                </td>
                                <td>
                                    <code>{{ pilihStatusPeserta($temp->status) }}</code>
                                    @if($temp->status == 1)
                                    <div class="font-11 color-blue-grey-lighter uppercase">
                                        {{ tgl_indo(date('Y-m-d', strtotime($temp->tgl_konek))) }}
                                    </div>
                                    @endif
                                </td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <div class="btn-toolbar">
                                        <div class="btn-group btn-group-sm">

                                            @if($temp->status == 1)
                                                <a href="{{ route('epanel.peserta.show', $temp->easter_egg) }}?purpose=terima" role="button"
                                                    data-toggle="tooltip" data-placement="top" title="LOLOSKAN!" 
                                                    class="btn btn-sm btn-success" style="float:none;">
                                                    <span class="fa fa-check"></span>
                                                </a>
                                            @endif

                                            @if($temp->status == 2)
                                                <a href="{{ route('epanel.peserta.show', $temp->easter_egg) }}?purpose=terima" role="button"
                                                    data-toggle="tooltip" data-placement="top" title="BATALKAN!" 
                                                    class="btn btn-sm btn-danger" style="float:none;">
                                                    <span class="fa fa-times"></span>
                                                </a>
                                            @endif

                                            <a href="{{ route('epanel.peserta.show', $temp->easter_egg) }}" role="button" 
                                                    data-toggle="tooltip" data-placement="top" title="Detail Lengkap" 
                                                class="btn btn-sm btn-info" style="float:none;">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        {!! Form::close() !!}
    @endif
@endsection