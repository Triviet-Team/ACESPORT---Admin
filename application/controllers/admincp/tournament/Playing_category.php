<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Playing_category extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('playing_category_m');
    }

    public function index() {

        //kiem tra co thuc hien loc du lieu hay khong
        $input = array();
        $id = $this->input->get('id');
        $id = intval($id);
        if ($id > 0) {
            $input['where']['id'] = $id;
        }
        $vn_name = $this->input->get('vn_name');
        if ($vn_name) {
            $input['where']['vn_name'] = $vn_name;
        }

        $total_rows = $this->playing_category_m->get_total($input);

        $this->data['total_rows'] = $total_rows;

        $getData = array('id' => $id, 'vn_name' => $vn_name, 'cid' => $cid);

        //load ra thu vien phan trang
        $config = array();
        $config['total_rows'] = $total_rows; //tong tat ca cac san pham tren website
        $config['base_url'] = base_url('admincp/tournament/playing_category');
        $config['suffix'] = '?' . http_build_query($getData, '', "&amp;");
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($getData, '', "&amp;");
        $config['per_page'] = 20; //so luong san pham hien thi tren 1 trang
        $config['num_links'] = 2;

        $config = array_merge($config, $this->system_library->pagination());

        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);

        $this->data['list'] = $this->playing_category_m->get_list($input);

        $this->data['title'] = 'Danh sách nội dung giải đấu';

        $this->data['temp'] = 'tournament/playing_category/index';
        $this->load->view('admin/main', $this->data);
    }

    public function detail($id = 0) {   

        if($id){
            $info = $this->playing_category_m->get_info($id);
            if(!empty($info)){
                $this->data['info'] = $info;
            }else{
                $this->session->set_flashdata('message', 'Dịch vụ muốn chỉnh sửa không tồn tại');
                redirect(base_url() . 'admincp/tournament/playing_category/index/');
            }
        }

        if ($this->input->post()) {

            $this->form_validation->set_rules('vn_name', 'Tên sản phẩm', 'required');

            //$this->form_validation->set_rules('cid', 'Danh mục sản phẩm', 'required');

            if ($this->form_validation->run()) {

//                 #Tạo folder upload theo ngày truoc khi upload
//                 $upload_path = 'uploads/images/product/';

//                 $upload_data = $this->system_library->upload($upload_path, 'image_link');

//                 $image_link = '';

//                 //Xử lý hình ảnh của sản phẩm và sản phẩm kèm theo
//                 if ($upload_data != NULL && !isset($info->image_link)) {
//                     $image_link = $upload_data;
//                     $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '421_561/' . $image_link, 507, 676);
//                     $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '400_400/' . $image_link, 800, 1067);
//                     @unlink($upload_path . $image_link);
//                 } elseif ($upload_data != NULL && $info->image_link) {
//                     $image_link = $upload_data;
//                     @unlink($upload_path . '400_400/' . $info->image_link);
//                     @unlink($upload_path . '421_561/' . $info->image_link);
//                     $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '421_561/' . $image_link, 507, 676);
//                     $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '400_400/' . $image_link, 800, 1067);
//                     @unlink($upload_path . $image_link);
//                 } else {
//                     $image_link = $info->image_link;
//                 }
                
//                 //upload cac anh kem theo
//                 $image_list = array();
//                 $image_list = $this->system_library->upload_file($upload_path, 'image_list');
                
//                 if ($image_list != NULL && !isset($info->image_list)) {
                
//                     foreach ($image_list as $img) {
//                         //$this->system_library->resize_image('crop', $upload_path . $img, $upload_path . '421_561/' . $img, 507, 676);
//                         $this->system_library->resize_image('crop', $upload_path . $img, $upload_path . '400_400/' . $img, 800, 1067);
                
//                         @unlink($upload_path . $img);
//                     }
                
//                     $image_list = json_encode($image_list);
//                 } elseif ($image_list != NULL && $info->image_list) {
                
//                     $image = json_decode($info->image_list);
//                     foreach ($image as $img) {
//                         //@unlink($upload_path . '421_561/' . $img);
//                         @unlink($upload_path . '400_400/' . $img);
//                         @unlink($upload_path . $img);
//                     }
                
//                     foreach ($image_list as $img) {
//                         //$this->system_library->resize_image('crop', $upload_path . $img, $upload_path . '421_561/' . $img, 507, 676);
//                         $this->system_library->resize_image('crop', $upload_path . $img, $upload_path . '400_400/' . $img, 800, 1067);
//                         @unlink($upload_path . $img);
//                     }
                
//                     $image_list = json_encode($image_list);
//                 } else {
//                     $image_list = $info->image_list;
//                 }
                
                //Kết thúc xử lý hình ảnh
                $slug = $this->input->post('vn_slug', true);
                $i = 0;
                $dup = 1;
                while ($dup) {
                    $dup = $this->playing_category_m->check_exists(array('id <>' => $id, 'vn_slug' => $slug . ($i ? '-' . $i : '')));
                    if ($dup)
                        $i++;
                }
                $slug .= $i ? '-' . $i : '';
//                 $cid = $this->input->post('cid', true);


//                 $price = $this->input->post('price');
//                 $price = str_replace(',', '', $price);
                
//                 $sale_price = $this->input->post('sale_price');
//                 $sale_price = str_replace(',', '', $sale_price);

                $data = array(
                    //'cid' => $cid,
                    'vn_name' => $this->input->post('vn_name', true),
                    'vn_slug' => $slug,
                    'vn_keyword' => $this->input->post('vn_keyword', true),
                    'vn_title' => $this->input->post('vn_title', true),
                    'vn_description' => $this->input->post('vn_description', true),
                    //'price' => $price,
                    //'sale_price' => $sale_price,
                    //'code' => $this->input->post('code', true),
                    'vn_sapo' => $this->input->post('vn_sapo', true),
                    'vn_detail' => $this->input->post('vn_detail', true),
                    //'image_link' => $image_link,
                   // 'image_list' => $image_list,
                    //'is_home' => $this->input->post('is_home', true),
                    //'is_pay' => $this->input->post('is_pay', true),
                    //'is_new' => $this->input->post('is_new', true),
                    //'is_like' => $this->input->post('is_like', true),
                    //'is_special' => $this->input->post('is_special', true),
                    //'is_hight' => $this->input->post('is_hight', true),
                    'status' => $this->input->post('status', true),
                    'created' => now(),
                );

                if (!$id) {
                    if ($this->playing_category_m->create($data)) {
                        $this->session->set_flashdata('message', 'Thêm sản phẩm thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Thêm sản phẩm thất bại');
                    }
                } else {
                    if ($this->playing_category_m->update($id, $data)) {
                        $this->session->set_flashdata('message', 'Cập nhật sản phẩm thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Cập nhật sản phẩm thất bại');
                    }
                }

                if ($pid) {
                    redirect(base_url('admincp/tournament/playing_category?id=&vn_name=&cid=' . $cid));
                } else {
                    redirect(base_url() . 'admincp/tournament/playing_category/index/');
                }
            }
        }

        if($id){
            $this->data['title'] = 'Chỉnh nội dung giải đấu';
        }else{
            $this->data['title'] = 'Thêm nội dung giải đấu';
        }

        $this->data['temp'] = 'tournament/playing_category/detail';
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
                if ($this->playing_category_m->update($id, array('status' => 3))) {
                    $msg = 'Xóa sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 3));
                }
                break;

            case 'del_all':

                if ($this->playing_category_m->update_rule($input, array('status' => 3))) {

                    $msg = 'Xóa thành công tất cả các sản phẩm có id (' . $array_id . ')';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 3));
                }

                break;
            case 'enable':
                if ($this->playing_category_m->update($id, array('status' => 1))) {
                    $msg = 'Hiển thị sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 1));
                }

                break;
            case 'enable_all':

                if ($this->playing_category_m->update_rule($input, array('status' => 1))) {

                    $msg = 'Hiển thị thành công tất cả các sản phẩm có id (' . $array_id . ')';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 1));
                }

                break;
            case 'disable':

                if ($this->playing_category_m->update($id, array('status' => 2))) {
                    $msg = 'Ẩn sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 2));
                }

                break;

            case 'disable_all':

                if ($this->playing_category_m->update_rule($input, array('status' => 2))) {

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
        $check_del = $this->playing_category_m->get_list($where);

        if ($check_del) {

            if ($this->playing_category_m->del_rule("status = 3")) {
                $this->session->set_flashdata('message', 'Dọn rác thành công');
            }
        } else {
            $this->session->set_flashdata('message', 'Không có gì trong thùng rác');
        }

        redirect(base_url('admincp/tournament/playing_category'));
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
    
        $list = $this->playing_category_m->get_list($input);
        $this->data['list_tournament/playing_category'] = $list;
    
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
            $this->data['temp'] = 'tournament/playing_category/search';
            $this->one_col($this->data);
        }
    }
    
    
    

}
