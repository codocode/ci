<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Frontend_Controller {

    function __construct()
    {
        parent::__construct();
       
        $this->fn_is_logged_in('U');
        die('frontend - home');
    }

}
