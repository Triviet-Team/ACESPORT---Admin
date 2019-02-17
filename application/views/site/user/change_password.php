<article>
      <section class="bread-crumb">
        <div class="container">
			<?php $this->load->view('site/breadcrumb'); ?>
        </div>
      </section>
      <section class="member-page">
        <div class="container">
        
          <div class="tab-content">
            <div class="tab-pane fade show active" id="setting" role="tabpanel" aria-labelledby="setting-tab"> 
              <div class="box-member">
      	          <div class="col-sm-12">
    					<?php $this->load->view('admin/message') ?>
                  </div>
                <form method="POST" action="">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="box-member-setting-form">
                        <div class="row">
                          <div class="col-sm-12">
                            <input class="form-control" id="first-name-setting" type="password" name="password" placeholder="Nhập lại mật khẩu cũ"/>
                            <div class="error"><?= form_error('password') ?></div>
                          </div>
                          <div class="col-sm-12">
                            <input class="form-control" type="password" name="n_password" id="first-name-setting" placeholder="Nhập mật khẩu mới"/>
                            <div class="error"><?= form_error('n_password') ?></div>
                          </div>
                          <div class="col-sm-12">
                            <input class="form-control" type="password" name="re_password" id="first-name-setting" placeholder="Nhập lại mật khẩu mới"/>
                             <div class="error"><?= form_error('re_password') ?></div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="form-submit">
                    <button class="btn btn-indigo" type="submit">Lưu thay đổi</button>
                  </div>
                </form>
              </div>
            </div>
            </div>        
        </div>
      </section>
    </article>