
  
  
   <article>
    <section class="bread-crumb mt-5 mt-md-0">
      <div class="container-fluid">
		<?php $this->load->view('site/breadcrumb'); ?>
      </div>
    </section>

    <section class="page-content">
      <div class="container">
        <div class="contact">
          <div class="row">
            <div class="col">
              <h2 class="text-center">liên hệ</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="contact-info">
                <h2>siêu thị ghế văn phòng Thanh Thúy</h2>

                <h3>Chi nhánh TP Hồ Chí Minh</h3>
                <ul>
                  <li>
                    <i class="fa fa-address-book" aria-hidden="true"></i> Địa chỉ: <?= @$config->address ?>
                  </li>
                  <li>
                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>  Số điện thoại:  <?= @$config->phone ?>
                  </li>
                  <li>
                    <i class="fa fa-envelope" aria-hidden="true"></i>  Email: <?= @$config->email ?>
                  </li>

                </ul>

                <h3>Chi nhánh Đồng Nai</h3>
                <ul>
                  <li>
                    <i class="fa fa-address-book" aria-hidden="true"></i> Địa chỉ: QL51 xã Phước Thái, huyện Long Thành, tỉnh Đồng Nai.
                  </li>
                  <li>
                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>  Số điện thoại: 0932 732 893 - 0942 319 623
                  </li>
                  <li>
                    <i class="fa fa-envelope" aria-hidden="true"></i>  Email: kdnoithatvanphong@gmail.com
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-lg-6">
    			<div class="contact-form">
                  <h4 class="text-center"><i><?php echo $this->session->flashdata('message')?></i></h4>
                  <form action="" method="post">
                    <div class="form-group row">
                      <label for="fullname" class="col-sm-3 control-label">Họ tên</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="<?= set_value('name') ?>" id="fullname" placeholder="Nhập Họ tên">
                        <div class="error"><?= form_error('name') ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email"  class="form-control"  name="email" value="<?= set_value('email') ?>" id="email" placeholder="Nhập Email">
                        <div class="error"><?= form_error('email') ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="phone" class="col-sm-3 control-label">Số điện thoại</label>
                        <div class="col-sm-9">
                        <input type="tel" class="form-control" name="phone" value="<?= set_value('phone') ?>" id="phone" placeholder="Nhập Số điện thoại">
                        <div class="error"><?= form_error('phone') ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="title" class="col-sm-3 control-label">Tiêu đề</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" value="<?= set_value('title') ?>" id="title" placeholder="Nhập Tiêu đề">
                        <div class="error"><?= form_error('title') ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="content" class="col-sm-3 control-label">Nội dung</label>
                      <div class="col-sm-9">
                        <textarea type="text" class="form-control"  name="content" id="content" placeholder="Nhập Nội dung"><?= set_value('content') ?></textarea>
                        <div class="error"><?= form_error('content') ?></div>
                      </div>
                    </div>
                    <div class="text-center form-group">
                      <button class="send" type="submit">GỬI LIÊN HỆ</button>
                      <button class="reset" type="reset">NHẬP LẠI</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </article>
  
  
  
  