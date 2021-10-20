(function ($) {
  "user strict";
  // Preloader Js
  $(window).on('load', function () {
    $('.loader').fadeOut(1000);
    var img = $('.bg_img');
    img.css('background-image', function () {
      var bg = ('url(' + $(this).data('img') + ')');
      return bg;
    });
    galleryMasonary();
  });
  // Gallery Masonary
  function galleryMasonary() {
    // filter functions
    var $grid = $(".grid-wrapper");
    var filterFns = {};
    $grid.isotope({
      itemSelector: '.grid-item',
      masonry: {
        columnWidth: 0,
      }
    });
    // bind filter button click
    $('ul.filter').on('click', 'li', function () {
      var filterValue = $(this).attr('data-filter');
      // use filterFn if matches value
      filterValue = filterFns[filterValue] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
    });
    // change is-checked class on buttons
    $('ul.filter').each(function (i, buttonGroup) {
      var $buttonGroup = $(buttonGroup);
      $buttonGroup.on('click', 'li', function () {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });
  }
  $('.skew-effects, .service__item, .hero-thumb img').tilt({
    reset: true
  });
  $(document).ready(function () {

    $('.faq__item .title').on('click', function (e) {
      var element = $(this).parent('.faq__item');
      if (element.hasClass('open')) {
        element.removeClass('open');
        element.find('.faq__content').removeClass('open');
        element.find('.faq__content').slideUp(300, "swing");
      } else {
        element.addClass('open');
        element.children('.faq__content').slideDown(300, "swing");
        element.siblings('.faq__item').children('.faq__content').slideUp(300, "swing");
        element.siblings('.faq__item').removeClass('open');
        element.siblings('.faq__item').find('.faq__content').slideUp(300, "swing");
      }
    });
    $('.video__wrapper').on('click', function(){
      $('.video__wrapper').addClass('active');
    })
    $('.partner-slider').owlCarousel({
      loop: false,
      responsiveClass: true,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 1500,
      autoplayHoverPause: true,
      margin: 30,
      items: 2,
      responsive: {
        400: {
          items: 3,
        },
        500: {
          items: 4,
        },
        992: {
          items: 5,
        },
        1200: {
          items: 6,
        },
      }
    })
    var owl = $('.client__slider').owlCarousel({
      loop: false,
      responsiveClass: true,
      nav: false,
      dots: false,
      // autoplay: true,
      autoplayTimeout: 1500,
      autoplayHoverPause: true,
      margin: 0,
      items: 1,
      responsive: {
        768: {
          items: 2,
        },
        992: {
          items: 3,
        },
      },
      onDragged: clientEffects
    })
    function clientEffects() {
      var nodeList = $('.client__slider .owl-item.active');
      var arr = Array.from(nodeList);
      for(var i = 0; i< arr.length; i++) {
        arr[i].classList = 'owl-item';
        arr[i].classList+= ' gtop-'+i;
      }
    }
    clientEffects()
    
    // wow js active
    new WOW().init()
    //Menu Dropdown Icon Adding
    $("ul>li>.submenu").parent("li").addClass("menu-item-has-children");
    // drop down menu width overflow problem fix
    $('ul').parent('li').hover(function () {
      var menu = $(this).find("ul");
      var menupos = $(menu).offset();
      if (menupos.left + menu.width() > $(window).width()) {
        var newpos = -$(menu).width();
        menu.css({
          left: newpos
        });
      }
    });
    $('.menu li a').on('click', function (e) {
      var element = $(this).parent('li');
      if (element.hasClass('open')) {
        element.removeClass('open');
        element.find('li').removeClass('open');
        element.find('ul').slideUp(300, "swing");
      } else {
        element.addClass('open');
        element.children('ul').slideDown(300, "swing");
        element.siblings('li').children('ul').slideUp(300, "swing");
        element.siblings('li').removeClass('open');
        element.siblings('li').find('li').removeClass('open');
        element.siblings('li').find('ul').slideUp(300, "swing");
      }
    })
    // Scroll To Top 
    var scrollTop = $(".toTopBtn");
    $(window).on('scroll', function () {
      if ($(this).scrollTop() < 500) {
        scrollTop.removeClass("active");
      } else {
        scrollTop.addClass("active");
      }
    });
    //Click event to scroll to top
    $('.toTopBtn').on('click', function () {
      $('html, body').animate({
        scrollTop: 0
      }, 500);
      return false;
    });
    //Header Bar
    $('.header-bar').on('click', function () {
      $(this).toggleClass('active');
      $('.overlay').toggleClass('active');
      $('.menu').toggleClass('active');
    })
    //Header Bar
    $('.overlay').on('click', function () {
      $(this).removeClass('active');
      $('.header-bar').removeClass('active');
      $('.menu').removeClass('active');
    })
    //Header
    var fixed_top = $("header");
    $(window).on('scroll', function () {
      if ($(this).scrollTop() > 1) {
        fixed_top.addClass("active");
      } else {
        fixed_top.removeClass("active");
      }
    });
    $('.service__item').each(function(){
      $(this).on('mouseover', function(){
        $('.service__item').removeClass('active');
        $(this).addClass('active')
      })
    })
  });
})(jQuery);