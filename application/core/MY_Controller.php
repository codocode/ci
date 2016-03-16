<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI



class My_Controller_Common extends CI_Controller {
    public $model_name; // HMVC

    function __construct() {

        parent::__construct();

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
            && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {
            define('IS_AJAX', 1);
        }

        define('IS_TEMPLATE', 1);

        

    }

    protected function fn_is_logged_in($user_type = '')
    {
    
        $r_login_page = $user_type == 'A' ? 'admin/login' : 'admin/login';
        $r_home_page = $user_type == 'A' ? 'admin/home' : 'home';

        if ($this->router->fetch_class() == 'login') { // class = controller

            if ($this->session->userdata('logged_in')) {

                if ($this->router->fetch_method() != 'logout') { 

                    redirect($r_home_page, 'refresh');
                    exit;

                }
                
            }

        } else {

            if (!$this->session->userdata('logged_in')) {

               //If no session, redirect to login page
                redirect($r_login_page, 'refresh');
                exit;

            } else {

                $this->fn_check_user_type($user_type);

            }

        }
    }

    function fn_check_user_type($user_type = '')
    {
        //$this->session->sess_destroy();
        $user_data = $this->session->userdata('logged_in');
        //var_dump($user_data); exit;
        if (empty($user_data['user_type']) || empty($user_type) || $user_type != $user_data['user_type']) {

            echo '<h1> Access Denied or not found 404</h1>';
            show_404();
            //exit;
        }
    }

    function fn_logout()
    {
        $this->session->unset_userdata('logged_in');
        //session_destroy();
        //$this->session->sess_destroy();
        redirect('home', 'refresh');
        exit;
    }
/*
    protected $view_area = 'frontend';

    function my_view($data = array())
    {

        if (empty($data['view_file'])) {
            $cur_class = $this->router->fetch_class();
            $cur_method = $this->router->fetch_method();
            $data['view_file'] = $cur_class.'/'.$cur_method;
        }

        $data['view_file'] = $this->view_area.'/'.$data['view_file'];

        // variable
        $data['title'] = !empty($data['title']) ? $data['title'] : 'No Title';

        if ($this->view_area == 'A') {
            return $this->load->view($this->view_area.'/templates/admin', $data);
        }

        return $this->load->view($this->view_area.'/templates/public', $data);
    }
*/
    function __destruct()
    {
       /* var_dump($_SESSION);
        var_dump(time());*/
   
        /*

        $cookie_value = "John Doe";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        */
    }
}

class My_Controller_Admin extends My_Controller_Common {

    function __construct() {

        parent::__construct();

        $this->fn_is_logged_in('A');

        //$this->view_area = 'admin';
        define('APP_AREA', 'A');
    }

}

class My_Controller_User extends My_Controller_Common {

    function __construct() {

        parent::__construct();

        $this->fn_is_logged_in('U');

        //$this->view_area = 'frontend';
        define('APP_AREA', 'U');
    }

}

// Public = No Log in
class My_Controller_Public extends My_Controller_Common {

    function __construct() {

        parent::__construct();

        //$this->fn_is_logged_in('U');

        //$this->view_area = 'frontend';
        define('APP_AREA', 'U');
    }

}