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
$(document).ready(function() {
  $('#dataTablekoordinator').DataTable( {
      processing: true,
      serverSide: true,
      pageLength: 10,
      stateSave: false,
      lengthMenu: [ [10, 25, 50, 100, 200, 500, 1000 ], [10, 25, 50, 100, 200, 500, 1000, "All"] ],
      pagingType: "full_numbers",
      dom: 'lBfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'print',
          {
            extend: 'pdfHtml5',
            download: 'open',
            exportOptions: {
              columns: [ 0, 1, 2, 3]
            },
            orientation: 'portrait',
            pageSize: 'LEGAL',
            customize: function (doc) {
              
              //Remove the title created by datatTables
              doc.content.splice(0,1);
              //Create a date string that we use in the footer. Format is dd-mm-yyyy
              var now = new Date();
              var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
              // Logo converted to base64
              // var logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
              // The above call should work, but not when called from codepen.io
              // So we use a online converter and paste the string in.
              // Done on http://codebeautify.org/image-to-base64-converter
              // It's a LONG string scroll down to see the rest of the code !!!
              
              // A documentation reference can be found at
              // https://github.com/bpampuch/pdfmake#getting-started
              // Set page margins [left,top,right,bottom] or [horizontal,vertical]
              // or one number for equal spread
              // It's important to create enough space at the top for a header !!!
              doc.pageMargins = [50,80,80,30];
              // Set the font size fot the entire document
              doc.defaultStyle.fontSize = 12;
              // Set the fontsize for the table header
              doc.styles.tableHeader.fontSize = 12;
              doc.styles['td:nth-child(2)'] = { 
                width: '100px',
                'max-width': '100px'
              };
              // Create a header object with 3 columns
              // Left side: Logo
              // Middle: brandname
              // Right side: A document title
              doc['header']=(function() {
                return {
                  columns: [
                    {
                      image: logo,
                      width: 50
                    },
                    {
                      alignment: 'left',
                      italics: true,
                      text: 'Koordinator Pemenangan H. Umar Halim',
                      fontSize: 18,
                      margin: [10,0]
                    }
                  ],
                  margin: 20
                }
              });
              // Create a footer object with 2 columns
              // Left side: report creation date
              // Right side: current page and total pages
              doc['footer']=(function(page, pages) {
                return {
                  columns: [
                    {
                      alignment: 'left',
                      text: ['Created on: ', { text: jsDate.toString() }]
                    },
                    {
                      alignment: 'right',
                      text: ['page ', { text: page.toString() },	' of ',	{ text: pages.toString() }]
                    }
                  ],
                  margin: 20
                }
              });
              // Change dataTable layout (Table styling)
              // To use predefined layouts uncomment the line below and comment the custom lines below
              // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
              var objLayout = {};
              objLayout['hLineWidth'] = function(i) { return .5; };
              objLayout['vLineWidth'] = function(i) { return .5; };
              objLayout['hLineColor'] = function(i) { return '#aaa'; };
              objLayout['vLineColor'] = function(i) { return '#aaa'; };
              objLayout['paddingLeft'] = function(i) { return 4; };
              objLayout['paddingRight'] = function(i) { return 4; };
              doc.content[0].layout = objLayout;
          },
      }],
      columnDefs: [
        {
            target: 3,
            searchable: false,
            sortable : false
        }
      ]
  } );
} );
$(document).ready(function() {
  $('#dataTablekecamatan').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'print',
          {
            extend: 'pdfHtml5',
            exportOptions: {
              columns: [ 0, 1, 2]
            },
            orientation: 'landscape',
            pageSize: 'LEGAL'}
      ]
  } );
} );