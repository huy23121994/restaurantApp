/***
* @Author BaoHuyBaoHuy
**/

$(document).ready(function() {
  // Datatable
  var table = $('#datatable').DataTable({
  	'order': [[ 1, 'asc' ]],
    // "columnDefs": [
    //   {
    //     "targets": 0 ,
    //     "visible": false,
    //     "searchable": false
    //   }
    // ],
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
  table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

  // $('#datatable tbody').on('dblclick', 'tr', function () {
  //   var data = table.row( this ).data();
  //   Turbolinks.visit(data[0]);
  // } );

  // Datepicker
  $('.daterangepicker').each(function(){
    $(this).daterangepicker({
      format: 'DD/MM/YYYY',

      singleDatePicker: true,
      calender_style: "picker_1"
    }).inputmask('dd/mm/yyyy');
  })
  

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

  /**
  * Crop Image
  */
  var $crop_avatar_modal = $('#crop_avatar_modal'),
    $input = $('input[name="avatar"]'),
    status = '';
    
  $input.change(function(){
    status = 'modified';
    if ($input.val() == '') {
      // No files chosen
      $('.cropper').cropper('destroy');
      $crop_avatar_modal.modal('hide');

    }else if ($crop_avatar_modal.hasClass('in')){
      // change image preview
      readURL(this,$(this).data('img'), function(){
        var img_change_url = $('.cropper').attr('src');
        $('.cropper').cropper('reset').cropper('replace', img_change_url);
      }); 

    }else{
      $('.cropper').cropper('destroy');
      $crop_avatar_modal.modal('show');
      $crop_avatar_modal.on('shown.bs.modal',function(){
        $('.cropper').cropper({
          aspectRatio: 1 / 1,
          preview: '.img-preview',
          zoomable: false,
          crop: function(e) {
            $('input[name="crop_x"]').val(e.x);
            $('input[name="crop_y"]').val(e.y);
            $('input[name="crop_width"]').val(e.width);
            $('input[name="crop_height"]').val(e.height);
          }
        });
      })
    }
  })

  $('#crop_avatar_modal').find('button#save').click(function(){
    status = 'save';
  })

  $crop_avatar_modal.on('hidden.bs.modal',function(){
    if (status != 'save') {
      $input.val('');
      $('.cropper').cropper('destroy');
    };
  })

})