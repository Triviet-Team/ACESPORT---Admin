<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends MY_Controller {

    public function index() {

        header('Content-Type: text/xml; charset=utf-8');


        $this->load->model('articles_m');

        $input['where'] = array('status' => 1);

        $this->data['articles'] = $this->articles_m->get_list($input);
        
        $this->output->_display($this->load->view('site/sitemap/index', $this->data, true));
    }

}
