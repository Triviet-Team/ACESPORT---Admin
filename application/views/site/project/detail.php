

<article>
	<section>
		<div class="container">
		<?php $this->load->view('site/breadcrumb'); ?>
      </div>
	</section>
<?php if(isset($object)){?>
	<section class="page-news">
		<div class="container">
			<h2><?=$object->vn_name?></h2>
			<h5>
				<i class="fa fa-clock-o" aria-hidden="true"></i> <?=date("d/m/Y", $object->created)?>
			</h5>
			<h4><?=$object->vn_sapo?></h4>
			<div><?=$object->vn_detail?></div>
		</div>
	</section>
<?php if(!empty($related_project)){?>
	<section class="page-news-similar news-home">
		<div class="container">
			<div class="row">
				<div class="col page-news-similar-title">
					<h3 class="text-center">
						<a><?=$category->vn_name?> liên quan</a>
					</h3>
				</div>
			</div>

			<div class="row">

			<?php    
                    $xhtmlListProject = '';  
                        foreach($related_project as $row){
                                    $link_img = base_url().'public/site/img/default-1024x1024.png';
                                    if(!empty($row->image_link)){
                                        $link_img = base_url().'uploads/images/news/1024_1024/'.$row->image_link;
                                    }
                            $day    = date('d', $row->created);
                            $month  = date('m', $row->created);
                            
                            $xhtmlListProject .= '<div class="col-lg-4 col-sm-6">
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
                   echo $xhtmlListProject;
                ?>								
			</div>
		</div>
	</section>
	<?php }?>
<?php 
    }else{
        echo 'Dữ liệu đang cập nhật';
    }
?>
</article>