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
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="box-member-setting-form">
                        <div class="row">
                          <div class="col-sm-12">
                            <label for="first-name-setting">Nhập mật khẩu mới:</label>
                            <input class="form-control" name="n_password" id="first-name-setting" type="password"/>
                            <div class="error"><?= form_error('n_password') ?></div>
                          </div>
                          <div class="col-sm-12">
                            <label for="first-name-setting">Nhập lại mật khẩu mới:</label>
                            <input class="form-control" name="re_password" id="first-name-setting" type="password"/>
                            <div class="error"><?= form_error('re_password') ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-submit">
                    <button class="btn btn-indigo" type="submit">Gửi</button>
                  </div>
                </form>
              </div>
            </div>
            </div>
        </div>
      </section>
    </article>