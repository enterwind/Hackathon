@extends('epanel.layouts.main')

@section('title')
    Module Juri
@stop

@section('mJuri') active @stop

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
            'judul' => 'Module Juri',
            'subjudul' => 'Sepertinya Anda belum memiliki Juri.', 
            'tambah' => route('epanel.juri.create')
        ])

    @else
        
        {!! Form::open(['method' => 'delete', 'route' => ['epanel.juri.destroy', 'hapus-all'], 'id' => 'submit-all']) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Module',
                'subjudul' => 'Juri',
                'tambah' => route('epanel.juri.create'), 
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
                                <th width="25%">NAMA</th>
                                <th>PROFESI</th>
                                <th></th>
                                <th></th>
                                <th></th>
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
                                    {!! $temp->nama !!}
                                </td>
                                <td>
                                    {!! $temp->profesi !!}
                                </td>
                                <td>
                                    <div class="font-11 color-blue-grey-lighter uppercase">
                                        Facebook
                                    </div>
                                    {!! $temp->facebook ? $temp->facebook : '-' !!}
                                </td>
                                <td>
                                    <div class="font-11 color-blue-grey-lighter uppercase">
                                        Twitter
                                    </div>
                                    {!! $temp->twitter ? $temp->twitter : '-' !!}
                                </td>
                                <td>
                                    <div class="font-11 color-blue-grey-lighter uppercase">
                                        Instagram
                                    </div>
                                    {!! $temp->instagram ? $temp->instagram : '-' !!}
                                </td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <div class="btn-toolbar">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('epanel.juri.edit', $temp->id) }}" role="button" 
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