/*
*
* Author @BaoHuyBaoHuy
*
*/

$(document).ready(function() {
  // Datatable
  var table = $('#datatable').DataTable({
  	'order': [[ 2, 'asc' ]],
    "columnDefs": [
      {
        "targets": [ 0 ],
        "visible": false,
        "searchable": false
      }
    ],
    // select: true,
    //     language: {
    //         select: {
    //             rows: {
    //                 _: "You have selected %d rows",
    //                 0: "Click a row to select it",
    //                 1: "Only 1 row selected"
    //             }
    //         }
    //     }
  });

  $('#datatable tbody').on('dblclick', 'tr', function () {
    var data = table.row( this ).data();
    Turbolinks.visit(data[0]);
  } );

  // Datepicker
  $('.daterangepicker').daterangepicker({
    format: 'DD/MM/YYYY',

    singleDatePicker: true,
    calender_style: "picker_1"
  }).inputmask('dd/mm/yyyy');

  // Select2
  $(".select2_single").select2({
    placeholder: "Chọn một địa điểm",
    allowClear: true
  });
  $(".select2_single.weekdays").select2({
    placeholder: "Chọn thứ",
    allowClear: true
  });
  $(".select2_multiple").select2();

  // SlimScroll
  $('.slim').slimscroll({
    alwaysVisible: true,
    height: '300px'
  })

})