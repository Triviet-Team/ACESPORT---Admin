<?php

Class Fixture_m extends MY_Model {

    var $table = 'fixture';
    
    public function getList($where = ''){
        $query = "SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`, 
            `set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id` ORDER BY `id` DESC";
        
        $result = $this->db->query($query);
        if ($result) {   
            return $result->result();
        }else {
           return FALSE; 
        }
    }
    
    public function getPlayer($registerId) {
        $this->load->model('registration_player_m');
        $this->load->model('users_m');
        if ($registerId) {
            $input = array();
            $input['where'] = array('registration_id' => $registerId);
            $obj = $this->registration_player_m->get_list($input);
            $arrId = $this->getId($obj, 'player_id');
            if ($arrId) {
                $input = array();
                $input['where_in'] = array('id', $arrId);
                $info = $this->users_m->get_list($input);
                if ($info) {
                    return $info;
                }else {
                    return FALSE;
                }
            }
        }
    }

}
