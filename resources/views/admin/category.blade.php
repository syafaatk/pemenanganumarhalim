@extends('admin.layout')

@section('title','Categories')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Kecamatan</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <a class="btn btn-primary" href="{{ route('admin.category/create') }}">
                    Tambah Kecamatan
                </a>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Kecamatan</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered yajra-datatable" id="example">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Name</th>
                            <th>KabKota</th>
                            <th>Total</th>
                            <th>Print</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>
<script type="text/javascript">
    function format ( d ) {
        // `d` is the original data object for the row
    //console.log(d);
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Full name:</td>'+
                '<td>'+d.name+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extension number:</td>'+
                '<td>'+d.totalkel+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
            '</tr>'+
        '</table>';
    }

    // Global var to track shown child rows
    var childRows = null;

    $(function () {
      var table = $('#example').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        stateSave: false,
        lengthMenu: [ [10, 25, 50, 100, 200, 500, 1000 ], [10, 25, 50, 100, 200, 500, 1000, "All"] ],
        pagingType: "full_numbers",
        ajax: "{{ route('admin.category.list') }}",
        columns: [
            {
                className:      'details-control',
                orderable:      false,
                data:           null,
                defaultContent: ''
            },
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'kabkota', name: 'kabkota'},
            {
                data: 'total',
                'render': function (data, type, full, meta) {
                    return data;
                }
            },
            {
                data: 'id',
                'render': function (data, type, full, meta) {
                    return '<a class="btn btn-primary" data-action="edit" href="{{ url("admin/category/cetaksemua") }}/'+ data +'"><i class="fa fa-print"></i></a>';
                }
            },
            {
                data: 'id',
                'render': function (data, type, full, meta) {
                    return '<a class="btn btn-primary" data-action="edit" href="{{ url("admin/category/edit") }}/'+ data +'"><i class="fa fa-pencil-alt"></i></a>';
                }
            },
            {
                data: 'id',
                'render': function (data, type, full, meta) {
                    return '<a class="btn btn-danger" data-action="delete" href="{{ url("admin/category/delete") }}/'+ data +'"><i class="far fa-trash-alt"></i></a>';
                }
            },
        ],
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print',
            {
                extend: 'pdfHtml5',
                exportOptions: {
                columns: [ 0, 1, 2]
                },
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ],
      });
      // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                d = row.data();
                row.child( format(d) ).show();
                tr.addClass('shown');
            }
        } );

        $('button').on('click', function () {
            // Get shown rows
            childRows = table.rows($('.shown'));
            table.ajax.reload();
        });

        table.on('draw', function () {
            // If reloading table then show previously shown rows
            if (childRows) {
            
            childRows.every(function ( rowIdx, tableLoop, rowLoop ) {
                d = this.data();
                this.child($(format(d))).show();
                this.nodes().to$().addClass('shown');
            } );
            
            // Reset childRows so loop is not executed each draw
            childRows = null;
            }
            
        });
    });
  </script>
@endsection
