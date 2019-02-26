<article>
      <section class="bread-crumb">
        <div class="container">
			<?php $this->load->view('site/breadcrumb'); ?>
        </div>
      </section>
      <section class="member-page">
        <div class="container">
         <div class="box-member-tabs">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                   Đăng ký tài khoản</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="setting" role="tabpanel" aria-labelledby="setting-tab"> 
              <div class="box-member">
      	          <div class="col-sm-12">
    					<?php $this->load->view('admin/message') ?>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
						<form id="signup-form" action="<?= base_url('dang-ky-tai-khoan.html') ?>" novalidate="novalidate" method="POST">
							<div class="md-form mt-5">
								<i class="mdi mdi-account-box prefix grey-text"></i> 
								<input class="form-control validation" id="name" type="text" name="name" value="<?php echo set_value('name'); ?>"/>
								<label for="name_signup">Họ tên của bạn</label>
								<div class="error"><?= form_error('name') ?></div>
							</div>
							<div class="md-form mt-5">
								<i class="mdi mdi-email prefix grey-text"></i> 
								<input class="form-control validation" id="email_signup" type="email" name="email" value="<?php echo set_value('email'); ?>"/> 
								<label for="email_signup">Email</label>
								<div class="error"><?= form_error('email') ?></div>
							</div>
							<div class="md-form mt-5">
								<i class="mdi mdi-account-key prefix grey-text"></i> 
								<input type="text" name="username" class="form-control validation" value="<?php echo set_value('username'); ?>">
								<label for="nick_signup"> Tên đăng nhập</label>
								<div class="error"><?= form_error('username') ?></div>
							</div>
							<div class="md-form mt-5">
								<i class="mdi mdi-lock prefix grey-text"></i> 
								<input class="form-control validation" id="password_signup" type="password" name="password" /> 
								<label for="password_signup"> Mật khẩu</label>
								<div class="error"><?= form_error('password') ?></div>
							</div>
							<div class="md-form mt-5">
								<i class="mdi mdi-lock-plus prefix grey-text"></i> 
								<input class="form-control validation" id="passwordEq_signup" type="password" name="re_password" /> 
								<label for="passwordEq_signup"> Nhập lại mật khẩu</label>
								<div class="error"><?= form_error('re_password') ?></div>
							</div>
							<div class="md-form mt-5">
								<img id="captcha" src="<?= base_url('application/securimage')?>/securimage_show.php" alt="CAPTCHA Image" />
                                <input type="text" name="captcha_code" size="10" maxlength="6" />
                                <a href="#" onclick="document.getElementById('captcha').src = '<?= base_url('application/securimage')?>securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
								<div class="error"><?= form_error('re_password') ?></div>
							</div>
							<div
								class="login-submit text-center mb-4 pb-5 border-bottom border-light">
								<button class="btn btn-indigo" type="submit">Đăng ký</button>
							</div>
							<div class="login-footer">
								<div class="row">
									<div class="col-sm-9">
										<h5><span>Bạn đã là thành viên? </span><a class="login-btn">Đăngnhập ngay</a>
										</h5>
									</div>
								</div>
							</div>
						</form>
					</div>
                  </div>
              </div>
            </div>
            </div>        
        </div>
      </section>
    </article>