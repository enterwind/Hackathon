@extends('epanel.layouts.main')

@section('title')
    Module Periode
@stop

@section('mPeriode') active @stop

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
@stop

@section('content')
    @if(!$data->count())

        @include('epanel.layouts.components.kosong', [
            'icon' => 'font-icon font-icon-event',
            'judul' => 'Module Periode',
            'subjudul' => 'Sepertinya Anda belum memiliki Periode.', 
            'tambah' => route('epanel.periode.create')
        ])

    @else
        
        {!! Form::open(['method' => 'delete', 'route' => ['epanel.periode.destroy', 'hapus-all'], 'id' => 'submit-all']) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Module',
                'subjudul' => 'Periode',
                'tambah' => route('epanel.periode.create'), 
                'hapus' => true
            ])

            <div class="card">
                <div class="card-block">
                    <table id="datatable" class="display table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="table-check">
                                    <div class="checkbox checkbox-only">
                                        <input type="checkbox" id="check-all">
                                        <label for="check-all"></label>
                                    </div>
                                </th>
                                <th width="25%">TAHUN</th>
                                <th>PESERTA</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tables">
                        @foreach($data as $i => $temp)
                            <tr>
                                <td class="table-check">
                                    <span>
                                        <div class="checkbox checkbox-only">
                                            <input type="checkbox" id="pilihan[{{$i}}]" name="pilihan[]" value="{!! $temp->id !!}">
                                            <label for="pilihan[{{$i}}]"></label>
                                        </div>
                                    </span>
                                </td>
                                <td>
                                    {!! $temp->tahun !!}
                                </td>
                                <td>0 Team(s)</td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <div class="btn-toolbar">
                                        <div class="btn-group btn-group-sm">
                                            @if($temp->status == 1)
                                            <a href="{{ route('epanel.periode.edit', $temp->id) }}?purpose=aktivasi" role="button" 
                                                class="btn btn-sm btn-success" style="float:none;">
                                                <span class="font-icon font-icon-ok"></span>
                                            </a>
                                            @else
                                            <a href="{{ route('epanel.periode.edit', $temp->id) }}?purpose=aktivasi" role="button" 
                                                class="btn btn-sm btn-default" style="float:none;">
                                                <span class="font-icon font-icon-del"></span>
                                            </a>
                                            @endif
                                            <a href="{{ route('epanel.periode.edit', $temp->id) }}" role="button" 
                                                class="btn btn-sm btn-primary" style="float:none;">
                                                <span class="font-icon font-icon-pencil"></span>
                                            </a>
                                            <button onclick="javascript:deleteModal('{!!$temp->id!!}')" type="button" 
                                                class="btn btn-sm btn-danger" style="float: none;">
                                                <span class="font-icon font-icon-trash"></span>
                                            </button>
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