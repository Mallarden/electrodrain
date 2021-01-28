(function ($, root, undefined) {
  $(function () {
    "use strict";
    var $element = $(".arrow-scroll");

    $(window).scroll(function () {
      if ($(this).scrollTop() > 0) {
        $element.fadeOut(500);
      } else {
        $element.fadeIn(500);
      }
    });
  });
})(jQuery, this);
