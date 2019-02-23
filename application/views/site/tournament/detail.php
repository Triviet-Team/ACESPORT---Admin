   <article>
      <section class="bread-crumb">
        <div class="container">
          <div class="bc-icons">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="index.html">Giải dấu</a></li>
                <li class="breadcrumb-item active">10 Kids Unaware of Their Halloween Cosfume</li>
              </ol>
            </nav>
          </div>
        </div>
      </section>
      <section class="page-text">
        <div class="container">
          <div class="title-page-text">
            <h2>10 Kids Unaware of Their Halloween Cosfume</h2>
          </div>
          <nav class="navbar navbar-light d-block d-md-none">
            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#tourTab" aria-controls="tourTab" aria-expanded="false" aria-label="Toggle navigation"><a class="navbar-brand">Điều lệ</a></button><i class="mdi mdi-chevron-down"></i>
            <div class="collapse navbar-collapse" id="tourTab">
              <ul class="nav navbar-nav mr-auto">
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/dieu-le' : '' ?>" class="nav-link <?= isset($type) && $type == 'dieu-le' ? active : '' ?>">Điều lệ</a></li>
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/lich-thi-dau' : '' ?>" class="nav-link <?= isset($type) && $type == 'lich-thi-dau' ? active : '' ?>">Lịch thi đấu</a></li>
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/ket-qua' : '' ?>" class="nav-link <?= isset($type) && $type == 'ket-qua' ? active : '' ?>">Kết quả</a></li>
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/van-dong-vien' : '' ?>" class="nav-link <?= isset($type) && $type == 'van-dong-vien' ? active : '' ?>">Vận động viên</a></li>
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/nhanh-dau' : '' ?>" class="nav-link">Nhánh đấu</a></li>
                <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/lich-su-giai-dau' : '' ?>" class="nav-link <?= isset($type) && $type == 'lich-su-giai-dau' ? active : '' ?>">Lịch sử giải đấu</a></li>
              </ul>
            </div>
          </nav>
          <ul class="nav nav-tabs d-none d-md-block" role="tablist">
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/dieu-le' : '' ?>" class="nav-link <?= isset($type) && $type == 'dieu-le' ? active : '' ?>">Điều lệ</a></li>
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/lich-thi-dau' : '' ?>" class="nav-link <?= isset($type) && $type == 'lich-thi-dau' ? active : '' ?>">Lịch thi đấu</a></li>
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/ket-qua' : '' ?>" class="nav-link <?= isset($type) && $type == 'ket-qua' ? active : '' ?>">Kết quả</a></li>
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/van-dong-vien' : '' ?>" class="nav-link <?= isset($type) && $type == 'van-dong-vien' ? active : '' ?>">Vận động viên</a></li>
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/nhanh-dau' : '' ?>" class="nav-link">Nhánh đấu</a></li>
            <li class="nav-item"><a href="<?= $objTournament ? base_url('chi-tiet-giai-dau/') . $objTournament->vn_slug . '/lich-su-giai-dau' : '' ?>" class="nav-link <?= isset($type) && $type == 'lich-su-giai-dau' ? active : '' ?>">Lịch sử giải đấu</a></li>
          </ul>
       <?php if ($dataTournament) {?>
          <div class="tab-content">
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
                                                    $xhtml_doi_1 .= $row_3->name . '-';
                                                }
                                            }
                                            
                                            if ($row_2->doi_2) {
                                                foreach ($row_2->doi_2 as $row_4) {
                                                    $xhtml_doi_2 .= $row_4->name . '-';
                                                }
                                            }
                                            
                                            $xhtmlContentNoiDung .=  '<tr>
                                                                        <td scope="col">'.date('H:m:s d/m/Y', $row_2->start_date). ' - ' . date('H:m:s d/m/Y', $row_2->end_date). '<b class"live">'.(($row_2->start_date <= now() && $row_2->end_date >= now()) ? ' LIVE' : '' ).'</b></td>
                                                                        <td scope="col">'.$xhtml_doi_1.'</td>
                                                                        <td scope="col">'.$xhtml_doi_2.'</td>
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
                                                    $xhtml_doi_1 .= $row_3->name . '-';
                                                }
                                            }
                        
                                            if ($row_2->doi_2) {
                                                foreach ($row_2->doi_2 as $row_4) {
                                                    $xhtml_doi_2 .= $row_4->name . '-';
                                                }
                                            }
                        
                                            $xhtmlContentNoiDung .=  '<tr>
                                                                    <td scope="col">'.date('H:m:s d/m/Y', $row_2->start_date). ' - ' . date('H:m:s d/m/Y', $row_2->end_date). '</td>
                                                                    <td scope="col">'.$xhtml_doi_1.'</td>
                                                                    <td scope="col">'.$xhtml_doi_2.'</td>
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
                                if ($row->list_player) {
                                    foreach ($row->list_player as $key_1 => $row_1) {
                        
                                        $xhtmlContentNoiDung .=  '<tr>
                                                                     <td><a href="chi-tiet-thanh-vien.html">'.$row_1->name.'</a></td>
                                                                  </tr>';

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
                        default:
                            $xhtml .= '<div>     
                                            <div class="box-post">
                                            	<div class="box-post-author text-center">
                                            		<img src="'.base_url('public/site/').'img/avatar.jpeg">
                                            		<h5>Admin</h5>
                                            	</div>
                                            	<div class="box-post-detail">
                                            		<div class="box-post-detail-date">
                                            			<h5>15/01/2019 - 17:30</h5>
                                            		</div>
                                            		<div class="box-post-detail-content">
                                            			<h3 class="mb-3 text-center">
                                            				<b>'.$dataTournament->vn_name.'</b>
                                            			</h3>
                                                        <div>'.$dataTournament->vn_detail.'</div>
                                            		</div>
                                            		<div class="box-post-detail-tags">
                                            			<h5>
                                            				Tags: <span> <a href="#">Giải đấu vui vẻ,</a></span><span> <a
                                            					href="#">Giải đấu khô máu</a></span>
                                            			</h5>
                                            		</div>
                                            	</div>
                                            </div>';
                                    $xhtml .= '<div class="comment-first">
                                                    	<div class="comment-first-img">
                                                    		<img src="'.base_url('public/site/').'img/avatar.jpeg">
                                                    	</div>
                                                    	<div class="comment-first-box">
                                                            <textarea style="width: 100%;"></textarea>
                                                            <button type="button" id-tournament="'.$dataTournament->id.'" id="btn-send" class="btn btn-indigo waves-effect waves-light">Gửi bình luận</button>
                                                    	</div>
                                                    </div>';                            
                                    $xhtml .= '<div class="comment-area-'.$dataTournament->id.'">';
                                            // list comment
                                            if ($dataTournament->comment) {
                                                foreach ($dataTournament->comment as $row) {
                                                    $xhtml .= '<div class="box-comment">
                                                            		<div class="box-comment-author text-center">
                                                            			<a title="Nhấp để xem hồ sơ" href="chi-tiet-thanh-vien.html"><img
                                                            				src="'.base_url('public/site/').'img/avatar.jpeg"></a>
                                                            			<h5>
                                                            				<a title="Nhấp để xem hồ sơ" href="chi-tiet-thanh-vien.html">Kemmie</a>
                                                            			</h5>
                                                            			<p>Điểm: 500</p>
                                                            			<p>Hạng: 10</p>
                                                            		</div>
                                                            		<div class="box-comment-detail">
                                                            			<div class="box-comment-detail-date">
                                                            				<h5>15/01/2019 - 17:30</h5>
                                                            				<button
                                                            					class="btn btn-light waves-effect waves-light delete-comment text-right">Xóa
                                                            					bình luận</button>
                                                            			</div>
                                                            			<div class="box-comment-detail-content">
                                                            				<div>'.$row->vn_detail.'</div>';
                                                                            // list sub comment
                                                                            $xhtml .= '<div class="sub-comment sub-comment-'.$row->id.'">';
                                                                            if ($row->sub_comment) {
                                                                                foreach ($row->sub_comment as $row_1) {
                                                                                    $xhtml .= '<div class="box-sub-comment">
                                                                            						<div class="box-sub-comment-img">
                                                                            							<a href="chi-tiet-thanh-vien.html"> <img
                                                                            								src="'.base_url('public/site/').'img/avatar.jpeg">
                                                                            							</a>
                                                                            							<h5>
                                                                            								<a href="chi-tiet-thanh-vien.html">Kemmie</a>
                                                                            							</h5>
                                                                            						</div>
                                                                            						<div class="box-sub-comment-content">
                                                                                                        <div>'.$row_1->vn_detail.'</div>
                                                                            							<button class="sub-comment-del">Xóa bình luận</button>
                                                                            						</div>
                                                                            						<div class="box-sub-comment-date text-center">
                                                                            							<h5>17:30</h5>
                                                                            							<h5>15/01/2018</h5>
                                                                            						</div>
                                                                            					</div>';
                                                                                }
                                                                            }
                                                                            $xhtml .= '</div>';
                                                                            $xhtml .= '<div class="comment-reply comment-reply-'.$row->id.'">
                                                                            					<button class="btn btn-indigo waves-effect waves-light">Trả
                                                                            						lời</button>
                                                                            					<div class="comment-reply-form" style="display: flex;">
                                                                            						<img src="'.base_url('public/site/').'img/avatar.jpeg"> 
                                                            			                            <textarea style="width: 100%;"></textarea>
                                                                                                    <button comment-id="'.$row->id.'" type="button" id-tournament="'.$dataTournament->id.'" class="btn-send-reply btn btn-indigo waves-effect waves-light">Gửi bình luận</button>
                                                                            					</div>
                                                                            				</div>';
                                                     $xhtml .=       '</div>
                                                            		</div>
                                                            	</div>';
                                                }
                                            }   
                                  $xhtml .= '</div>';                             
                               $xhtml .= '</div>';
                            break;
                    }
                }
                
                echo $xhtml;
          ?>

            <div class="tab-pane fade" id="branchTour" role="tabpanel" aria-labelledby="branchTour-tab">     
              <table class="table table-bordered table-hover" id="branch-table" style="width: 100%">
                <tr>
                  <th>Đôi nam 1800</th>
                </tr>
                <tr>
                  <td><a target="_blank" href="xem-nhanh-dau.html">Nhấp để xem nhánh đấu</a></td>
                </tr>
                <tr>
                  <th>Đôi nam 1540</th>
                </tr>
                <tr>
                  <td><a target="_blank" href="xem-nhanh-dau.html">Nhấp để xem nhánh đấu</a></td>
                </tr>
              </table>
            </div>
          </div>
       <?php } ?>
          <!-- end -->
        </div>
      </section>
    </article>
    
    