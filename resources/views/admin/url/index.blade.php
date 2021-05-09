@extends('layouts.app')

@section('title', 'URL'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    URL <small class="text-muted">Lists</small>
                </h4>
            </div><!--col-->

           
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover" id="url-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Short Code</th>
                            <th>Full URL</th>
                            <th>Counter</th>
                            <th>Expiry</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="small-input"></th>
                                <th class="small-input"></th>
                                <th class="small-input"></th>   
                                <th class="small-input"></th>   
                                <th class="small-input"></th>   
                                <th class="small-input"></th>
                                <th></th>   
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->

@push('scripts')
<script>
$(function() {
    $('#url-table').DataTable({
        processing: true,
        serverSide: true,
        
        order: [[0, "desc"]],
        ajax: {
            url: '{!! route("admin.url.index") !!}',
        },
        dom: 'Bfrtlip',
        buttons: [],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'short_code', name: 'short_code'},
            { data: 'full_url',name:'full_url'},
            { data: 'counter',name:'counter'},
            { data: 'expiry', name:'expiry'},
            { data: 'created_at', name:'created_at'},
            { data: 'actions', name:'actions'}
        ],
        "columnDefs": [
             { "orderable": false, "targets": [6] }
         ],
        initComplete: function () {
                    this.api().columns([1,2]).every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                column.search($(this).val()).draw();
                            });
                    });
        }
    });

});
</script>
@endpush
@endsection
