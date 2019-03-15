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
                   Quên mật khẩu</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="setting" role="tabpanel" aria-labelledby="setting-tab"> 
              <div class="box-member-register">
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box-member-setting-form">
                        <div class="row">
                          <div class="col-sm-12">
                            <label for="first-name-setting">Nhập địa chỉ email:</label>
                            <input class="form-control" name="email" id="first-name-setting" type="text"/>
                            <div class="error"><?= form_error('email') ?></div>
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