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
  $('.daterangepicker').daterangepicker({
    singleDatePicker: true,
    calender_style: "picker_1"
  }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
})