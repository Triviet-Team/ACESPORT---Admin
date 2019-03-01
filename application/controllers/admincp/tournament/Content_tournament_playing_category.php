<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Content_tournament_playing_category extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tournament_m');
        $this->load->model('tournament_type_m');
        $this->load->model('tournament_category_m');
        $this->load->model('content_tournament_playing_category_m', 'category');
        $this->load->model('tournament_playing_category_m');
        $this->load->model('playing_category_m');
        $this->load->model('fixture_m');
    }

    public function index() {

    //kiem tra co thuc hien loc du lieu hay khong
         $input = array();
        $tournament_type = $this->input->get('tournament_type');
        $tournament_type = intval($tournament_type);
        if ($tournament_type > 0) {
            $input['where']['tournament_type'] = $tournament_type;
        }
        
        $tournament = $this->input->get('tournament');
        $tournament = intval($tournament);
        if ($tournament > 0) {
            $input['where']['tournament'] = $tournament;
        }
        
        $noi_dung = $this->input->get('noi_dung');
        $noi_dung = intval($noi_dung);
        if ($noi_dung > 0) {
            $input['where']['tournament_playing_category_id'] = $noi_dung;
        }

        $total_rows = $this->category->get_total($input);
        $this->data['total_rows'] = $total_rows;
        $getData = array('tournament_type' => $tournament_type, 'tournament' => $tournament, 'tournament_playing_category_id' => $noi_dung);

        //load ra thu vien phan trang
        $config = array();
        $config['total_rows'] = $total_rows; //tong tat ca cac san pham tren website
        $config['base_url'] = base_url('admincp/articles');
        $config['suffix'] = '?' . http_build_query($getData, '', "&amp;");
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($getData, '', "&amp;");
        $config['per_page'] = 20; //so luong san pham hien thi tren 1 trang
        $config['num_links'] = $total_rows;

        $config = array_merge($config, $this->system_library->pagination());

        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(3);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);

        $list = $this->category->get_list($input);       
        
        foreach ($list as $row) {
            $where = array();
            $where = array('id' => $row->tournament_playing_category_id);
            $obj_tournament_playing_category = $this->tournament_playing_category_m->get_info_rule($where);
            
            $where = array();
            $where = array('id' => $obj_tournament_playing_category->tournament_id);
            $obj_tournament = $this->tournament_m->get_info_rule($where);
            
            $row->tournament = $obj_tournament->vn_name;
            
            $where = array();
            $where = array('id' => $obj_tournament->pid);
            $obj_tournament_type = $this->tournament_type_m->get_info_rule($where);
            
            $row->tournament_type = $obj_tournament_type->vn_name; 
            
            $where = array();
            $where = array('id' => $obj_tournament_playing_category->playing_category_id);
            $obj_playing_category = $this->playing_category_m->get_info_rule($where);
            
            $row->playing_category = $obj_playing_category->vn_name;
        }
        $this->data['list'] = $list;
        
        $input = array();
        $input['where'] = array('pid' => 0, 'status' => 1);
        $catalogs = $this->tournament_category_m->get_list($input);
        
        foreach ($catalogs as $row) {
            $input['where'] = array('pid' => $row->id, 'status' => 1);
            $subs = $this->tournament_category_m->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;

        $this->data['title'] = 'Danh sách vận động viên và lịch sử vòng loại';

        $this->data['temp'] = 'tournament/content_tournament_playing_category/index';
        $this->load->view('admin/main', $this->data);
    }
    
    public function detail($id = 0) {
        $this->load->model('tournament_type_m');
        $this->load->model('registration_m');
        $this->load->model('playing_in_m');
        $tournament_type = '';
        $tournament = '';
        $noi_dung = '';
        $round = '';
        
        $input = array();
        $input['where'] = array('status' => 1);
        $this->data['noi_dung'] = $this->playing_category_m->get_list($input);       
        
        $input = array();
        $input['where'] = array('pid' => 0, 'status' => 1);
        
        $input['order'][0] = 'position';
        $input['order'][1] = 'ASC';
        
        $catalogs = $this->tournament_type_m->get_list($input);
        $this->data['catalogs'] = $catalogs;
        
        if($id) {
            $info = $this->category->get_info($id);
            if(!empty($info)){
                $this->data['info'] = $info;
            }else{
                $this->session->set_flashdata('message', 'Dịch vụ muốn chỉnh sửa không tồn tại');
                redirect(base_url() . 'admincp/tournament/content_tournament_playing_category/index/');
            }
        }
        

        if ($this->input->post()) {  
            $id_noi_dung = $this->input->post('noi_dung', true);
            $where = array('tournament_playing_category_id' => $id_noi_dung);
            $obj_content_tournament_playing_category = $this->category->get_info_rule($where);
            $tournament_type = $this->input->post('tournament_type', true);
            $tournament = $this->input->post('tournament', true);
            $data = array(
                'tournament_type' => $tournament_type,
                'tournament' => $tournament,
                'tournament_playing_category_id' => $id_noi_dung,
                'van_dong_vien' => $this->input->post('van_dong_vien', true),
                'lich_thi_dau' => $this->input->post('lich_thi_dau', true),
            );
            if ($id > 0) {
                if ($this->category->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại');
                }
            }else {
                if(!$obj_content_tournament_playing_category) {
                    if ($this->category->create($data)) {
                        $this->session->set_flashdata('message', 'Thêm bài viết thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Thêm bài viết thất bại');
                    }
                }else {
                    $this->session->set_flashdata('message', 'Nội dung này không thể thêm hai lần');
                }
            }
      
            if ($id == 0) {
                redirect(base_url('admincp/tournament/content_tournament_playing_category?tournament_type='.$tournament_type.'&tournament=' . $tournament));
            } else {
                redirect(base_url() . 'admincp/tournament/content_tournament_playing_category');
            }

        }

        if($id){
            $this->data['title'] = 'Chỉnh sửa danh sách vận động viên cho nội dung';
        }else{
            $this->data['title'] = 'Thêm danh sách vận động viên cho nội dung';
        }

        $this->data['temp'] = 'tournament/content_tournament_playing_category/detail';
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
                if ($this->category->update($id, array('status' => 3))) {
                    $msg = 'Xóa sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 3));
                }
                break;

            case 'del_all':

                if ($this->category->update_rule($input, array('status' => 3))) {

                    $msg = 'Xóa thành công tất cả các sản phẩm có id (' . $array_id . ')';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 3));
                }

                break;
            case 'enable':
                if ($this->category->update($id, array('status' => 1))) {
                    $msg = 'Hiển thị sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 1));
                }

                break;
            case 'enable_all':

                if ($this->category->update_rule($input, array('status' => 1))) {

                    $msg = 'Hiển thị thành công tất cả các sản phẩm có id (' . $array_id . ')';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 1));
                }

                break;
            case 'disable':

                if ($this->category->update($id, array('status' => 2))) {
                    $msg = 'Ẩn sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 2));
                }

                break;

            case 'disable_all':

                if ($this->category->update_rule($input, array('status' => 2))) {

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
        
        $check_del = $this->category->get_list($where);
        
        if ($check_del) {

            if ($this->category->del_rule("status = 3")) {
                $this->session->set_flashdata('message', 'Dọn rác thành công');
            }
        } else {
            $this->session->set_flashdata('message', 'Không có gì trong thùng rác');
        }

        redirect(base_url('admincp/tournament/content_tournament_playing_category'));
    }

}
