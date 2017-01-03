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

  /* Change images before upload */
  $('.need_preview').on('change',function(){
        readURL(this,$(this).data('img')); 
    })
  function readURL(input,selector) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (theFile) {
              var image = new Image();
              image.src = theFile.target.result;
              image.onload = function() {
                  $(selector).attr('src', this.src);
           
              };
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  /* END change image*/
  var required_error = $('input[required="required"]');
  window.ParsleyUI.updateError(required_error, {message: 'ok'});
})