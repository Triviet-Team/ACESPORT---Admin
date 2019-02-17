<div class="go-top wow zoomInRight" title="Lên đầu trang" data-wow-duration="2s"><span></span><span></span></div>
    <header>
      <section class="menu wow animated">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-4">
              <div class="logo"><a href="index.html"><img src="<?= base_url('public/site/') ?>img/logo.png"/></a></div>
            </div>
            <div class="col-lg-8 col-12 order-last order-lg-0">
              <div class="main-menu"><a class="toggleMenu ssm-toggle-nav"><i class="mdi mdi-menu"></i></a>
                <ul class="nav">
                  <div class="nav-close"><i class="mdi mdi-close d-block d-sm-none"></i></div>
                  <li class="nav-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                  <li class="nav-item"><a href="tin-tuc.html">tin tức</a></li>
                  <li class="nav-item"><a href="<?= base_url('giai-dau.html') ?>">giải đấu</a></li>
                  <li class="nav-item"><a href="<?= base_url('bang-diem.html') ?>">bảng điểm</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-8">
              <div class="text-right">
               <?php 
                      $login = $this->session->userdata('isCheckLogin');
                      $tid = $this->session->userdata('tid');
                      if ($login) {
               ?>
                      	<?php if ($tid > 1) {?>
                      		<div class="login-complete-btn"><span><a href="<?= base_url('admincp')?>">Control panel</a></span></div>
                      	<?php }else {?>
                      		<div class="login-complete-btn"><span><img class="img-circle d-inline block" src="../img/avatar.jpeg" /> Thái<i class="mdi mdi-chevron-down"></i></span></div>
                      	<?php }?>
                <?php }else {?>
    				<div class="login-btn"><i class="mdi mdi-account-circle"></i><span>Tài khoản </span><i class="mdi mdi-chevron-down"></i></div>
    			<?php } ?>
              </div>
            </div>
          </div>
          <?php if (!$login) {?>
          <div class="login">
            <div class="box-login">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">
                     Đăng nhập</a></li>
                <li class="nav-item"><a class="nav-link" id="signup-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">
                     Đăng ký</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab"> 
                  <form id="signin-form" method="POST">
                    <div class="md-form mt-5"><i class="mdi mdi-email prefix grey-text"></i>
                      <input class="form-control validate" name="username" id="nick-signin" type="text"/><i id="error-username" style="color: red; font-size: 13px;"></i>
                      <label for="nick-signin">Email hoặc tên đăng nhập</label>
                    </div>
                    <div class="md-form mt-5"><i class="mdi mdi-lock prefix grey-text"></i>
                      <input class="form-control validate" name="password" id="password-signin" type="password"/><i id="error-password" style="color: red; font-size: 13px;"></i>
                      <label for="password-signin">Mật khẩu</label>
                    </div>
                    <div class="login-submit text-center mb-4 pb-5 border-bottom border-light">
                      <i id="divToUpdate" style="color: red"></i>
                      <button class="btn btn-indigo">Đăng nhập</button>
                    </div>
                    <div class="login-footer">
                      <div class="row">
                        <div class="col-sm-9">
                          <h5 class="mb-2"><span>Bạn không phải là thành viên ?</span><a class="link-signup">Đăng ký ngay </a></h5>
                          <h5 class="mb-3"><a>Quên mật khẩu?</a></h5>
                        </div>
                        <div class="col-sm-3 text-right">
                          <button class="mt-2 login-close btn btn-light text-right" type="button">Đóng</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab"> 
                  <form id="signup-form" novalidate="novalidate">
                    <div class="md-form mt-5"><i class="mdi mdi-account-box prefix grey-text"></i>
                      <input class="form-control validation" id="name_signup" type="text" name="name_signup"/>
                      <label for="nick_signup">Họ tên của bạn</label>
                    </div>
                    <div class="md-form mt-5"><i class="mdi mdi-email prefix grey-text"></i>
                      <input class="form-control validation" id="email_signup" type="email" name="email_signup"/>
                      <label for="email_signup">
                         Email</label>
                    </div>
                    <div class="md-form mt-5"><i class="mdi mdi-account-key prefix grey-text"></i>
                      <input class="form-control validation" id="nick_signup" type="text" name="nick_signup"/>
                      <label for="nick_signup">
                         Tên đăng nhập</label>
                    </div>
                    <div class="md-form mt-5"><i class="mdi mdi-lock prefix grey-text"></i>
                      <input class="form-control validation" id="password_signup" type="password" name="password_signup"/>
                      <label for="password_signup">
                         Mật khẩu</label>
                    </div>
                    <div class="md-form mt-5"><i class="mdi mdi-lock-plus prefix grey-text"></i>
                      <input class="form-control validation" id="passwordEq_signup" type="password" name="passwordEq_signup"/>
                      <label for="passwordEq_signup">
                         Nhập lại mật khẩu</label>
                    </div>
                    <div class="login-submit text-center mb-4 pb-5 border-bottom border-light">
                      <button class="btn btn-indigo" type="submit">Đăng ký</button>
                    </div>
                    <div class="login-footer">
                      <div class="row">
                        <div class="col-sm-9">
                          <h5><span>Bạn đã là thành viên? </span><a class="link-signin">Đăng nhập ngay</a></h5>
                        </div>
                        <div class="col-sm-3 text-right">
                          <button class="mt-2 login-close btn btn-light text-right" type="button">Đóng</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php }else { ?>
          <div class="login-complete">
            <ul>
              <li><a href="<?= base_url('user/thong-tin-ca-nhan.html')?>"><i class="mdi mdi-account-edit"></i>thông tin cá nhân</a></li>
              <li><a href="<?= base_url('thong-tin-ca-nhan.html')?>"><i class="mdi mdi-chart-areaspline"></i>thống kê giải đấu</a></li>
              <li><a href="<?= base_url('logout.html')?>"><i class="mdi mdi-logout"></i>đăng xuất</a></li>
            </ul>
          </div>
          <?php } ?>
        </div>
      </section>
      <div class="ssm-overlay ssm-toggle-nav"></div>
      <div class="overlay"></div>
    </header>