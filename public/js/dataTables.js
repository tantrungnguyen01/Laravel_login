$(document).ready(function() {
    $('#example').DataTable({
        columnDefs: [{
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                render: function(data, type, row) {
                    return data + ' ' + row[3] + '';
                },
                targets: 0,
            },
            {
                visible: false,
                targets: [3]
            },
        ],
        scrollY: '650px',
        scrollCollapse: true,
        // pagingType: 'full_numbers',
        lengthMenu: [ 5, 10, 15, 20, 25 ]
    });
});



$(document).ready(function() {
    $('#examp').DataTable({

        scrollY: '650px',
        scrollCollapse: true,
        // pagingType: 'full_numbers',
        lengthMenu: [ 5, 10, 15, 20, 25 ]
    });
});