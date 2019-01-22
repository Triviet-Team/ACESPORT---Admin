<?php

Class Order extends MY_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->library('cart');
        $this->load->helper('security');
    }

    public function index() {
        
        $breadcrumb[] = array(
            'url' => base_url(),
            'name' => 'Notification',
        );

        $this->data['breadcrumb'] = $breadcrumb;


        $this->data['temp'] = 'cart/success';
        $this->one_col($this->data);
    }

    function checkout() {
      
        
        $this->load->model('province_m');
        
        //$input['order']             = array('position', 'ASC');
        $this->data['provinces']    = $this->province_m->get_list();
        

//         echo '<pre>';
//         print_r($_POST);
//         echo '<pre>';die();
        //thong gio hang
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();

        if ($total_items <= 0) {
            redirect(base_url());
        }
        //tong so tien can thanh toan
        $total_amount = 0;
        foreach ($carts as $row) {
            $total_amount = $total_amount + $row['subtotal'];
        }
        $this->data['total_amount'] = $total_amount;
        
//         echo '<pre>';
//         print_r($_POST);
//         echo '<pre>';die();

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            //nhập liệu chính xác
                $qtys           = array();
                $names          = array();
                $images         = array();
                $products_id    = array();
                $prices         = array();
                $vn_slug         = array();

                foreach ($carts as $row) {
                    $qtys[]         = $row['qty'];
                    $names[]        = $row['name'];
                    $images[]       = $row['image_link'];
                    $vn_slug[]       = $row['vn_slug'];
                    $products_id[]  = $row['id'];
                    $prices[]       = $row['price'];
                }
                
                
                $province = $this->input->post('province');
                $province = $this->getNameAddress($province);
                $district = $this->input->post('district');
                $district = $this->getNameAddress($district, 'district');                
                $ward = $this->input->post('ward');
                $ward = $this->getNameAddress($ward, 'ward');

                $address = $this->input->post('user_address'). ', ' . $ward . ', ' . $district . ', ' . $province;
                
                //them vao csdldie
                $data = array(
                    'code' => $this->system_library->rand_string(8),
                    'status' => 2, //trang thai chua thanh toan
                    'user_id' => $this->session->userdata('user_id') ? $this->session->userdata('user_id') : 0,
                    'user_email' => $this->input->post('user_email'),
                    'user_name' => $this->input->post('user_name'),
                    'user_phone' => $this->input->post('user_phone'),
                    'receivingdate' => $this->input->post('receivingdate'),
                    'modeofpayment' => $this->input->post('modeofpayment'),
                    'methodofreceive' => $this->input->post('methodofreceive'),
                    'user_address' => $address,
                    'vn_names' => json_encode($names),
                    'products_id' => json_encode($products_id),
                    'qtys' => json_encode($qtys),
                    'prices' => json_encode($prices),
                    'link_images' => json_encode($images),
                    'vn_slugs' => json_encode($vn_slug),
                    'message' => $this->input->post('message'),
                    'created' => now(),
                );

                //them du lieu vao bang transaction
                $this->load->model('transaction_m');
                $this->transaction_m->create($data);
                $transaction_id = $this->db->insert_id();  //lấy ra id của giao dịch vừa thêm vào
//                 //xóa toàn bô giỏ hang
                 $this->cart->destroy();

                 $this->session->set_flashdata('message', 'Đặt hàng thành công');

                 redirect(base_url('order'));
        }

        //thong gio hang
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();

        $this->data['carts'] = $carts;
        $this->data['total_items'] = $total_items;

        $breadcrumb[] = array(
            'url' => base_url(),
            'name' => 'Giỏ hàng',
        );

        $this->data['breadcrumb'] = $breadcrumb;

        $this->data['temp'] = 'cart/index';
        
        $this->one_col($this->data);
    }
    
    public function check_address($str){
        
        if ($str == 0){
            $this->form_validation->set_message(__FUNCTION__, "%s không được trống");
            return false;
        }else {
            return true;
        }

    }
    
    public function getNameAddress($id = 0, $type = 'province'){
        $query = '';
        $this->db->select('name');
        
        if($type == 'province'){
           $this->db->where('id', $id);
           $query =  $this->db->get('province');
        }
        
        if($type == 'district'){
            $this->db->where('id', $id);
            $query =  $this->db->get('district');
        }
        
        if($type == 'ward'){
            $this->db->where('id', $id);
            $query =  $this->db->get('ward');
        }
        
        if ($query->row()){
            return $query->row()->name;
        }else {
            return false;
        }
        
        
    }

}
