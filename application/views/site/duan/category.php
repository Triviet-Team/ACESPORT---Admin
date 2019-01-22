<?php
    $xhtmlListProduct = '';
    if(!empty($list_product)){
        foreach($list_product as $row){
            $link_img = base_url().'public/site/img/default-534x534.png';
            if(!empty($row->image_link)){
                $link_img = base_url().'uploads/images/product/400_400/'.$row->image_link;
            }            
            $prices = $row->sale_price > 0 ? '<h4><span>'.number_format($row->price, 0, "", ".").' đ</span> '.number_format($row->sale_price, 0, "", ".").' đ</h4>' :'<h4>'.($row->price == 0 ? "Liên hệ" : number_format($row->price, 0, "", ".").' đ').'</h4>';
            $sale   = $row->sale_price > 0 ? '<h5 class="ratio-sale">'.round((1 - $row->sale_price / $row->price)*100).'%</h5>' : '';
            $new    = ($row->created + 30*24*60*60) > time() ? '<h5>new</h5>' : '';

            $xhtmlListProduct .= '<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="box-product">
									<div class="box-product-status"></div>

									<div class="box-product-img">
										<div class="box-product-img-custom">
											<a data-toggle="modal" onclick="javascript:watch('.$row->id.');" data-target=".product-modal-1" title="Xem nhanh sản phẩm" ><i class="mdi mdi-eye-plus"></i></a> 
											<a class="cart-btn" onclick="javascript:addtocart('.$row->id.');" title="Thêm vào giỏ"><i class="mdi mdi-shopify"></i></a> 
											<a title="Xem chi tiết" href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html"><i class="mdi mdi-link-variant"></i></a>
										</div>

										<img src="'.$link_img.'" alt="">
									</div>

									<div class="box-product-detail text-center">
										<div class="box-product-detail-star">
											<i class="mdi mdi-star-outline"></i> <i
												class="mdi mdi-star-outline"></i> <i
												class="mdi mdi-star-outline"></i> <i
												class="mdi mdi-star-outline"></i> <i
												class="mdi mdi-star-outline"></i>
										</div>

										<p>
											<a title="'.$row->vn_name.'" href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html">'.$row->vn_name.'</a>
										</p>
									</div>
								</div>
							</div>';
        }
    }else{
        $xhtmlListProduct = '<p>Dữ liệu đang cập nhật</p>';
    }

?>



<article>
	<section class="bread-crumb">
		<div class="container">
			<?php $this->load->view('site/breadcrumb'); ?>
		</div>
	</section>

	<section class="product-page">
		<div class="container">
			<div class="row">
				<?php $this->load->view('site/sidebar_product'); ?>
<!-- 				end sidebar_product -->
				<div class="col-lg-9">
					<div class="product-page-main">
						<div class="row">
							<div class="col-lg-8 col-6">
								<div class="title-product">
									<h3>sản phẩm</h3>
								</div>
							</div>

							<div class="col-lg-4 col-6 text-right">
										<?php
									        $arrOpp = array(
									                            'name_asc'      => 'Tên từ A đến Z',
									                            'name_desc'     => 'Tên từ Z đến A',
									                    );
									       $xhtmlOpp = '';
									       foreach($arrOpp as $k => $val){
									           if(isset($sort) && $sort == $k ){
									               $xhtmlOpp .= '<option selected value="'.$k .'">'.$val.'</option>';
									           }else{
									                $xhtmlOpp .= '<option value="'.$k .'">'.$val.'</option>';
									           }
									       }
									    ?>
							    <form id="form-sort" action="" method="post">
									<select name="sort" class="form-control" id="sort">
										<option value="0">Sắp xếp mặc định</option>
                                        <?=$xhtmlOpp?>
									</select>
								</form>
							</div>
						</div>

						<div class="row">
							
							<?php echo $xhtmlListProduct; ?>
<!-- 							end list product -->

							<div class="modal quickview fade product-modal-1" tabindex="-1"
								role="dialog" aria-labelledby="exampleModalCenterTitle"
								aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered"
									role="document">
									<div class="modal-content" id="watch">
<!-- 										content xem nhanh -->
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<nav>
									<ul class="pagination justify-content-end">
										<?=$pagination?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</article>