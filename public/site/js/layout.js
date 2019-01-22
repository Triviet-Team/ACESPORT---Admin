// Slider 
$('.slider-carousel').owlCarousel({
  loop:true,
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
  dots: true,
  nav: true,
  autoHeight:true,
  navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>" ] ,
  autoplaySpeed: 1000,
  responsive: {
      0: {
          items:1
      },
      600: {
          items:1
      },
      1000: {
          items:1
      }
  }
});

$('.slider-carousel').on('changed.owl.carousel', function(event) {
  var item = event.item.index-2;

  $('h1').removeClass('animated bounceIn');
  $('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated bounceIn');

  $('.slider-text-content-dash').removeClass('animated fadeInLeftBig');
  $('.owl-item').not('.cloned').eq(item).find('.slider-text-content-dash').addClass('animated fadeInLeftBig');

  $('h3').removeClass('animated bounceInUp');
  $('.owl-item').not('.cloned').eq(item).find('h3').addClass('animated bounceInUp');
  
  $('.slider-text-btn').removeClass('animated flipInX');
  $('.owl-item').not('.cloned').eq(item).find('.slider-text-btn').addClass('animated flipInX');
});

// Slide modal
$('.xzoom-carousel').owlCarousel({
  loop:false,
  autoplay: false,
  dots: false,
  margin:10,
  nav: true,
  navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>" ] ,
  autoplaySpeed: 1000,
  responsive: {
      0: {
          items:4
      },
      600: {
          items:4
      },
      1000: {
          items:4
      },
      1200: {
          items:4
      }
  }
});

var swiper = new Swiper('.swiper-product-1', {
  slidesPerView: 4,
  spaceBetween: 15,
  breakpoints: {
    1400: {
      slidesPerView: 4,
    },
    1024: {
        slidesPerView: 2,
    },
    575: {
        slidesPerView: 1,
        spaceBetween: 0,
    },
},
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
}
);

var swiper2 = new Swiper('.swiper-product-2', {
  slidesPerView: 4,
  spaceBetween: 15,
  breakpoints: {
    1400: {
      slidesPerView: 4,
    },
    1024: {
        slidesPerView: 2,
    },
    575: {
        slidesPerView: 1,
        spaceBetween: 0,
    },
},
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
}
);

var swiper3 = new Swiper('.swiper-product-3', {
  slidesPerView: 4,
  spaceBetween: 15,
  breakpoints: {
    1400: {
      slidesPerView: 4,
    },
    1024: {
        slidesPerView: 2,
    },
    575: {
        slidesPerView: 1,
        spaceBetween: 0,
    },
},
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
}
);

var swiper4 = new Swiper('.swiper-product-hot', {
  slidesPerView: 5,
  spaceBetween: 15,
  breakpoints: {
    1400: {
      slidesPerView: 5,
    },
    1024: {
        slidesPerView: 3,
    },
    575: {
        slidesPerView: 1,
        spaceBetween: 0,
    },
},
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
}
);

// $(".nav-tabs li").on("click",function(){ 
//   reinitializeSwiper(swiper);
// });

// function reinitializeSwiper(swiper) {
//    setTimeout(function () {
          
//    }, 400);
// };

$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
  var paneTarget = $(e.target).attr('href');
  var $thePane = $('.tab-pane' + paneTarget);
  var paneIndex = $thePane.index();
  if ($thePane.find('.swiper-container').length > 0 && 0 === $thePane.find('.swiper-slide-active').length) {
      swiper[paneIndex].update();
  }
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
  var paneTarget = $(e.target).attr('href');
  var $thePane = $('.tab-pane' + paneTarget);
  var paneIndex = $thePane.index();
  if ($thePane.find('.swiper-container').length > 0 && 0 === $thePane.find('.swiper-slide-active').length) {
      swiper2[paneIndex].update();
  }
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
  var paneTarget = $(e.target).attr('href');
  var $thePane = $('.tab-pane' + paneTarget);
  var paneIndex = $thePane.index();
  if ($thePane.find('.swiper-container').length > 0 && 0 === $thePane.find('.swiper-slide-active').length) {
      swiper3[paneIndex].update();
  }
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
  var paneTarget = $(e.target).attr('href');
  var $thePane = $('.tab-pane' + paneTarget);
  var paneIndex = $thePane.index();
  if ($thePane.find('.swiper-container').length > 0 && 0 === $thePane.find('.swiper-slide-active').length) {
      swiper4[paneIndex].update();
  }
});

// XZOOM
$(".xzoom, .xzoom-gallery").xzoom({tint: '#333', Xoffset: 15});
$('.main-image').bind('click', function () {
  var xzoom = $(this).data('xzoom');
  xzoom.closezoom();
  var gallery = xzoom.gallery().cgallery;
  var i, images = new Array();
  for (i in gallery) {
    images[i] = {
      src: gallery[i]
    };
  }
  $.magnificPopup.open({
    items: images,
    type: 'image',
    gallery: {
      enabled: true
    }
  });
  event.preventDefault();
});




