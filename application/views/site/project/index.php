<?php
    $xhtmlListProject = '';
    if(!empty($list_news)){
        foreach($list_news as $row){
            $link_img = base_url().'public/site/img/default-1024x1024.png';
            if(!empty($row->image_link)){
                $link_img = base_url().'uploads/images/news/1024_1024/'.$row->image_link;
            }


            $xhtmlListProject .= '<div class="col-sm-6">
                                <div class="box-du-an">
                                  <div class="box-du-an-img">
                                    <a href="'.base_url() . @$category->vn_slug . '/' . $row->vn_slug.'.html"><img src="'.$link_img.'" alt=""></a>
            
                                    <div class="box-du-an-detail">
                                      <h4>
                                        <a href="'.base_url() . @$category->vn_slug . '/' . $row->vn_slug.'.html">'.$row->vn_name.'</a>
                                      </h4>
                                      <h5>'.$row->vn_sapo.'</h5>
                                      <div class="box-du-an-detail-btn">
                                        <a href="'.base_url() . @$category->vn_slug . '/' . $row->vn_slug.'.html">đọc thêm</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>';
        }
    }else{
        $xhtmlListProject = '<p>Dữ liệu đang cập nhật</p>';
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
								<div class="col">
									<div class="product-page-title">
										<h3><?=@$category->vn_name?></h3>
									</div>
								</div>
							</div>
						</div>

						<div class="du-an">
							<div class="row">							
							<?php echo $xhtmlListProject;?>
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

			<?php $this->load->view('site/sidebar'); ?>
			</div>
		</div>
	</section>
</article>
