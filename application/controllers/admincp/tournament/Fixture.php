<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fixture extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('users_m');
        $this->load->model('tournament_m');
        $this->load->model('tournament_category_m', 'category');
        $this->load->model('tournament_playing_category_m');
        $this->load->model('playing_category_m');
        $this->load->model('fixture_m');
        $this->load->model('registration_player_m');
    }
    // hàm xử lý ajax thống kê cặp đấu
    public function ajaxTotal() {
        if ($_POST) {
            $type = $_POST['type'];
            $total = null;
            if ($type == 'get-total') {
                //kiem tra co thuc hien loc du lieu hay khong
                $filter = array();
                $tournament_type = $this->input->post('tournament_type');
                $tournament_type = intval($tournament_type);
                if ($tournament_type > 0) {
                    $this->data['tournament_type'] = $tournament_type;
                    $filter[] = array('name' => '`tournament_type`.`id`', 'val' => $tournament_type);
                }
                
                $tournament = $this->input->post('tournament');
                $tournament = intval($tournament);
                if ($tournament > 0) {
                    $this->data['tournament'] = $tournament;
                    $filter[] = array('name' => '`tournament`.`id`', 'val' => $tournament);
                }
                
                $noi_dung = $this->input->post('noi_dung');
                $noi_dung = intval($noi_dung);
                if ($noi_dung > 0) {
                    $this->data['noi_dung'] = $noi_dung;
                    $filter[] = array('name' => '`tournament_playing_category`.`id`', 'val' => $noi_dung);
                    $info = $this->tournament_playing_category_m->get_info($noi_dung);
                    $total_member = $info->total_member;
                    $type_play = $info->type_play;
                    $cap_dau = ($total_member/(2*$type_play)); 
                } 
                $this->data['round'] = 1;
                $filter[] = array('name' => '`fixture`.`round`', 'val' => 1);
                $total['curent'] = $this->fixture_m->countTotal($filter);
                $total['conlai'] = $cap_dau - $total['curent'];
                echo json_encode($total);
            }
        }
    }
    
    public function getInfoUsers() {
        $data = $this->users_m->get_list();
        $result = null;
        
        foreach ($data as $row) {
            $result['result'][] = array('id' => intval($row->id), 'text' => $row->username);
        }
        
        echo json_encode($result);
    }
    
    public function getInfo() {
        $result = null;
        if ($_POST) {
            $type = $_POST['type'];
            if ($type == 'tournament_type'){
               $val = $_POST['tournament_type'];
               $input = array();
               $input['where'] = array('pid' => $val);
               $result = $this->tournament_m->get_list($input);  
            }
            
            if ($type == 'tournament'){
                $val = $_POST['tournament'];
                $result = $this->fixture_m->getInfoTable($val);
            }
            
            if ($type == 'noi_dung'){
                $val = $_POST['noi_dung'];
                $active = $_POST['active'];
                $info = $this->tournament_playing_category_m->get_info($val);
                $total_member = $info->total_member;
                $type_play = $info->type_play;
                $cap_dau = ($total_member/(2*$type_play));
                $n = $this->fixture_m->getMu($cap_dau) + 1;
                $str = '<option value="0">Chọn vòng đấu</option>';
                for ($i = $n; $i >= 1; $i--) {
                    if ($i == $active) {
                        $selected = 'selected';
                    }else {
                        $selected = '';
                    }
                    if ($i == 1) {
                        $str .= '<option '.$selected.' value="'. $i .'">Vòng chung kết</option>';
                    }elseif ($i == 2) {
                        $str .= '<option '.$selected.' value="'. $i .'">Vòng bán kết</option>';
                    }elseif ($i == 3) {
                        $str .= '<option '.$selected.' value="'. $i .'">Vòng tứ kết</option>';
                    }else {
                        $str .= '<option '.$selected.' value="'. $i .'">Vòng 1/'. (pow(2, $i)/2).'</option>';
                    }
                }
                $result['type'] = $type_play;
                $result['content'] = $str;
                echo json_encode($result);die();
            }
        }        
        if ($result) { 
            echo json_encode($result);
        }else {
            echo 0;
        }
    }

    public function index() {

        //kiem tra co thuc hien loc du lieu hay khong
        $filter = array();
        $tournament_type = $this->input->get('tournament_type');
        $tournament_type = intval($tournament_type);
        if ($tournament_type > 0) {
            $this->data['tournament_type'] = $tournament_type;
            $filter[] = array('name' => '`tournament_type`.`id`', 'val' => $tournament_type);
        }
        
        $tournament = $this->input->get('tournament');
        $tournament = intval($tournament);
        if ($tournament > 0) {
             $this->data['tournament'] = $tournament;
             $filter[] = array('name' => '`tournament`.`id`', 'val' => $tournament);
        }

        $noi_dung = $this->input->get('noi_dung');
        $noi_dung = intval($noi_dung);
        if ($noi_dung > 0) {
            $this->data['noi_dung'] = $noi_dung;
            $filter[] = array('name' => '`tournament_playing_category`.`id`', 'val' => $noi_dung);
        }
        $round = $this->input->get('round');
        $round = intval($round);
        if ($round > 0) {
            $this->data['round'] = $round;
            $filter[] = array('name' => '`fixture`.`round`', 'val' => $round);
        }

       

        //$total_rows = $this->fixture_m->get_total($input);

        //$this->data['total_rows'] = $total_rows;

        $getData = array('id' => $id, 'vn_name' => $vn_name, 'cid' => $cid);

        //load ra thu vien phan trang
        $config = array();
        $config['total_rows'] = $total_rows; //tong tat ca cac san pham tren website
        $config['base_url'] = base_url('admincp/tournament/fixture');
        $config['suffix'] = '?' . http_build_query($getData, '', "&amp;");
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($getData, '', "&amp;");
        $config['per_page'] = 5; //so luong san pham hien thi tren 1 trang
        $config['num_links'] = 2;

        $config = array_merge($config, $this->system_library->pagination());

        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(3);
        $segment = intval($segment);

        //$input['limit'] = array($config['per_page'], $segment);
        
        $list = $this->fixture_m->getList($filter);
        
        foreach ($list as $row) {
             $row->doi_1 = $this->fixture_m->getPlayer($row->code_doi_1);
             $row->doi_2 = $this->fixture_m->getPlayer($row->code_doi_2);
        }
        
//         echo '<pre>';
//         print_r($list);
//         echo '<pre>';die();
        
        
        $this->data['list'] = $list;

        $input = array();
        $input['where'] = array('pid' => 0, 'status' => 1);
        $catalogs = $this->category->get_list($input);

        foreach ($catalogs as $row) {
            $input['where'] = array('pid' => $row->id, 'status' => 1);
            $subs = $this->category->get_list($input);
            $row->subs = $subs;
        }
       
        $this->data['catalogs'] = $catalogs;

        $this->data['title'] = 'Danh sách cặp đấu';

        $this->data['temp'] = 'tournament/fixture/index';
        $this->load->view('admin/main', $this->data);
    }

    public function detail($id = 0) {
        $this->load->model('tournament_type_m');
        $this->load->model('registration_m');
        $this->load->model('playing_in_m');
        
        $input = array();
        $input['where'] = array('status' => 1);
        $this->data['noi_dung'] = $this->playing_category_m->get_list($input);       
        
        $input = array();
        $input['where'] = array('pid' => 0, 'status' => 1);
        
        $input['order'][0] = 'position';
        $input['order'][1] = 'ASC';
        
        $catalogs = $this->tournament_type_m->get_list($input);

//         foreach ($catalogs as $row) {
//             $input['where'] = array('pid' => $row->id, 'status' => 1);
//             $subs = $this->tournament_m->get_list($input);
//             $row->subs = $subs;
//         }
        $this->data['catalogs'] = $catalogs;
        if($id){
            $info = $this->fixture_m->get_info($id);
            if(!empty($info)){
                $this->data['info'] = $info;
            }else{
                $this->session->set_flashdata('message', 'Dịch vụ muốn chỉnh sửa không tồn tại');
                redirect(base_url() . 'admincp/tournament/fixture/index/');
            }
        }
        
        // mảng cid của product
        $input          = array();
        $input['where'] = array('tournament_id' => $id);
        $arrPid         = $this->tournament_playing_category_m->get_list($input);
        $this->data['arrPid'] = $arrPid;

        if ($this->input->post()) {

             $this->form_validation->set_rules('tournament', 'Tên sản phẩm', 'required');

//             $this->form_validation->set_rules('start_date', 'Ngày bắt đầu', 'required');
            
//             $this->form_validation->set_rules('end_date', 'Ngày bắt kết thúc', 'required');

            if ($this->form_validation->run()) {
                
//                 echo '<pre>';
//                 print_r($_POST);
//                 echo '<pre>';die();
                
                $noi_dung = $this->input->post('noi_dung', true);
                $arrPlayer = $this->input->post('doi_choi[]', true);
                
                $n = count($arrPlayer)/2;
                $ids_registration = array();
                $k = 0;
                for ($i = 1; $i <= 2; $i++) {
                    $registration = array(
                        'date' => date('Y-m-d h:m:s', now()),
                    );
                    if ($this->registration_m->create($registration)) {
                        $id = $this->db->insert_id();
                        $ids_registration[] = $id;
                        $playing_in = array(
                            'registration_id' => $id,
                            'tournament_playing_category_id' => $noi_dung
                        );
                        $this->playing_in_m->create($playing_in);
                        if ($n == 1) {
                            $registration_player = array(
                                'registration_id' => $id,
                                'player_id' => $arrPlayer[$i - 1]
                            );
                            $this->registration_player_m->create($registration_player);
                        }
                        
                        if ($n == 2) {
                            for ($j = 1; $j <= 2; $j++) {
                                $registration_player = array(
                                    'registration_id' => $id,
                                    'player_id' => $arrPlayer[$k]
                                );
                                $this->registration_player_m->create($registration_player);
                                $k++;
                            }
                        }
                    }
                }

                if ($ids_registration) {
                    $fixture = array(
                        'tournament_playing_category_id' => $noi_dung,
                        'first_registration_id' => $ids_registration[0],
                        'second_registration_id' => $ids_registration[1],
                        'round' => 1
                    );
                    $this->fixture_m->create($fixture);
                }
                


                

//                 if (!$id) {
//                     if ($this->fixture_m->create($data)) {

//                         $tournament_id = $this->db->insert_id();
//                         if ($noi_dung && $tournament_id) {
//                             foreach ($noi_dung as $key => $val) {
//                                 $item = array(  
//                                     'tournament_id' => $tournament_id,
//                                     'playing_category_id' => $val,
//                                     'total_member' => $total_member[$key],
//                                     'type_play' => $loai_choi[$key] ? 2 : 1
//                                 );

//                                 $this->tournament_playing_category_m->create($item);
//                             }
//                         }

//                         $this->session->set_flashdata('message', 'Thêm dự án thành công');
//                     } else {
//                         $this->session->set_flashdata('message', 'Thêm dự án thất bại');
//                     }
//                 } else {
//                     if ($this->tournament_m->update($id, $data)) {
//                         if ($this->tournament_playing_category_m->del_rule("tournament_id = " . $id)) {
//                             if ($noi_dung) {
//                                  foreach ($noi_dung as $key => $val) {
//                                     $item = array(  
//                                         'tournament_id' => $id,
//                                         'playing_category_id' => $val,
//                                         'total_member' => $total_member[$key],
//                                         'type_play' => $loai_choi[$key] ? 2 : 1
//                                     );
    
//                                     $this->tournament_playing_category_m->create($item);
//                                 }
//                             }
//                         }
//                         $this->session->set_flashdata('message', 'Cập nhật dự án thành công');
//                     } else {
//                         $this->session->set_flashdata('message', 'Cập nhật dự án thất bại');
//                     }
//                 }

                if ($pid) {
                    redirect(base_url('admincp/tournament/fixture?id=&vn_name=&cid=' . $cid));
                } else {
                    redirect(base_url() . 'admincp/tournament/fixture/index/');
                }
            }
        }

        if($id){
            $this->data['title'] = 'Chỉnh sản phẩm';
        }else{
            $this->data['title'] = 'Thêm cặp đấu mới';
        }

        $this->data['temp'] = 'tournament/fixture/detail';
        $this->load->view('admin/main', $this->data);
    }
    
    public function update($id = 0) {
        $this->load->model('tournament_type_m');
        $this->load->model('registration_m');
        $this->load->model('playing_in_m');    
        
        $filter[] = array('name' => '`fixture`.`id`', 'val' => $id);
        
        $infoPlayer = $this->fixture_m->getUpdate($filter);
        
        foreach ($infoPlayer as $row) {
            $row->doi_1 = $this->fixture_m->getPlayer($row->code_doi_1);
            $row->doi_2 = $this->fixture_m->getPlayer($row->code_doi_2);
        }
        $this->data['infoPlayer'] = $infoPlayer[0];
//         echo '<pre>';
//         print_r($this->data['infoPlayer'] );
//         echo '<pre>';die();
    
        //         foreach ($catalogs as $row) {
        //             $input['where'] = array('pid' => $row->id, 'status' => 1);
        //             $subs = $this->tournament_m->get_list($input);
        //             $row->subs = $subs;
        //         }
//         $this->data['catalogs'] = $catalogs;
//         if($id){
//             $info = $this->fixture_m->get_info($id);
//             if(!empty($info)){
//                 $this->data['info'] = $info;
//             }else{
//                 $this->session->set_flashdata('message', 'Dịch vụ muốn chỉnh sửa không tồn tại');
//                 redirect(base_url() . 'admincp/tournament/fixture/index/');
//             }
//         }
    
        if ($this->input->post()) {
            
            echo '<pre>';
            print_r($_POST);
            echo '<pre>';die();
    
                //                 echo '<pre>';
                //                 print_r($_POST);
                //                 echo '<pre>';die();
    
                $noi_dung = $this->input->post('noi_dung', true);
                $arrPlayer = $this->input->post('doi_choi[]', true);
    
                $n = count($arrPlayer)/2;
                $ids_registration = array();
                $k = 0;
                for ($i = 1; $i <= 2; $i++) {
                    $registration = array(
                        'date' => date('Y-m-d h:m:s', now()),
                    );
                    if ($this->registration_m->create($registration)) {
                        $id = $this->db->insert_id();
                        $ids_registration[] = $id;
                        $playing_in = array(
                            'registration_id' => $id,
                            'tournament_playing_category_id' => $noi_dung
                        );
                        $this->playing_in_m->create($playing_in);
                        if ($n == 1) {
                            $registration_player = array(
                                'registration_id' => $id,
                                'player_id' => $arrPlayer[$i - 1]
                            );
                            $this->registration_player_m->create($registration_player);
                        }
    
                        if ($n == 2) {
                            for ($j = 1; $j <= 2; $j++) {
                                $registration_player = array(
                                    'registration_id' => $id,
                                    'player_id' => $arrPlayer[$k]
                                );
                                $this->registration_player_m->create($registration_player);
                                $k++;
                            }
                        }
                    }
                }
    
                if ($ids_registration) {
                    $fixture = array(
                        'tournament_playing_category_id' => $noi_dung,
                        'first_registration_id' => $ids_registration[0],
                        'second_registration_id' => $ids_registration[1],
                        'round' => 1
                    );
                    $this->fixture_m->create($fixture);
                }
    
    
    
    
    
                //                 if (!$id) {
                //                     if ($this->fixture_m->create($data)) {
    
                //                         $tournament_id = $this->db->insert_id();
                //                         if ($noi_dung && $tournament_id) {
                //                             foreach ($noi_dung as $key => $val) {
                //                                 $item = array(
                //                                     'tournament_id' => $tournament_id,
                //                                     'playing_category_id' => $val,
                //                                     'total_member' => $total_member[$key],
                //                                     'type_play' => $loai_choi[$key] ? 2 : 1
                //                                 );
    
                //                                 $this->tournament_playing_category_m->create($item);
                //                             }
                //                         }
    
                //                         $this->session->set_flashdata('message', 'Thêm dự án thành công');
                //                     } else {
                //                         $this->session->set_flashdata('message', 'Thêm dự án thất bại');
                //                     }
                //                 } else {
                //                     if ($this->tournament_m->update($id, $data)) {
                //                         if ($this->tournament_playing_category_m->del_rule("tournament_id = " . $id)) {
                //                             if ($noi_dung) {
                //                                  foreach ($noi_dung as $key => $val) {
                //                                     $item = array(
                //                                         'tournament_id' => $id,
                //                                         'playing_category_id' => $val,
                //                                         'total_member' => $total_member[$key],
                //                                         'type_play' => $loai_choi[$key] ? 2 : 1
                //                                     );
    
                //                                     $this->tournament_playing_category_m->create($item);
                //                                 }
                //                             }
                //                         }
                //                         $this->session->set_flashdata('message', 'Cập nhật dự án thành công');
                //                     } else {
                //                         $this->session->set_flashdata('message', 'Cập nhật dự án thất bại');
                //                     }
                //                 }
    
                if ($pid) {
                    redirect(base_url('admincp/tournament/fixture?id=&vn_name=&cid=' . $cid));
                } else {
                    redirect(base_url() . 'admincp/tournament/fixture/index/');
                }
        }
    
        if($id){
            $this->data['title'] = 'Cập nhật tỉ số trận đấu';
        }else{
            $this->data['title'] = 'Cập nhật tỉ số trận đấu';
        }
    
        $this->data['temp'] = 'tournament/fixture/update';
        $this->load->view('admin/main', $this->data);
    }

    public function config() {

        $action = $this->input->post('key', true); //'del_all';

        $id = $this->input->post('id', true);

        $ids = $this->input->post('ids', true); //array(4, 5, 6);

        if ($ids) {
            $array_id = implode(',', $ids);

            $input = 'id IN (' . $array_id . ')';
        }

        switch ($action) {
            case 'del':
                if ($this->fixture_m->update($id, array('status' => 3))) {
                    $msg = 'Xóa sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 3));
                }
                break;

            case 'del_all':

                if ($this->fixture_m->update_rule($input, array('status' => 3))) {

                    $msg = 'Xóa thành công tất cả các sản phẩm có id (' . $array_id . ')';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 3));
                }

                break;
            case 'enable':
                if ($this->fixture_m->update($id, array('status' => 1))) {
                    $msg = 'Hiển thị sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 1));
                }

                break;
            case 'enable_all':

                if ($this->fixture_m->update_rule($input, array('status' => 1))) {

                    $msg = 'Hiển thị thành công tất cả các sản phẩm có id (' . $array_id . ')';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 1));
                }

                break;
            case 'disable':

                if ($this->fixture_m->update($id, array('status' => 2))) {
                    $msg = 'Ẩn sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 2));
                }

                break;

            case 'disable_all':

                if ($this->fixture_m->update_rule($input, array('status' => 2))) {

                    $msg = 'Ẩn thành công tất cả các sản phẩm có id (' . $array_id . ')';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 2));
                }

                break;
        }
    }

    public function clean_trash() {

        $where['where'] = array(
            'status' => 3
        );
        
        $check_del = $this->fixture_m->get_list($where);
        
        $ids = $this->fixture_m->getId($check_del);
        
        
        if ($ids) {
            $array_id = implode(',', $ids);
        
           $input = 'tournament_id IN (' . $array_id . ')';
           if ($input){
               $this->tournament_playing_category_m->del_rule($input);
           }
        }
        
        if ($check_del) {

            if ($this->fixture_m->del_rule("status = 3")) {
                $this->session->set_flashdata('message', 'Dọn rác thành công');
            }
        } else {
            $this->session->set_flashdata('message', 'Không có gì trong thùng rác');
        }

        redirect(base_url('admincp/tournament/fixture'));
    }
    
    function search() {
    
        if ($this->uri->rsegment('3') == 1) {
            //lay du lieu tu autocomplete
            $key = $this->input->get('term');
        } else {
            $key = $this->input->get('key-search');
        }
    
        $this->data['key'] = trim($key);
        $input = array();
        $input['like'] = array('vn_name', $key);
    
        $province_id = $this->input->get('province_id');
        if ($province_id) {
            $input['where'] = array('province_id' => $province_id);
        }
        $cid = $this->input->get('cid');
        if ($cid) {
            $input['where'] = array('cid' => $cid);
        }
    
        $list = $this->tournament_m->get_list($input);
        $this->data['list_tournament/tournament'] = $list;
    
        $breadcrumb = array(
            array(
                'url' => '#',
                'name' => 'Tìm kiếm'
            )
        );
    
        $this->data['breadcrumb'] = $breadcrumb;
    
        if ($this->uri->rsegment('3') == 1) {
            //xu ly autocomplete
            $result = array();
            foreach ($list as $row) {
                $item = array();
                $item['id'] = $row->id;
                $item['label'] = $row->name;
                $item['value'] = $row->name;
                $result[] = $item;
            }
            //du lieu tra ve duoi dang json
            die(json_encode($result));
        } else {
            //load view
            $this->data['temp'] = 'tournament/tournament/search';
            $this->one_col($this->data);
        }
    }
    
    
    

}
