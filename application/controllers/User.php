<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . "PHPMailer-master/src/PHPMailer.php";
include APPPATH . "PHPMailer-master/src/Exception.php";
include APPPATH . "PHPMailer-master/src/OAuth.php";
include APPPATH . "PHPMailer-master/src/POP3.php";
include APPPATH . "PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class User extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_m');
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
                $upload_path = 'uploads/images/user/200_200/';
                
                $upload_data = $this->system_library->upload($upload_path, 'image_link');
                
                $image_link = '';

                if ($upload_data != NULL && !isset($objUser->image_link)) {
                    $image_link = $upload_data;
                } elseif ($upload_data != NULL && $objUser->image_link) {
                    $image_link = $upload_data;
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
    
    public function registration() {
        $login = $this->session->userdata('isCheckLogin');
        if (!$login) {
            if (!empty($this->input->post())) {               
                $this->form_validation->set_rules('name', 'Họ tên', 'required|min_length[8]');
                $this->form_validation->set_rules('username', 'Tên đăng nhập', 'required|callback_check_username');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
                $this->form_validation->set_rules('re_password', 'Nhập lại password', 'matches[password]');
                $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_registration');
                
                $key_active = $this->system_library->rand_string(16);
                
                if($this->form_validation->run()){
                    $email = $this->input->post('email', true);
                    $data = array(
                        'status' => 4,
                        'name' => $this->input->post('name', true),
                        'username' => $this->input->post('username', true),
                        'password' => md5($this->input->post('password', true)),
                        'tid' => 1,
                        'sex' => 2,
                        'email' => $email,
                        'key_active' => $key_active,
                        'created' => now(),
                    );

                    if($this->users_m->create($data)){
                        $id_user = $this->db->insert_id();

                        $subject = 'Kích hoạt tài khoản';

                        $body = 'Bạn đã tạo tài khoản thành công vui lòng kích hoạt tài khoản tại  <a href="'.base_url('user/active_user?key_active=') .$key_active.'&id=' . $id_user .'">đây</a>';

                        $this->send_mail($email, $subject, $body);

                        $this->session->set_flashdata('message', 'Tài khoản của bạn đã được đăng ký thành công vui lòng kiểm tra mail để kích hoạt tài khoản');
                    }else{
                        $this->session->set_flashdata('message', 'Tạo tài khoản thất bại');
                    }
                    redirect(base_url() . 'user/message');

                }
            }
            
            $breadcrumb[] = array(
                'url' => "",
                'name' => 'Đăng ký tài khoản',
            );
            
            $this->data['breadcrumb'] = $breadcrumb;
            
            $this->data['title_site'] = 'Đăng ký tài khoản';
            $this->data['keyword_site'] = 'Đăng ký tài khoản';
            $this->data['description_site'] = 'Đăng ký tài khoản';
            $this->data['temp'] = 'user/registration';
            $this->one_col($this->data);
        }else {
            $this->session->set_flashdata('message', 'Bạn đã có tài khoản, không thể thực hiện thao tác này');
            redirect(base_url() . 'user/message');
        } 
    }
    
    public function active_user() {
        if ($_GET['key_active'] && $_GET['id'] > 0) {
            $where = array(
                'id' => $_GET['id']
            );
            
            $info = $this->users_m->get_info_rule($where);
            if ($info) {
                if ($info->key_active != '') {
                    if($info->key_active == $_GET['key_active']) {
                        $data = array(
                            'status' => 1,
                            'key_active' => '',
                        );
                        if($this->users_m->update($info->id, $data)){
                            $this->session->set_flashdata('message', 'Tạo tài khoản của bạn đã được kích hoạt thành công vui lòng đăng nhập để sử dụng');
                            redirect(base_url() . 'user/message');
                        }
                    }
                }else {
                    $this->session->set_flashdata('message', 'Tạo tài khoản của bạn đã được kích hoạt rồi vui lòng liên hệ với chúng tôi để được trợ giúp');
                    redirect(base_url() . 'user/message');
                }
            }else {
                $this->session->set_flashdata('message', 'Bạn chưa có tài khoản vui lòng đăng ký');
                redirect(base_url() . 'user/message');
            }
        }else {
            $this->session->set_flashdata('message', 'Bạn chưa có tài khoản vui lòng đăng ký');
            redirect(base_url() . 'user/message');
        }
    }
    
    public function forget_password() {
        $login = $this->session->userdata('isCheckLogin');
        if (!$login) {
            if ($this->input->post()) {           
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email');
                if ($this->form_validation->run()) {
                    $email = $this->input->post('email');                    
                    $code = rand(100000, 999999);                   
                    $subject = 'Code thay đổi password';                    
                    $body = 'Mã code để thay đổi password của bạn là: <b>' .$code. '</b>';
                    
                    $_SESSION['info_forget_password'] = array('code_forget_password' => $code, 'email_forget_password' => $email);     
                    $this->send_mail($email, $subject, $body); 
                    redirect(base_url() . 'user/code_password');
                }
            }
            
            $breadcrumb[] = array(
                'url' => "",
                'name' => 'Quên mật khẩu',
            );
            
            $this->data['breadcrumb'] = $breadcrumb;
            
            $this->data['title_site'] = 'Quên mật khẩu';
            $this->data['keyword_site'] = 'Quên mật khẩu';
            $this->data['description_site'] = 'Quên mật khẩu';
            $this->data['temp'] = 'user/forget_password';
            $this->one_col($this->data);
        }else {
            $this->session->set_flashdata('message', 'Bạn không thể hoàn thành thao tác này');
            redirect(base_url() . 'user/message');
        }
    }
    
    public function change_forget_password() {
        $login = $this->session->userdata('isCheckLogin');
        if (!$login) {
            if (isset($_SESSION['info_forget_password']['check_forget_password']) && $_SESSION['info_forget_password']['check_forget_password'] == TRUE) {
                if ($this->input->post()) {
                    $this->form_validation->set_rules('n_password', 'Password', 'required|min_length[6]');
                    $this->form_validation->set_rules('re_password', 'Nhập lại password', 'matches[n_password]');
                    if ($this->form_validation->run()) {
                        $where = array('email' => $_SESSION['info_forget_password']['email_forget_password']);
                        $data = array(
                            'password' => md5($this->input->post('n_password', true))
                        );
    
                        if ($this->users_m->update_rule($where, $data)) {
                            //tạo ra nội dung thông báo
                            $this->session->set_flashdata('message', 'Mật khẩu được đổi thành công vui lòng đăng nhập lại');
                        } else {
                            $this->session->set_flashdata('message', 'Đổi mật khẩu thất bại');
                        }
                        redirect(base_url() . 'user/message');
                    }
                }
    
                $breadcrumb[] = array(
                    'url' => "",
                    'name' => 'Nhập mã code',
                );
    
                $this->data['breadcrumb'] = $breadcrumb;
    
                $this->data['title_site'] = 'Nhập mã code';
                $this->data['keyword_site'] = 'Nhập mã code';
                $this->data['description_site'] = 'Nhập mã code';
                $this->data['temp'] = 'user/change_forget_password';
                $this->one_col($this->data);
            }
        }else {
            $this->session->set_flashdata('message', 'Bạn không thể hoàn thành thao tác này');
            redirect(base_url() . 'user/message');
        }
    }
    
    public function code_password() {
        $login = $this->session->userdata('isCheckLogin');
        if (!$login) {
            if (isset($_SESSION['info_forget_password'])) {
                if ($this->input->post()) {
                    $this->form_validation->set_rules('code_forget_password', 'Mã code', 'required|callback_check_code_password');
                
                    if ($this->form_validation->run()) {
                        $_SESSION['info_forget_password']['check_forget_password'] = TRUE;
                        redirect(base_url() . 'user/change_forget_password');
                    }
                }
                
                $breadcrumb[] = array(
                    'url' => "",
                    'name' => 'Nhập mã code',
                );
                
                $this->data['breadcrumb'] = $breadcrumb;
                
                $this->data['title_site'] = 'Nhập mật khẩu mới';
                $this->data['keyword_site'] = 'Nhập mật khẩu mới';
                $this->data['description_site'] = 'Nhập mật khẩu mới';
                $this->data['temp'] = 'user/code_password';
                $this->one_col($this->data);
            }
        }else {
            $this->session->set_flashdata('message', 'Bạn không thể hoàn thành thao tác này');
            redirect(base_url() . 'user/message');
        }
    }
    
    public function check_code_password() {
        if (isset($_SESSION['info_forget_password'])) {
            $code_forget_password = $this->input->post('code_forget_password');
            if ($code_forget_password != $_SESSION['info_forget_password']['code_forget_password']) {
                //trả về thông báo lỗi
                $this->form_validation->set_message(__FUNCTION__, 'Mã code của bạn chưa đúng');
                return false;
            }
            return true;
        }
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
                        'image_link' => $info->image_link,
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

    
    public function message() {
       $this->data['temp'] = 'user/message';
       $this->one_col($this->data);
    }
    
    public function send_mail($to, $subject, $body) {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'vuvanhao122995@gmail.com';                 // SMTP username
            $mail->Password = '@96689@@64';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
    
            //Recipients
            $mail->CharSet  = "utf-8";
            $mail->setFrom('no-reply-vuvanhao122995@gmail.com', 'No-reply');
            $mail->addAddress($to);     // Add a recipient
    
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = '';
    
            $mail->send();
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    
    function check_email_registration() {
        $email = $this->input->post('email');
        $where = array('email' => $email);
        //kiêm tra xem username đã tồn tại chưa
        if ($this->users_m->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email này đã đăng ký tài khoản');
            return false;
        }
        return true;
    }
    
    function check_email() {
        $email = $this->input->post('email');
        $where = array('email' => $email);
        $objUser = $this->users_m->get_info_rule($where);
        //kiêm tra xem username đã tồn tại chưa
        if (!$email) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email không được rỗng');
            return false;
        }
        if (!$objUser) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email của bạn chưa đăng ký tài khoản');
            return false;
        }else {
            if ($objUser->status > 1){
                $this->form_validation->set_message(__FUNCTION__, 'Tài khoản của bạn hiện đang tạm khóa vui lòng liên hệ để được hỗ trợ');
                return false;
            }
        }
        return true;
    }

}
