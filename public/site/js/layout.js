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

  //NAVTABS ACTIVE
  $('.navbar-nav .nav-item').on('click', function(){
    let itemParent = $(this)
      .parent()
      .parent()
      .parent()
        .find('.navbar-toggler');

    $('.navbar-nav .nav-item').removeClass('active')
    $(this).addClass('active')

    let text = $(this).text();
    $(itemParent).text(text);
    $('.navbar-collapse').removeClass('show');
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

  if (ww < 575) {
    $('.link-intro').removeAttr('href');
  }
  // end

  // Khi chưa đăng nhập
  $('.login-btn').click(function() {
    $('.box-login').toggleClass('box-login-show');
    $('.login-btn span i').toggleClass('mdi-chevron-down mdi-chevron-up');
    $('.overlay').toggleClass('overlay-in');
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

  // Append comment
  $('.comment-first-box').keyup(function() {
    let keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){ 
      $('.comment-first-box input').val('');

      $('.comment-area').append(
        `
          <div class="box-comment">
            <div class="box-comment-author text-center"><a title="Nhấp để xem hồ sơ" href="chi-tiet-thanh-vien.html"><img src="../img/avatar.jpeg" /></a>
              <h5> <a title="Nhấp để xem hồ sơ" href="chi-tiet-thanh-vien.html">Kemmie</a></h5>
              <p>Điểm: 500</p>
              <p>Hạng: 10</p>
            </div>
            <div class="box-comment-detail">
              <div class="box-comment-detail-date">
                <h5>15/01/2019 - 17:30</h5>
                <button class="btn btn-light waves-effect waves-light delete-comment text-right">Xóa bình luận</button>
              </div>
              <div class="box-comment-detail-content">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat magnam repudiandae, natus velit ab nulla magni cumque quidem maiores sapiente sequi fugit. Nulla cupiditate impedit, dolorum placeat nisi ipsa enim?</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat magnam repudiandae, natus velit ab nulla magni cumque quidem maiores sapiente sequi fugit. Nulla cupiditate impedit, dolorum placeat nisi ipsa enim?</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat magnam repudiandae, natus velit ab nulla magni cumque quidem maiores sapiente sequi fugit. Nulla cupiditate impedit, dolorum placeat nisi ipsa enim?</p>
                <div class="sub-comment"></div>
                <div class="comment-reply">
                  <button class="btn btn-indigo waves-effect waves-light">Trả lời</button>
                  <div class="comment-reply-form"><img src="../img/avatar.jpeg" />
                    <input class="form-control" type="text" placeholder="Viết phản hồi. . ." />
                  </div>
                </div>
              </div>
            </div>
          </div>
        `
      );
    };
  });

  $(document).on('click', '.comment-reply button', function () {
    $(this)
      .parent()
      .find('.comment-reply-form')
      .css('display', 'flex');

    $(this).parent().find('input').focus();
  });

  $(document).on('keyup', '.comment-reply-form', function() {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    let subComment = $(this).parent().parent().find('.sub-comment');

    if(keycode == '13'){
      $('.comment-reply-form input').val('');

      subComment.append(
        `
          <div class="box-sub-comment">
            <div class="box-sub-comment-img">
              <a href="chi-tiet-thanh-vien.html">
                <img src="../img/avatar.jpeg" />
              </a>
              <h5>
                <a href="chi-tiet-thanh-vien.html">Kemmie</a>
              </h5>
            </div>
            <div class="box-sub-comment-content">
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat maga enim?</p>
              <button class="sub-comment-del">Xóa bình luận</button>
            </div>
            <div class="box-sub-comment-date text-center">
              <h5>17:30</h5>
              <h5>15/01/2018</h5>
            </div>
          </div>
        `
      );
    };
  });
  // end
  
  // popup delete
  $(document).on('click', '.delete-comment', function() {
    let url = $(this).parent().parent().parent();

    Swal({
      title: 'Bạn chắc chắn chứ?',
      text: "Xóa sẽ không phục hồi lại được!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Tôi đồng ý, Xóa!',
      cancelButtonText: 'Hủy bỏ'
    }).then((result) => {
      if (result.value) {
        Swal(
          'Xóa thành công!',
          'Bạn đã xóa bình luận thành công.',
          'success'
        ).then(function(res) {
          if (res) {
            url.empty();
          }
        });
      }
    })
  });

  $(document).on('click', '.sub-comment-del', function() {
    let url = $(this).parent().parent();

    Swal({
      title: 'Bạn chắc chắn chứ?',
      text: "Xóa sẽ không phục hồi lại được!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Tôi đồng ý, Xóa!',
      cancelButtonText: 'Hủy bỏ'
    }).then((result) => {
      if (result.value) {
        Swal(
          'Xóa thành công!',
          'Bạn đã xóa bình luận thành công.',
          'success'
        ).then(function(res) {
          if (res) {
            url.empty();
          }
        });
      }
    })
  });
  // end
});


// validate login
$(document).ready(function(){
  jQuery.validator.addMethod("noSpace", function(value, element) { 
    return value.indexOf(" ") < 0 && value != ""; 
  }, "Không được phép có khoảng trắng");
});

$("#signup-form").validate({
  rules: {
    email_signup: {
      required: true,
      email: true,
    },
    nick_signup:{
      required: true,
      noSpace: true,
      minlength: 6,
    },
    password_signup:{
      required: true,
      noSpace: true,
      minlength: 6,
    },
    passwordEq_signup:{
      equalTo: "#password_signup"
    },
  },
  messages: {
    email_signup: {
      required: "Vui lòng điền email",
      email: "Vui lòng điền đúng định dạng email"
    },
    nick_signup:{
      required: "Vui lòng tên đăng nhập",
      minlength: "Tên đăng nhập phải trên 6 ký tự",
    },
    password_signup:{
      required: "Vui lòng điền mật khẩu",
      minlength: "Mật khẩu phải trên 6 ký tự",
    },
    passwordEq_signup:{
      equalTo: "Mật khẩu không khớp"
    }
  },
  errorPlacement: function(error, element) {
    $(error).addClass('text-danger mt-2');
    $(element).addClass('form-control-danger');

    error.insertAfter(element);
  }
});
// end
