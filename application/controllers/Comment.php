<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once (APPPATH . 'pusher/vendor/autoload.php');

class Comment extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('comment_m');
        $this->load->model('users_m');
    }
    public function del_message() {
        $login = $this->session->userdata('isCheckLogin');
        $tid = $this->session->userdata('tid');
        $success = array();
        if ($login && $tid > 1) {
            $id_comment = $_POST['id_comment'];
            $where = array('id' => $id_comment);
            $objComment = $this->comment_m->get_info_rule($where);
            if ($objComment->pid == 0) {
                if($this->comment_m->del_rule(array('pid' => $objComment->id))) {
                    if($this->comment_m->delete($objComment->id)) {
                        $success['del'] = 1;
                    }
                };
            }else {
                if($this->comment_m->delete($objComment->id)) {
                    $success['del'] = 1;
                }
            }
        }else {
            $success['del'] = 0;
        }
        echo json_encode($success);
    }
    public function ajax_message() {  
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '9665dd394af39ba953c4',
            '7fa8f901ea1b0bb964a7',
            '716621',
            $options
        );
        $success = array();
        $login = $this->session->userdata('isCheckLogin');
        if ($login) {
            if ($_POST) {
                $option = $_POST['option'];
                $tournament_id = $_POST['id_tournament'];
                $content = $_POST['content'];
                $user_id = $this->session->userdata('id');
                if ($option == 'add-message') {
                    if ($user_id > 0 && $content != '' && $content != '<br>' && $tournament_id > 0) {
                        $created = time();
                        $data = array(
                            'pid' => 0,
                            'vn_detail' => $content,
                            'tournament_id	' => $tournament_id,
                            'from_id' => $user_id,
                            'created' => $created,
                        );
                        $where = array('id' => $user_id);
                        $objUser = $this->users_m->get_info_rule($where);
                        $link_img = base_url().'public/site/img/default-user.jpg';
                        if(!empty($objUser->image_link)){
                            $link_img = base_url().'uploads/images/user/200_200/'.$objUser->image_link;
                        }
                        if ($this->comment_m->create($data)) {
                            $comment_id = $this->db->insert_id();
                            $html = '	<div class="box-comment">
                                		<div class="box-comment-author text-center">
                                			<a title="Nhấp để xem hồ sơ" href="chi-tiet-thanh-vien.html"><img
                                				src="'.$link_img.'"></a>
                                			<h5>
                                				<a title="Nhấp để xem hồ sơ" href="'.base_url('chi-tiet-thanh-vien-'.$objUser->id.'.html').'">'.$objUser->name.'</a>
                                			</h5>
                                			<p>Điểm: '.$objUser->point.'</p>
                                		</div>
                                		<div class="box-comment-detail">
                                			<div class="box-comment-detail-date">
                                				<h5>'.date('d/m/Y - H:m:s', $created).'</h5>
                                				<button
                                					class="btn btn-light waves-effect waves-light delete-comment text-right">Xóa
                                					bình luận</button>
                                			</div>
                                			<div class="box-comment-detail-content">
                                				<div>'.$content.'</div>
                                				<div class="sub-comment"></div>
                                				<div class="comment-reply">
                                					<button class="btn btn-indigo waves-effect waves-light">Trả
                                						lời</button>
                                					<div class="comment-reply-form comment-reply-'.$comment_id.'" style="display: flex;">
                                						<img src="'.base_url('public/site/').'img/avatar.jpeg">
                                						    <textarea id="nic-editor-'.$comment_id.'" style="width: 100%;"></textarea>
                                                            <button comment-id="'.$comment_id.'" type="button" id-tournament="'.$tournament_id.'" class="btn-send-reply btn btn-indigo waves-effect waves-light">Gửi bình luận</button>
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                	</div>';
                            $data_pusher['content'] = $html;
                            $data_pusher['tournament_id'] = $tournament_id;
                            $data_pusher['comment_id'] = $comment_id;
                            $pusher->trigger('my-channel', 'my-event', $data_pusher);
                        }
                    }else {
                        $success['content'] = 0;
                    }
                }
            
                if ($option == 'add-message-reply') {
                    if ($user_id > 0 && $content != '' && $content != '<br>' && $tournament_id > 0) {
                        $comment_id = $_POST['id_comment'];
                        $data = array(
                            'pid' => $comment_id,
                            'vn_detail' => $content,
                            'tournament_id	' => $tournament_id,
                            'from_id' => $user_id,
                            'created' => now(),
                        );
            
                        if ($this->comment_m->create($data)) {
                            $html = '<div class="box-sub-comment">
            						<div class="box-sub-comment-img">
            							<a href="chi-tiet-thanh-vien.html"> <img
            								src="'.base_url('public/site/').'img/avatar.jpeg">
            							</a>
            							<h5>
            								<a href="chi-tiet-thanh-vien.html">Kemmie</a>
            							</h5>
            						</div>
            						<div class="box-sub-comment-content">
                                        <div>'.$content.'</div>
            							<button class="sub-comment-del">Xóa bình luận</button>
            						</div>
            						<div class="box-sub-comment-date text-center">
            							<h5>17:30</h5>
            							<h5>15/01/2018</h5>
            						</div>
            					</div>';
                            $data_pusher['content'] = $html;
                            $data_pusher['tournament_id'] = $tournament_id;
                            $data_pusher['comment_id'] = $comment_id;
                            $pusher->trigger('result-reply', 'event-reply', $data_pusher);
                        }
                    }else {
                        $success['content'] = 0;
                    }
                }
            }
        }else {
            $success['success'] = 0;
        }
        echo json_encode($success);
    }
    // ajax gửi message
    public function nicEditUpload() {

        //Check if we are getting the image
        if(isset($_FILES['image'])){
            //Get the image array of details
            $img = $_FILES['image'];
            //The new path of the uploaded image, rand is just used for the sake of it
            $path = "uploads/images/comment/" . rand().$img["name"];
            //Move the file to our new path
            move_uploaded_file($img['tmp_name'],$path);
            //Get image info, reuiqred to biuld the JSON object
            
            //The direct link to the uploaded image, this might varyu depending on your script location
            $link = base_url() . $path;
            //$data = getimagesize($path);
            $data = getimagesize($link);
            
            $res = array("data" => array(
                                        "link" => $link,
                                        "width" => $data[0],
                                        "height" => $data[1],
                                    )
                        );
            
            //echo out the response :)
            echo json_encode($res);
        }
    }
    
    
    
    
    
    
    
    
    

}




































