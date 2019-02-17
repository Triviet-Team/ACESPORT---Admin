<header>
  <a title="Lên đầu trang" class="go-top wow fadeInRight" data-wow-duration="1s"><img src="<?= base_url('public/site/img/') ?>cate-icon-1.png" alt=""></a>

  <section class="menu wow" data-wow-duration=".5s">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 ">
          <div class="logo">
            <a href="<?= base_url() ?>"><img src="<?= base_url('uploads/images/ads/') . $logo_top->image_link ?>" alt=""></a>
          </div>
        </div>
        <div class="col-xl-6 col-md-8 col-12 ">
          <div class="main-menu">
            <a class="toggleMenu ssm-toggle-nav">
              <i class="mdi mdi-menu"></i>
            </a>

            <ul class="nav">
              <li class="nav-item">
                <a href="<?= base_url() ?>">Trang chủ</a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('gioi-thieu.html') ?>">giới thiệu</a>
              </li>
              
              <li class="nav-item">
                <a href="<?= base_url('san-pham.html') ?>">sản phẩm </a>
                <i class="mdi mdi-chevron-down btn-menu-down"></i>
                <i class="mdi mdi-minus btn-menu-up d-md-none"></i>

                <div class="menu-bottom">
                  <div class="row">
                  	<?php if(@$categorys){?>
                  		<?php foreach ($categorys as $row){?>
                        <div class="col-lg-3">
                          <h4>
                            <i class="mdi mdi-chair-school d-md-none d-line-block"></i>
                            <a href="<?= base_url('danh-muc/') . $row->vn_slug ?>.html"><?= $row->vn_name ?></a>
                          </h4>
        
                          <ul>
                          	<?php if($row->categorys){?>
                          		<?php foreach ($row->categorys as $row_cate){?>
                                <li>
                                  <i class="mdi mdi-minus"></i>
                                  <a href="<?= base_url('danh-muc/') . $row_cate->vn_slug ?>.html"><?= $row_cate->vn_name ?></a>
                                </li>
                                <?php }?>
                            <?php } ?>
                          </ul>
                        </div>
                        <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('lien-he.html') ?>">liên hệ</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-6 col-md-4 text-right">
          <div class="custom-header">
            <div class="accordion" id="accordionExample">
            	<script type="text/javascript">var dataSeach = <?php echo json_encode($categorys); ?></script>
              <a class="search-btn" title="Tìm kiếm" data-toggle="collapse" href="#search" role="button" aria-expanded="true"
                aria-controls="search">
                <i class="mdi mdi-magnify"></i>
              </a>

              <a title="Giỏ hàng" data-toggle="collapse" href="#cart" role="button" aria-expanded="false" aria-controls="cart">
                <i onclick="javascript:watchCart(0);" class="mdi mdi-shopify"></i>
                 <?php                             
                    $total_items = $this->cart->total_items();
                 ?>
                 
                 <span <?= ($total_items > 0) ? '' : 'display="none"'?> class="badge badge-light" id="items"><?= ($total_items > 0) ? $total_items : ''?></span>
                
              </a>

              <div class="collapse" id="cart" data-parent="#accordionExample">
                <div class="card card-body cart-form" id="watch-cart">

                </div>
              </div>
            </div>
          </div>
        </div>

        
      </div>
    </div>
  </section>
</header>
<div class="collapse" id="search" data-parent="#accordionExample">
  <div class="card card-body search-form">
    <h3 class="text-center">Tìm kiếm</h3>
    <form id="form-seach" method="get" action="<?= base_url('tim-kiem.html') ?>">
        <input type="text" name="search" id="search-form" placeholder="Nhập từ khóa">
        <select name="cid" class="form-control">
          <option  value="0">Chọn danh mục</option>
    			<?php 
    			        $xhtmlCategorys = '';
            			if(@$categorys){
                      		foreach ($categorys as $row){
                      		        $xhtmlCategorys .= '<option value="'.$row->id.'">'.$row->vn_name.'</option>';
                                  	if($row->categorys){
                                  		foreach ($row->categorys as $row_cate){
                                  		    $xhtmlCategorys .= '<option value="'.$row_cate->id.'">&nbsp;&nbsp;&nbsp;'.$row_cate->vn_name.'</option>';
                                        }
                                    }
                
                                }
                            } 
                            echo $xhtmlCategorys;
                ?>
          
        </select>
        <button id="submitSearch"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
  </div>
</div>
<div class="overlay"></div>
<div class="ssm-overlay ssm-toggle-nav"></div>
