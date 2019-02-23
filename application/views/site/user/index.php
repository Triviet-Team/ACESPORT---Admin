<article>
      <section class="bread-crumb">
        <div class="container">
			<?php $this->load->view('site/breadcrumb'); ?>
        </div>
      </section>
      <section class="member-page">
        <div class="container">
        <?php if($objUser) { ?>
          <div class="box-member-tabs">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                   Thông tin cá nhân</a></li>
              <li class="nav-item"><a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false">
                   Chỉnh sửa</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
              <div class="box-member">
                <div class="row">
                  <div class="col-md-4">
                      <?php 
                          $link_img = base_url().'public/site/img/default-user.jpg';
                          if(!empty($objUser->image_link)){
                              $link_img = base_url().'uploads/images/user/200_200/'.$objUser->image_link;
                          }
                      ?>
                    <div class="box-member-img"><a class="fancybox" title="Nhấp để phóng to hình" data-fancybox="gallery" href="<?= $link_img ?>"><img src="<?= $link_img ?>" alt=""/></a>
                      <p class="title-member">Thông tin liên lạc:</p>
                      <h5> <i class="mdi mdi-map-marker-radius"></i><?= $objUser->address ?></h5>
                      <h5><i class="mdi mdi-email-variant"></i><?= $objUser->email ?></h5>
                      <h5><i class="mdi mdi-phone-classic"></i><?= $objUser->phone ?></h5>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="box-member-detail">
                	  <p><?= $this->session->flashdata('message'); ?></p>
                      <h3><?= $objUser->name ?></h3>
                      <p><?= $objUser->username ?></p>
                      <ul>
                        <li>
                          <label>Giới tính:</label><?= $objUser->sex == 1 ? 'Nam' : ($objUser->sex == 0 ? 'Nũ' : 'Chưa xác định') ?>
                        </li>
                        <li>
                          <label>Đơn vị/Tổ chức:</label><?= $objUser->organization ?>
                        </li>
                        <li>
                          <label>Năm sinh:</label><?= $objUser->birthday ? date('d/m/Y',$objUser->birthday) : '' ?>
                        </li>
                      </ul>
                      <h5 class="title-member">Giới thiệu bản thân:</h5>
                      <?= $objUser->about ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab"> 
              <div class="box-member">
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="box-member-setting-img">
                        <div class="box-member-setting-img-update">
                          <input type="file" name="image_link" class="inputfile" id="avatar-file">
                          <label for="avatar-file">Cập nhật</label>
                           <div class="showFile">
                                <?php if (!isset($objUser->image_link)) { ?>
                                    <img id="profile-img-tag" src="<?= base_url() ?>public/site/img/default-user.jpg" alt="No-Img">
                                <?php } else { ?>
                                    <img id="profile-img-tag" src="<?= base_url('uploads/images/user/200_200/' . $objUser->image_link) ?>" alt="No-Img">
                                <?php } ?>
                            </div>
                        </div>
                      </div>
                      <div class="box-member-setting-about">
                        <h4>Lời giới thiệu bản thân:</h4>
                        <textarea class="form-control" name="about" placeholder="Nhập lời giới thiệu"><?= $objUser->about ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="box-member-setting-form">
                        <div class="row">
                          <div class="col-sm-6">
                            <label for="first-name-setting">Họ và tên:</label>
                            <input class="form-control" name="name" id="first-name-setting" type="text" value="<?= $objUser->name ?>"/>
                          </div>
                          <div class="col-sm-6 gender-setting">
                            <h5>Giới tính:</h5>
                            <label class="check-gender">Nam
                              <input type="radio" <?= $objUser->sex == 1 ? 'checked="checked"' : '' ?> name="sex" value="1"/><span class="checkmark"></span>
                            </label>
                            <label class="check-gender">Nữ
                              <input type="radio" <?= $objUser->sex == 0 ? 'checked="checked"' : '' ?> name="sex" value="0"/><span class="checkmark"></span>
                            </label>
                            <label class="check-gender">Chưa xác định
                              <input type="radio" <?= $objUser->sex == 2 ? 'checked="checked"' : '' ?> name="sex" value="2"/><span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-sm-6">
                            <label for="birth-setting">Ngày sinh:</label>
                            <input class="form-control" id="birth-setting" type="date" name="birthday" value="<?= $objUser->birthday ? date('Y-m-d', $objUser->birthday) : ''?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label for="company-setting">Đơn vị/Tổ chức:</label>
                            <input class="form-control" id="company-setting" type="text" name="organization" value="<?= $objUser->organization ?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label for="address-setting">Địa chỉ:</label>
                            <input class="form-control" id="address-setting" type="text" name="address" value="<?= $objUser->address ?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label for="phone-setting">Số điện thoại:</label>
                            <input class="form-control" id="phone-setting" type="number" name="phone" value="<?= $objUser->phone ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-submit">
                    <button class="btn btn-indigo" type="submit">Cập nhật</button>
                    <a href="<?= base_url('user/doi-mat-khau.html') ?>" class="btn btn-indigo" type="submit">Đổi mật khẩu</a>
                  </div>
                </form>
              </div>
            </div>
            </div>
          <?php }else {?>
            <div class="tab-content">
            	<div class="box-member"> 
              		<p>Bạn chưa chưa có tài khoản. Vui lòng đăng ký tại <a>đây</a></p>
              	</div>
          	</div>
          <?php } ?>
        </div>
      </section>
    </article>