


  
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
          <h4><?=$object->vn_sapo?></h4>
		  <div><?=$object->vn_detail?></div>
        </div>
	<?php if(!empty($related_news)){?>
        <div class="similar">
          <div class="title-page text-center">
            <h1>dịch vụ liên quan</h1>
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
                                                  <div class="box-service text-center">
                                                    <a title="Bấm để xem chi tiết" href="'.base_url('dich-vu/') . $row->vn_slug.'.html"><img src="'.$link_img.'" alt=""></a>
                                                    <h3>
                                                      <a title="Tầm soát ung thư" href="'.base_url('dich-vu/') . $row->vn_slug.'.html">'.$row->vn_name.'</a>
                                                    </h3>
                                    
                                                    <div class="box-service-dash"></div>
                                    
                                                    <p>'.$row->vn_sapo.'</p>
                                                  </div>
                                                </div>';
                        }
                   echo $xhtmlListNews;
                ?>					
<!--             end list related -->
          </div>
        </div>
        <?php } //end if related ?>
      </div>
    </section>
        <?php 
    }else{
        echo 'Dữ liệu đang cập nhật';
    }//end if $object
    ?>
  </article>
  
