@extends('epanel.layouts.main')

@section('title')
    Module FAQ
@stop

@section('mFaq') active @stop

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
            'judul' => 'Module FAQ',
            'subjudul' => 'Sepertinya Anda belum memiliki FAQ.', 
            'tambah' => route('epanel.faq.create')
        ])

    @else
        
        {!! Form::open(['method' => 'delete', 'route' => ['epanel.faq.destroy', 'hapus-all'], 'id' => 'submit-all']) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Module',
                'subjudul' => 'FAQ (Frequently Ask & Question)',
                'tambah' => route('epanel.faq.create'), 
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
                                    <div class="font-11 color-blue-grey-lighter uppercase">
                                        Pertanyaan
                                    </div>
                                    {!! $temp->question !!}
                                </td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <div class="btn-toolbar">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('epanel.faq.edit', $temp->id) }}" role="button" 
                                                class="btn btn-sm btn-primary" style="float:none;">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            <button onclick="javascript:deleteModal('{!!$temp->id!!}')" type="button" 
                                                class="btn btn-sm btn-danger" style="float: none;">
                                                <span class="glyphicon glyphicon-trash"></span>
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