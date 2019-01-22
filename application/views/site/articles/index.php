<?php
    $xhtmlListNews = '';
    if(!empty($list_news)){
        foreach($list_news as $row){
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
                    
                                    <a href="chi-tiet-tin-tuc.php"><img src="'.$link_img.'" alt=""></a>
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
    }else{
        $xhtmlListNews = '<p>Dữ liệu đang cập nhật</p>';
    }

?>


<article>
    <section class="bread-crumb">
      <div class="container">
		<?php $this->load->view('site/breadcrumb'); ?>
      </div>
    </section>

    <section class="page-content">
      <div class="container">
        <div class="title-page text-center">
          <h1>tin tức</h1>
        </div>

        <div class="row">
          <?php echo $xhtmlListNews; ?>
<!-- 		end list news -->
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
    </section>
  </article>
