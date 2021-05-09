@extends('layouts.app')

@section('title', 'Users'))


@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    User <small class="text-muted">Lists</small>
                </h4>
            </div><!--col-->

           
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover" id="users-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="small-input"></th>
                                <th class="small-input"></th>
                                <th class="small-input"></th>   
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
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        
        order: [[0, "desc"]],
        ajax: {
            url: '{!! route("admin.user.index") !!}',
        },
        dom: 'Bfrtlip',
        buttons: [],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name'},
            { data: 'email',name:'email'},
            { data: 'user_type',name:'user_type'},
            { data: 'created_at', name:'created_at'}
        ],
        "columnDefs": [
             { "orderable": false, "targets": [3] }
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
