<article>
  <section class="slider d-md-block d-none">
      <div class="owl-carousel slider-carousel owl-theme">
      

			<?php 
    			  $xhtmlSliderTop = '';
    			  if (@$slider_top){
                        foreach ($slider_top as $k => $row){
                            $link_img = base_url().'public/site/default-1024x1024.png';
                            if(!empty($row->image_link)){
                                $link_img = base_url().'uploads/images/ads/'.$row->image_link;
                            }
                            $xhtmlSliderTop .= '<div class="item">
                                                  <div class="slider-text text-center">
                                                    <h1 class="wow " data-wow-delay=".3s">NỘI THẤT THANH THÚY</h1>
                                                    <div class="slider-text-content">
                                                      <h3 class="wow " data-wow-delay=".3s">Chuyên cung cấp, tư vấn, thiết kế các sản phẩm bàn ghế </h4>
                                                    </div>
                                                    <div class="slider-text-btn wow " data-wow-delay="1s">
                                                      <a class="slider-text-btn-aboutus" href="'.base_url('gioi-thieu.html').'">Tìm hiểu về chúng tôi</a>
                                                      <a class="slider-text-btn-shopping" href="'.base_url('san-pham.html').'">Mua sắm ngay</a>
                                                    </div>
                                                  </div>
                                                  
                                                  <img src="'.$link_img.'" alt="">
                                                </div>';
                        }
    			  }
    			  echo $xhtmlSliderTop;
			?>

      </div>
    </section>

    <section class="service">
      <div class="container-fluid">
        <div class="service-in">
          <div class="service-in-2">
            <div class="row">
              <div class="col-lg-4 col-sm-6 d-block d-sm-none d-lg-block">
                <div class="box-service">
                  <h2>mua sắm</h2>
                  <h4>Thoải mái lựa chọn sản phẩm mà bạn muốn</h4>
                  <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, praesentium quidem excepturi id odit ipsum aspernatur, non doloremque incidunt maxime distinctio quos minima voluptate amet, ab itaque repellendus ducimus deserunt.</h5>

                  <a href="<?= base_url('san-pham.html') ?>">
                    đến mua sắm ngay <i class="mdi mdi-cart"></i>
                  </a>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="box-service">
                  <h2>liên hệ</h2>
                  <h4>Với chúng tôi nếu bạn có thắc mắc</h4>
                  <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, praesentium quidem excepturi id odit ipsum aspernatur, non doloremque incidunt maxime distinctio quos minima voluptate amet, ab itaque repellendus ducimus deserunt.</h5>

                  <a href="<?= base_url('lien-he.html') ?>">
                    liên hệ ngay <i class="mdi mdi-arrow-right"></i>
                  </a>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="box-service">
                  <h2>đăng ký email</h2>
                  <h4>Để nhận được tin khi sản phẩm mới về</h4>
                    <input id="email" class="form-control" type="text" placeholder="Nhập email của bạn . . .">
                    <button id="submitEmail">đăng ký ngay <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php if(@$listProCate){?>
	<?php foreach ($listProCate as $row){ ?>
    <section class="product-home">
      <div class="container-fluid">
        <div class="product-home-in">
          <img class="cate-icon" src="<?= base_url('public/site/img/') ?>cate-icon-1.png" alt="">

          <div class="row">
            <div class="col-xl-3 col-lg-4">
              <div class="product-home-left">
                <div class="product-home-left-title">
                  <h4><?= $row->vn_name ?></h4>
                </div>

                <ul class="nav nav-tabs" role="tablist">
                	<?php if($row->categorys){?>
                		<?php foreach ($row->categorys as $key => $row_categorys){?>
                			<?php if ($key < 11){?>
                          <li class="nav-item">
                            <a onclick="javascript:loadItem(<?= $row_categorys->id ?>, 8, 'load-item-<?= $row_categorys->id ?>', null);" class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="product-<?= $row->id ?>-<?= $row_categorys->id ?>-tab" data-toggle="tab" href="#product-<?= $row->id ?>-<?= $row_categorys->id ?>" role="tab" aria-controls="product-<?= $row->id ?>-<?= $row_categorys->id ?>" aria-selected="true">
                              <i class="mdi mdi-minus"></i> <?= $row_categorys->vn_name ?> 
                            </a>
                          </li>
                          <?php } ?>
                  		<?php } ?>
                  	<?php } ?>

                </ul>
              </div>
            </div>

            <div class="col-xl-9 col-lg-8">
              <div class="product-home-main">
                <div class="tab-content">
                 <?php if($row->categorys){?>
            		<?php foreach ($row->categorys as $key => $row_categorys){?>
						<div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="product-<?= $row->id ?>-<?= $row_categorys->id ?>" role="tabpanel" aria-labelledby="product-<?= $row->id ?>-<?= $row_categorys->id ?>-tab">
                            <div class="swiper-container swiper-product-<?= $row->id ?>">
                              <div class="swiper-wrapper" id="load-item-<?= $row_categorys->id ?>">
                              	<?php if($row_categorys->products){?>
                              		<?php $xhtml = '';?>
                              		<?php foreach ($row_categorys->products as $row_prod){?>
                              			<?php 
                                  			$link_img = base_url().'public/site/img/default-534x534.png';
                                  			if(!empty($row_prod->image_link)){
                                  			    $link_img = base_url().'uploads/images/product/421_561/'.$row_prod->image_link;
                                  			}
                                  			$prices = $row_prod->sale_price > 0 ? '<h4><span>'.number_format($row_prod->price, 0, "", ".").' đ</span> '.number_format($row_prod->sale_price, 0, "", ".").' đ</h4>' :'<h4>'.($row_prod->price == 0 ? "Liên hệ" : number_format($row_prod->price, 0, "", ".").' đ').'</h4>';
                                  			$sale   = $row_prod->sale_price > 0 ? '<h5 class="ratio-sale">'.round((1 - $row_prod->sale_price / $row_prod->price)*100).'%</h5>' : '';
                                  			$new    = ($row_prod->created + 30*24*60*60) > time() ? '<h5>new</h5>' : '';
                                  			$xhtml .= '<div class="swiper-slide">
                                                          <div class="box-product">
                                                            <div class="box-product-status">
                                                                '.$sale.'
                                                                '.$new.'
                                                            </div>
                                
                                                            <div class="box-product-img">
                                                              <div class="box-product-img-custom">
                                                                <a data-toggle="modal" onclick="javascript:watch('.$row_prod->id.')" data-target=".product-modal-1" title="Xem nhanh sản phẩm" href="#"><i class="mdi mdi-eye-plus"></i></a>
                                                                <a class="cart-btn" onclick="javascript:addtocart('.$row_prod->id.');"  title="Thêm vào giỏ"><i class="mdi mdi-shopify"></i></a>
                                                                <a title="Xem chi tiết" href="'.base_url('chi-tiet-san-pham/').$row_prod->vn_slug.'.html"><i class="mdi mdi-link-variant"></i></a>
                                                              </div>
                                                              <img src="'.$link_img.'" alt="">
                                                            </div>
                                                            
                                                            <div class="box-product-detail text-center">
                                                              <p><a title="'.$row_prod->vn_name.'" href="'.base_url('chi-tiet-san-pham/').$row_prod->vn_slug.'.html">'.$row_prod->vn_name.'</a></p>
                                                              '.$prices.'
                                                            </div>
                                                          </div>
                                                        </div>';
                              			?>

                                    <?php } ?>
                                    <?php echo $xhtml; ?>
        						<?php } ?>
        <!-- 						end list product -->
                              </div>
        
                              <div class="swiper-button-next"></div>
                              <div class="swiper-button-prev"></div>
                            </div>
                          </div>
              		<?php } ?>
              	<?php } ?>
                </div>

                <div class="banner-product"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } // end foreach listProCate?>
<?php } //end if listProCate ?>	
<!-- 	end product home -->

