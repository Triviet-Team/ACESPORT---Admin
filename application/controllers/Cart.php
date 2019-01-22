<?php

Class Cart extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('cart');
    }

    /*
     * Phuoc thuc them san pham vao gio hang
     */

    function add() {
        //lay ra san pham muon them vao gio hang
        $this->load->model('product_m');
        $id = $this->input->post('id');
        $qty = $this->input->post('qty') == '' ? 1 : $this->input->post('qty');
        $product = $this->product_m->get_info($id);
        
        if ($product){
            $price = $product->sale_price > 0 ?  $product->sale_price :  $product->price;
            
            //thong tin them vao gio hang
            $data = array();
            $data['id'] = $product->id;
            $data['qty'] = $qty;
            //         $data['name'] = url_title($product->vn_name);
            $data['name'] = $product->vn_name;
            $data['vn_slug'] = $product->vn_slug;
            $data['image_link'] = $product->image_link;
            $data['price'] = $price;
            $success = $this->cart->insert($data);
            if($success){
                //$carts = $this->cart->contents(); 
                echo $total_items = $this->cart->total_items();
                //echo count($carts);
            }else {
                echo 0;
            }  
        }else {
            echo 0;
        }

    }

    /*
     * Hien thị ra danh sách sản phẩm trong gio hàng
     */

    function index() {
        
        $this->load->model('province_m');
        
        $input                      = array();
        //$input['order']             = array('position', 'ASC');
        $this->data['provinces']    = $this->province_m->get_list($input);
        
        
        //thong gio hang
        $carts = $this->cart->contents();
//         echo '<pre>';
//         print_r($carts);
//         echo '<pre>';
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();
        //echo $total = $this->cart->total();

        $this->data['carts'] = $carts;
        $this->data['total_items'] = $total_items;
        $this->data['total_mony'] = $this->cart->total();
        $breadcrumb[] = array(
            'url' => '#',
            'name' => 'Giỏ hàng',
        );

        $this->data['breadcrumb'] = $breadcrumb;

        $this->data['title_site'] = 'Giỏ hàng';

        $this->data['temp'] = 'cart/index';
        $this->one_col($this->data);
    }

    /*
     * Cập nhật giỏ hàng
     */

    function update() {
        //thong gio hang
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row) {
            //tong so luong san pham
            $total_qty = $this->input->post('qty_' . $row['id']);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }

        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }

    /*
     * Xoa sản phẩm trong gio hang
     */

    function del() {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        //trường hợp xóa 1 sản phẩm nào đó trong giỏ hàng
        if ($id > 0) {
            //thong gio hang
            $carts = $this->cart->contents();
            foreach ($carts as $key => $row) {
                if ($row['id'] == $id) {
                    //tong so luong san pham
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        } else {
            //xóa toàn bô giỏ hang
            $this->cart->destroy();
        }

        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }
    
    function my_cart() {
        //Show thong tin chi tiet gio hang
        $data=$this->cart->contents();
    }
    
  // hàm thực hiện ajax chọn địa chỉ tỉnh tp...  
    function address() {
        $this->load->model('province_m');
//         echo '<pre>';
//         print_r($_POST);
//         echo '<pre>';

//        if ($_POST['type'] == 'province'){
//            $input = array();
//            $input['order'] = array('position', 'ASC');
//            $province = $this->province_m->get_list($input);
//            echo province($province);
//        }

       
       if ($_POST['type'] == 'district'){
           $input = array();
           $this->db->where('province_id',  $_POST['province']);
           $query       = $this->db->get('district');
           $district    = $query->result();
           echo json_encode($district);
       }
       if ($_POST['type'] == 'ward'){
           //$this->load->model('ward_m');
            $input = array();
//            //$input['where'] = array('district_id', $_POST['district']);
            $this->db->where('district_id',  $_POST['district']);
            $query  = $this->db->get('ward');
//            $district = $this->ward_m->get_list($input);

           $district    = $query->result();

           echo json_encode($district);
       }       
    }
    
    function watch_cart($id = 0) {
        $result = array();
        //thong gio hang
        $carts = $this->cart->contents();
        if ($id > 0){
            foreach ($carts as $key => $row) {
                if ($row['id'] == $id) {
                    //tong so luong san pham
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        }
       $carts = $this->cart->contents();
        $result['number'] = $this->cart->total_items();;
        //tong tiền san pham co trong gio hang
        $total = $this->cart->total();
        //echo $total = $this->cart->total();
        
        if ($carts){
            //echo 'ok';
            $result['xhtml'] =  $this->watchCart($carts, $total);
            echo json_encode($result);
        }else {
            $result['number'] = '';
            $result['xhtml'] = '<h4>Không có sản phẩm nào trong giỏ hàng</h4>';
            echo json_encode($result);
        }
    
        
    }
    
    // ajax xem nhanh giỏ hàng
    public function watchCart($data, $total, $opption = null)
    {
        $xhtml = '';
        if($data){
            foreach ($data as $value){
                $link_img = base_url().'public/site/img/default-400x400.png';
                if(!empty($value['image_link'])){
                    $link_img = base_url().'uploads/images/product/400_400/'.$value['image_link'];
                }
                $price = $value['price'] > 0 ? '<b>'.number_format($value['price']).' đ</b> x <span>'.$value['qty'].'</span>' : 'Giá: Liên hệ';
                $xhtml .= '<div class="cart-form-box-product">
                                <div class="cart-form-box-product-img">
                                  <img src="'.$link_img.'" alt="">
                                </div>
    
                                <div class="cart-form-box-product-detail">
                                  <h5>
                                    <a href="'.base_url('chi-tiet-san-pham/') . $value['vn_slug'] .'.html">'.$value['name'].'</a>
                                  </h5>
    
                                  <h6>'.$price.'</h6>
    
                                  <a style="cursor: pointer" onclick="javascript:watchCart('.$value['id'].');">
                                    <i title="Xóa" class="fa fa-times" aria-hidden="true"></i>
                                  </a>
                                </div>
                              </div>';
            }
             
            $xhtml .= '<h4>TỔNG TIỀN: <span>'. ($total > 0 ? number_format($total) . ' đ' : 'Liên hệ') .' </span></h4>
    
                  <div class="cart-form-btn text-center">
                    <a href="'.base_url('cart').'">Vào giỏ hàng</a>
                  </div>';
        }
         
        return $xhtml;
    }
    

}







