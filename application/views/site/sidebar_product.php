          <div class="col-xl-3">
            <div class="page-content-left">
              <div class="cate-left">
                <div class="page-content-left-title">
                  <h3>
                    <a>danh mục sản phẩm</a>
                  </h3>
                </div>

                <div class="accordion" id="cateCard">
					<?php if(@$categorys){?>
                  		<?php foreach ($categorys as $row){?>
						<div class="card">
                            <div class="card-header" id="headingCateOne">
                              <h5 class="mb-0">
                                <a href="<?= base_url('danh-muc/') . $row->vn_slug ?>.html"  class="list-cate-title" data-toggle="collapse" data-target="#cateOne" aria-expanded="true" aria-controls="cateOne">
                                  <?= $row->vn_name ?> <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                              </h5>
                            </div>
        
                            <div id="cateOne" class="collapse" aria-labelledby="headingCateOne" data-parent="#cateCard">
                              <div class="card-body">
                                <ul>
                                    <?php if($row->categorys){?>
                                  		<?php foreach ($row->categorys as $row_cate){?>
                                              <li>
                                                <a href="<?= base_url('danh-muc/') . $row_cate->vn_slug ?>.html"><i class="fa fa-minus" aria-hidden="true"></i><?= $row_cate->vn_name ?></a>
                                              </li>
                                        <?php }?>
                                    <?php } ?>
                                </ul>
                              </div>
                            </div>
                      </div>
                        <?php } ?>
                    <?php } ?>
                    

                </div>
              </div>

              <div class="product-left d-none d-xl-block">
                <div class="page-content-left-title">
                  <h3>
                    <a>sản phẩm nổi bật</a>
                  </h3>
                </div>

                <div class="row">
                <?php
                    $xhtmlHight = '';
                    if(!empty($sp_noi_bat)){
                        foreach($sp_noi_bat as $row){
                            $link_img = base_url().'public/site/img/default-534x534.png';
                            if(!empty($row->image_link)){
                                $link_img = base_url().'uploads/images/product/421_561/'.$row->image_link;
                            }            
                            $prices = $row->sale_price > 0 ? '<h4><span>'.number_format($row->price, 0, "", ".").' đ</span> '.number_format($row->sale_price, 0, "", ".").' đ</h4>' :'<h4>'.($row->price == 0 ? "Liên hệ" : number_format($row->price, 0, "", ".").' đ').'</h4>';
                            $sale   = $row->sale_price > 0 ? '<h5 class="ratio-sale">'.round((1 - $row->sale_price / $row->price)*100).'%</h5>' : '';
                            $new    = ($row->created + 30*24*60*60) > time() ? '<h5>new</h5>' : '';
                            $xhtmlHight .= '<div class="col-lg-12 col-sm-6 col-12">
                                                <div class="box-product-left">
                                                  <div class="box-product-left-img">
                                                    <a href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html"><img src="'.$link_img.'" alt=""></a>
                                                  </div>
                                                  
                                                  <div class="box-product-left-detail">
                                                    <h5>
                                                      <a href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html">'.$row->vn_name.'</a>
                                                    </h5>
                                                    <h4>'.$prices.'</h4>
                                                  </div>
                                                </div>
                                              </div>';
                        }
                    }
                    echo $xhtmlHight;
                ?>
<!-- end list nổi bật                 -->
                </div>
                
              </div>
            </div>
          </div>