<?php

Class Fixture_m extends MY_Model {

    var $table = 'fixture';
    
    public function getList($filter){
        $strFilter = '';
        if ($filter) {
            foreach ($filter as $value) {
                $strFilter .= ' AND ' . $value['name'] . ' = ' . $value['val'];
            }
        }

        $query = "SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            , `set_score`.`first_registration_games` AS `game_1` 
            , `set_score`.`second_registration_games` AS `game_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score`
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `fixture`.`id` =  `set_score`.`fixture_id`
           
            ". $strFilter ."
            ORDER BY `id` DESC";
        
        //AND `set_score`.`fixture_id` = `fixture`.`id`, `set_score` , `set_score`.`set_number` AS `set`, 
            //`set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`
        
        $result = $this->db->query($query);
        if ($result) {   
            return $result->result();
        }else {
           return FALSE; 
        }
    }
    
    public function getTotalList($filter){
        $strFilter = '';
        if ($filter) {
            foreach ($filter as $value) {
                $strFilter .= ' AND ' . $value['name'] . ' = ' . $value['val'];
            }
        }
    
        $query = "SELECT
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`,
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2`
            , `set_score`.`first_registration_games` AS `game_1`
            , `set_score`.`second_registration_games` AS `game_2`
    
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score`
    
            WHERE `tournament_type`.`id` = `tournament`.`pid`
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id`
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id`
            AND `fixture`.`id` =  `set_score`.`fixture_id`
      
            ". $strFilter ."
            ORDER BY `id` DESC";
    
        //AND `set_score`.`fixture_id` = `fixture`.`id`, `set_score` , `set_score`.`set_number` AS `set`,
        //`set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`
    
        $result = $this->db->query($query);
        if ($result) {
            return count($result->result());
        }else {
            return FALSE;
        }
    }
    
    public function countTotal($filter){
        $strFilter = '';
        if ($filter) {
            foreach ($filter as $value) {
                $strFilter .= ' AND ' . $value['name'] . ' = ' . $value['val'];
            }
        }
    
        $query = "SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
           
            ". $strFilter ."
            ORDER BY `id` DESC";
    
        $result = $this->db->query($query);
        if ($result) {
            return count($result->result());
        }else {
            return FALSE;
        }
    }
    

    public function getUpdate($filter){
        $strFilter = '';
        if ($filter) {
            foreach ($filter as $value) {
                $strFilter .= ' AND ' . $value['name'] . ' = ' . $value['val'];
            }
        }
    
        $query = "SELECT
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament_type`.`id` AS `tournament_type_id`, `tournament`.`vn_name` AS `tournament`, `tournament`.`id` AS `tournament_id`,
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2`,
            
            `fixture`.`round` AS `round`, `tournament_playing_category`.`set`, `tournament_playing_category`.`id` AS `noi_dung_id`,
            `fixture_result`.`id` AS `fixture_result_id`, `fixture_result`.`winner_registration_id` AS `winner_registration_id`,
            `set_score`.`id` AS `set_score_id`, `set_score`.`first_registration_games` AS `first_registration_games`,
            `set_score`.`second_registration_games` AS `second_registration_games`
    
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `fixture_result`, `set_score`
    
            WHERE `tournament_type`.`id` = `tournament`.`pid`
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id`
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id`
            AND `set_score`.`fixture_id` = `fixture`.`id`
            AND `fixture`.`id` = `fixture_result`.`fixture_id`
      
            ". $strFilter ."
            ORDER BY `id` DESC";
    
        //AND `set_score`.`fixture_id` = `fixture`.`id`, `set_score` , `set_score`.`set_number` AS `set`,
        //`set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`
    
        $result = $this->db->query($query);
        if ($result) {
            return $result->result();
        }else {
            return FALSE;
        }
    }
    
    
    public function countNumberRound($filter){
        $strFilter = '';
        if ($filter) {
            foreach ($filter as $value) {
                $strFilter .= ' AND ' . $value['name'] . ' = ' . $value['val'];
            }
        }
    
        $query = "SELECT
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, `tournament`.`id` AS `tournament_id`,
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2`,
    
            `fixture`.`round` AS `round`, `tournament_playing_category`.`set`, `tournament_playing_category`.`id` AS `noi_dung_id`
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `fixture_result`
    
            WHERE `tournament_type`.`id` = `tournament`.`pid`
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id`
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id`
            AND `fixture`.`id` = `fixture_result`.`fixture_id`
    
            ". $strFilter ."
            AND `fixture_result`.`winner_registration_id` > 0
            ORDER BY `id` DESC";
    
        //AND `set_score`.`fixture_id` = `fixture`.`id`, `set_score` , `set_score`.`set_number` AS `set`,
        //`set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`
    
        $result = $this->db->query($query);
        if ($result) {
            return count($result->result());
        }else {
            return FALSE;
        }
    }
    
    public function checkUserWiner($filter){
        $strFilter = '';
        if ($filter) {
            foreach ($filter as $value) {
                $strFilter .= ' AND ' . $value['name'] . ' = ' . $value['val'];
            }
        }
    
        $query = "SELECT
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, `tournament`.`id` AS `tournament_id`,
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2`,
    
            `fixture`.`round` AS `round`, `tournament_playing_category`.`set`, `tournament_playing_category`.`id` AS `noi_dung_id`
    
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `fixture_result`
    
            WHERE `tournament_type`.`id` = `tournament`.`pid`
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id`
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id`
            AND `fixture`.`id` = `fixture_result`.`fixture_id`
    
            ". $strFilter ."
            
            ORDER BY `id` DESC";
    
        //AND `set_score`.`fixture_id` = `fixture`.`id`, `set_score` , `set_score`.`set_number` AS `set`,
        //`set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`
    
        $result = $this->db->query($query);
        if ($result) {
            return count($result->result());
        }else {
            return FALSE;
        }
    }
    
    public function getFixtureWiner($filter){
        $ids = null;
        $strFilter = '';
        if ($filter) {
            foreach ($filter as $value) {
                $strFilter .= ' AND ' . $value['name'] . ' = ' . $value['val'];
            }
        }
    
        $query = "SELECT
            `fixture_result`.`winner_registration_id` AS `id`
    
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `fixture_result`
    
            WHERE `tournament_type`.`id` = `tournament`.`pid`
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id`
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id`
            AND `fixture`.`id` = `fixture_result`.`fixture_id`
    
            ". $strFilter ."
            AND `fixture_result`.`winner_registration_id` > 0
            ";
    
        //AND `set_score`.`fixture_id` = `fixture`.`id`, `set_score` , `set_score`.`set_number` AS `set`,
        //`set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`
    
        $result = $this->db->query($query);
        if ($result) {
            foreach ($result->result() as $row) {
                $ids[] = $row->id;
            }
            return $ids;
        }else {
            return FALSE;
        }
    }
    

    public function createRound($n, $active = '', $m = 1){
        $str = '';
        $nameRount = '';
        if ($n > 0) {
             $str = '<option value="0">Chọn vòng đấu</option>';
                    for ($i = $n; $i >= 1; $i--) {
                        if ($i == $active) {
                            $selected = 'selected';
                        }else {
                            $selected = '';
                        }
                        if ($i == 1) {
                            $str .= '<option '.$selected.' value="'. $i .'">Vòng chung kết</option>';
                            if ($i == $m) $nameRount = 'Vòng chung kết';
                        }elseif ($i == 2) {
                            $str .= '<option '.$selected.' value="'. $i .'">Vòng bán kết</option>';
                            if ($i == $m) $nameRount = 'Vòng bán kết';
                        }elseif ($i == 3) {
                            $str .= '<option '.$selected.' value="'. $i .'">Vòng tứ kết</option>';
                            if ($i == $m) $nameRount = 'Vòng tứ kết';
                        }else {
                            $str .= '<option '.$selected.' value="'. $i .'">Vòng 1/'. (pow(2, $i)/2).'</option>';
                            if ($i == $m) $nameRount = 'Vòng 1/'. (pow(2, $i)/2);
                        }
                    }
        }
       return array('str' => $str, 'nameRound' => $nameRount);       
    }
    

    public function registrationPlayer($idNoiDung, $arrUser, $round = 3, $option = null){
        if ($option == null) {
            
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
                $input['order'] = array('id', 'ASC');
                $info = $this->users_m->get_list($input);
                if ($info) {
                    return $info;
                }else {
                    return FALSE;
                }
            }
        }
    }
    
    public function getIdsForTable($id, $name_col = '',  $table = '', $name_id) {
        $model = $table . '_m';
        $this->load->model($model);
        if ($id) {
            $input = array();
            $input['where'] = array($name_col => $id);
            $obj = $this->$model->get_list($input);
            $arrId = $this->getId($obj, $name_id);
            if ($arrId) {
                return $arrId;
            }else {
                return FALSE;
            }
        }
    }
    
    public function getInfoTable($id) {
            $query = "SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = $id";
        
            $result = $this->db->query($query);
            if ($result) {
                return $result->result();
            }else {
                return FALSE;
            }
    }
    
    public function getMu($val) {
        $i = 0;
        if ($val){
            while ($val > 1) {
                if ($val % 2 == 0) {
                    $val = $val/2;
                    $i = $i + 1;
                }else {
                    return FALSE;
                }
            }
        }
        return $i;
    }

    
    
    
    
    
    
}
