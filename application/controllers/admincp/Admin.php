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
                    'birthday' => strtotime($this->input->post('birthday', true)),
                    'organization' => $this->input->post('organization', true),
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

}
