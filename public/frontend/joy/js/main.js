/* Theme: Niwax - Creative Web Design & Digital Marketing Agency HTML5 Template
Author: Rajesh-Doot	
File Description: Main JS file of the template*/
(function ($) {
  "use strict";

  //wow animation
  new WOW().init();
  //Mobile nav
  var $main_nav = $('#main-nav');
  var $toggle = $('.toggle');
  var defaultOptions = {
    disableAt: false,
    customToggle: $toggle,
    levelSpacing: 10,
    navTitle: 'Niwax Menu',
    levelTitles: true,
    levelTitles: true,
    labelClose: false,
    levelTitleAsBack: true,
    levelOpen: 'expand',
    closeOnClick: true,
    insertClose: true,
    closeActiveLevel: true,
    insertBack: true
  };
  // Nav call plugin
  var Nav = $main_nav.hcOffcanvasNav(defaultOptions);

  //Sticky Header 
  function updateScroll() {
    if ($(window).scrollTop() >= 80) {
      $(".navfix").addClass('sticky');
    } else {
      $(".navfix").removeClass("sticky");
    }
  }
  $(function () {
    $(window).scroll(updateScroll);
    updateScroll();
  });

  //Header mega menu
  var $nav = $('li.sbmenu');
  $nav.hover(
    function () {
      $(this).addClass('hover');
    },
    function () {
      $(this).removeClass('hover');
    }
  );

  $('.quantity-down').on('click', function () {
    var numProduct = Number($(this).next().val());
    if (numProduct > 0) $(this).next().val(numProduct - 1);
  });
  $('.quantity-up').on('click', function () {
    var numProduct = Number($(this).prev().val());
    $(this).prev().val(numProduct + 1);
  });

  //Scroll to top
  $.scrollUp({
    animation: 'fade',
    scrollImg: {
      active: true,
      type: 'background'
    }
  });

  $('#searchbar').on('click', function () {
    $('.search-bar').toggle();
  });

  $('.langclubs').on('click', function (){
    $('.language-bar').toggle();
  });

  // // Steps form
  // var form = $("#example-form");

  // form.steps({
  //   headerTag: "h6",
  //   bodyTag: "section",
  //   transitionEffect: "fade",
  //   titleTemplate: '<span class="step">#index#</span> #title#',
  //   onStepChanged: function (event, currentIndex, priorIndex) {
  //     if (currentIndex == 2) {
  //       var $input = $('<input type="submit" value="test" />');
  //       $input.appendTo($('ul[aria-label=Pagination]'));
  //     }
  //     else {
  //       $('ul[aria-label=Pagination] input[value="test"]').remove();
  //     }
  //   }

  // });

  // background image
  $("[data-background]").each(function () {
    $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
  })


  //end of page
})(jQuery);

