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

    // public function add() {
       //  if(!empty($this->input->post())){
            // $data = array();
            // $data['status']     = $this->input->post('status');
            // $data['tid']        = $this->input->post('tid');
            // $data['email']      = $this->input->post('email');
            // $data['address']    = $this->input->post('address');

    //         $this->data['filter'] =  $data;
            
    //         $this->form_validation->set_rules('name', 'Họ tên', 'required|min_length[8]');
    //         $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username');
    //         $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    //         $this->form_validation->set_rules('re_password', 'Nhập lại password', 'matches[password]');
    //         $this->form_validation->set_rules('phone', 'Điện thoại', 'numeric');

    //         if($this->form_validation->run()){
    //             $data = array(
    //                 'status' => $this->input->post('status', true),
    //                 'name' => $this->input->post('name', true),
    //                 'username' => $this->input->post('username', true),
    //                 'password' => md5($this->input->post('password', true)),
    //                 'tid' => $this->input->post('tid', true),
    //                 'email' => $this->input->post('email', true),
    //                 'phone' => $this->input->post('phone', true),
    //                 'address' => $this->input->post('address', true),
    //                 'created' => now(),
    //             );

    //             if($this->users_m->create($data)){
    //                 $this->session->set_flashdata('message', 'Tạo tài khoản thành công');
    //             }else{
    //                 $this->session->set_flashdata('message', 'Tạo tài khoản thất bại');
    //             }
    //             redirect(base_url() . 'admincp/admin');
    //         }
         }

        // $this->data['title'] = 'Thêm tài khoản';
        // $this->data['temp'] = 'admin/add';
        // $this->load->view('admin/main', $this->data);
     //}

    // public function edit() {
    //     $id = $this->uri->rsegment('3');
    //     $id = intval($id);

    //     $this->data['info_users'] = $this->users_m->get_info($id);

    //     if(!empty($this->input->post())){
    //             $data = array(
    //                 'status' => $this->input->post('status', true),
    //                 'name' => $this->input->post('name', true),
    //                 'tid' => $this->input->post('tid', true),
    //                 'email' => $this->input->post('email', true),
    //                 'phone' => $this->input->post('phone', true),
    //                 'address' => $this->input->post('address', true),
    //             );

    //             if($this->users_m->update($id, $data)){
    //                 $this->session->set_flashdata('message', 'Cập nhật tài khoản thành công');
    //             }else{
    //                 $this->session->set_flashdata('message', 'Cập nhật tài khoản thất bại');
    //             }
    //             redirect(base_url() . 'admincp/admin');
    //         }

    //     $this->data['title'] = 'Chỉnh sửa tài khoản';
    //     $this->data['temp'] = 'admin/edit';
    //     $this->load->view('admin/main', $this->data);
    // }

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

}
