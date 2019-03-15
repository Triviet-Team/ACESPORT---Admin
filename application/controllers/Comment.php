<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once (APPPATH . 'pusher/vendor/autoload.php');

class Comment extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('history_comment_m');
        $this->load->model('comment_m');
        $this->load->model('users_m');
    }
    
    public function get_info_reply() {
        $login = $this->session->userdata('isCheckLogin');
        $xhtml = '';
        if ($login) {
            if ($_POST) {
                $idUser = $_POST['id'];
                $comment_id = $_POST['id_comment'];
                $tournament_id = $_POST['id_tournament'];
                $user_id = $this->session->userdata('id');
                $where = array('id' => $user_id, 'status' => 1);
                $objUser = $this->users_m->get_info_rule($where);
                if($objUser) {
                    $link_img = base_url().'public/site/img/default-user.jpg';
                    if(!empty($objUser->image_link)){
                        $link_img = base_url().'uploads/images/user/200_200/'.$objUser->image_link;
                    }
                    $xhtml = '<div class="comment-reply comment-reply-'.$comment_id.'">
                    					<div class="comment-reply-form" style="display: flex;">
                    						<img src="'.$link_img.'"> 
    			                            <textarea style="width: 100%;"></textarea>
                                            <button comment-id="'.$comment_id.'" type="button" id-tournament="'.$tournament_id.'" class="btn-send-reply btn btn-indigo waves-effect waves-light">Gửi bình luận</button>
                    					</div>
                    			</div>';
                }
            }
        }
        echo $xhtml;
    }
    
    public function del_message() {
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
        $login = $this->session->userdata('isCheckLogin');
        $tid = $this->session->userdata('tid');
        $id = $this->session->userdata('id');
        $success = array();
        if ($login) {
            $id_comment = $_POST['id_comment'];
            $where = array('id' => $id_comment);
            $objComment = $this->comment_m->get_info_rule($where);
            if($tid > 1) {
                $this->history_comment_m->del_rule(array('id_comment' => $objComment->id));
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
                if ($success['del'] == 1) {
                    $data_pusher['comment_id'] = (int)$id_comment;
                    $pusher->trigger('del-message', 'event-del-message', $data_pusher);
                }
            }
            if($tid == 1) {
                if($objComment->from_id == $id) {
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
                    if ($success['del'] == 1) {
                        $data_pusher['comment_id'] = (int)$id_comment;
                        $pusher->trigger('del-message', 'event-del-message', $data_pusher);
                    }
                }else {
                    $success['del'] = 0;
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
                $parent_comment_id = $_POST['id_parent_comment'] ? $_POST['id_parent_comment'] : 0;
                $user_id = $this->session->userdata('id');
                $where = array('id' => $user_id, 'status' => 1);
                $objUser = $this->users_m->get_info_rule($where);
                $link_img = base_url().'public/site/img/default-user.jpg';
                if(!empty($objUser->image_link)){
                    $link_img = base_url().'uploads/images/user/200_200/'.$objUser->image_link;
                }
                if ($objUser) {
                    if ($user_id > 0 && $content != '' && $content != '<br>' && $tournament_id > 0) {
                        $created = now();
                        $data = array(
                            'pid' => $parent_comment_id > 0 ? $parent_comment_id : 0,
                            'vn_detail' => $content,
                            'tournament_id	' => $tournament_id,
                            'from_id' => $user_id,
                            'created' => $created,
                        );
                        if ($this->comment_m->create($data)) {
                            $comment_id = $this->db->insert_id();
                            if ($option == 'add-message') {
                                $html = '<div class="box-comment box-comment-'.$comment_id.'">
                                		<div class="box-comment-author text-center">
                                			<a title="Nhấp để xem hồ sơ" href="'.base_url('chi-tiet-thanh-vien-'.$objUser->id.'.html').'"><img
                                				src="'.$link_img.'"></a>
                                			<h5>
                                				<a title="Nhấp để xem hồ sơ" href="'.base_url('chi-tiet-thanh-vien-'.$objUser->id.'.html').'">'.$objUser->name.'</a>
                                			</h5>
                                			<p>Điểm: '.$objUser->point.'</p>
                                			<p>Ngày tham gia '.date('d/m/Y',$objUser->created).'</p>
                                		</div>
                                		<div class="box-comment-detail">
                                			<div class="box-comment-detail-date">
                                				<h5>'.date('d/m/Y - H:m:s', $created).'</h5>
                                				<button
                                					class="btn btn-light waves-effect waves-light delete-comment text-right" comment-id="'.$comment_id.'">Xóa
                                					bình luận</button>
                                			</div>
                                			<div class="box-comment-detail-content">
                                				<div>'.$content.'</div>
                                				<div class="sub-comment sub-comment-'.$comment_id.'"></div>
                                				<button id-parent-comment="'.$comment_id.'" class="btn btn-indigo waves-effect waves-light click-btn-reply">Trả lời</button>
                                				<div class="add-box-reply-'.$comment_id.'"></div>
                                			</div>
                                		</div>
                                	</div>';
                                $data_pusher['content'] = $html;
                                $data_pusher['tournament_id'] = $tournament_id;
                                $data_pusher['comment_id'] = $comment_id;
                                $pusher->trigger('my-channel', 'my-event', $data_pusher);
                            }elseif ($option == 'add-message-reply') {
                                $html = '<div class="box-sub-comment box-comment-'.$comment_id.'"">
            						<div class="box-sub-comment-img">
            							<a href="'.base_url('chi-tiet-thanh-vien-'.$objUser->id.'.html').'"> <img
            								src="'.$link_img.'">
            							</a>
            							<h5>
            								<a href="'.base_url('chi-tiet-thanh-vien-'.$objUser->id.'.html').'">'.$objUser->name.'</a>
            							</h5>
            						</div>
            						<div class="box-sub-comment-content">
                                        <div>'.$content.'</div>
            							<button class="delete-comment sub-comment-del" comment-id="'.$comment_id.'">Xóa bình luận</button>
            						</div>
            						<div class="box-sub-comment-date text-center">
            							<h5>'.date('H:m:s', $created).'</h5>
            							<h5>'.date('d/m/Y', $created).'</h5>
            						</div>
            					</div>';
                                $data_pusher['content'] = $html;
                                $data_pusher['tournament_id'] = $tournament_id;
                                $data_pusher['comment_id'] = $parent_comment_id;
                                $pusher->trigger('result-reply', 'event-reply', $data_pusher);
                            }
                            $input = array();
                            $input['where'] = array('tournament_id' => $tournament_id, 'from_id <>' => $user_id);
                            $list_comment = $this->comment_m->get_list($input);
                            if ($list_comment) {
                                $arr_notification = array();
                                $from_id = $this->comment_m->getId($list_comment, 'from_id');
                                $input = array();
                                $input['where_in'] = array('id', $from_id);
                                $listUser = $this->users_m->get_list($input);
                                foreach ($listUser as $row) {
                                    $data = array(
                                        'id_user' => (int)$row->id,
                                        'id_comment' => $comment_id,
                                        'created' => $created,
                                    );
                                    if ($this->history_comment_m->create($data)) {
                                        //cap nhat lai thông báo tin nhắn
                                        $data = array();
                                        $data['count_notification'] = $row->count_notification + 1;
                                        $this->users_m->update($row->id, $data);
                                        $arr_notification[] = array('id' => $row->id, 'total' => $row->count_notification + 1);
                                    }
                                }
                                $data_notification['content'] = json_encode($arr_notification);
                                $pusher->trigger('notification', 'event-send-notification', $data_notification);
                            }
                            $success['content'] = 1;
                        }
                    }else {
                        $success['content'] = 0;
                    }
                }else {
                    $success['active'] = 0;
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




































