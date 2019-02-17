
<?php
    $xhtmlListProduct = '';
    if(!empty($list_tournament)){
        foreach($list_tournament as $row){
            $link_img = base_url().'public/site/img/default-534x534.png';
            if(!empty($row->image_link)){
                $link_img = base_url().'uploads/images/product/421_561/'.$row->image_link;
            }            
            $new    = ($row->created + 30*24*60*60) > time() ? '<h5>new</h5>' : '';

            $xhtmlListProduct .= '<div class="box-tour">
            						<div class="row">
            							<div class="col-md-8 col-12">
            								<div class="box-tour-content">
            									<h4>
            										<a href="'.base_url('chi-tiet-giai-dau/') . $row->vn_slug .'.html">'.$row->vn_name.'</a>
            									</h4>
            									<h5>'.$row->vn_sapo.'</h5>
            								</div>
            							</div>
            							<div class="col-md-1 col-3 order-md-first order-0">
            								<div class="box-tour-author">
            									<img src="'.base_url('public/site/').'img/avatar.jpeg"/>
            									<h6>Admin</h6>
            								</div>
            							</div>
            							<div class="col-md-3 col-9">
            								<div class="box-tour-info text-center">
            									<div class="box-tour-info-comment">
            										<h5>100</h5>
            									</div>
            									<div class="box-tour-info-view">
            										<i class="mdi mdi-eye"></i>'.($row->view ? $row->view : 0).'
            									</div>
            									<div class="box-tour-info-date">
            										<i class="mdi mdi-calendar-clock"></i>'.date('d/m/Y - H:m', $row->created).'
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
	<section class="bread-crumb">
		<div class="container">
			<div class="bc-icons">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
						<li class="breadcrumb-item active">Giải dấu</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="page-content">
		<div class="container">
			<div class="title-page text-center">
				<h1>
					<a>giải đấu</a>
				</h1>
			</div>
			<div class="grid-box">
				<!-- left -->
				<?php $this->load->view('site/sidebar'); ?>
				<!-- end left -->
				<div class="tour-main main">
					<?php echo $xhtmlListProduct; ?>
				</div>
			</div>
		</div>
	</section>
</article>
