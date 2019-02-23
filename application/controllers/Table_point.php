<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Table_point extends MY_Controller {

    public function __construct() {
        parent::__construct();        
        $this->load->model('users_m');
        $this->load->model('tournament_m');
        $this->load->model('tournament_category_m', 'category');
        $this->load->model('tournament_playing_category_m');
        $this->load->model('playing_category_m');
        $this->load->model('playing_in_m');
        $this->load->model('fixture_m');
        $this->load->model('registration_player_m');
        $this->load->model('set_score_m');
        $this->load->model('fixture_result_m');
        $this->load->model('users_m');
        $this->load->model('comment_m');
    }

    public function table($type = 'nam-nu') {
            switch ($type) {
                case 'nam':
                    $this->data['type'] = $type;
                    $this->data['title_site'] = 'Bảng điểm nam';
                    $this->data['keyword_site'] = 'Bảng điểm nam';
                    $this->data['description_site'] = 'Bảng điểm nam';
                    $breadcrumb[] = array(
                        'url' => "",
                        'name' => 'Bảng điểm nam',
                    );
                    break;
                case 'nu':
                    $this->data['dataTournament'] = $list_related;
                    $this->data['title_site'] = 'Bảng điểm nữ';
                    $this->data['keyword_site'] = 'Bảng điểm nữ';
                    $this->data['description_site'] = 'Bảng điểm nữ';

                    $breadcrumb[] = array(
                        'url' => "",
                        'name' => 'Bảng điểm nữ',
                    );
                    break;
                default:
                    $this->data['dataTournament'] = $objTournament;
                    $this->data['title_site'] = 'Bảng điểm';
                    $this->data['keyword_site'] = 'Bảng điểm';
                    $this->data['description_site'] = 'Bảng điểm';

                    $breadcrumb[] = array(
                        'url' => "",
                        'name' => 'Bảng điểm',
                    );
            }
        $this->data['type'] = $type;
        $this->data['breadcrumb'] = $breadcrumb;
        $this->data['temp'] = 'table_point/table';
        $this->one_col($this->data);
    }
    
    public function get_table_point() {
        $data = array();
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
            $input = array();
            $input['where'] = array('status' => 1, 'tid' => 1);
            switch ($type) {
                case 'nam':
                    $input['where'] = array('sex' => 1);
                    break;
                case 'nu':
                    $input['where'] = array('sex' => 0);
                    break;
            }
            $list_user = $this->users_m->get_list($input);  
            if ($list_user) {
                foreach ($list_user as $row) {
                    $input = array();
                    $input['where'] = array('player_id' => $row->id);
                    $list_registration_player = $this->registration_player_m->get_list($input);
                    if ($list_registration_player) {
                        $arr_registration = $this->users_m->getId($list_registration_player, 'registration_id');
                        $input = array();
                        $input['where_in'] = array('registration_id', $arr_registration);
                        $list_playing_in = $this->playing_in_m->get_list($input);
                        if ($list_playing_in) {
                            $arr_tournament_playing_category = $this->users_m->getId($list_playing_in, 'tournament_playing_category_id');
                            $input = array();
                            $input['where_in'] = array('id', $arr_tournament_playing_category);
                            $list_tournament_playing_category = $this->tournament_playing_category_m->get_list($input);
                            if ($list_tournament_playing_category) {
                                $arr_tournament = $this->users_m->getId($list_tournament_playing_category, 'tournament_id');
                                $input = array();
                                $input['where'] = array('status' => 1);
                                $input['where_in'] = array('id', $arr_tournament);
                                $list_tournament = $this->tournament_m->get_list($input);
                                $row->number_tournament = count($list_tournament);
                            }
                        }
                    
                    }
                    $data[] = array(
                        'id'        => $row->id,
                        'name'      => '<a href="'.base_url('chi-tiet-thanh-vien-'.$row->id.'.html').'">'.$row->name.'</a>',
                        'rank'      => 86253,
                        'score'     => $row->point_doi ? $row->point_doi : 0,
                        'count'     => $row->number_tournament ? $row->number_tournament : 0,
                    );
                }
            }
        }
        echo json_encode($data);
    }
    
    
    public function user($id) {

        $where = array('id' => $id, 'status' => 1, 'tid' => 1); 
        $objUser = $this->users_m->get_info_rule($where);
        
        if ($objUser) {
            $this->data['objUser'] = $objUser;
            
            $input['where']['status'] = 1;            
            $this->data['list_tournament'] = $this->tournament_m->get_list($input);            
            
            $breadcrumb[] = array(
                'url' => "",
                'name' => $objUser->name  ? $objUser->name : 'Chi tiết thành viên',
            );
        }
        $this->data['breadcrumb'] = $breadcrumb;
        $this->data['title_site'] = 'Chi tiết thành viên';
        $this->data['keyword_site'] = 'Chi tiết thành viên';
        $this->data['description_site'] = 'Chi tiết thành viên';
    
        $this->data['temp'] = 'table_point/user';
        $this->one_col($this->data);
    }
    
    public function get_history_id($id) {    
        $where = array('id' => $id, 'status' => 1 , 'tid' => 1);
        $objUser = $this->users_m->get_info_rule($where);
        $data = array();
        if ($objUser) {
            $input = array();
            $input['where'] = array('player_id' => $id);
            $list_registration_player = $this->registration_player_m->get_list($input);            
            if ($list_registration_player) {
                $arr_registration = $this->users_m->getId($list_registration_player, 'registration_id');
                $input = array();
                $input['where_in'] = array('registration_id', $arr_registration);
                $list_playing_in = $this->playing_in_m->get_list($input);
                if ($list_playing_in) {
                    $arr_tournament_playing_category = $this->users_m->getId($list_playing_in, 'tournament_playing_category_id');
                    $input = array();
                    $input['where_in'] = array('id', $arr_tournament_playing_category);
                    $list_tournament_playing_category = $this->tournament_playing_category_m->get_list($input);
                    if ($list_tournament_playing_category) {
                        $arr_tournament = $this->users_m->getId($list_tournament_playing_category, 'tournament_id');
                        $input = array();
                        $input['where'] = array('status' => 1);
                        $input['where_in'] = array('id', $arr_tournament);
                        $list_tournament = $this->tournament_m->get_list($input);
                        foreach ($list_tournament as $row) {
                            $data[] = array(
                                                'id'        => $row->id,
                                                'name'      => $row->vn_name,
                                                'rank'      => 86253,
                                                'date'      => date('d/m/Y - H:m:s', $row->start_date),
                                                'url'       => '<button><a target="_blank" class="watch-branch-btn" href="xem-nhanh-dau.html">Xem nhánh đấu</a></button>',
                                
                                           );
                        }
                    }
                }

            }
        }
        if ($data) echo json_encode($data);
    }
    
    
    
    
    
    
    
    
    
    

}
