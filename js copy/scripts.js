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

    $(window).on("scroll", function () {
      if ($(window).scrollTop() > 50) {
        $(".header").addClass("active");
      } else {
        //remove the background property so it comes transparent again (defined in your css)
        $(".header").removeClass("active");
      }
    });

    $(window).on("scroll", function () {
      if ($(window).scrollTop() > 50) {
        $(".header-logo").addClass("active");
      } else {
        //remove the background property so it comes transparent again (defined in your css)
        $(".header-logo").removeClass("active");
      }
    });

    var switcher = $("#hero-word-switcher");
    var delay = 2000;
    var count = switcher.find("strong").length;

    function calculateWidths() {
      switcher.find("strong").each(function (index) {
        $(this).attr("data-width", $(this).width());
      });
      switcher.width(switcher.find(".active").attr("data-width"));
    }
    calculateWidths();

    $(window).resize(function () {
      calculateWidths();
    });

    function doChange() {
      var nextItem;
      var currentItem = parseInt(switcher.find(".active").attr("data-oid"));

      if (currentItem == count - 1) {
        nextItem = 0;
      } else {
        nextItem = currentItem + 1;
      }

      switcher.addClass("in");

      switcher.find('[data-oid="' + currentItem + '"]').removeClass("active");
      switcher.find('[data-oid="' + nextItem + '"]').addClass("active");

      switcher.width(
        switcher.find('[data-oid="' + nextItem + '"]').attr("data-width")
      );
      setTimeout(doChange, delay);
    }

    setTimeout(doChange, delay);

    // $(document).ready(function () {
    //   $(".myvideos")
    //     .on("mouseover", function (event) {
    //       this.play();
    //     })
    //     .on("mouseout", function (event) {
    //       this.pause();
    //     });
    // });

    $("#customers-testimonials").owlCarousel({
      loop: true,
      center: true,
      items: 3,
      margin: 0,
      autoHeight: true,
      autoplay: true,
      dots: true,

      autoplayTimeout: 3500,
      smartSpeed: 450,
      responsive: {
        0: {
          items: 1,
        },
        768: {
          items: 2,
        },
        1170: {
          items: 3,
        },
      },
    });
  });

  function goToTwo() {
    var num2 = "#group-2";

    document.querySelector(num2).scrollIntoView();

    $(num2).trigger("click");
  }

  /*******************************
   * ACCORDION WITH TOGGLE ICONS
   *******************************/
  function toggleIcon(e) {
    $(e.target)
      .prev(".panel-heading")
      .find(".more-less")
      .toggleClass("glyphicon-plus glyphicon-minus");
  }
  $(".panel-group").on("hidden.bs.collapse", toggleIcon);
  $(".panel-group").on("shown.bs.collapse", toggleIcon);
})(jQuery, this);
