<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI



class My_Controller extends MX_Controller {
    public $model_name; // HMVC

    function __construct() {

        parent::__construct();

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
            && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {
            define('IS_AJAX', 1);
        }

        //define('IS_TEMPLATE', 1);
//         $this->load->library('My_image');
// $src = 'J:/www/git/ci/Lighthouse.jpg';
//         $this->my_image->saveImage('J:/www/git/ci', 'timestamp', 'png', $src, 50, 50, '#ffffff');

        //$this->fn_logout();
    }

    protected function fn_is_logged_in($user_type = '')
    {
    
        if ($user_type == 'A') {

            $auth_controller = 'backend_auth';
            $r_login_page = 'admin/login';
            $r_home_page = 'admin/home';

        } else {

            $auth_controller = 'auth';
            $r_login_page = 'login';
            $r_home_page = 'home';

        }
        

        if ($this->router->fetch_class() == 'backend_auth') { // class = controller

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
        redirect('admin', 'refresh');
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

class Backend_Controller extends My_Controller {

    function __construct() {

        if (!defined('APP_AREA') || APP_AREA != 'A') { 
            die('Backend Controller - Invalid Area');
        }

        parent::__construct();

       $this->fn_is_logged_in('A');

        

        //$this->view_area = 'admin';
/*        if (!defined('APP_AREA')) { 
            define('APP_AREA', 'A');
        }*/
    }

}

class Frontend_Controller extends My_Controller {

    function __construct() {

        if (!defined('APP_AREA') || APP_AREA != 'U') { 
            die('Frontend Controller - Invalid Area');
        }

        parent::__construct();

        //$this->fn_is_logged_in('U');

        //$this->view_area = 'frontend';
/*        if (!defined('APP_AREA')) { 
            define('APP_AREA', 'U');
        }*/
    }

}
