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
                            <label for="first-name-setting">Hệ thống đã gửi vào mail của bạn mã code gồm 6 số vui lòng nhập vào ô dưới để thực hiện bước tiếp theo:</label>
                            <input class="form-control" name="code_forget_password" id="first-name-setting" type="number"/>
                            <div class="error"><?= form_error('code_forget_password') ?></div>
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