$('document').ready(function () {
  // MENU
  var url = window.location.href;
  $(".main-menu a").each(function () {
    if (url == (this.href)) {
      $(this).closest("li a").addClass("active");
      $(this).closest("li li a").removeClass("active");
    }
  });
  
  var ww = document.body.clientWidth;

  if (ww < 600) {
    $('.custom-header a').click(function() {
      $('.menu .nav').css('transform', 'translateX(-250%)');
      $('.toggleMenu').css('transform', 'scale(1) rotate(0)');
      $('.menu-close').css('transform', 'scale(0) rotate(-180deg)').css('position','absolute').css('right','80px');
    });

    $('.menu .main-menu .nav li .btn-menu-up').css('display','none');

    $('.menu .main-menu .nav li .btn-menu-down').click(function() {
      $(this).css('display','none');
      $('.menu .main-menu .nav li .btn-menu-up').css('display','block');
      $('.menu .main-menu .nav li .menu-bottom').css('display','block');
    });

    $('.menu .main-menu .nav li .btn-menu-up').click(function() {
      $(this).css('display','none');
      $('.menu .main-menu .nav li .btn-menu-down').css('display','inline-block');
      $('.menu .main-menu .nav li .menu-bottom').css('display','none');
    });
  
    $('.btn-menu-down').removeClass('mdi-chevron-down').addClass('mdi-plus')

    $('.overlay-menu').click(function() {
      $(this).css('display', 'none')
      $('.menu .nav').css('transform', 'translateX(-250%)');
      $('.toggleMenu').css('transform', 'scale(1) rotate(0)');
      $('.menu-close').css('transform', 'scale(0) rotate(-180deg)').css('position','absolute').css('right','80px');
    });
  }

  $('.menu .nav').slideAndSwipe();

  if (ww > 992) {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
        $('.menu')
          .css('height','70px')
          .addClass('animated slideInDown')

        $('.menu .logo').css('margin', '10px 0'); 
        $('.menu .logo img').css('height', '50px'); 
        $('.menu .nav').css('margin', '2px 0');

        $('.menu .nav .menu-bottom').css('margin-top', '18px');
        $('.menu .custom-header').css('padding', '15px 0');
        $('.cart-form').css('margin-top','9px');

      } else {
        $('.menu')
          .css('height','120px')
          .removeClass('animated slideInDown');

        $('.menu .logo').css('margin', '20px 0'); 
        $('.menu .logo img').css('height', '80px'); 
        $('.menu .nav').css('margin', '20px 0');

        $('.menu .nav .menu-bottom').css('margin-top', '50px');
        $('.menu .custom-header').css('padding', '35px 0');
        $('.cart-form').css('margin-top','38px');
      }
    });
  } 

  //FOOTER
  if (ww < 767) {
    $('.footer-mid .collapse').removeClass('show');
  } 
});

$(document).ready(function(){ 
  //GOTOP
  $(window).scroll(function(){ 
      if ($(this).scrollTop() > 400) { 
          $('.go-top').fadeIn(); 
      } else { 
          $('.go-top').fadeOut(); 
      } 
  }); 
  $('.go-top').click(function(){ 
      $("html, body").animate({ scrollTop: 0 }, 600); 
      return false; 
  }); 

  // WOW - ANIMATED
  var wow = new WOW(
    {
      mobile: false,
    }
  );
  wow.init();

  
  // SETTING SEARCH FORM
   $('.search-btn').click(function() {
     $('.overlay').css('display', 'block')
   });

  $('.overlay').click(function() {
    $(this).css('display', 'none')
    $('#search').removeClass('show');
  });

  // SETTING MODAL
  $('.modal-footer button , .modal-header button , .modal').click(function() {
    $('.xzoom-preview , .xzoom-source').css('opacity', '0')
  });

//$('.cart-btn').click(function() {
//    Swal({
//      title: 'Thông báo',
//      type: 'success',
//      html: 'Bạn đã thêm vào giỏ thành công',
//      showCloseButton: true,
//      showCancelButton: true,
//      focusConfirm: false,
//      confirmButtonText:
//        '<a href="cart.php">Vào giỏ hàng</a>',
//      cancelButtonText:
//        'Tiếp tục mua sắm',
//    })
//  });
  
  $('.banner-product').eq(0).addClass('banner-product-1');
  $('.banner-product').eq(1).addClass('banner-product-2');
  $('.banner-product').eq(2).addClass('banner-product-3');

  var ww = document.body.clientWidth;
  if (ww > 1025) {
    $('.box-cate-bot-detail').eq(0).css('left', '30px').css('transform','translateY(-50%)');
    $('.box-cate-bot-detail').eq(1).css('left', '50%').css('transform','translate(-50%, -50%)');
    $('.box-cate-bot-detail').eq(2).css('right', '30px').css('left','auto').css('transform','translateY(-50%)');
  } 
  
});
