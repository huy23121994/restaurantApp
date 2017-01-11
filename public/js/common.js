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
            callback();
        };
    }
    reader.readAsDataURL(input.files[0]);
  }
}