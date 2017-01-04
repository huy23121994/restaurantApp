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
})