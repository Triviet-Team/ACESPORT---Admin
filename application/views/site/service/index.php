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
                                <div class="box-service text-center">
                                  <a title="Bấm để xem chi tiết" href="'.base_url('dich-vu/') . $row->vn_slug.'.html"><img src="'.$link_img.'" alt=""></a>
                                  <h3>
                                    <a title="Khám sức khỏe định kỳ" href="'.base_url('dich-vu/') . $row->vn_slug.'.html">'.$row->vn_name.'</a>
                                  </h3>
                    
                                  <div class="box-service-dash"></div>
                    
                                  <p>'.$row->vn_sapo.'</p>
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
          <h1>dịch vụ</h1>
        </div>

        <div class="row">
		    <?php echo $xhtmlListNews; ?>
<!-- 		end list service -->
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
  
