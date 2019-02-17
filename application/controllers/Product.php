<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_m');
        
        $this->load->model('product_category_m');
        $this->load->model('province_m');
        $this->load->model('users_m');
    }

    public function index() {
        $slug = 'san-pham';
        $input = array();
        
        $input['where']['status'] = 1;

        if ($slug == 'san-pham') {
            $this->data['news'] = true;
        }               

        $total_rows = $this->product_m->get_total($input);
        //load ra thu vien phan trang
        $config = array();
        $config['total_rows'] = $total_rows;
        $config['base_url'] = base_url($slug . '/page/');
        $config['first_url'] = base_url($slug) .'.html';
        $config['per_page'] = 50;
        $config['num_links'] = 1;
        //custom pagination
        $config = array_merge($config, $this->system_library->pagination_site());
        //khoi tao cac cau hinh phan trang

        $this->pagination->initialize($config);
        $segment = $this->uri->segment(3);
        $segment = intval($segment);
        
        // truyền trang hiện tại trong tổng trang ra view
        $this->data['curent_page'] = ($config['per_page'] + $segment)/$config['per_page'];
        $this->data['total_page']  = ceil($total_rows / $config['per_page']);

        $this->data["pagination"] = $this->pagination->create_links();
        
        //sort
        if ($this->input->post()){
            $sort = $this->input->post('sort');
            $this->data["sort"] = $sort;
            switch ($sort){
                case 'price_asc':
                    $input['order'] = array('price', 'ASC');
                    break;
                case 'price_desc':
                    $input['order'] = array('price', 'DESC');
                    break;
                case 'name_asc':
                    $input['order'] = array('vn_name', 'ASC');
                    break;
                case 'name_desc':
                    $input['order'] = array('vn_name', 'DESC');
                    break;
                case 'created_asc':
                    $input['order'] = array('created', 'ASC');
                    break;
                case 'created_desc':
                    $input['order'] = array('created', 'DESC');
                    break;
            }
        }

        $input['limit'] = array($config['per_page'], $segment);
//         echo '<pre>';
//         print_r($input);
//         echo '<pre>';
        $this->data['list_product'] = $this->product_m->get_list($input);        

        $breadcrumb[] = array(
            'url' => "",
            'name' => 'Sản phẩm',
        );

        $this->data['breadcrumb'] = $breadcrumb;

        $this->data['title_site'] = 'Sản phẩm';
        $this->data['keyword_site'] = 'Sản phẩm';
        $this->data['description_site'] = 'Sản phẩm';

        $this->data['temp'] = 'product/index';
        $this->one_col($this->data);
    }
    
    public function category($slug = '') {
        $slug;
        $subPage = false;
        $where = array('status' => 1, 'vn_slug' => $slug);
        $category = $this->product_category_m->get_info_rule($where);
        $input = array();
        
        if ($category) {
            $this->data['category'] = $category;
           
            if ($category->pid == 0){
                $subcat     = $this->product_category_m->get_list(array('where'=>array('pid'=>$category->id)));               
                $id_cate    = array();

                foreach ($subcat as $row){
                    $id_cate[] = $row->id;                
                }
                
                if ($id_cate) {
                    $input['where']    = array('status' => 1);
                    $input['where_in'] = array('cid', $id_cate);

                    
                } else {
                    $input['where'] = array('status' => 1, 'cid' => $category->id);
                }
                
                $cate_slug = $category->vn_slug;
                
                $breadcrumb[] = array(
                    'url' => '',
                    'name' => $category->vn_name,
                );

            }else {
                $subPage        = true;
                $input['where'] = array('status' => 1, 'cid' => $category->id);
                $fatherCate     = $this->product_category_m->get_info($category->pid);
                $cate_slug      = $fatherCate->vn_slug;
                
                $breadcrumb[] = array(
                    'url' => base_url('danh-muc/') . $fatherCate->vn_slug . '.html' ,
                    'name' => $fatherCate->vn_name,
                );
                $breadcrumb[] = array(
                    'url' => '',
                    'name' => $category->vn_name,
                );
            }
             
    
            $total_rows = $this->product_m->get_total($input);
    
            //load ra thu vien phan trang
            $config = array();
            $config['total_rows'] = $total_rows;
            
             $this->data["total"] = $total_rows;
            
            if ($subPage){
                $config['base_url'] = base_url('danh-muc/' . $cate_slug . '/' . $slug .'/page/');
                $config['first_url'] = base_url('danh-muc/' . $cate_slug . '/' . $slug . '.html');
            }else {
                $config['base_url'] = base_url('danh-muc/' . $slug . '/page/');
                $config['first_url'] = base_url('danh-muc/' . $slug . '.html');
            }

            $config['per_page'] = 50;
            $config['num_links'] = 1;
            //custom pagination
            $config = array_merge($config, $this->system_library->pagination_site());
            //khoi tao cac cau hinh phan trang
            $this->pagination->initialize($config);
            if ($subPage){
                $segment = $this->uri->segment(5);
            }else {
                $segment = $this->uri->segment(4);
            }
            
             
            $segment = intval($segment);
            
           // truyền trang hiện tại trong tổng trang ra view
            $this->data['curent_page'] = ($config['per_page'] + $segment)/$config['per_page'];
            $this->data['total_page']  = ceil($total_rows / $config['per_page']);
    
            $this->data["pagination"] = $this->pagination->create_links();
            
            //sort
            if ($this->input->post()){
                $sort = $this->input->post('sort');
                $this->data["sort"] = $sort;
                switch ($sort){
                    case 'price_asc':
                        $input['order'] = array('price', 'ASC');
                        break;
                    case 'price_desc':
                        $input['order'] = array('price', 'DESC');
                        break;
                    case 'name_asc':
                        $input['order'] = array('vn_name', 'ASC');
                        break;
                    case 'name_desc':
                        $input['order'] = array('vn_name', 'DESC');
                        break;
                    case 'created_asc':
                        $input['order'] = array('created', 'ASC');
                        break;
                    case 'created_desc':
                        $input['order'] = array('created', 'DESC');
                        break;
                }
            }
    
            $input['limit'] = array($config['per_page'], $segment);
            
    
            $this->data['list_product'] = $this->product_m->get_list($input);
                       
    
            $this->data['breadcrumb'] = $breadcrumb;
    
            $this->data['title_site'] = $category->vn_title;
            $this->data['keyword_site'] = $category->vn_keyword;
            $this->data['description_site'] = $category->vn_description;
        }
    
    
        $this->data['temp'] = 'product/category';
        $this->one_col($this->data);
    }
    

    public function detail($slug = '') {

        $where = array(
            'status' => 1,
             'vn_slug' => $slug
        );

        $object = $this->product_m->get_info_rule($where);


        if ($object) {
            $input = array();
            $input['id'] = $object->cid;
            
            $category = $this->product_category_m->get_info_rule($input);
echo "<pre>";
print_r();
echo "</pre>";
            
            if ($category){


                $this->data['object'] = $object;
                
                //cap nhat lai luot xem cua san pham
                $data = array();
                $data['view'] = $object->view + 1;
                $this->product_m->update($object->id, $data);
                
                $breadcrumb = array(
                    array(
                        'url' => base_url('danh-muc/' . $category->vn_slug . '.html'),
                        'name' =>$category->vn_name,
                    ),
                    array(
                        'url' => '',
                        'name' => $object->vn_name,
                    )
                );
                $input_related['where'] = array(
                    'id <>' => $object->id,
                    'cid' => $object->cid,
                    'status' => 1
                );
                
                $input_related['limit'] = array(3, 0);
                
                $this->data['related'] = $this->product_m->get_list($input_related);                
                
                $this->data['breadcrumb'] = $breadcrumb;
                
                $this->data['title_site'] = $object->vn_title;
                $this->data['keyword_site'] = $object->vn_keyword;
                $this->data['description_site'] = $object->vn_description;
            }

        }

        $this->data['temp'] = 'product/detail';
        $this->one_col($this->data);
    }
    
    function search() {
    
        if ($this->uri->rsegment('3') == 1) {
            //lay du lieu tu autocomplete
            $key = $this->input->get('term');
        } else {
            $key = $this->input->get('search');
        }
        $this->data['key'] = trim($key);
        $input = array();
        if(!empty($key)){
            $input['like'] = array('vn_name', $key);
        }


    
//         $province_id = $this->input->get('province_id');
//         if ($province_id) {
//             $input['where'] = array('province_id' => $province_id);
//         }
        $cid = $this->input->get('cid');
        if ($cid) {
            $input_cate = array();
            $input_cate['where'] = array('id' => $cid);
            $infoCate = $this->product_category_m->get_info($cid);
            
            if($infoCate->pid == 0){
                $subcat     = $this->product_category_m->get_list(array('where'=>array('pid'=>$infoCate->id)));
                $id_cate    = array();
                
                foreach ($subcat as $row){
                    $id_cate[] = $row->id;
                }
                
                if ($id_cate) {
                    $input['where']    = array('status' => 1);
                    $input['where_in'] = array('cid', $id_cate);
                }
            } else {
                    $input['where'] = array('status' => 1, 'cid' => $infoCate->id);
                }
        }
        //sort
        if ($this->input->post()){
            $sort = $this->input->post('sort');
            $this->data["sort"] = $sort;
            switch ($sort){
                case 'price_asc':
                    $input['order'] = array('price', 'ASC');
                    break;
                case 'price_desc':
                    $input['order'] = array('price', 'DESC');
                    break;
                case 'name_asc':
                    $input['order'] = array('vn_name', 'ASC');
                    break;
                case 'name_desc':
                    $input['order'] = array('vn_name', 'DESC');
                    break;
                case 'created_asc':
                    $input['order'] = array('created', 'ASC');
                    break;
                case 'created_desc':
                    $input['order'] = array('created', 'DESC');
                    break;
            }
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
    // ajax xem nhanh một sản phẩm
    public function watch() {
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $data = $this->product_m->get_info($id);
        $xhtml = '';
        $xhtml1 = '';
        if(!empty($data)){
            $row            = $data;
            $xhtmlImageList = '';
            $link_img       = base_url().'public/site/img/default-400x400.png';
            if(!empty($row->image_link)){
                $link_img = base_url().'uploads/images/product/421_561/'.$row->image_link;
            }
            $prices = $row->sale_price > 0 ? '<span>'.number_format($row->price, 0, "", ".").' đ</span> '.number_format($row->sale_price, 0, "", ".").' đ' : ($row->price == 0 ? "Giá: Liên hệ" : number_format($row->price, 0, "", ".").' đ');
            $xhtml .= '<div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">Xem nhanh sản phẩm</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-lg-5">
                              <div class="modal-img">
                                <img class="xzoom main-image" src="'.$link_img.'" xoriginal="'.$link_img.'" />
                              </div>
                            </div>
                
                            <div class="col-lg-7">
                              <h2>'.$row->vn_name.'</h2>
                
                              <h4>'.$prices.'</h4>
                
                              <p>'.$row->vn_sapo.'</p>
                
                              Số lượng: <input type="number" id="qty-faster" value="1" min="1">
                              <a onclick="javascript:addtocart('.$row->id.', \''. "watch-faster" .'\');" class="cart-btn">thêm vào giỏ</a>
                                
                              <div class="modal-tag">
                                <p class="add-success">
                                  
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                          </div>
                        </div>
                        ';
        
        }
        echo $xhtml;
    }
    
    public function list_product() {
        //kiem tra co thuc hien loc du lieu hay khong
        $input = array();
        $input['where']['status'] = 1;
        if (isset($_POST['id'])){
            $id     = $_POST['id'];
            $limit  = $_POST['limit'];
            
            if ($id == 'sale_price'){
                $this->db->where('sale_price >', 0);
                
            }else if ($id == 'is_pay'){
                $this->db->where('is_pay', 1);
            
            }else{
                if ($id > 0){
                    $this->db->where('is_new', 1);
                    $this->db->where('cid', $id);
                }
            }
            
            $input['limit'] = array($limit, 0);
        } 
    
        $data = $this->product_m->get_list($input);
        if($data){
            echo $this->list_new($data);
        }
    }
    
    //ajax list item trang home
    
    public function list_new($data)
    {
        $xhtml = '';
         
        if(!empty($data)){
             
            $xhtml .= '';
             
            foreach ($data as $k => $row){
                $link_img = base_url().'public/site/img/default-534x534.png';
      			if(!empty($row->image_link)){
      			    $link_img = base_url().'uploads/images/product/421_561/'.$row->image_link;
      			}
      			$prices = $row->sale_price > 0 ? '<h4><span>'.number_format($row->price, 0, "", ".").' đ</span> '.number_format($row->sale_price, 0, "", ".").' đ</h4>' :'<h4>'.($row->price == 0 ? "Liên hệ" : number_format($row->price, 0, "", ".").' đ').'</h4>';
      			$sale   = $row->sale_price > 0 ? '<h5 class="ratio-sale">'.round((1 - $row->sale_price / $row->price)*100).'%</h5>' : '';
      			$new    = ($row->created + 30*24*60*60) > time() ? '<h5>new</h5>' : '';
      			$xhtml .= '<div class="swiper-slide">
                              <div class="box-product">
                                <div class="box-product-status">
                                    '.$sale.'
                                    '.$new.'
                                </div>
    
                                <div class="box-product-img">
                                  <div class="box-product-img-custom">
                                    <a data-toggle="modal" onclick="javascript:watch('.$row->id.')" data-target=".product-modal-1" title="Xem nhanh sản phẩm" href="#"><i class="mdi mdi-eye-plus"></i></a>
                                    <a class="cart-btn" onclick="javascript:addtocart('.$row->id.');" title="Thêm vào giỏ"><i class="mdi mdi-shopify"></i></a>
                                    <a title="Xem chi tiết" href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html"><i class="mdi mdi-link-variant"></i></a>
                                  </div>
                                  <img src="'.$link_img.'" alt="">
                                </div>
                                
                                <div class="box-product-detail text-center">
                                  <p><a title="'.$row->vn_name.'" href="'.base_url('chi-tiet-san-pham/').$row->vn_slug.'.html">'.$row->vn_name.'</a></p>
                                  '.$prices.'
                                </div>
                              </div>
                            </div>';
            }
  
    
        }
        return $xhtml;
    }
    
    
    
    
}
























