<link rel="stylesheet" href="{{ asset('backend/css/separate/pages/others.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/lib/datatables-net/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/separate/vendor/datatables-net.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/separate/vendor/select2.min.css') }}">
<style type="text/css">
    .dataTables_wrapper .row {
        width: 100%;
        margin: 0;
    }
    div.dataTables_wrapper div.dataTables_length label {
        float: left;
    }
    .table .table-check .checkbox {
        text-align: center;
        top: 0px;
        float: none;
    }
    table.dataTable thead>tr>th.sorting_asc,
    table.dataTable thead>tr>th.sorting_desc,
    table.dataTable thead>tr>th.sorting,
    table.dataTable thead>tr>td.sorting_asc,
    table.dataTable thead>tr>td.sorting_desc,
    table.dataTable thead>tr>td.sorting {
        padding-right: 8px;
    }
     
    th.sorting_asc::after,
    th.sorting_desc::after,
    table.dataTable thead .sorting:after {
       content:"" !important;
    }
    table.dataTable tbody td {
        padding: 5px 10px;
    }
    .box-typical {
        -webkit-border-radius: 0!important;
        border-radius: 0px!important;
        margin: 0 0 -1px!important;
    }
    .card-block {
        padding: 20px 0 10px!important;
    }
    .bootstrap-table .table .table-check, .fixed-table-body .table .table-check, .table .table-check {
        padding-left: 5px;
    }
</style>