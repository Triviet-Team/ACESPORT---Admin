<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('product_m');
        $this->load->model('product_category_m', 'category');
    }

    public function index() {
        
//         $otherdb = $this->load->database('anotherdb', TRUE);
        
        //                 echo '<pre>';
        //                 print_r($otherdb);
        //                 echo '<pre>';
        
        
//         $query = $this->db->get('products');
//         $otherdb->query("SELECT * FROM `products`");
//         $query = $otherdb->query("SELECT * FROM `products` ORDER BY `id` ASC");
//         $data = $query->result();
//                         echo '<pre>';
//                         print_r($data);
//                         echo '<pre>';die();
        
//         $upload_path = 'uploads/images/product/';
//         $upload_soure = 'uploads/images/product/medium/';
//         foreach ($query->result() as $row)
//         {
        
//             if ($row->cid == 48){
                //$find    = '/uploads/images/';
        
                //$replace = base_url('cibeta2/uploads/ckeditor/images/');
        
                //$str =  $row->vn_detail;
        
                //$str = str_replace($find, $replace, $str);
        
//                 $data = array(
//                     'cid' => $row->cid,
//                     'vn_name' => $row->name,
//                     'vn_slug' => $row->slug,
//                     'vn_keyword' => $row->name,
//                     'vn_title' => $row->name,
//                     'vn_description' => $row->description,
//                     'vn_sapo' => $row->description,
//                     'vn_detail' => $row->details,
        
                    //                                                         'en_name' => $row->en_name,
                //                                                         'en_slug' => $row->slug,
                //                                                         'en_keyword' => $row->en_keyword,
                //                                                         'en_title' => $row->en_title_stite,
                //                                                         'en_description' => $row->en_description,
                //                                                         'en_sapo' => $row->en_sapo,
                //                                                         'en_detail' => $row->en_detail,
        
                //                                                         'cn_name' => '',
                //                                                         'cn_slug' =>'',
                //                                                         'cn_keyword' => '',
                //                                                         'cn_title' => '',
                //                                                         'cn_description' => '',
                //                                                         'cn_sapo' => '',
                //                                                         'cn_detail' => '',
        
//                     'image_link' =>$row->avatar,
//                     'image_list' =>'',
//                     'price' => $row->price,
//                     'code' =>  $row->code,
//                     'is_special' => '',
//                     'rate_total' =>'',
//                     'is_home' => '',
//                     'is_pay' => 1,
//                     'is_new' => 1,
//                     'is_hight' => 1,
//                     'status' =>1,
//                     'created' => now(),
//                 );
                //$this->product_m->create($data);
                //                             $this->image_m->update($row->A_ImageLarge, $data);
                //                        @unlink($upload_path . '350_350/' . $row->A_Image);
        
        
                //                                         $data = array(
                //                                             'image_link' => $row->avatar
                //                                         );
        
                //Xử lý hình ảnh của sản phẩm và sản phẩm kèm theo
//                 $path = $upload_soure . $row->avatar;
//                if(file_exists($path)){
//                     echo '</br>ok -' . $row->id;
//                     $this->system_library->resize_image('crop', $upload_soure . $row->avatar, $upload_path . '400_400/' . $row->avatar, 507, 676);
//                 }else {
//                   echo '</br>' . $row->avatar . '+' .  $row->id;
//                 }
        
        
                 
                //$this->product_m->update($row->slug, $data);
                // $this->product_m->update($row->id, $data);
        
                 
           // }
        
        //}//die();
        

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

        $cid = $this->input->get('cid');
        $cid = intval($cid);
        if ($cid > 0) {
            $input['where']['cid'] = $cid;
        }

        $trademark_id = $this->input->get('trademark_id');
        $trademark_id = intval($trademark_id);
        if ($trademark_id > 0) {
            $input['where']['trademark_id'] = $trademark_id;
        }

        $total_rows = $this->product_m->get_total($input);

        $this->data['total_rows'] = $total_rows;

        $getData = array('id' => $id, 'vn_name' => $vn_name, 'cid' => $cid);

        //load ra thu vien phan trang
        $config = array();
        $config['total_rows'] = $total_rows; //tong tat ca cac san pham tren website
        $config['base_url'] = base_url('admincp/product');
        $config['suffix'] = '?' . http_build_query($getData, '', "&amp;");
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($getData, '', "&amp;");
        $config['per_page'] = 5; //so luong san pham hien thi tren 1 trang
        $config['num_links'] = 2;

        $config = array_merge($config, $this->system_library->pagination());

        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(3);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);

        $this->data['list'] = $this->product_m->get_list($input);

        $input = array();
        $input['where'] = array('pid' => 0, 'status' => 1);
        $catalogs = $this->category->get_list($input);

        
        // echo '<pre>';
        // print_r($catalogs);

        foreach ($catalogs as $row) {
            $input['where'] = array('pid' => $row->id, 'status' => 1);
            $subs = $this->category->get_list($input);
            $row->subs = $subs;
        }
       
        $this->data['catalogs'] = $catalogs;

        $this->data['title'] = 'Danh sách dịch vụ';

        $this->data['temp'] = 'product/index';
        $this->load->view('admin/main', $this->data);
    }

    public function detail($id = 0) {
        
        $input = array();
        $input['where'] = array('pid' => 0, 'status' => 1);
        
        $input['order'][0] = 'position';
        $input['order'][1] = 'ASC';
        
        $catalogs = $this->category->get_list($input);
        foreach ($catalogs as $row) {
            $input['where'] = array('pid' => $row->id, 'status' => 1);
            $subs = $this->category->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;
        if($id){
            $info = $this->product_m->get_info($id);
            if(!empty($info)){
                $this->data['info'] = $info;
            }else{
                $this->session->set_flashdata('message', 'Dịch vụ muốn chỉnh sửa không tồn tại');
                redirect(base_url() . 'admincp/product/index/');
            }
        }

        if ($this->input->post()) {

            $this->form_validation->set_rules('vn_name', 'Tên sản phẩm', 'required');

            //$this->form_validation->set_rules('cid', 'Danh mục sản phẩm', 'required');

            if ($this->form_validation->run()) {

                #Tạo folder upload theo ngày truoc khi upload
                $upload_path = 'uploads/images/product/';

                $upload_data = $this->system_library->upload($upload_path, 'image_link');

                $image_link = '';

                //Xử lý hình ảnh của sản phẩm và sản phẩm kèm theo
                if ($upload_data != NULL && !isset($info->image_link)) {
                    $image_link = $upload_data;
                    $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '421_561/' . $image_link, 507, 676);
                    $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '400_400/' . $image_link, 800, 1067);
                    @unlink($upload_path . $image_link);
                } elseif ($upload_data != NULL && $info->image_link) {
                    $image_link = $upload_data;
                    @unlink($upload_path . '400_400/' . $info->image_link);
                    @unlink($upload_path . '421_561/' . $info->image_link);
                    $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '421_561/' . $image_link, 507, 676);
                    $this->system_library->resize_image('crop', $upload_path . $image_link, $upload_path . '400_400/' . $image_link, 800, 1067);
                    @unlink($upload_path . $image_link);
                } else {
                    $image_link = $info->image_link;
                }
                
                //upload cac anh kem theo
                $image_list = array();
                $image_list = $this->system_library->upload_file($upload_path, 'image_list');
                
                if ($image_list != NULL && !isset($info->image_list)) {
                
                    foreach ($image_list as $img) {
                        //$this->system_library->resize_image('crop', $upload_path . $img, $upload_path . '421_561/' . $img, 507, 676);
                        $this->system_library->resize_image('crop', $upload_path . $img, $upload_path . '400_400/' . $img, 800, 1067);
                
                        @unlink($upload_path . $img);
                    }
                
                    $image_list = json_encode($image_list);
                } elseif ($image_list != NULL && $info->image_list) {
                
                    $image = json_decode($info->image_list);
                    foreach ($image as $img) {
                        //@unlink($upload_path . '421_561/' . $img);
                        @unlink($upload_path . '400_400/' . $img);
                        @unlink($upload_path . $img);
                    }
                
                    foreach ($image_list as $img) {
                        //$this->system_library->resize_image('crop', $upload_path . $img, $upload_path . '421_561/' . $img, 507, 676);
                        $this->system_library->resize_image('crop', $upload_path . $img, $upload_path . '400_400/' . $img, 800, 1067);
                        @unlink($upload_path . $img);
                    }
                
                    $image_list = json_encode($image_list);
                } else {
                    $image_list = $info->image_list;
                }
                
                //Kết thúc xử lý hình ảnh
                $slug = $this->input->post('vn_slug', true);
                $i = 0;
                $dup = 1;
                while ($dup) {
                    $dup = $this->product_m->check_exists(array('id <>' => $id, 'vn_slug' => $slug . ($i ? '-' . $i : '')));
                    if ($dup)
                        $i++;
                }
                $slug .= $i ? '-' . $i : '';
                $cid = $this->input->post('cid', true);


                $price = $this->input->post('price');
                $price = str_replace(',', '', $price);
                
                $sale_price = $this->input->post('sale_price');
                $sale_price = str_replace(',', '', $sale_price);

                $data = array(
                    'cid' => $cid,
                    'vn_name' => $this->input->post('vn_name', true),
                    'vn_slug' => $slug,
                    'vn_keyword' => $this->input->post('vn_keyword', true),
                    'vn_title' => $this->input->post('vn_title', true),
                    'vn_description' => $this->input->post('vn_description', true),
                    'price' => $price,
                    'sale_price' => $sale_price,
                    'code' => $this->input->post('code', true),
                    'vn_sapo' => $this->input->post('vn_sapo', true),
                    'vn_detail' => $this->input->post('vn_detail', true),
                    'image_link' => $image_link,
                    'image_list' => $image_list,
                    'is_home' => $this->input->post('is_home', true),
                    'is_pay' => $this->input->post('is_pay', true),
                    'is_new' => $this->input->post('is_new', true),
                    //'is_like' => $this->input->post('is_like', true),
                    //'is_special' => $this->input->post('is_special', true),
                    'is_hight' => $this->input->post('is_hight', true),
                    'status' => $this->input->post('status', true),
                    'created' => now(),
                );

                if (!$id) {
                    if ($this->product_m->create($data)) {
                        $this->session->set_flashdata('message', 'Thêm sản phẩm thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Thêm sản phẩm thất bại');
                    }
                } else {
                    if ($this->product_m->update($id, $data)) {
                        $this->session->set_flashdata('message', 'Cập nhật sản phẩm thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Cập nhật sản phẩm thất bại');
                    }
                }

                if ($pid) {
                    redirect(base_url('admincp/product?id=&vn_name=&cid=' . $cid));
                } else {
                    redirect(base_url() . 'admincp/product/index/');
                }
            }
        }

        if($id){
            $this->data['title'] = 'Chỉnh sản phẩm';
        }else{
            $this->data['title'] = 'Thêm sản phẩm';
        }

        $this->data['temp'] = 'product/detail';
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
                if ($this->product_m->update($id, array('status' => 3))) {
                    $msg = 'Xóa sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 3));
                }
                break;

            case 'del_all':

                if ($this->product_m->update_rule($input, array('status' => 3))) {

                    $msg = 'Xóa thành công tất cả các sản phẩm có id (' . $array_id . ')';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 3));
                }

                break;
            case 'enable':
                if ($this->product_m->update($id, array('status' => 1))) {
                    $msg = 'Hiển thị sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 1));
                }

                break;
            case 'enable_all':

                if ($this->product_m->update_rule($input, array('status' => 1))) {

                    $msg = 'Hiển thị thành công tất cả các sản phẩm có id (' . $array_id . ')';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 1));
                }

                break;
            case 'disable':

                if ($this->product_m->update($id, array('status' => 2))) {
                    $msg = 'Ẩn sản phẩm thành công';
                    echo json_encode(array('msg' => $msg, 'success' => true, 'status' => 2));
                }

                break;

            case 'disable_all':

                if ($this->product_m->update_rule($input, array('status' => 2))) {

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
        $check_del = $this->product_m->get_list($where);

        if ($check_del) {

            if ($this->product_m->del_rule("status = 3")) {
                $this->session->set_flashdata('message', 'Dọn rác thành công');
            }
        } else {
            $this->session->set_flashdata('message', 'Không có gì trong thùng rác');
        }

        redirect(base_url('admincp/product'));
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
    
        $list = $this->product_m->get_list($input);
        $this->data['list_product'] = $list;
    
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
            $this->data['temp'] = 'product/search';
            $this->one_col($this->data);
        }
    }
    
    
    

}
