<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Page extends My_Controller_Admin {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        echo '<h1>This is a page</h1>';
    }

    function name()
    {

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        echo '<h1>My name is '.$data['username'].'</h1>';
    }
}
