<?php 


if (!defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends MX_Controller
{

	function __construct() {
		parent::__construct();
	}

	function admin_panel2($data)
	{
		fn_print_die('OH YEAH!');
		//$this->load->view($view_file, $data);
	}
}