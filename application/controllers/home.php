<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends My_Controller_User {

    function __construct()
    {
        parent::__construct();

    }

    function index()
    {

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        $data['template'] = 'public';
        $this->load->view('home_view', $data);
        //$data['controller'] = 'home';
        //$data['view_file'] = 'home_view';
        //$this->load->view('frontend/templates/public', $data);
        //$this->my_view($data);
    }
    
    function logout()
    {
        $this->fn_logout();
    }

}
