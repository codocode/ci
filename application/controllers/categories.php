<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Categories extends My_Controller_User {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->model('categories_mdl','',TRUE);
        $data['result'] = $this->categories_mdl->get();
        $data['title'] = 'Frontend - Categories';

        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/categories/index', $data);
        $this->load->view('frontend/templates/footer', $data);
    }
    

}
