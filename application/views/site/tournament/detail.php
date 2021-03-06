   <article>
     <div class="notification" >
  		<div class="box-login">
          <div class="tab-content container">              	
				Vui lòng nhập nội dung bình luận
          </div>
        </div>
	</div>
      <section class="bread-crumb">
        <div class="container">
            <?php $this->load->view('site/breadcrumb'); ?>
        </div>
      </section>
      <section class="page-text">
        <div class="container">
          <nav class="navbar navbar-light d-block d-md-none">
            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#tourTab" aria-controls="tourTab" aria-expanded="false" aria-label="Toggle navigation"><a class="navbar-brand">Chọn danh mục</a></button><i class="mdi mdi-chevron-down"></i>
            <div class="collapse navbar-collapse" id="tourTab">
              <ul class="nav navbar-nav mr-auto">
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/dieu-le' : '' ?>" class="nav-link <?= isset($type) && $type == 'dieu-le' ? active : '' ?>">Điều lệ</a></li>
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/van-dong-vien' : '' ?>" class="nav-link <?= isset($type) && $type == 'van-dong-vien' ? active : '' ?>">Danh sách đăng ký</a></li>
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/lich-thi-dau' : '' ?>" class="nav-link <?= isset($type) && $type == 'lich-thi-dau' ? active : '' ?>">Lịch thi đấu</a></li>
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/nhanh-dau' : '' ?>" class="nav-link <?= isset($type) && $type == 'nhanh-dau' ? active : '' ?>">Nhánh đấu</a></li>
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/ket-qua' : '' ?>" class="nav-link <?= isset($type) && $type == 'ket-qua' ? active : '' ?>">Kết quả</a></li>
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/lich-su-giai-dau' : '' ?>" class="nav-link <?= isset($type) && $type == 'lich-su-giai-dau' ? active : '' ?>">Lịch sử giải đấu</a></li>
              </ul>
            </div>
          </nav>
          <ul class="nav nav-tabs d-none d-md-block" role="tablist">
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/dieu-le' : '' ?>" class="nav-link <?= isset($type) && $type == 'dieu-le' ? active : '' ?>">Điều lệ</a></li>
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/van-dong-vien' : '' ?>" class="nav-link <?= isset($type) && $type == 'van-dong-vien' ? active : '' ?>">Danh sách đăng ký</a></li>
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/lich-thi-dau' : '' ?>" class="nav-link <?= isset($type) && $type == 'lich-thi-dau' ? active : '' ?>">Lịch thi đấu</a></li>
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/nhanh-dau' : '' ?>" class="nav-link <?= isset($type) && $type == 'nhanh-dau' ? active : '' ?>">Nhánh đấu</a></li>
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/ket-qua' : '' ?>" class="nav-link <?= isset($type) && $type == 'ket-qua' ? active : '' ?>">Kết quả</a></li>
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/lich-su-giai-dau' : '' ?>" class="nav-link <?= isset($type) && $type == 'lich-su-giai-dau' ? active : '' ?>">Lịch sử giải đấu</a></li>
          </ul>
       <?php if ($dataTournament) {?>
          <div class="tab-content">
             <h5 class="d-block d-md-none mb-3" style="color: white">Tên danh mục</h5>
          <?php 
                $xhtml = '';
                if ($type) {
                    switch ($type) {
                        case 'lich-thi-dau':
                            $xhtmlNoiDung = '';
                            $xhtmlContentNoiDung = '';
                            foreach ($dataTournament as $key => $row) {
                                $xhtmlNoiDung .= '<li class="nav-item"><a class="nav-link '.($key == 0 ? 'active' : '').'" id="schedule-1-tab" data-toggle="tab" href="#schedule-'.$row->id.'" role="tab" aria-controls="schedule-1" aria-selected="true">'.$row->name.'</a></li>';
                                $xhtmlContentNoiDung .= '<div class="tab-pane fade show '.($key == 0 ? 'active' : '').'" id="schedule-'.$row->id.'" role="tabpanel" aria-labelledby="schedule-1-tab">
                                                          <table class="table table-bordered table-hover" id="schedule-table" style="width: 100%">
                                                            <tbody>';
                                $obj_content_tournament_playing_category = $row->content_tournament_playing_category;
                                if ($obj_content_tournament_playing_category->lich_thi_dau) {
                                    $xhtmlContentNoiDung .= '<tr><th colspan="5">Vòng loại</th></tr>';
                                    $xhtmlContentNoiDung .= '<tr><td colspan="3">'.$obj_content_tournament_playing_category->lich_thi_dau.'</td></tr>';
                                }
                                if ($row->list_fixture) {
                                    
                                    foreach ($row->list_fixture as $key_1 => $row_1) {
                                        $xhtmlContentNoiDung .=  '<tr>
                                                                    <th colspan="5">'.$key_1.'</th>
                                                                  </tr>';
                                        foreach ($row_1 as $row_2) {
                                            $xhtml_doi_1 = '';
                                            $xhtml_doi_2 = '';
                                            if ($row_2->doi_1) {
                                                foreach ($row_2->doi_1 as $row_3) {
                                                    $url = '<a href="'.base_url('chi-tiet-thanh-vien-'.$row_3->id.'.html').'">'.$row_3->name.'</a>';
                                                    $xhtml_doi_1 .=  '-' . $url;
                                                }
                                            }
                                            
                                            if ($row_2->doi_2) {
                                                foreach ($row_2->doi_2 as $row_4) {
                                                    $url = '<a href="'.base_url('chi-tiet-thanh-vien-'.$row_4->id.'.html').'">'.$row_4->name.'</a>';
                                                    $xhtml_doi_2 .=  '-' . $url;
                                                }
                                            }
                                            //($row_2->start_date && $row_2->end_date ? date('H:m:s d/m/Y', $row_2->start_date). ' - ' . date('H:m:s d/m/Y', $row_2->end_date) : 'Đang cập nhật'). '<b class"live">'.(($row_2->start_date <= now() && $row_2->end_date >= now()) ? ' LIVE' : '' )
                                            $xhtmlContentNoiDung .=  '<tr>
                                                                        <td scope="col">'.($row_2->start_date ? date('H:m:s d/m/Y', $row_2->start_date) : 'Đang cập nhật').'</b></td>
                                                                        <td scope="col">'.substr($xhtml_doi_1, 1).'</td>
                                                                        <td scope="col">'.substr($xhtml_doi_2, 1).'</td>
                                                                      </tr>';
                                        }
                                    }
                                }

                                $xhtmlContentNoiDung .=     '</tbody>
                                                          </table>
                                                        </div>';
                            }
                            $xhtml .= '<div class="tab-pane fade show active" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">     
                                          <ul class="nav nav-tabs" role="tablist">';
                            $xhtml .=           $xhtmlNoiDung;
                            $xhtml .=     '</ul>
                                          <div class="tab-content">
                                                '.$xhtmlContentNoiDung.'
                                          </div>
                                        </div>';
                            break;
                        case 'ket-qua':
                            $xhtmlNoiDung = '';
                            $xhtmlContentNoiDung = '';
                            foreach ($dataTournament as $key => $row) {
                                $xhtmlNoiDung .= '<li class="nav-item"><a class="nav-link '.($key == 0 ? 'active' : '').'" id="schedule-1-tab" data-toggle="tab" href="#schedule-'.$row->id.'" role="tab" aria-controls="schedule-1" aria-selected="true">'.$row->name.'</a></li>';
                                $xhtmlContentNoiDung .= '<div class="tab-pane fade show '.($key == 0 ? 'active' : '').'" id="schedule-'.$row->id.'" role="tabpanel" aria-labelledby="schedule-1-tab">
                                                      <table class="table table-bordered table-hover" id="schedule-table" style="width: 100%">
                                                        <tbody>';
                                if ($row->list_fixture) {
                                    foreach ($row->list_fixture as $key_1 => $row_1) {
                                        $xhtmlContentNoiDung .=  '<tr>
                                                                <th colspan="5">'.$key_1.'</th>
                                                              </tr>';
                                        foreach ($row_1 as $row_2) {
                                            $xhtml_doi_1 = '';
                                            $xhtml_doi_2 = '';
                                            if ($row_2->doi_1) {
                                                foreach ($row_2->doi_1 as $row_3) {
                                                    $url = '<a href="'.base_url('chi-tiet-thanh-vien-'.$row_3->id.'.html').'">'.$row_3->name.'</a>';
                                                    $xhtml_doi_1 .=  '-' . $url;
                                                }
                                            }
                        
                                            if ($row_2->doi_2) {
                                                foreach ($row_2->doi_2 as $row_4) {
                                                    $url = '<a href="'.base_url('chi-tiet-thanh-vien-'.$row_4->id.'.html').'">'.$row_4->name.'</a>';
                                                    $xhtml_doi_2 .=  '-' . $url;
                                                }
                                            }
                        
                                            $xhtmlContentNoiDung .=  '<tr>
                                                                    <td scope="col">'.($row_2->start_date ? date('H:m:s d/m/Y', $row_2->start_date) : 'Đang cập nhật'). '</td>
                                                                    <td scope="col">'.substr($xhtml_doi_1, 1).'</td>
                                                                    <td scope="col">'.substr($xhtml_doi_2, 1).'</td>
                                                                    <td scope="col">'.$row_2->first_registration_games.':'.$row_2->second_registration_games.'</td>
                                                                  </tr>';
                                        }
                                    }
                                }
                        
                                $xhtmlContentNoiDung .=     '</tbody>
                                                      </table>
                                                    </div>';
                            }
                            $xhtml .= '<div class="tab-pane fade show active" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">
                                      <ul class="nav nav-tabs" role="tablist">';
                            $xhtml .=           $xhtmlNoiDung;
                            $xhtml .=     '</ul>
                                      <div class="tab-content">
                                            '.$xhtmlContentNoiDung.'
                                      </div>
                                    </div>';
                            break;
                        case 'van-dong-vien':
                             $xhtmlNoiDung = '';
                            $xhtmlContentNoiDung = '';
                            foreach ($dataTournament as $key => $row) {
                                $xhtmlNoiDung .= '<li class="nav-item"><a class="nav-link '.($key == 0 ? 'active' : '').'" id="schedule-1-tab" data-toggle="tab" href="#schedule-'.$row->id.'" role="tab" aria-controls="schedule-1" aria-selected="true">'.$row->name.'</a></li>';
                                $xhtmlContentNoiDung .= '<div class="tab-pane fade show '.($key == 0 ? 'active' : '').'" id="schedule-'.$row->id.'" role="tabpanel" aria-labelledby="schedule-1-tab">
                                                  <table class="table table-bordered table-hover" id="schedule-table" style="width: 100%">
                                                    <tbody>';
                                if ($row->content_tournament_playing_category) {
                                    $obj_content_tournament_playing_category = $row->content_tournament_playing_category;
                                    $xhtmlContentNoiDung .= '<tr><th colspan="5">Danh sách vận động viên</th></tr>';
                                    $xhtmlContentNoiDung .= '<tr><td colspan="3">'.$obj_content_tournament_playing_category->van_dong_vien.'</td></tr>';
                                }
                                // if ($row->list_player) {
                                //     $xhtmlContentNoiDung .= '<tr><th colspan="5">Xem chi tiết</th></tr>';
                                //     foreach ($row->list_player as $key_1 => $row_1) {
                        
                                //         $xhtmlContentNoiDung .=  '<tr>
                                //                                      <td><a href="'.base_url('chi-tiet-thanh-vien-'.$row_1->id.'.html').'">'.$row_1->name.'</a></td>
                                //                                   </tr>';

                                //     }
                                // }
                        
                                $xhtmlContentNoiDung .=     '</tbody>
                                                  </table>
                                                </div>';
                            }
                            $xhtml .= '<div class="tab-pane fade show active" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">
                                  <ul class="nav nav-tabs" role="tablist">';
                            $xhtml .=           $xhtmlNoiDung;
                            $xhtml .=     '</ul>
                                  <div class="tab-content">
                                        '.$xhtmlContentNoiDung.'
                                  </div>
                                </div>';
                            break;
                            // $xhtml .= '<div <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="schedule-1-tab">
                            //                 <table class="table table-bordered table-hover" id="schedule-table" style="width: 100%">
                            //                     <tbody>
                            //                         <tr style="background: white;"><th colspan="5">'.$dataTournament->danh_sach_dk.'</th></tr>
                            //                     </tbody>
                            //                 </table>
                            //         </div>';
                            // break;
                        case 'lich-su-giai-dau':
                            $xhtml .= '<div class="tab-pane fade show active" id="save" role="tabpanel" aria-labelledby="save-tab">     
                                          <table class="table table-bordered table-hover" id="save-table" style="width: 100%">
                                            <thead>
                                              <tr>
                                                <th scope="col">Mùa giải</th>
                                              </tr>
                                            </thead>
                                            <tbody>';
                            
                                foreach ($dataTournament as $row) {   
                                    $xhtml .= '<tr>
                                                <td scope="col"><a href="'.base_url('chi-tiet-giai-dau/') . $row->vn_slug .'.html">'.$row->vn_name.'</a></td>
                                              </tr>';
                                }                           
                             $xhtml .=       '</tbody>
                                          </table>
                                        </div>';
                            break;
                        case 'nhanh-dau':
                            $xhtml .= '<div class="tab-pane fade show active" id="branchTour" role="tabpanel" aria-labelledby="branchTour-tab">';
                                $xhtml .= '<table class="table table-bordered table-hover" id="branch-table" style="width: 100%">';
                                    foreach ($dataTournament as $key => $row) {
                                        $xhtml .= '<tr>
                                                      <th>'.$row->name.'</th>
                                                    </tr>
                                                    <tr>
                                                      <td><a target="_blank" href="'.base_url('xem-nhanh-dau/') . $row->slug_tournament . '/' . $row->id .'">Nhấp để xem nhánh đấu</a></td>
                                                    </tr>';
                                    }
                                $xhtml .= '</table>
                                        </div>';
                            break;
                        default:
                            $link_img = base_url().'public/site/img/default-user.jpg';
                            if(!empty($dataTournament->created_by['image_link'])){
                                $link_img = base_url().'uploads/images/user/200_200/'.$dataTournament->created_by['image_link'];
                            }
                            $xhtml .= '<div>     
                                            <div class="box-post">
                                            	<div class="box-post-author text-center">
                                            		<img src="'.$link_img.'">
                                            		<h5>'.($dataTournament->created_by['nickname'] ? $dataTournament->created_by['nickname'] : ( $dataTournament->created_by['name'] ?  $dataTournament->created_by['name'] : 'ADMIN')).'</h5>
                                            	</div>
                                            	<div class="box-post-detail">
                                            		<div class="box-post-detail-date">
                                            			<h5>'.date('d/m/Y H:m:s',$dataTournament->created).'</h5>
                                            		</div>
                                            		<div class="box-post-detail-content">
                                            			<h3 class="mb-3 text-center">
                                            				<b>'.$dataTournament->vn_name.'</b>
                                            			</h3>
                                                        <div>'.$dataTournament->vn_detail.'</div>
                                            		</div>
                                            	</div>
                                            </div>';
                                    $login = $this->session->userdata('isCheckLogin');
                                    $link_img = base_url().'public/site/img/default-user.jpg';
                                    if ($login) {                                       
                                        if(!empty($info_user->image_link)){
                                            $link_img = base_url().'uploads/images/user/200_200/'.$info_user->image_link;
                                        }
                                    }
                                    // $xhtml .= '<div class="comment-first">
                                    //                 	<div class="comment-first-img">
                                    //                 		<img src="'.$link_img.'">
                                    //                 	</div>
                                    //                 	<div class="comment-first-box">
                                    //                         <textarea id="add-mesage" style="width: 100%;"></textarea>
                                    //                         <button type="button" id-tournament="'.$dataTournament->id.'" id="btn-send" class="btn btn-indigo waves-effect waves-light">Gửi bình luận</button>
                                    //                 	</div>
                                    //                 </div>';       

                                //     $xhtml .= '<div class="comment-area-'.$dataTournament->id.'">';
                                //             // list comment
                                //             if ($dataTournament->comment) {
                                //                 foreach ($dataTournament->comment as $row) {
                                //                     $link_img = base_url().'public/site/img/default-user.jpg';
                                //                     if(!empty($row->image_link)){
                                //                         $link_img = base_url().'uploads/images/user/200_200/'.$row->image_link;
                                //                     }
                                //                     $xhtml .= '<div class="box-comment box-comment-'.$row->id.'">
                                //                             		<div class="box-comment-author text-center">
                                //                             			<a title="Nhấp để xem hồ sơ" href="chi-tiet-thanh-vien.html"><img
                                //                             				src="'.$link_img.'"></a>
                                //                             			<h5>
                                //                             				<a title="Nhấp để xem hồ sơ" href="'.base_url('chi-tiet-thanh-vien-'.$row->id_user.'.html').'">'.$row->name.'</a>
                                //                             			</h5>
                                //                             			<p>Điểm: '.$row->point.'</p>
                                //                             			<p>Ngày tham gia '.date('d/m/Y',$row->created).'</p>
                                //                             		</div>
                                //                             		<div class="box-comment-detail">
                                //                             			<div class="box-comment-detail-date">
                                //                             				<h5>'.date('d/m/Y - H:m:s',$row->created).'</h5>
                                //                             				<button
                                //                             					class="btn btn-light waves-effect waves-light delete-comment text-right" comment-id="'.$row->id.'">Xóa
                                //                             					bình luận</button>
                                //                             			</div>
                                //                             			<div class="box-comment-detail-content">
                                //                             				<div>'.$row->vn_detail.'</div>';
                                //                                             // list sub comment
                                //                                             $xhtml .= '<div class="sub-comment sub-comment-'.$row->id.'">';
                                //                                             if ($row->sub_comment) {
                                //                                                 foreach ($row->sub_comment as $row_1) {
                                //                                                     $link_img = base_url().'public/site/img/default-user.jpg';
                                //                                                     if(!empty($row_1->image_link)){
                                //                                                         $link_img = base_url().'uploads/images/user/200_200/'.$row_1->image_link;
                                //                                                     }
                                //                                                     $xhtml .= '<div class="box-sub-comment box-comment-'.$row_1->id.'">
                                //                                             						<div class="box-sub-comment-img">
                                //                                             							<a href="chi-tiet-thanh-vien.html"> <img
                                //                                             								src="'.$link_img.'"></a>
                                //                                             							</a>
                                //                                             							<h5>
                                //                                             								<a title="Nhấp để xem hồ sơ" href="'.base_url('chi-tiet-thanh-vien-'.$row_1->id_user.'.html').'">'.$row_1->name.'</a>
                                //                                             							</h5>
                                //                                             						</div>
                                //                                             						<div class="box-sub-comment-content">
                                //                                                                         <div>'.$row_1->vn_detail.'</div>
                                //                                             							<button class="delete-comment sub-comment-del" comment-id="'.$row_1->id.'">Xóa bình luận</button>
                                //                                             						</div>
                                //                                             						<div class="box-sub-comment-date text-center">
                                //                                             							<h5>'.date('H:m:s',$row_1->created).'</h5>
                                //                                             							<h5>'.date('d/m/Y',$row_1->created).'</h5>
                                //                                             						</div>
                                //                                             					</div>';
                                //                                                 }
                                //                                             }
                                //                                             $login = $this->session->userdata('isCheckLogin');
                                //                                             $link_img = base_url().'public/site/img/default-user.jpg';
                                //                                             if ($login) {
                                //                                                 if(!empty($info_user->image_link)){
                                //                                                     $link_img = base_url().'uploads/images/user/200_200/'.$info_user->image_link;
                                //                                                 }
                                //                                             }
                                //                                             $xhtml .= '</div>';
                                //                                             $xhtml .= '<button id-parent-comment="'.$row->id.'" class="btn btn-indigo waves-effect waves-light click-btn-reply">Trả lời</button>';
                                //                                             $xhtml .= '<div class="add-box-reply-'.$row->id.'"></div>';
                                //                      $xhtml .=       '</div>
                                //                             		</div>
                                //                             	</div>';
                                //                 }
                                //             }   
                                //   $xhtml .= '</div>'; 
                                            $xhtml .= '<div class="row">
                                                              <div class="col-lg-12">
                                                                <nav>
                                                                  <ul class="pagination justify-content-end">
                                                    				'.$pagination.'
                                                                  </ul>
                                                                </nav>
                                                              </div>
                                                         </div>';
                               $xhtml .= '</div>';
                            break;
                    }
                }
                
                echo $xhtml;
          ?>

          </div>
       <?php } ?>
          <!-- end -->
        </div>
      </section>
    </article>
    
    