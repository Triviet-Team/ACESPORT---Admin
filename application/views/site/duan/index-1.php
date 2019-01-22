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

            $xhtmlListProduct .= '<div class="col-lg-4 col-sm-6">
    								<div class="box-product">
    									<div class="box-product-img">
    										<div class="box-product-img-status">
                                                 '.$sale.'
                                                 '.$new.'
    										</div><a title="Bấm để xem chi tiết sản phẩm" href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html"><img src="'.$link_img.'" alt=""></a></div>
    
    									<div class="box-product-detail text-center">
    										<h5><a title="'.$row->vn_name.'" href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html">'.$row->vn_name.'</a></h5>
                                            '.$prices.'
    									</div>
    
    									<div class="box-product-custom text-center">
    										<div class="row">
    											<div class="col">
    												<a class="cart-complete" title="Thêm vào giỏ" onclick="javascript:addtocart('.$row->id.');"><i class="fa fa-shopping-bag"
    													aria-hidden="true"></i></a>
    											</div>
    
    											<div class="col">
    												<button type="button" onclick="javascript:watch('.$row->id.');" data-toggle="modal"
    													data-target=".product-1">
    													<a title="Xem nhanh"><i class="fa fa-eye"
    														aria-hidden="true"></i></a>
    												</button>
    											</div>
    
    											<div class="col">
    												<a href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html" title="Xem chi tiết"><i
    													class="fa fa-search-plus" aria-hidden="true"></i></a>
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>';
        }
    }else{
        $xhtmlListProduct = '<p>Dữ liệu đang cập nhật</p>';
    }

?>
<article>
	<section>
		<div class="container">
			<?php $this->load->view('site/breadcrumb'); ?>
		</div>
	</section>

	<section class="page-content">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-9">
					<div class="page-content-main">
						<div class="product-header">
							<div class="row">
								<div class="col-sm-8 col-7">
									<div class="product-page-title">
										<h3>sản phẩm</h3>
									</div>
								</div>

								<div class="col-sm-4 col-5">
									<div class="product-page-sort">
									    <?php
									        $arrOpp = array(
									                            'price_asc'     => 'Giá từ thấp lên cao',
									                            'price_desc'    => 'Giá từ cao xuống thấp',
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
    										<select name="sort" class="form-control" name="" id="sort">
    											<option value="0">Sắp xếp mặc định</option>
                                                <?=$xhtmlOpp?>
    										</select>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="row">							
							<?php echo $xhtmlListProduct;?>
						</div>

						<div class="modal quickview fade product-1" tabindex="-1"
							role="dialog" aria-labelledby="exampleModalCenterTitle"
							aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered"
								role="document">
								<div class="modal-content" id="watch">
									
									
<!-- 									end body -->
								</div>
							</div>
						</div>
					</div>

					<div class="row">
					        <div class="col-md-4 text-md-left text-center mb-3 mt-3">Trang <span style="font-weight:bold;"><?=@$curent_page?></span> trong tổng <span style="font-weight:bold;"><?=@$total_page?></span> trang</div>
							<div class="col-md-8 text-md-right text-center">
								<nav>
									<ul class="pagination justify-content-end">
										<?=$pagination?>
									</ul>
								</nav>
							</div>
							
						</div>
					</div>
					
					<?php $this->load->view('site/sidebar'); ?>
				</div>
				<!-- 				end content -->

			</div>
		</div>
	</section>
</article>