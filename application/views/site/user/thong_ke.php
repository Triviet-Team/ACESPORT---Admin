<article>
      <section class="bread-crumb">
        <div class="container">
			<?php $this->load->view('site/breadcrumb'); ?>
        </div>
      </section>
      <section class="member-page">
        <div class="container">
        <?php if(@$objUser) {?>
          <!--<div class="box-member-title">
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
          </div>  -->
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
      </section>
    </article>