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
        $this->load->model('comment_m');
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
        
        $input = array();
        $input['where'] = array('pid' => 0, 'tournament_id' => $objTournament->id);   
        
        $total_rows = $this->comment_m->get_total($input);
        //load ra thu vien phan trang
        $config = array();
        $config['total_rows'] = $total_rows;
        $config['base_url'] = base_url('chi-tiet-giai-dau/' . $slug . '/dieu-le/page/');
        $config['first_url'] = base_url('chi-tiet-giai-dau/' . $slug) .'.html';
        $config['per_page'] = 3;
        $config['num_links'] = $total_rows;
        
        //custom pagination
        $config = array_merge($config, $this->system_library->pagination_site());
        //khoi tao cac cau hinh phan trang
        
        $this->pagination->initialize($config);
        $segment = $this->uri->segment(5);
        $segment = intval($segment);        
        $this->data["pagination"] = $this->pagination->create_links();        
        $input['limit'] = array($config['per_page'], $segment);        
        $input['order'] = array('created', 'DESC');
        
        $listComment = $this->comment_m->get_list($input);
        // lấy danh sách commemnt
        if ($listComment) {
            foreach ($listComment as $row) {
                $where = array();
                $where = array('id' => $row->from_id);
                $objUser = $this->users_m->get_info_rule($where);
                $row->name = $objUser->name;
                $row->point = ($objUser->point_doi &&  $objUser->tid == 1) ? $objUser->point_doi : 0;
                $row->image_link = $objUser->image_link;
                $row->id_user = $objUser->id;
                $input = array();
                $input['where'] = array('pid' => $row->id);
                $input['order'] = array('created', 'ASC');
                $row->sub_comment = $this->comment_m->get_list($input);
                foreach ($row->sub_comment as $row_sub) {
                    $where = array();
                    $where = array('id' => $row_sub->from_id);
                    $objUser = $this->users_m->get_info_rule($where);
                    $row_sub->name = $objUser->name;
                    $row_sub->image_link = $objUser->image_link;
                    $row_sub->id_user = $objUser->id;
                    $row_sub->point = ($objUser->point_doi &&  $objUser->tid == 1) ? $objUser->point_doi : 0;
                }
                
            }
            $objTournament->comment = $listComment;
        }
//         echo '<pre>';
//         print_r($objTournament);
//         echo '<pre>';die();
        // lấy lịch sử giải đấu, tỉ số...
        if ($objTournament) {
            $arr_fixture_id = array();
            $input = array();
            $input['where'] = array('tournament_id' => $objTournament->id);
            $obj_tournament_playing_category = $this->tournament_playing_category_m->get_list($input);
            if ($obj_tournament_playing_category) {
                foreach ($obj_tournament_playing_category as $row) {
                    $row->slug_tournament = $objTournament->vn_slug;
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
                        $input['order'] = array('id', 'ASC');
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
                        if ($arr_fixture_id) {
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
                case 'nhanh-dau':
                    $this->data['dataTournament'] = $obj_tournament_playing_category;
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
    
    public function nhanh_dau($slug = '', $id = 0) {
        $where = array(
            'status' => 1,
            'vn_slug' => $slug
        );
    
        $objTournament = $this->tournament_m->get_info_rule($where);
        $arr_list_cap_dau = array();
        $arr_list_ti_so = array();
        if ($objTournament) {
            $this->data['dataTournament'] = $objTournament;
            $arr_fixture_id = array();
            $input = array();
            $input['where'] = array('id' => $id);
            $obj_tournament_playing_category = $this->tournament_playing_category_m->get_list($input);
            if ($obj_tournament_playing_category) {
                foreach ($obj_tournament_playing_category as $row) {    
                    $total_member = $row->total_member;
                    $type_play = $row->type_play;
                    $cap_dau = ($total_member/(2*$type_play));
                    $n = $this->fixture_m->getMu($cap_dau) + 1;
                    $k = 0;
                    for ($i = $n; $i >= 1; $i--) {
                        $input = array();
                        $input['where'] = array('tournament_playing_category_id' => $row->id, 'round' => $i);
                        $input['order'] = array('id', 'ASC');
                        $obj_fixture = $this->fixture_m->get_list($input);
    
                        foreach ($obj_fixture as $row_1) {
                            $arr_fixture_id[] = $row_1->first_registration_id;
                            $arr_fixture_id[] = $row_1->second_registration_id;
                            $input = array();
                            $input = array('fixture_id' => $row_1->id);
                            $obj_set_score = $this->set_score_m->get_info_rule($input);
                            $row_1->first_registration_games = $obj_set_score->first_registration_games;
                            $row_1->second_registration_games = $obj_set_score->second_registration_games;
                            $arr_list_ti_so[$k][] = array((int)$row_1->first_registration_games, (int)$row_1->second_registration_games);
                            
                            $row_1->doi_1 = $this->fixture_m->getPlayer($row_1->first_registration_id);
                            $row_1->doi_2 = $this->fixture_m->getPlayer($row_1->second_registration_id);
                            if ($i == $n) {
                                if (count($row_1->doi_1) == 2) {
                                    $str_name_1 = '';
                                    foreach ($row_1->doi_1 as $val) {
                                        $url = '<a href="'.base_url('chi-tiet-thanh-vien-'.$val->id.'.html').'">'.$val->name.'</a>';
                                        $str_name_1 .= '-' . $url;
                                       
                                    }
                                    $str_name_2 = '';
                                    foreach ($row_1->doi_2 as $val) {
                                        $url = '<a href="'.base_url('chi-tiet-thanh-vien-'.$val->id.'.html').'">'.$val->name.'</a>';
                                        $str_name_2 .= '-' . $url;
                                    }
                                    $arr_list_cap_dau[] = array(substr($str_name_1, 1), substr($str_name_2, 1));
                                }
                                if (count($row_1->doi_1) == 1) {
                                    $url_1 = '<a href="'.base_url('chi-tiet-thanh-vien-'.$row_1->doi_1[0]->id.'.html').'">'.$row_1->doi_1[0]->name.'</a>';
                                    $url_2 = '<a href="'.base_url('chi-tiet-thanh-vien-'.$row_1->doi_2[0]->id.'.html').'">'.$row_1->doi_2[0]->name.'</a>';
                                    $arr_list_cap_dau[] = array($url_1, $url_2);
                                }
                            }
                        }
    
                        $nameRound = $this->fixture_m->getNameRound($i);
                        $row->list_fixture[$nameRound] = $obj_fixture;
                        if ($arr_fixture_id) {
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
                        $k++;
                    }
                }
            }
            $this->data['arr_list_ti_so'] = $arr_list_ti_so;
            $this->data['arr_list_cap_dau'] = $arr_list_cap_dau;
            $this->data['obj_tournament_playing_category'] = $obj_tournament_playing_category;   
        }
    
    
        $this->data['title_site'] = 'Xem nhánh đấu';
        $this->data['keyword_site'] = 'Xem nhánh đấu';
        $this->data['description_site'] = 'Xem nhánh đấu'; 
        $this->load->view('site/tournament/nhanh_dau.php', $this->data);
    }
    


}
