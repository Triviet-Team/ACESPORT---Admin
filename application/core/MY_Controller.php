<?php

Class MY_Controller extends CI_Controller {

    //bien gui du lieu sang ben view
    public $data = array();

    function __construct() {
        //ke thua tu CI_Controller
        parent::__construct();

        $controller = $this->uri->segment(1);
        switch ($controller) {
            case 'admincp' : {
                    $this->data['tour'] = $this->uri->segment(2);
                    $this->_check_login();
                    break;
                }
            default: {

                    $this->load->model('configs_m');

                    $where = array('key' => 'general');

                    $config = $this->configs_m->get_info_rule($where);

                    $config = json_decode($config->values);

                    $this->data['config'] = $config;
                    
                    // logo top
                    $this->load->model('ads_m');
                    $input = array();
                    $input['where'] = array('status' => 1, 'cid' => 6);
                    $this->data['logo_top'] = $this->ads_m->get_row($input);
                    

                    //danh muc sản phẩm
                    $this->load->model('product_category_m');
                    $input =  array();
                    $input['where'] = array('status' => 1, 'pid' => 0);
                    $input['order'] = array('position', 'DESC');
                    
                    $categorys      = $this->product_category_m->get_list($input);
                    
                    foreach ($categorys as $row){
                        $input =  array();
                        $input['where'] = array('status' => 1, 'pid' => $row->id);
                        $input['order'] = array('position', 'DESC');
                        $row->categorys       = $this->product_category_m->get_list($input);
                    }
                    
                    $this->data['categorys'] = $categorys;

                    #Meta head
                    $this->data['title_page'] = $config->vn_title_site;

                    $this->data['keyword_page'] = $config->vn_keyword_site;

                    $this->data['description_page'] = $config->vn_description_site;

                    $this->data['url'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

                    $this->data['img_page'] = base_url('public/site/images/bannerfacebook.jpg');

                    $this->user_online();
                }
        }
    }

    public function one_col($data) {
        
        $this->load->model('tournament_m');
        //load giải đấu sidebar
        $objTournamentSidebar = array();
        $input = array();
        $input['where'] = array('start_date >' => now(), 'status' => 1);
        $input['limit'] = array(6 ,0);
        $objTournamentSidebar['gd_sap_dien_ra'] = $this->tournament_m->get_list($input);
        
        $input = array();
        $input['where'] = array('start_date <=' => now(), 'end_date >=' => now(), 'status' => 1);
        $input['limit'] = array(6 ,0);
        $objTournamentSidebar['gd_dang_dien_ra'] = $this->tournament_m->get_list($input);
        
        $data['objTournamentSidebar'] = $objTournamentSidebar;     
       
        $this->load->view('site/layout', $data);
    }

    /*
     * Kiem tra trang thai dang nhap cua admin
     */

    private function _check_login() {        
        $controller = $this->uri->rsegment('1');
        $module = $this->uri->segment(1);
        $controller = strtolower($controller);

        $login = $this->session->userdata('isCheckLogin');
        $tid = $this->session->userdata('tid');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if (!$login && $controller != 'login') {
            redirect(base_url('admincp/login'));
        }
        //neu user co tinh vào trang quan trị sẽ không được
        if ($login && $module == 'admincp' && $tid < 2) {
            $this->session->set_flashdata('message', 'Bạn không có quyền truy cập vào nội dung này');
            redirect(base_url('user/message'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if ($login && $controller == 'login' && $tid >= 2) {
            redirect(base_url('admincp/home'));
        }
    }

    public function user_online() {
        $session_id = session_id();

        $time = time();

        $timeRefresh = 15 * 60;

        $timeNew = $time - $timeRefresh;

        $local = $_SERVER['PHP_SELF'];

        $this->load->model('useronline_m');
        $this->load->model('counters_m');
        $this->counters_m->resetCounter();
        $check = $this->useronline_m->checkExits($session_id);
        if ($check == 1) {
            $this->useronline_m->updateTime($time, $local, $session_id);
        } else {

            $datas = array('session_id' => $session_id,
                'time' => $time,
                'local' => $local);

            $this->useronline_m->addDatas($datas);
        }
        $this->useronline_m->clear($timeNew);
        $this->counters_m->update();
        $counters = $this->counters_m->getCounter();
        $this->data['counters'] = $counters;
        $this->data['userOnline'] = $this->useronline_m->getOnline();
    }

}




























