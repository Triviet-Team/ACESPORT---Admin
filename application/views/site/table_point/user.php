<article>
      <section class="bread-crumb">
        <div class="container">
			<?php $this->load->view('site/breadcrumb'); ?>
        </div>
      </section>
      <section class="member-page">
        <div class="container">
        <?php if(@$objUser) {?>
          <div class="box-member-title">
            <h3>Thông tin cá nhân</h3>
          </div>
          <div class="box-member">
            <div class="row">
              <div class="col-md-4">
          	      <?php 
                      $link_img = base_url().'public/site/img/default-user.jpg';
                      if(!empty($objUser->image_link)){
                          $link_img = base_url().'uploads/images/user/200_200/'.$objUser->image_link;
                      }
                  ?>
                <div class="box-member-img"><a class="fancybox" title="Nhấp để phóng to hình" data-fancybox="gallery" href="<?= $link_img ?>"><img src="<?= $link_img ?>" alt=""/></a></div>
              </div>
              <div class="col-md-8">
                <div class="box-member-detail">
                  <h3><?= $objUser->name ?></h3>
                  <p><?= $objUser->username ?></p>
                  <ul>
                    <li>
                      <label>Giới tính:</label><?= $objUser->sex == 1 ? 'Nam' : ($objUser->sex == 0 ? 'Nũ' : 'Chưa xác định') ?>
                    </li>
                    <li>
                      <label>Đơn vị công tác:</label><?= $objUser->organization ?>
                    </li>
                    <li>
                      <label>Năm sinh:</label><?= $objUser->birthday ? date('d/m/Y',$objUser->birthday) : '' ?>
                    </li>
                  </ul>
                  <h5 class="title-member">Giới thiệu bản thân:</h5>
                  <di><?= $objUser->about ?></di>
                </div>
              </div>
            </div>
          </div>
          <div class="box-member-title">
            <h3>Thống kê chung</h3>
          </div>
          <div class="box-member chart">
            <div class="row">
              <div class="col-sm-6 box-member-detail">
                <ul>
                  <li>
                    <label>Xếp hạng:</label>100
                  </li>
                  <li>
                    <label>Số trận thắng:</label>1
                  </li>
                  <li>
                    <label>Số trận thua:</label>199
                  </li>
                  <li>
                    <label>Tổng điểm:</label>666
                  </li>
                  <li>
                    <label>Tổng tiển thưởng:</label>99.000.000 đ
                  </li>
                </ul>
              </div>
              <div class="col-sm-6 box-member-detail">
                <ul>
                  <li>
                    <label>Số lần tham dự:</label>100
                  </li>
                  <li>
                    <label>Số lần hạng 1:</label>1
                  </li>
                  <li>
                    <label>Số lần hạng 2:</label>199
                  </li>
                  <li>
                    <label>Số lần hạng 3:</label>666
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box-member-title">
            <h3>Lịch sử trận đấu</h3>
          </div>
          <div class="box-member-tabs-content">
            <table class="table table-bordered table-hover display history-table" id-user="<?= $objUser->id ?>" id="history" style="width: 100%">
              <thead>
                <tr>
                  <th scope="col">Tên Giải đấu</th>
                  <th scope="col">Ngày bắt đầu</th>
                  <th scope="col">Thứ hạng</th>
                  <th scope="col">Hành động</th>
                </tr>
              </thead>
            </table>
          </div>
       <?php }else {
           echo '<div class="box-member">Thành viên không tồn tại</div>';
       }?>
        </div>
      </section>
    </article>