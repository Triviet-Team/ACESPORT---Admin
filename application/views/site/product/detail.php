
    <article>
    <section class="bread-crumb mt-5 mt-md-0">
      <div class="container-fluid">
		<?php $this->load->view('site/breadcrumb'); ?>
      </div>
    </section>

    <section class="page-product">
      <div class="container-fluid">
        <div class="row">
        <?php $this->load->view('site/sidebar_product'); ?>
       <?php if($object){?>
          <div class="col-lg-9">
            <div class="page-product-main">
              <div class="row">
                <div class="col-lg-6">
                  <div class="modal-img">
                  <?php 
                      $link_img = base_url().'public/site/img/default-400x400.png';
                      if(!empty($object->image_link)){
                          $link_img = base_url().'uploads/images/product/400_400/'.$object->image_link;
                      }
                  ?>
                    <img class="xzoom" src="<?= $link_img ?>" xoriginal="<?= $link_img ?>" />

                    <div class="xzoom-thumbs">
                      <div class="owl-carousel xzoom-carousel owl-theme">
                        <div class="item">
                          <a href="<?= $link_img ?>">
                            <img class="xzoom-gallery" src="<?= $link_img ?>" xpreview="<?= $link_img ?>">
                          </a>
                        </div>
						<?php 
						    $xhtmlImageList = '';
						    $listImages = json_decode($object->image_list);
    						if(count($listImages) > 0){
    						        foreach ($listImages as $k => $value){
    						            $link_img = base_url().'public/site/img/default-400x400.png';
    						            if(!empty($value)){
    						                $link_img = base_url().'uploads/images/product/400_400/'.$value;
    						            }
    						            $xhtmlImageList .= '<div class="item">
                                                              <a href="'.$link_img.'">
                                                                <img class="xzoom-gallery" src="'.$link_img.'" xpreview="'.$link_img.'">
                                                              </a>
                                                            </div>';
    						        }
    						}
						    echo $xhtmlImageList;
						?>
<!-- 													end list images -->

                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-lg-6">
                  <h2><?=$object->vn_name?></h2>
                  <h5>Mã sản phẩm: <?=$object->code?></h5>
                  <?php 
                        $prices = $object->sale_price > 0 ? '<h4><span>'.number_format($object->price, 0, "", ".").' đ</span> '.number_format($object->sale_price, 0, "", ".").' đ</h4>' : '<h4>'.($object->price == 0 ? "Liên hệ" : number_format($object->price, 0, "", ".").' đ').'</h4>';
                  ?>
                  <?= $prices ?>
                  <p><?=$object->vn_sapo?></p>

                  Số lượng: <input type="number" id="qty-detail" value="1" min="1">
                  <a onclick="javascript:addtocart(<?=$object->id?>, 'detail');">thêm vào giỏ</a>
                  <p id="add-success"></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="page-product-main-detail">
                  <h3 class="text-center">
                    <a>chi tiết sản phẩm</a>
                  </h3>
					<div><?=$object->vn_detail?></div>
                </div>
              </div>
            </div>
		<?php if(!empty($related)){?>
            <div class="similar-product">
              <h3 class="text-center">
                <a>sản phẩm liên quan</a>
              </h3>
              
              <div class="row">
					<?php
                        $xhtmlListRelated = '';
                        foreach($related as $row){
                            $link_img = base_url().'public/site/img/default-400x400.png';
                            if(!empty($row->image_link)){
                                $link_img = base_url().'uploads/images/product/421_561/'.$row->image_link;
                            }   
                            
                            $prices = $row->sale_price > 0 ? '<h4><span>'.number_format($row->price, 0, "", ".").' đ</span> '.number_format($row->sale_price, 0, "", ".").' đ</h4>' : '<h4>'.($row->price == 0 ? "Liên hệ" : number_format($row->price, 0, "", ".").' đ').'</h4>';
                            $sale   = $row->sale_price > 0 ? '<h5 class="ratio-sale">'.round((1 - $row->sale_price / $row->price)*100).'%</h5>' : '';
                            $new    = ($row->created + 30*24*60*60) > time() ? '<h5>new</h5>' : '';
                           //onclick="javascript:watch('.$row->id.');" onclick="javascript:addtocart('.$row->id.');"
 
                            $xhtmlListRelated .= '<div class="col-lg-4 col-sm-6">
                                                      <div class="box-product">
                                                        <div class="box-product-status">
                                                         '.$sale.'
                                                          '.$new.'
                                                        </div>
                                    
                                                        <div class="box-product-img">
                                                          <div class="box-product-img-custom">
                                                            <a data-toggle="modal" onclick="javascript:watch('.$row->id.');" data-target=".product-modal-1" title="Xem nhanh sản phẩm" href="#"><i class="mdi mdi-eye-plus"></i></a>
                                                            <a class="cart-btn" onclick="javascript:addtocart('.$row->id.');" title="Thêm vào giỏ"><i class="mdi mdi-shopify"></i></a>
                                                            <a title="Xem chi tiết" href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html"><i class="mdi mdi-link-variant"></i></a>
                                                          </div>
                                                          <img src="'.$link_img.'" alt="">
                                                        </div>
                                                        
                                                        <div class="box-product-detail text-center">
                                                          <p><a title="'.$row->vn_name.'" href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html">'.$row->vn_name.'</a></p>
                                                          '.$prices.'
                                                        </div>
                                                      </div>
                                                    </div>';
                            }
                            echo $xhtmlListRelated;
                ?>
              </div>
            </div>
         <?php } // end related ?>   
            
          </div>
          <?php }?>
			
        </div>
      </div>
    </section>
  </article>
  
  
  <div class="modal quickview fade product-modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content" id="watch">
			
      </div>
    </div>
  </div>

