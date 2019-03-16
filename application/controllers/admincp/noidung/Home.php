<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('users_m');
        $this->load->model('tournament_m');
        $this->load->model('tournament_category_m', 'category');
        $this->load->model('tournament_playing_category_m');
        $this->load->model('playing_category_m');
        $this->load->model('fixture_m');
        $this->load->model('registration_player_m');
        $this->load->model('registration_m');
        $this->load->model('set_score_m');
        $this->load->model('fixture_result_m');
        $this->load->model('tournament_type_m');
        $this->load->model('playing_in_m');
    }

    public function index($id = 0) {
        $info = $this->tournament_playing_category_m->get_info($id);
        if($info){
            $this->data['info'] = $info;
            if($this->input->post()) {
                $type_play = $this->input->post('type_play', true);
                $total_member = $this->input->post('total_member', true);
                $set = $this->input->post('set', true);
                $so_cap_dau = ($total_member/(2*$type_play));
                $n = $this->fixture_m->getMu($so_cap_dau) + 1;
                
                $data_update = array(
                    'tournament_id' => $info->tournament_id,
                    'playing_category_id' => $info->playing_category_id,
                    'total_member' => $total_member,
                    'type_play' => $type_play,
                    'set' => $set
                );
                $m = $so_cap_dau;
                if($this->tournament_playing_category_m->update($id, $data_update)) {
                    for ($i = $n; $i >= 1; $i--) {
                        for ($l = $m; $l >= 1; $l--) {
                            // đăng ký hai mã
                            if($i == $n) {
                                for ($j = 1; $j <= 2; $j++) {
                                    $registration = array(
                                        'date' => date('Y-m-d h:m:s', now()),
                                    );
                                    if ($this->registration_m->create($registration)) {
                                        $id_registration = $this->db->insert_id();
                                        $playing_in = array(
                                            'registration_id' => $id_registration,
                                            'tournament_playing_category_id' => $id
                                        );
                                        $this->playing_in_m->create($playing_in);
                            
                                        if ($type_play == 1) {
                                            $registration_player = array(
                                                'registration_id' => $id_registration,
                                                'player_id' => 0
                                            );
                                            $this->registration_player_m->create($registration_player);
                                        }
                            
                                        if ($type_play == 2) {
                                            for ($k = 1; $k <= 2; $k++) {
                                                $registration_player = array(
                                                    'registration_id' => $id_registration,
                                                    'player_id' => 0
                                                );
                                                $this->registration_player_m->create($registration_player);
                                            }
                                        }
                                    }
                                }
                            }
                            // đăng ký trận đấu
                            $fixture = array(
                                'tournament_playing_category_id' => $id,
                                'first_registration_id' => 0,
                                'second_registration_id' => 0,
                                'round' => $i,
                                'start_date' => 0,
                                'end_date' => 0
                            );
                            $this->fixture_m->create($fixture);                        
                            $idFixture = $this->db->insert_id();
                        
                            if ($idFixture) {
                                $set_score = array(
                                    'fixture_id' => $idFixture,
                                    'set_number' => 1,
                                    'first_registration_games' => 0,
                                    'second_registration_games' => 0
                                );
                                $fixture_result = array(
                                    'fixture_id' => $idFixture,
                                    'winner_registration_id' => 0,
                                    'number_of_sets_played	' => 1
                                );
                                $this->set_score_m->create($set_score);
                                $this->fixture_result_m->create($fixture_result);
                            }
                        }
                        $m = $m/2;// sau mỗi vòng cặp đấu giảm một nửa                        
                    }
                } 
                $this->session->set_flashdata('message', 'Cập nhật nội dung thành công');
                redirect(base_url() . 'admincp/noidung/home/index/' . $id);
           }
        }else {
            $this->session->set_flashdata('message', 'Nội dung chỉnh sửa không tồn tại');
            redirect(base_url() . 'admincp/tournament/tournament/index/');
        }
        
        $this->data['title'] = 'Thông tin chung';
        $this->data['temp'] = 'noidung/home/index';
        $this->load->view('admin/main', $this->data);
    }
    
    public function manager_team($id = 0) {
        $info = $this->tournament_playing_category_m->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Nội dung chỉnh sửa không tồn tại');
            redirect(base_url() . 'admincp/tournament/tournament/index/');
        }
        
        $input = array();
        $input['where'] = array('tournament_playing_category_id' => $id);
        $obj_playing_in = $this->playing_in_m->get_list($input);
        
        if($obj_playing_in) {
            $ids_playing_in = $this->fixture_m->getId($obj_playing_in);
            if($ids_playing_in) {
                $input = array();
                $input['where_in'] = array('registration_id', $ids_playing_in);
                $input['order'] = array('id', 'ASC');
                $obj_registration_player = $this->registration_player_m->get_list($input);
                foreach ($obj_registration_player as $row) {
                    $info_player = $this->users_m->get_info($row->player_id);
                    $row->name = $info_player->name;
                    $row->nickname = $info_player->nickname;
                }
                
            }

        }
 
        if($this->input->post()) {
            $list_ids_update = $this->input->post('player');
            foreach ($list_ids_update as $k => $value) {
                $registration_player = array(
                    'player_id' => $value
                );
                $this->registration_player_m->update($k, $registration_player);
            }
        }
        
        $this->data['obj_registration_player'] = $obj_registration_player;
        
        $this->data['title'] = 'Quản lí đội bóng';
        $this->data['temp'] = 'noidung/home/manager_team';
        $this->load->view('admin/main', $this->data);
    }
    
    
    
    
    
    

}