<?php if(@$totalSP){?>
    <section class="product-hot">
      <div class="container-fluid">
        <div class="product-hot-in">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="product-hot-0-tab" data-toggle="tab" href="#product-hot-0" role="tab" aria-controls="product-hot-0" aria-selected="true">
                sản phẩm bán chạy
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="product-hot-1-tab" data-toggle="tab" href="#product-hot-1" role="tab" aria-controls="product-hot-1" aria-selected="false">
                sản phẩm mới 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="product-hot-2-tab" data-toggle="tab" href="#product-hot-2" role="tab" aria-controls="product-hot-2" aria-selected="false">
                sản phẩm khuyến mãi
              </a>
            </li>
          </ul>

          <div class="tab-content">
          <?php $i = 0; ?>
          <?php foreach ($totalSP as $key => $row){?>
            <div class="tab-pane fade <?= $i == 0 ? 'show active' : '' ?>" id="product-hot-<?= $i ?>" role="tabpanel" aria-labelledby="product-hot-<?= $i ?>-tab">
            	<?php $i++; ?>
              <div class="swiper-container swiper-product-hot">
                <div class="swiper-wrapper">
                	<?php if($row){?>
                		<?php $xhtml = ''; ?>
                		<?php foreach ($row as $row_sub){?>
                			<?php 
                    			$link_img = base_url().'public/site/img/default-534x534.png';
                                if(!empty($row_sub->image_link)){
                                    $link_img = base_url().'uploads/images/product/421_561/'.$row_sub->image_link;
                                }            
                                $prices = $row_sub->sale_price > 0 ? '<h4><span>'.number_format($row_sub->price, 0, "", ".").' đ</span> '.number_format($row_sub->sale_price, 0, "", ".").' đ</h4>' :'<h4>'.($row_sub->price == 0 ? "Liên hệ" : number_format($row_sub->price, 0, "", ".").' đ').'</h4>';
                                $sale   = $row_sub->sale_price > 0 ? '<h5 class="ratio-sale">'.round((1 - $row_sub->sale_price / $row_sub->price)*100).'%</h5>' : '';
                                $new    = ($row_sub->created + 30*24*60*60) > time() ? '<h5>new</h5>' : ''; 
                                $xhtml .= '<div class="swiper-slide">
                                            <div class="box-product">
                                              <div class="box-product-status">
                                                '.$sale.'
                                                '.$new.'
                                              </div>
                        
                                              <div class="box-product-img">
                                                <div class="box-product-img-custom">
                                                  <a data-toggle="modal" onclick="javascript:watch('.$row_sub->id.');"  data-target=".product-modal-1" title="Xem nhanh sản phẩm" href="#"><i class="mdi mdi-eye-plus"></i></a>
                                                  <a class="cart-btn" onclick="javascript:addtocart('.$row_sub->id.');"  title="Thêm vào giỏ"><i class="mdi mdi-shopify"></i></a>
                                                  <a title="Xem chi tiết" href="'.base_url('chi-tiet-san-pham/').$row_sub->vn_slug.'.html"><i class="mdi mdi-link-variant"></i></a>
                                                </div>
                                                <img src="'.$link_img.'" alt="">
                                              </div>
                                              
                                              <div class="box-product-detail text-center">
                                                <p><a title="'.$row_sub->vn_name.'" href="'.base_url('chi-tiet-san-pham/').$row_sub->vn_slug.'.html">'.$row_sub->vn_name.'</a></p>
                                                '.$prices.'
                                              </div>
                                            </div>
                                          </div>';
                			?>

                      <?php } ?>
                      <?php echo $xhtml; ?>
                  	<?php } ?>
<!-- end list -->
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
          <?php } ?>
<!-- end -->
          </div>
        </div>
      </div>
    </section>
<?php } ?>  
<?php if(@$listProCate){?>  
    <section class="cate-bot">
      <div class="container-fluid">
        <div class="row">
            <?php foreach ($listProCate as $key => $row){?>
              <div class="col-xl-4 d-block d-xl-block d-lg-none text-center <?= $key == 0 ? 'text-lg-left' : ($key == 1 ? 'text-center' : 'text-lg-right') ?>">
                <div class="box-cate-bot">
                  <div class="box-cate-bot-img">
                    <a href="san-pham.php"><img src="<?= base_url('public/site/img/') ?>cate-img-1.png" alt=""></a>
                  </div>
    
                  <div class="box-cate-bot-detail">
                    <h1><?= $row->vn_name ?></h1>
                    <h3><?= $row->numberCate ?> danh mục - <?= !empty($row->numberPro) ? $row->numberPro : 0 ?> sản phẩm</h3>
                    <a href="<?= base_url('danh-muc/') . $row->vn_slug?>.html">mua sắm ngay</a>
                  </div>
                </div>
              </div>
    		<?php } ?>
        </div>
      </div>
    </section>
  </article>
<?php } ?>
  <div class="modal quickview fade product-modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content" id="watch">

      </div>
    </div>
  </div>
  
  
