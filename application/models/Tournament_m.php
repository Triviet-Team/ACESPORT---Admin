<?php

Class Tournament_m extends MY_Model {

    var $table = 'tournament';

    public function del_noidung_id($id) {
        $this->load->model('playing_in_m');
        $this->load->model('registration_m');
        $this->load->model('registration_player_m');
        $this->load->model('fixture_m');
        $this->load->model('set_score_m');
        $this->load->model('fixture_result_m');
        if ($id > 0) {
            $arr_registration_id = array();
            $arr_fixture_id = array();
            $input = array();
            $input['where'] = array('tournament_playing_category_id' => $id);
            $obj_playing_in= $this->playing_in_m->get_list($input);

            $obj_fixture= $this->fixture_m->get_list($input);

            // xóa bảng registration_player_m,  playing_in_m, registration_m theo id
            if ($obj_playing_in) {
                foreach ($obj_playing_in as $row_2) {
                    $arr_registration_id[] = $row_2->registration_id;
                }
            
                if ($arr_registration_id) {
                    $where_in = array();
                    $where_in = array('registration_id', $arr_registration_id);
                    if ($this->registration_player_m->del_in($where_in)) {
                        if ($this->playing_in_m->del_in($where_in)) {
                            $where_in = array();
                            $where_in = array('id', $arr_registration_id);
                            $this->registration_m->del_in($where_in);
                        }
                    }
                }
            }
            // xóa bảng set_score_m,  fixture_result_m, fixture_m theo id
            if ($obj_fixture) {
                foreach ($obj_fixture as $row_3) {
                    $arr_fixture_id[] = $row_3->id;
                }
            
                if ($arr_fixture_id) {
                    $where_in = array();
                    $where_in = array('fixture_id', $arr_fixture_id);
                    if ($this->set_score_m->del_in($where_in)) {
                        if ($this->fixture_result_m->del_in($where_in)) {
                            $this->fixture_m->del_rule(array('tournament_playing_category_id' => $id));
                        }
                    }
                }
            }
        }
    }
}
