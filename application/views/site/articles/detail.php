


 <article>
    <section class="bread-crumb">
      <div class="container">
		<?php $this->load->view('site/breadcrumb'); ?>
      </div>
    </section>
<?php if(isset($object)){?>
    <section class="page-detail">
      <div class="container">
        <div class="box-page-detail">
          <h3><?=$object->vn_name?></h3>
          <h5><i class="mdi mdi-calendar-clock"></i><?=date("d/m/Y", $object->created)?></h5>
          <h4><?=$object->vn_sapo?></h4>
		  <div><?=$object->vn_detail?></div>
        </div>
	<?php if(!empty($related_news)){?>
        <div class="similar">
          <div class="title-page text-center">
            <h1>tin tức liên quan</h1>
          </div>

          <div class="row">                      
			<?php    
                    $xhtmlListNews = '';  
                        foreach($related_news as $row){
                            $link_img = base_url().'public/site/img/default-1024x731.png';
                            if(!empty($row->image_link)){
                                $link_img = base_url().'uploads/images/news/1024_512/'.$row->image_link;
                            }
                            $day    = date('d', $row->created);
                            $month  = date('m', $row->created);
                            
                            $xhtmlListNews .= '<div class="col-lg-4 col-md-6 col-sm-6">
                                                  <div class="box-news">
                                                    <div class="box-news-img">
                                                      <div class="box-news-img-date text-center">
                                                        <h5>'.$day.'</h5>
                                                        <h5>Th'.$month.'</h5>
                                                      </div>
                                    
                                                      <a href="'.base_url('tin-tuc/') . $row->vn_slug.'.html"><img src="'.$link_img.'" alt=""></a>
                                                    </div>
                                    
                                                    <div class="box-news-detail">
                                                      <h4>
                                                        <a href="'.base_url('tin-tuc/') . $row->vn_slug.'.html">'.$row->vn_name.'</a>
                                                      </h4>
                                                      <h5>'.$row->vn_sapo.'</h5>
                                    
                                                      <div class="box-news-detail-btn">
                                                        <a href="'.base_url('tin-tuc/') . $row->vn_slug.'.html">
                                                          đọc thêm <i class="mdi mdi-transfer"></i>
                                                        </a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>';
                        }
                   echo $xhtmlListNews;
                ?>								
<!-- 		end list related -->
          </div>
        </div>
        <?php } //end tin liên quan?>
      </div>
    </section>
    <?php 
    }else{
        echo 'Dữ liệu đang cập nhật';
    }//end if $object
    ?>
  </article>
