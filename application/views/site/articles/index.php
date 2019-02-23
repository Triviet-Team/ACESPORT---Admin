<?php
    $xhtmlListNews = '';
    if(!empty($list_news)){
        foreach($list_news as $row){
            $link_img = base_url().'public/site/img/default-1024x731.png';
            if(!empty($row->image_link)){
                $link_img = base_url().'uploads/images/news/1024_1024/'.$row->image_link;
            }
            $xhtmlListNews .= '<div class="box-news">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="box-news-img"><a href="'.base_url('tin-tuc/') . $row->vn_slug.'.html" title="Nhấp để xem chi tiết"><img src="'.$link_img.'"/></a></div>
                                  </div>
                                  <div class="col-md-8">
                                    <div class="box-news-detail">
                                      <h4><a href="'.base_url('tin-tuc/') . $row->vn_slug.'.html" title="'.$row->vn_name.'">'.$row->vn_name.'</a></h4>
                                      <h6><i class="mdi mdi-account"></i><span class="user-post">Admin</span><i class="mdi mdi-clock-outline"></i><span>'.date('d/m/Y', $row->created).'</span></h6>
                                      <h5>'.$row->vn_sapo.'</h5>
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
            <h1> <a>tin tức</a></h1>
          </div>
          <div class="grid-box">
            <div class="left">
				<!-- left -->
				<?php $this->load->view('site/sidebar'); ?>
				<!-- end left -->
            </div>
            <div class="news-main">
				<?php echo $xhtmlListNews; ?>
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
      </section>
    </article>
