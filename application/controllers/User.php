<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_m');
        $this->lang->load('admin/admin');
    }

    public function index() {
        $login = $this->session->userdata('isCheckLogin');
        if ($login) {
            $id = $this->session->userdata('id');
            $where = array('id' => $id); 
            $objUser = $this->users_m->get_info_rule($where);
            $this->data['objUser'] = $objUser;
            if(!empty($this->input->post())){
                #Tạo folder upload theo ngày truoc khi upload
                $upload_path = 'uploads/images/user/';
                
                $upload_data = $this->system_library->upload($upload_path, 'image_link');
                
                $image_link = '';
                
                //Xử lý hình ảnh của sản phẩm và sản phẩm kèm theo
                if ($upload_data != NULL && !isset($objUser->image_link)) {
                    $image_link = $upload_data;
                    $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '200_200/' . $image_link, 300, 300);
                    @unlink($upload_path . $image_link);
                } elseif ($upload_data != NULL && $objUser->image_link) {
                    $image_link = $upload_data;
                    @unlink($upload_path . '200_200/' . $objUser->image_link);
                    $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '200_200/' . $image_link, 300, 300);
                    @unlink($upload_path . $image_link);
                } else {
                    $image_link = $objUser->image_link;
                }
                
                $data = array(
                    'name' => $this->input->post('name', true),
                    'email' => $this->input->post('email', true),
                    'phone' => $this->input->post('phone', true),
                    'address' => $this->input->post('address', true),
                    'birthday' => strtotime($this->input->post('birthday', true)),
                    'organization' => $this->input->post('organization', true),
                    'sex' => $this->input->post('sex', true),
                    'about' => $this->input->post('about', true),
                    'image_link' => $image_link,
                );
        
                if($this->users_m->update($objUser->id, $data)){
                    $this->session->set_flashdata('message', 'Cập nhật tài khoản thành công');
                }else{
                    $this->session->set_flashdata('message', 'Cập nhật tài khoản thất bại');
                }
                redirect(base_url('user/thong-tin-ca-nhan.html'));
            }
        }else {
            $this->session->set_flashdata('message', '<p>Bạn chưa chưa có tài khoản. Vui lòng đăng ký tại <a>đây</a></p>');
            redirect(base_url() . 'user/message');
        }

        $breadcrumb[] = array(
            'url' => "",
            'name' => 'Thông tin cá nhân',
        );
        
        $this->data['breadcrumb'] = $breadcrumb;
        
        $this->data['title_site'] = 'Thông tin cá nhân';
        $this->data['keyword_site'] = 'Thông tin cá nhân';
        $this->data['description_site'] = 'Thông tin cá nhân';
        $this->data['temp'] = 'user/index';
        $this->one_col($this->data);
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
            
            $this->form_validation->set_rules('name', 'Họ tên', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập lại password', 'matches[password]');
            $this->form_validation->set_rules('phone', 'Điện thoại', 'numeric');

            if($this->form_validation->run()){
                $data = array(
                    'status' => $this->input->post('status', true),
                    'name' => $this->input->post('name', true),
                    'username' => $this->input->post('username', true),
                    'password' => md5($this->input->post('password', true)),
                    'tid' => $this->input->post('tid', true),
                    'email' => $this->input->post('email', true),
                    'phone' => $this->input->post('phone', true),
                    'address' => $this->input->post('address', true),
                    'created' => now(),
                );

                if($this->users_m->create($data)){
                    $this->session->set_flashdata('message', 'Tạo tài khoản thành công');
                }else{
                    $this->session->set_flashdata('message', 'Tạo tài khoản thất bại');
                }
                redirect(base_url() . 'admincp/admin');
            }
         }

        $this->data['title'] = 'Thêm tài khoản';
        $this->data['temp'] = 'admin/add';
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
        $login = $this->session->userdata('isCheckLogin');
        if ($login) {            
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
                            $this->session->set_flashdata('message', 'Đổi mật khẩu thành công vui lòng đăng nhập lại');
                        } else {
                            $this->session->set_flashdata('message', 'Đổi mật khẩu thất bại');
                        }
                        $username = array('id', 'tid', 'name', 'email', 'phone', 'address', 'isCheckLogin');
                        $this->session->unset_userdata($username);
                        redirect(base_url() . 'user/message');
                    } else {
                        $this->session->set_flashdata('message', 'Nhập lại mật khẩu cũ không đúng');
                        redirect(base_url() . 'user/doi-mat-khau.html');
                    }
                }
            }
        }else {
            $this->session->set_flashdata('message', '<p>Bạn chưa chưa có tài khoản. Vui lòng đăng ký tại <a>đây</a></p>');
            redirect(base_url() . 'user/message');
        }

        $breadcrumb[] = array(
            'url' => "",
            'name' => 'Đổi mật khẩu',
        );
        
        $this->data['breadcrumb'] = $breadcrumb;
        
        $this->data['title_site'] = 'Đổi mật khẩu';
        $this->data['keyword_site'] = 'Đổi mật khẩu';
        $this->data['description_site'] = 'Đổi mật khẩu';
        $this->data['temp'] = 'user/change_password';
        $this->one_col($this->data);
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
    
    public function login() {
       if ($this->input->post()) {
           $data = array();
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['username'] = form_error('username');
                $data['password'] = form_error('password');
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $password = md5($password);

                $this->load->model('users_m');
                $where = array(
                    'tid >=' => 1,
                    'username' => $username,
                    'password' => $password,
                    'status' => 1
                );

                $info = $this->users_m->get_info_rule($where);

                if ($info) {
                    $username = array(
                        'id' => $info->id,
                        'tid' => $info->tid,
                        'name' => $info->name,
                        'email' => $info->email,
                        'phone' => $info->phone,
                        'address' => $info->address,
                        'isCheckLogin' => TRUE,
                    );
                    $this->session->set_userdata($username);
                    $data['success'] = 1;
                } else {
                    $data['success'] = 0;
                }
            }
            echo json_encode($data);
        }
    }

    public function logout() {
        if ($this->session->userdata('isCheckLogin') == TRUE) {
            $username = array('id', 'tid', 'name', 'email', 'phone', 'address', 'isCheckLogin');
        }

        $this->session->unset_userdata($username);

        redirect(base_url());
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
    
    public function position() {    
        $position = $this->input->post('position');
    
        $id = $this->input->post('id');
    
        if ($this->input->post()) {
            if ($this->users_m->update($id, array('point' => $position))) {
                $msg = 'Cập nhật điểm thành công';
                echo json_encode(array('msg' => $msg, 'success' => true));
            }
        }
    }
    
    public function message() {
       $this->data['temp'] = 'user/message';
       $this->one_col($this->data);
    }

}
