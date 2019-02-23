<article>
      <section class="bread-crumb">
        <div class="container">
			<?php $this->load->view('site/breadcrumb'); ?>
        </div>
      </section>
      <section class="page-content score-board">
        <div class="container">
          <div class="title-page text-center">
            <h1> <a>Bảng điểm</a></h1>
          </div>
          <div class="grid-box">
            <div class="left">
				<!-- left -->
				<?php $this->load->view('site/sidebar'); ?>
				<!-- end left -->
            </div>
            <div class="score-board-main">
              <div class="score-board-tabs">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"><a class="nav-link <?= @$type == 'nam-nu' ? 'active' : '' ?>" id="scoreAll-tab" href="<?= base_url('bang-diem.html') ?>" aria-selected="true">
                       Tất cả</a></li>
                  <li class="nav-item"><a class="nav-link <?= @$type == 'nam' ? 'active' : '' ?>" id="scoreMale-tab" href="<?= base_url('bang-diem/nam') ?>" aria-selected="false">
                       Nam</a></li>
                  <li class="nav-item"><a class="nav-link <?= @$type == 'nu' ? 'active' : '' ?>" id="scoreFemale-tab" href="<?= base_url('bang-diem/nu') ?>" aria-selected="false">
                       Nữ </a></li>
                </ul>
              </div>
              <table class="range-score" border="0" cellspacing="5" cellpadding="5">
                <tbody>
                  <tr>
                    <td>
                      <h5>Tìm kiếm điểm theo phạm vi:</h5>
                    </td>
                    <td>
                      <input id="min-score" type="text" name="min-score" placeholder="Điểm từ"/>
                    </td>
                    <td>
                      <input id="max-score" type="text" name="max-score" placeholder="Đến điểm"/>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="table-responsive">
                <table id="score-board-all" class="table table-bordered table-striped display scoreeee " type-table="<?= @$type ?>" style="width: 100%">
                  <thead>
                    <tr>
                      <th scope="col">Hạng</th>
                      <th scope="col">Tên thành viên</th>
                      <th scope="col">Tổng điểm</th>
                      <th scope="col">Số giải đấu</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </article>