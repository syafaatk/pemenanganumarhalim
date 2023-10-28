// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'print',
          {
            extend: 'pdfHtml5',
            exportOptions: {
              columns: [ 0, 1, 3 , 4, 5, 6, 7 ,8, 9 ]
            },
            orientation: 'landscape',
            pageSize: 'LEGAL'}
      ],
      columnDefs: [
        {
            target: 0,
            searchable: false,
            sortable : false
        }
      ]
  } );
} );