$('document').ready(function() {
  // ACTIVE MENU
  let url = window.location.href;
  $(".main-menu a").each( function() {
    if (url == (this.href)) {
      $(this).closest("li a").addClass("active");
      $(this).closest("li li a").removeClass("active");
    }
  });
  // END ACTIVE MENU

  $(".score-board a").each( function() {
    if (url == (this.href)) {
      $(this).closest("li a").addClass("active");
      $(this).closest("li li a").removeClass("active");
    }
  });
  
  $('.noti').click(() => {
	 $('.noti-tab').toggleClass('d-none d-block');
  });

  $('.menu .nav').slideAndSwipe();

  let ww = document.body.clientWidth;

  // GO TOP
  $(window).scroll( function() {
    if ($(this).scrollTop() > 400) {
      $('.go-top').fadeIn().css('transform', 'translateY(0)');

    } else {
      $('.go-top').fadeOut().css('transform', 'translateY(100px)');;
    }
  });

  $('.go-top').click(() => {
    $("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });
  // end


  // Setting menu mobile
  $('.nav-close').click(() => {
    $('.menu .nav')
      .css('transform', ' translate(-300px, 0px)')
      .removeClass('ssm-nav-visible');

    $('.ssm-overlay').css('display', 'none');
    $('html').removeClass('is-navOpen');
  });
  // end

  //INDEX SETTING
  for(let i = 0; i < 4; i++) {
    $('.intro-home-box').eq(i).hover(function() {
      $('.intro-home').removeClass('intro0 intro1 intro2 intro3');
      $(this).parent().addClass(`intro${i}`);
    });
  }

  // end

  // Khi chưa đăng nhập
  $('.login-btn').click(function() {
    $('.box-login').toggleClass('box-login-show');
    $('.login-btn span i').toggleClass('mdi-chevron-down mdi-chevron-up');
    $('.overlay').toggleClass('overlay-in');
    $("#divToUpdate").html('');
  });
  

  $('.login-close').click(function() {
    $('.box-login').removeClass('box-login-show');
    $('.login-btn span i').removeClass('mdi-chevron-up')
    $('.overlay').removeClass('overlay-in');
  });

  $('.overlay').click(function() {
    $(this).removeClass('overlay-in');
    $('.box-login').removeClass('box-login-show');
  })
  // end

  // Khi đã đăng nhập
  $('.login-complete-btn').click(function() {
    $('.login-complete').toggleClass('box-login-show');
    $('.login-complete-btn span i').toggleClass('mdi-chevron-down mdi-chevron-up');
  });

  $('.login-close').click(function() {
    $('.login-complete').removeClass('box-login-show');
    $('.login-complete-btn span i').remove('mdi-chevron-up');
  });
  // end

  // Setting login form
  $('.link-signup').click(function() {
    $('#signin-tab').removeClass('active');
    $('#signup-tab').addClass('active');
    $('#signin').removeClass('show active');
    $('#signup').addClass('show active');
    $('.box-login').addClass('box-login-show');
    console.log('hello')
  });

  $('.link-signin').click(function() {
    $('#signup-tab').removeClass('active');
    $('#signin-tab').addClass('active');
    $('#signup').removeClass('show active');
    $('#signin').addClass('show active');
  });
  // end

  // setting navtabs TOUR page
  $(window).scroll( function() {
    if ($(this).scrollTop() > 400) {
      $('.tour-left').addClass('tour-left-down')

    } else {
      $('.tour-left').removeClass('tour-left-down')
    }
  });
  
  $('.tour-search .nav-tabs li, .tour-search .navbar li').click(() => {
    $("html, body").animate({
      scrollTop: 0
    }, 600);
  });
  // end

  // popup delete
//  $(document).on('click', '.delete-comment', function() {
//    let url = $(this).parent().parent().parent();
//
//    Swal({
//      title: 'Bạn chắc chắn chứ?',
//      text: "Xóa sẽ không phục hồi lại được!",
//      type: 'warning',
//      showCancelButton: true,
//      confirmButtonColor: '#3085d6',
//      cancelButtonColor: '#d33',
//      confirmButtonText: 'Tôi đồng ý, Xóa!',
//      cancelButtonText: 'Hủy bỏ'
//    }).then((result) => {
//      if (result.value) {
//        Swal(
//          'Xóa thành công!',
//          'Bạn đã xóa bình luận thành công.',
//          'success'
//        ).then(function(res) {
//          if (res) {
//            url.empty();
//          }
//        });
//      }
//    })
//  });
//
//  $(document).on('click', '.sub-comment-del', function() {
//    let url = $(this).parent().parent();
//    Swal({
//      title: 'Bạn chắc chắn chứ?',
//      text: "Xóa sẽ không phục hồi lại được!",
//      type: 'warning',
//      showCancelButton: true,
//      confirmButtonColor: '#3085d6',
//      cancelButtonColor: '#d33',
//      confirmButtonText: 'Tôi đồng ý, Xóa!',
//      cancelButtonText: 'Hủy bỏ'
//    }).then((result) => {
//      if (result.value) {
//        Swal(
//          'Xóa thành công!',
//          'Bạn đã xóa bình luận thành công.',
//          'success'
//        ).then(function(res) {
//          if (res) {
//            url.empty();
//          }
//        });
//      }
//    })
//  });
  // end
});


// validate login
$(document).ready(function(){
  jQuery.validator.addMethod("noSpace", function(value, element) { 
    return value.indexOf(" ") < 0 && value != ""; 
  }, "Không được phép có khoảng trắng");
});

//$("#signup-form").validate({
//  rules: {
//    email_signup: {
//      required: true,
//      email: true,
//    },
//    nick_signup:{
//      required: true,
//      noSpace: true,
//      minlength: 6,
//    }
//  },
//  messages: {
//    email_signup: {
//      required: "Vui lòng điền email",
//      email: "Vui lòng điền đúng định dạng email"
//    },
//    nick_signup:{
//      required: "Vui lòng tên đăng nhập",
//      minlength: "Tên đăng nhập phải trên 6 ký tự",
//    }
//  },
//  errorPlacement: function(error, element) {
//    $(error).addClass('text-danger mt-2');
//    $(element).addClass('form-control-danger');
//
//    error.insertAfter(element);
//  }
//});
// end
