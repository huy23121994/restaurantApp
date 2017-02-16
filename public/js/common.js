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

  $(document).on('change','.need_preview',function(){
    readURL(this,$(this).data('img'));
  });

  $(document).on('submit','form', function () {
    $(this).find('button[data-loading-text]').button('loading');
  })

})

/* Change image before upload */
function readURL(input,selector, callback) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (theFile) {
        var image = new Image();
        image.src = theFile.target.result;
        image.onload = function() {
            $(selector).attr('src', this.src);
            if (typeof callback === "function") {
              callback();
            }
        };
    }
    reader.readAsDataURL(input.files[0]);
  }
}