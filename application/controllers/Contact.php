<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

    public function index() {

        $this->load->model('contact_m');

        if ($this->input->post()) {

            $this->form_validation->set_rules('name', 'Họ tên', 'required');

            $this->form_validation->set_rules('email', 'Email', 'required');

            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required');

            $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
            
            $this->form_validation->set_rules('content', 'Nội dung', 'required');

//            $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required|callback_validate_captcha');

            if ($this->form_validation->run()) {

                $email = $this->input->post('email', true);

                $data = array(
                    'name' => $this->input->post('name', true),
                    'email' => $email,
                    'phone' => $this->input->post('phone', true),
//                    'address' => $this->input->post('address', true),
                    'title' => $this->input->post('title', true),
                    'content' => $this->input->post('content', true),
                    'status' => 2,
                    'created' => now()
                );

                if ($this->contact_m->create($data)) {
                    $this->session->set_flashdata('message', 'Cảm ơn bạn đã gửi liên hệ đến công ty của chúng tối!');
                    redirect(base_url('lien-he.html'));
                }
            }else {
                $this->session->set_flashdata('message', 'Quý khách vui lòng nhập đầy đủ thông tin.');
            }
        }

        $breadcrumb[] = array(
            'url' => '#',
            'name' => 'Liên hệ',
        );

        $this->data['breadcrumb'] = $breadcrumb;

        $this->data['title_site'] = 'Liên hệ';

        $this->data['temp'] = 'contact/index';
        $this->one_col($this->data);
    }

    function validate_captcha() {
        $google_captcha = $this->input->post('g-recaptcha-response');
        $google_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc6VmQUAAAAAFrlV3cOK6zw6CCX1bpOjQTh2MUA&response=" . $google_captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($google_response . 'success' == false) {
            $this->form_validation->set_message(__FUNCTION__, 'Please check the the captcha form');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
