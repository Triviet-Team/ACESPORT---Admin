<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_m');
        $this->lang->load('admin/admin');
    }

    public function index() {
        $input      = array();
        $input['where']['tid >']   = 1;
        $id         = $this->input->get('id');
        $data['id'] = $id;
        if($id){
            $input['where']['id']   = $id;
        }

        $tid           = $this->input->get('tid');
        $data['tid']   = $tid;
        if($tid){
            $input['where']['tid']   = $tid;
        }
        
        $name = $this->input->get('name');
        $data['name']       = $name;
        if($name){
            $input['like']      = array('username', $name );
        }

        //lay tong so luong ta ca cac giao dich trong websit
        $total_item = $this->users_m->get_total($input);

        //load ra thu vien phan trang
        $config = array();
        $config['total_rows'] = $total_item; //tong tat ca cac san pham tren website
        $config['base_url'] = base_url('admincp/admin/index'); //link hien thi ra danh sach san pham
        $config['per_page'] = 20; //so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi ra so trang tren url  
        $config['first_tag_open'] = '<div>';
        $config['first_tag_close'] = '</div>';
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);

        $this->data['list_user'] = $this->users_m->get_list($input);
        $this->data['filter'] = $data;

        $this->data['title'] = 'Danh sách tài khoản';
        $this->data['temp'] = 'admin/index';
        $this->load->view('admin/main', $this->data);
    }
    
    public function user() {
        $input      = array();
        $input['where']['tid']   = 1;
        $id         = $this->input->get('id');
        $data['id'] = $id;
        if($id){
            $input['where']['id']   = $id;
        }
        $status = $this->input->get('status');
        $data['status'] = $status;
        if($status){
            $input['where']['status']   = $status;
        }
    
        $name = $this->input->get('name');
        $data['name']       = $name;
        if($name){
            $input['like']      = array('username', $name);
            $input['or_like_arr'][]  = array('email',  $name);
            $input['or_like_arr'][]  = array('name', $name);            
            $input['or_like_arr'][]  = array('address', $name);
            $input['or_like_arr'][]  = array('phone', $name);
            $input['or_like_arr'][]  = array('organization', $name);
        }
    
        //lay tong so luong ta ca cac giao dich trong websit
        $total_item = $this->users_m->get_total($input);
    
        //load ra thu vien phan trang
        $config = array();
        $config['total_rows'] = $total_item; //tong tat ca cac san pham tren website
        $config['base_url'] = base_url('admincp/admin/user'); //link hien thi ra danh sach san pham
        $config['per_page'] = 20; //so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi ra so trang tren url
        $config['first_tag_open'] = '<div>';
        $config['first_tag_close'] = '</div>';
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        $getData = array('id' => $id, 'name' => $vn_name, 'status' => $status);
        $config['suffix'] = '?' . http_build_query($getData, '', "&amp;");
    
        $this->pagination->initialize($config);
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
    
        $input['limit'] = array($config['per_page'], $segment);
    
        $this->data['list_user'] = $this->users_m->get_list($input);
        $this->data['filter'] = $data;
    
        $this->data['title'] = 'Danh sách thành viên';
        $this->data['temp'] = 'admin/user';
        $this->load->view('admin/main', $this->data);
    }

    function check_username() {
        $username = $this->input->post('username');
        $where = array('username' => $username);
        //kiêm tra xem username đã tồn tại chưa
        if ($this->users_m->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
            return false;
        }
        return true;
    }

    public function add() {
        if(!empty($this->input->post())){
            $data = array();
            $data['status']     = $this->input->post('status');
            $data['tid']        = $this->input->post('tid');
            $data['email']      = $this->input->post('email');
            $data['address']    = $this->input->post('address');

            $this->data['filter'] =  $data;
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username|callback_check_rules');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập lại password', 'matches[password]');

            if($this->form_validation->run()){
             #Tạo folder upload theo ngày truoc khi upload
                $upload_path = 'uploads/images/user/';

                $upload_data = $this->system_library->upload($upload_path, 'image_link');

                $image_link = '';

                $cid = $this->input->post('cid', true);

                if ($upload_data != NULL) {
                    
                    $image_link = $upload_data;
                    $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '200_200/' . $image_link, 400, 400);
                    @unlink($upload_path . $image_link);
                    
                }
                
                $tid = $this->input->post('tid', true);
                $data = array(
                    'status' => $this->input->post('status', true),
                    'name' => $this->input->post('name', true),
                    'username' => $this->input->post('username', true),
                    'password' => md5($this->input->post('password', true)),
                    'sex' => $this->input->post('sex', true),
                    'tid' => $tid,
                    'point_doi' => $this->input->post('point_doi', true),
                    'image_link' => $image_link,
                    'email' => $this->input->post('email', true),
                    'phone' => $this->input->post('phone', true),
                    'address' => $this->input->post('address', true),
                    'birthday' => strtotime($this->input->post('birthday', true)),
                    'organization' => $this->input->post('organization', true),
                    'created' => now(),
                    'created_by' => $this->session->userdata('tid')
                );

                if($this->users_m->create($data)){
                    $this->session->set_flashdata('message', 'Tạo tài khoản thành công');
                }else{
                    $this->session->set_flashdata('message', 'Tạo tài khoản thất bại');
                }
                $tid = (int)$tid;
                if ($tid == 1) {
                    redirect(base_url() . 'admincp/admin/user');
                }else {
                    redirect(base_url() . 'admincp/admin');
                }                
            }
         }

        $this->data['title'] = 'Thêm tài khoản';
        $this->data['temp'] = 'admin/add';
        $this->load->view('admin/main', $this->data);
     }
     
     public function check_rules() {
         $username = $this->input->post('username');
         //validate username username is 8-20 characters long, no _ or . at the beginning, no __ or _. or ._ or .. inside, allowed characters, no _ or . at the end
         $pattern = '/^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/';
         if (!preg_match($pattern, $username, $matches)) {
             //trả về thông báo lỗi
             $this->form_validation->set_message(__FUNCTION__, 'Nicknam phải dài từ 8-20 ký tự gồm chuỗi a-zA-Z0-9 không chứa dấu, khoảng trắng, không bắt đầu bằng dấu _ hoặc ., bên trong không chứa dấu __ hoặc _. hoặc .., không kết thúc bằng _ hoặc .');
             return false;
         }
         return true;
     }

     
     public function edit_user() {
         $id = $this->uri->rsegment('3');
         $id = intval($id);
         
         $info = $this->users_m->get_info($id);
         
         if ($info->tid == 1) {
             $this->data['info_users'] = $info;
         }else {
             $this->session->set_flashdata('message', 'Tài khoản không tồn tại');
             redirect(base_url() . 'admincp/admin/user');
         }     
              
         if(!empty($this->input->post())){
             #Tạo folder upload theo ngày truoc khi upload
             $upload_path = 'uploads/images/user/';
             
             $upload_data = $this->system_library->upload($upload_path, 'image_link');
             
             $image_link = '';
             
             if ($upload_data != NULL && !isset($info->image_link)) {             
                 $image_link = $upload_data;
                 $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '200_200/' . $image_link, 400, 400);
                 @unlink($upload_path . $image_link);
             
             } elseif (
                 $upload_data != NULL && $info->image_link) {             
                 $image_link = $upload_data;
                 @unlink($upload_path . '200_200/' . $info->image_link);
                 $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '200_200/' . $image_link, 400, 400);
                 @unlink($upload_path . $image_link);
             
             } else {
                 $image_link = $info->image_link;
             }
             $password = $this->input->post('password', true);
             if ($password) {
                 $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
                 $this->form_validation->set_rules('re_password', 'Nhập lại password', 'matches[password]');
                 if($this->form_validation->run()){
                     $data = array(
                         'status' => $this->input->post('status', true),
                         'name' => $this->input->post('name', true),
                         'password' => md5($this->input->post('password', true)),
                         'sex' => $this->input->post('sex', true),
                         'tid' => $this->input->post('tid', true),
                         'point_doi' => $this->input->post('point_doi', true),
                         'image_link' => $image_link,
                         'email' => $this->input->post('email', true),
                         'phone' => $this->input->post('phone', true),
                         'address' => $this->input->post('address', true),
                         'birthday' => strtotime($this->input->post('birthday', true)),
                         'organization' => $this->input->post('organization', true),
                     );
                      
                     if($this->users_m->update($id, $data)){
                         $this->session->set_flashdata('message', 'Cập nhật tài khoản thành công');
                     }else{
                         $this->session->set_flashdata('message', 'Cập nhật tài khoản thất bại');
                     }
                     redirect(base_url() . 'admincp/admin/user');
                 }
             }else {
                 $data = array(
                     'status' => $this->input->post('status', true),
                     'name' => $this->input->post('name', true),
                     'sex' => $this->input->post('sex', true),
                     'tid' => $this->input->post('tid', true),
                     'point_doi' => $this->input->post('point_doi', true),
                     'image_link' => $image_link,
                     'email' => $this->input->post('email', true),
                     'phone' => $this->input->post('phone', true),
                     'address' => $this->input->post('address', true),
                     'birthday' => strtotime($this->input->post('birthday', true)),
                     'organization' => $this->input->post('organization', true),
                 );
                 if($this->users_m->update($id, $data)){
                     $this->session->set_flashdata('message', 'Cập nhật tài khoản thành công');
                 }else{
                     $this->session->set_flashdata('message', 'Cập nhật tài khoản thất bại');
                 }
                 redirect(base_url() . 'admincp/admin/user');
             }             
         }
     
         $this->data['title'] = 'Chỉnh sửa tài khoản';
         $this->data['temp'] = 'admin/edit_user';
         $this->load->view('admin/main', $this->data);
     }

    public function edit() {
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $this->data['info_users'] = $this->users_m->get_info($id);

        if(!empty($this->input->post())){
                $data = array(
                    'status' => $this->input->post('status', true),
                    'name' => $this->input->post('name', true),
                    'tid' => $this->input->post('tid', true),
                    'email' => $this->input->post('email', true),
                    'phone' => $this->input->post('phone', true),
                    'address' => $this->input->post('address', true),
                );

                if($this->users_m->update($id, $data)){
                    $this->session->set_flashdata('message', 'Cập nhật tài khoản thành công');
                }else{
                    $this->session->set_flashdata('message', 'Cập nhật tài khoản thất bại');
                }
                redirect(base_url() . 'admincp/admin');
            }

        $this->data['title'] = 'Chỉnh sửa tài khoản';
        $this->data['temp'] = 'admin/edit';
        $this->load->view('admin/main', $this->data);
    }

    public function change_password() {

        if ($this->input->post()) {

            $this->form_validation->set_rules('password', 'Mật khẩu cũ', 'required');
            $this->form_validation->set_rules('n_password', 'Mật khẩu mới', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu mới', 'matches[n_password]');

            if ($this->form_validation->run()) {
                $password = $this->input->post('password');
                $_check = $this->users_m->get_info($this->session->userdata('id'));
                if ($_check->password == md5($password)) {

                    $data = array(
                        'password' => md5($this->input->post('n_password', true))
                    );

                    if ($this->users_m->update($this->session->userdata('id'), $data)) {
                        //tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Đổi mật khẩu thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Đổi mật khẩu thất bại');
                    }
                    redirect(base_url() . 'admincp/admin/change_password');
                } else {
                    $this->session->set_flashdata('message', 'Nhập lại mật khẩu cũ không đúng');
                    redirect(base_url() . 'admincp/admin/change_password');
                }
            }
        }


        $this->data['title'] = 'Đổi mật khẩu';
        $this->data['temp'] = 'admin/change_password';
        $this->load->view('admin/main', $this->data);
    }

    public function del() {
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        //lay thong tin cua quan tri vien
        $info = $this->users_m->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Thông tin tài khoản không tồn tại');
            redirect(base_url('admincp/admin'));
        }
        //thuc hiện xóa
        $this->users_m->delete($id);

        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(base_url('admincp/admin'));
    }

    public function logout() {
        if ($this->session->userdata('isCheckLogin') == TRUE) {
            $username = array('id', 'tid', 'name', 'email', 'phone', 'address', 'isCheckLogin');
        }

        $this->session->unset_userdata($username);

        redirect(base_url('admincp/login'));
    }
    
    public function config() {
    
        $action = $this->input->post('key', true); //'del_all';
    
        $id = $this->input->post('id', true);
    
        $ids = $this->input->post('ids', true); //array(4, 5, 6);
    
        if ($ids) {
            $array_id = implode(',', $ids);
            $where_in = 'id in (' . $array_id . ')';
        }
    
        switch ($action) {
            case 'del':
                if ($this->users_m->update($id, array('status' => 3))) {
                    $msg = 'Xóa thành công danh mục';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 3));
                }
                break;
    
            case 'del_all':
                if ($this->users_m->update_rule($where_in, array('status' => 3))) {
                    $msg = 'Xóa thành công tất cả danh mục';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 3));
                }
                break;
            case 'enable':
                if ($this->users_m->update($id, array('status' => 1))) {
                    $msg = 'Hiển thị danh mục thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 1));
                }
                break;
            case 'enable_all':
    
                if ($this->users_m->update_rule($where_in, array('status' => 1))) {
                    $msg = 'Hiển thị danh mục thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 1));
                }
    
                break;
            case 'disable':
                    if ($this->users_m->update($id, array('status' => 2))) {
                        $msg = 'Ẩn thành công danh mục';
                        echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 2));
                    }
                break;
    
            case 'disable_all':
                if ($this->users_m->update_rule($where_in, array('status' => 2))) {
                    $msg = 'Ẩn thành công tất cả danh mục';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 2));
                }
                break;
        }
    }
    
    public function clean_trash() {

        $where['where'] = array(
            'status' => 3
        );
        $check_del = $this->users_m->get_list($where);

        if ($check_del) {

            if ($this->users_m->del_rule("status = 3")) {
                $this->session->set_flashdata('message', 'Dọn rác thành công');
            }
        } else {
            $this->session->set_flashdata('message', 'Không có gì trong thùng rác');
        }

        redirect(base_url('admincp/admin'));
    }
    
    public function position($type = '') {    
        $position = $this->input->post('position');    
        $id = $this->input->post('id');
    
        if ($this->input->post()) {
            $col = $type == 'don' ? 'point_don' : 'point_doi';
            if ($this->users_m->update($id, array($col => $position))) {
                $msg = 'Cập nhật điểm thành công';
                echo json_encode(array('msg' => $msg, 'success' => true));
            }
        }
    }

}
