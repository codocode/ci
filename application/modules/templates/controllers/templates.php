<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends MX_Controller
{

	function __construct() {
		parent::__construct();
	}

	function admin_panel($data = array())
	{

		$this->load->view('backend/admin_view', $data);
	}
}