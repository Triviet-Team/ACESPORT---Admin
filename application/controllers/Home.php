<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    public function __construct(){
        parent::__construct();
        //$this->load->model('product_m');
        //$this->load->model('product_category_m');
    }
    public function index() {
//         $str = array('Đèn học chống cận thị cao cấp pixar - Đèn học chống cận thị');
        
//         $js = json_encode($str);
//         // Danh sách slider
//         $where = array();
//         $this->load->model('ads_m');
//         $where['where'] = array('status' => 1, 'cid' => 1);
//         $this->data['slider_top'] = $this->ads_m->get_list($where);
        
//         //danh sách các sản phẩm tại trang chủ
//         $input =  array();
//         $input['where'] = array('status' => 1, 'pid' => 0);   
//         $input['order'] = array('position', 'DESC');

//         $listProCate     = $this->product_category_m->get_list($input);
        
//         foreach ($listProCate as $row){
//             $input =  array();
//             $input['where'] = array('status' => 1, 'pid' => $row->id);
//             $input['order'] = array('position', 'DESC');
//             $subCate        = $this->product_category_m->get_list($input);
//             $numberPro      = 0;
//             foreach ($subCate as $k => $row_sub){
//                 $input          =  array();
//                 $input['where'] = array('status' => 1, 'cid' => $row_sub->id);
//                 $product = $this->product_m->get_list($input);
//                 $numberPro = $numberPro + count($product);
//                 if ($k == 0){
//                     $input['limit'] = array(8, 0);
//                     $row_sub->products = $this->product_m->get_list($input);
//                 }   
//             }
//             $row->categorys  = $subCate;
//             $row->numberCate = count($subCate);
//             $row->numberPro  = $numberPro;
//         }
        
// //         echo '<pre>';
// //         print_r($listProCate);
// //         echo '<pre>';die();
        
//         $this->data['listProCate'] = $listProCate;
//         //danh sách các sản phẩm bán chạy, mới, khuyến mãi
//         $totalSP = null;
//         $arrIs   = array('is_new', 'is_pay', 'is_sale');
        
//         foreach ($arrIs as $key => $value){
//             $input =  array();
//             if ($key == 1){
//                 $input['where'] = array('status' => 1, $value => 1);
//             }elseif ($key == 2){
//                 $input['where'] = array('sale_price >' => 0);
//             }
//             $input['limit'] = array(8, 0);
//             $totalSP[$value] = $this->product_m->get_list($input);
//         }
        
//         $this->data['totalSP'] = $totalSP;

//         $input =  array();
//         $input['where'] = array('status' => 1, 'is_new' => 1);
//         $input['limit'] = array(8, 0);
        
//         $dataItem = $this->product_m->get_list($input);
        
//         $this->data['list_product'] = $dataItem;
        
        
        
        
//          //giới thiệu tại trang chủ
//         $this->load->model('staticpage_m');
        
//         $where = array(
//             'id' => 1,
//             'status' => 1,
//         );
        
//        $this->data['aboutHome'] = $this->staticpage_m->get_info_rule($where);
        

        $this->data['temp'] = 'home/index';
        $this->one_col($this->data);
    }

  

}