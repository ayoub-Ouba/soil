/*
 Template Name: Veltrix - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Datatable js
 */

 $(document).ready(function() {
    $('#datatable').DataTable();

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: [
            {
                extend: 'copy',
                className: 'btn btn-light font-weight-bold border px-4' 
            },
            {
                extend: 'excel',
                className: 'btn btn-light font-weight-bold border px-4' 
            },
            {
                extend: 'pdf',
                className: 'btn btn-light font-weight-bold border px-4' 
            }
        ]
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
});
