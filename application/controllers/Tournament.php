<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tournament extends MY_Controller {

    public function __construct() {
        parent::__construct();        
        $this->load->model('users_m');
        $this->load->model('tournament_m');
        $this->load->model('tournament_category_m', 'category');
        $this->load->model('tournament_playing_category_m');
        $this->load->model('playing_category_m');
        $this->load->model('fixture_m');
        $this->load->model('registration_player_m');
        $this->load->model('set_score_m');
        $this->load->model('fixture_result_m');
        $this->load->model('users_m');
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
                    $n = $this->fixture_m->getMu($cap_dau) + 1;
                } 
                $this->data['round'] = 1;
                $filter[] = array('name' => '`fixture`.`round`', 'val' => $n);
                $total['curent'] = $this->fixture_m->countTotal($filter);
                $total['conlai'] = $cap_dau - $total['curent'];
                echo json_encode($total);
            }
        }
    }
    
    public function getInfoUsers() {
        $input = array();
        $input['where'] = array('status' => 1);
        if ($_GET) {
            foreach ($_GET as $val) {
                if ($val != '') {
                    $arrIdUser[] = $val;
                }
            }
        
            if ($arrIdUser) {
                $input['where_not_in'] = array('id', $arrIdUser);
            }
        }
        
        $data = $this->users_m->get_list($input);
        
        $result = null;
        
        foreach ($data as $row) {
            $result[] = array('id' => intval($row->id), 'text' => $row->username);
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
                //$cap_dau = $doi_choi / 2;
                $n = $this->fixture_m->getMu($cap_dau) + 1;
                $arrGetRount = $this->fixture_m->createRound($n, $active);
                $result['type'] = $type_play;
                $result['content'] = $arrGetRount['str'];
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

        $slug = 'san-pham';
        $input = array();
        
        $input['where']['status'] = 1;             

        $total_rows = $this->tournament_m->get_total($input);
        //load ra thu vien phan trang
        $config = array();
        $config['total_rows'] = $total_rows;
        $config['base_url'] = base_url($slug . '/page/');
        $config['first_url'] = base_url($slug) .'.html';
        $config['per_page'] = 50;
        $config['num_links'] = 1;
        //custom pagination
        $config = array_merge($config, $this->system_library->pagination_site());
        //khoi tao cac cau hinh phan trang

        $this->pagination->initialize($config);
        $segment = $this->uri->segment(3);
        $segment = intval($segment);
        
        // truyền trang hiện tại trong tổng trang ra view
        $this->data['curent_page'] = ($config['per_page'] + $segment)/$config['per_page'];
        $this->data['total_page']  = ceil($total_rows / $config['per_page']);

        $this->data["pagination"] = $this->pagination->create_links();        

        $input['limit'] = array($config['per_page'], $segment);

        $this->data['list_tournament'] = $this->tournament_m->get_list($input);             

        $breadcrumb[] = array(
            'url' => "",
            'name' => 'Giải đấu',
        );

        $this->data['title_site'] = 'Giải đấu';
        $this->data['keyword_site'] = 'Giải đấu';
        $this->data['description_site'] = 'Giải đấu';

        $this->data['temp'] = 'tournament/index';
        $this->one_col($this->data);
    }

    public function detail($slug = '', $type = 'dieu-le') {
        $where = array(
            'status' => 1,
             'vn_slug' => $slug
        );

        $objTournament = $this->tournament_m->get_info_rule($where);
        
        //cap nhat lai luot xem cua san pham
        $data = array();
        $data['view'] = $objTournament->view + 1;
        $this->tournament_m->update($objTournament->id, $data);
        
        $this->data['objTournament'] = $objTournament;
        
        $input = array();
        $input['where'] = array('pid' => $objTournament->pid);
        $input['where'] = array('id <>' => $objTournament->id);
        $input['order'] = array('id', 'ASC');
        $list_related = $this->tournament_m->get_list($input);
        
        if ($objTournament) {
            $arr_fixture_id = array();
            $input = array();
            $input['where'] = array('tournament_id' => $objTournament->id);
            $obj_tournament_playing_category = $this->tournament_playing_category_m->get_list($input);
            if ($obj_tournament_playing_category) {
                foreach ($obj_tournament_playing_category as $row) {
                    $input = array(
                        'id' => $row->playing_category_id
                    );
                    $obj_playing_category = $this->playing_category_m->get_info_rule($input);
                    $row->name = $obj_playing_category->vn_name;
                    
                    $total_member = $row->total_member;
                    $type_play = $row->type_play;
                    $cap_dau = ($total_member/(2*$type_play));
                    $n = $this->fixture_m->getMu($cap_dau) + 1;
                    
                    for ($i = $n; $i >= 1; $i--) {
                        $input = array();
                        $input['where'] = array('tournament_playing_category_id' => $row->id, 'round' => $i);
                        $obj_fixture = $this->fixture_m->get_list($input);
                        
                        foreach ($obj_fixture as $row_1) {
                            $arr_fixture_id[] = $row_1->first_registration_id;
                            $arr_fixture_id[] = $row_1->second_registration_id;
                            $input = array();
                            $input = array('fixture_id' => $row_1->id);
                            $obj_set_score = $this->set_score_m->get_info_rule($input);
                            $row_1->first_registration_games = $obj_set_score->first_registration_games;
                            $row_1->second_registration_games = $obj_set_score->second_registration_games;
                        
                            $row_1->doi_1 = $this->fixture_m->getPlayer($row_1->first_registration_id);
                            $row_1->doi_2 = $this->fixture_m->getPlayer($row_1->second_registration_id);
                        }
                        
                        $nameRound = $this->fixture_m->getNameRound($i);                        
                        $row->list_fixture[$nameRound] = $obj_fixture;
                        
                        $input = array();
                        $input['where_in'] = array('registration_id', $arr_fixture_id);
                        $obj_registration_player = $this->registration_player_m->get_list($input);
                        foreach ($obj_registration_player as $row_2) {
                           $arr_player_id[] = $row_2->player_id;
                        }
                        
                        if ($arr_player_id) {
                            $input = array();
                            $input['where_in'] = array('id', $arr_player_id);
                            $input['order'] = array('name', 'ASC');
                            $list_player = $this->users_m->get_list($input);
                            $row->list_player = $list_player;
                        }
                    }
                }
            }

            switch ($type) {
                case 'lich-thi-dau':
                    $this->data['dataTournament'] = $obj_tournament_playing_category;
                    break;
                case 'ket-qua':
                    $this->data['dataTournament'] = $obj_tournament_playing_category;
                    break;
                case 'van-dong-vien':
                    $this->data['dataTournament'] = $obj_tournament_playing_category;
                    break;
                case 'lich-su-giai-dau':
                    $this->data['dataTournament'] = $list_related;
                    break;
                default:
                    $this->data['dataTournament'] = $objTournament;
            }
            $this->data['type'] = $type;
        }
        
        
        $this->data['title_site'] = 'Sản phẩm';
        $this->data['keyword_site'] = 'Sản phẩm';
        $this->data['description_site'] = 'Sản phẩm';
        
        $this->data['temp'] = 'tournament/detail';
        $this->one_col($this->data);
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
    
        if ($this->input->post()) {
            $set = $this->input->post('set', true);
            
            $round = $infoPlayer[0]->round;
            $tran_dau = pow(2, $round-1);
            
            //kiem tra co thuc hien loc du lieu hay khong
            $filter = array();
            
            $tournament_type = $infoPlayer[0]->tournament_type_id;
            $tournament_type = intval($tournament_type);
//             if ($tournament_type > 0) {
//                 $this->data['tournament_type'] = $tournament_type;
//                 $filter[] = array('name' => '`tournament_type`.`id`', 'val' => $tournament_type);
//             }
            
            $tournament = $infoPlayer[0]->tournament_id;
            $tournament = intval($tournament);
            if ($tournament > 0) {
                $this->data['tournament'] = $tournament;
                $filter[] = array('name' => '`tournament`.`id`', 'val' => $tournament);
            }
            
            $noi_dung = $infoPlayer[0]->noi_dung_id;
            $noi_dung = intval($noi_dung);
            if ($noi_dung > 0) {
                $this->data['noi_dung'] = $noi_dung;
                $filter[] = array('name' => '`tournament_playing_category`.`id`', 'val' => $noi_dung);
            }
            
            $listFixture = $this->fixture_m->getList($filter);
            $arrIdFixture = array();
            foreach ($listFixture as $row) {
                $arrIdFixture[] = $row->id;
            }

            $round = $round;
            $round = intval($round);
            if ($round > 0) {
                $this->data['round'] = $round;
                $filter[] = array('name' => '`fixture`.`round`', 'val' => $round);
            }            
            
            $game_user_1 = $set[1][0];
            $game_user_2 = $set[1][1];           
            
            $set_score = array(
                'set_number' => $infoPlayer[0]->set,
                'first_registration_games' => $set[1][0],
                'second_registration_games' => $set[1][1]
            );
            $this->set_score_m->update($infoPlayer[0]->set_score_id, $set_score);
            $fixture_result = array(
                'winner_registration_id' => $set[1][0] > $set[1][1] ? $infoPlayer[0]->code_doi_1 : $infoPlayer[0]->code_doi_2,
                'number_of_sets_played	' => $infoPlayer[0]->set
            );
            $this->fixture_result_m->update($infoPlayer[0]->fixture_result_id, $fixture_result);
            
            $numberRound = $this->fixture_m->countNumberRound($filter);
            
            $filter[2] = array('name' => '`fixture`.`round`', 'val' => $round - 1);
            
            $numberRound_1 = $this->fixture_m->countNumberRound($filter);
            
            if ($numberRound_1 <= 0) {
                if ($numberRound == $tran_dau) {
                                    $filter[2] = array('name' => '`fixture`.`round`', 'val' => $round);
                                    $arrFixtureWiner = $this->fixture_m->getFixtureWiner($filter);
                
                                    //echo $n = $tran_dau / 2;die();
                                    $j = 0;
                                    for ($i = 1; $i <= $tran_dau / 2; $i++) {
                
                                        $fixture = array(
                                            'tournament_playing_category_id' => $noi_dung,
                                            'first_registration_id' => $arrFixtureWiner[$j]
                                        );
                                        unset($arrFixtureWiner[$j]);
                                        $j++;
                                        $fixture['second_registration_id'] = $arrFixtureWiner[$j];
                                        $fixture['round'] = $round - 1;
                                        unset($arrFixtureWiner[$j]);
                                        $j++;
                
                                        $this->fixture_m->create($fixture);
                
                                        $idFixture = $this->db->insert_id();
                
                                        if ($idFixture) {
                                            $set_score = array(
                                                'fixture_id' => $idFixture,
                                                'set_number' => 1,
                                                'first_registration_games' => 0,
                                                'second_registration_games' => 0
                                            );
                                            $this->set_score_m->create($set_score);
                                            $fixture_result = array(
                                                'fixture_id' => $idFixture,
                                                'winner_registration_id' => 0,
                                                'number_of_sets_played	' => 1
                                            );
                                            $this->fixture_result_m->create($fixture_result);
                                        }
                                    }
                
                    $round = $round - 1;
                    if ($round > 0) {
                        $this->session->set_flashdata('message', 'Cập nhật tỉ số trận đấu thành công');
                        redirect(base_url('admincp/tournament/fixture?tournament_type='.$tournament_type.'&tournament='.$tournament.'&noi_dung='.$noi_dung.'&round='.$round));
                    }else {
                        $this->session->set_flashdata('message', 'Tất cả trận đấu trong nội dung đã được cập nhật thành công');
                        redirect(base_url('admincp/tournament/fixture?tournament_type='.$tournament_type.'&tournament='.$tournament.'&noi_dung='.$noi_dung));
                    }
                
                
                }else {
                    redirect(base_url('admincp/tournament/fixture?tournament_type='.$tournament_type.'&tournament='.$tournament.'&noi_dung='.$noi_dung.'&round='.$round));
                }
            }else {
                  
                $fixture_result = array(
                    'winner_registration_id' => $set[1][0] > $set[1][1] ? $infoPlayer[0]->code_doi_1 : $infoPlayer[0]->code_doi_2,
                );
                
                $where = array(
                                'winner_registration_id' => $infoPlayer[0]->winner_registration_id   
                            );
                $where_in = array();
                $where_in = array('fixture_id', $arrIdFixture);

                $this->fixture_result_m->update_rule($where, $fixture_result, $where_in);                
                
                $fixture = array(
                    'first_registration_id' => $set[1][0] > $set[1][1] ? $infoPlayer[0]->code_doi_1 : $infoPlayer[0]->code_doi_2
                );
                

                
                $where = array(
                    'id <>' => $infoPlayer[0]->id,
                    'first_registration_id' => $infoPlayer[0]->winner_registration_id
                );
                
                $where_in = array('id', $arrIdFixture);
                
                $this->fixture_m->update_rule($where, $fixture, $where_in);
                
                $fixture = array(
                    'second_registration_id' => $set[1][0] > $set[1][1] ? $infoPlayer[0]->code_doi_1 : $infoPlayer[0]->code_doi_2
                );
                
                $where = array(
                    'id <>' => $infoPlayer[0]->id,
                    'second_registration_id' => $infoPlayer[0]->winner_registration_id
                );
                
                $where_in = array('id', $arrIdFixture);
                
                $this->fixture_m->update_rule($where, $fixture, $where_in);
                  
                $this->session->set_flashdata('message', 'Cập nhật tỉ số trận đấu thành công');
                redirect(base_url('admincp/tournament/fixture?tournament_type='.$tournament_type.'&tournament='.$tournament.'&noi_dung='.$noi_dung.'&round='.$round));
   
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
