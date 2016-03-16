<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Categories extends My_Controller_Admin {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->model('categories_mdl','',TRUE);
        $data['result'] = $this->categories_mdl->get();
        $data['title'] = 'Admin - Categories';

/*      $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/categories/index', $data);
        $this->load->view('admin/templates/footer', $data);*/
        $this->my_view($data);
    }
    

}
