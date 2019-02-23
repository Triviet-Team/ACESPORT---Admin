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
        $input['order'] = array('created', 'ASC');
        $listComment = $this->comment_m->get_list($input);
        
        if ($listComment) {
            foreach ($listComment as $row) {
                $input = array();
                $input['where'] = array('pid' => $row->id);
                $input['order'] = array('created', 'ASC');
                $row->sub_comment = $this->comment_m->get_list($input);
            }
            $objTournament->comment = $listComment;
        }
// echo '<pre>';
// print_r($objTournament);
// echo '<pre>';die();
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

}
