<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_home extends Backend_Controller {

	function __construct()
	{
		parent::__construct();
       

	}

	function index()
	{
		$this->home();
		
	}

	function home()
	{

        $data = array();
        $data['title'] = 'Home Page';
        $data['module'] = 'home';
        $data['view_file'] = 'backend/home_view';
		//$this->load->view('backend/home_view', $data);
        echo Modules::run('templates/admin_panel', $data);
	}

}
