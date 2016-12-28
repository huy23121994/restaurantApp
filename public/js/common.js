/*
*
* Author @BaoHuyBaoHuy
*
*/

if (typeof NProgress != 'undefined') {
  $(document).on('page:fetch',   function() { NProgress.set(0.3); });
  $(document).on('page:change',  function() { NProgress.done(); });
  $(document).on('page:restore', function() { NProgress.remove(); });
}

$(document).ready(function() {
  // Datatable
  $('#datatable').dataTable({
  	'order': [[ 1, 'asc' ]],
    select: true,
        language: {
            select: {
                rows: {
                    _: "You have selected %d rows",
                    0: "Click a row to select it",
                    1: "Only 1 row selected"
                }
            }
        }
  });

  // Datepicker
  $('.daterangepicker').daterangepicker({
    singleDatePicker: true,
    calender_style: "picker_1"
  }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });

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
})