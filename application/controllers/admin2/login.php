<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends My_Controller_Admin {

	function __construct()
	{
		parent::__construct();
            // ATTEMPT -  create session attemp if not exists
        define('ATTEMPT_FLAG', 1);
        define('ATTEMPT_LIMIT_NO', 4);
        define('ATTEMPT_TIME_LOCK', 60); // 3 mins
        define('ATTEMPT_LOCK_MESSAGE', 'Sorry your account has been locked out, please contact the administrator'); // access denied for 30 seconds

	}

	function index()
	{
		
		$data = $this->remember_me_data(); //optional

		$this->load->helper(array('form'));

        //$data['template'] = 'public';
		$this->load->view('login/login_view', $data); //change
        /*$data['view_file'] = 'login/login_view';
        $this->my_view($data);*/
	}

	function submit()
    {
        

    	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('user_log_in') == 'Login') {
    		

	        //This method will have the credentials validation
	        $this->load->library('form_validation');

	        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

	        if ($this->form_validation->run() == FALSE) {

	            //Field validation failed.  User redirected to login page
	            $this->load->view('login/login_view');  //change

	        } else {

                
                $this->remember_me_set();

	            //Go to private area
                $user_data = $this->session->userdata('logged_in');

                redirect('admin/home', 'refresh'); //change

	        }

    	} else {

    		$this->index();

    	}

    }
    


    function check_database($password)
    {
		

        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        if ($this->user_attempt_check($username) === false) {
            $this->form_validation->set_message('check_database', ATTEMPT_LOCK_MESSAGE);
            return false;
        }  //optional2


        $this->load->model('user','',TRUE);

        //query the database
        $result = $this->user->login($username, $password, 'A');

        if ($result) {

            $sess_array = array();

            foreach ($result as $row) { //TODO

                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'user_type' => $row->user_type
                );

                $this->session->set_userdata('logged_in', $sess_array);
            }

            $this->user_attempt_clear($username); //optional2

            return TRUE;

        } else {

            $this->user_attempt_update($username); //optional2

            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;

        }
    }


    function logout()
    {
        $this->fn_logout();
    }





    /* USER ATTEMPT */
    function user_attempt_check($username)
    {
        if (ATTEMPT_FLAG !== 1) {
            return true;
        }

        $user_attempt = 0;

        if (!isset($_SESSION['attempt'])) {
            $_SESSION['attempt'] = array();

        } elseif (isset($_SESSION['attempt'][$username])) { // check if user is exists on attempt

            $user_attempt = isset($_SESSION['attempt'][$username]['attempt_no']) ? $_SESSION['attempt'][$username]['attempt_no'] : 0;

            if ($user_attempt >= ATTEMPT_LIMIT_NO) {

                $attempt_time = !empty($_SESSION['attempt'][$username]['attempt_time']) ? $_SESSION['attempt'][$username]['attempt_time'] : 0;

                if ($attempt_time > 0 && time() > $attempt_time) {

                    $user_attempt = 0;

                } else {

                    //$this->form_validation->set_message('check_database', ATTEMPT_LOCK_MESSAGE);
                    return false;

                }
                
            }

        }
        $_SESSION['attempt'][$username]['attempt_time'] = $user_attempt;
        return true;
    }

    function user_attempt_clear($username)
    {
        if (ATTEMPT_FLAG !== 1) {
            return false;
        }

        if (isset($_SESSION['attempt'][$username]['attempt_no'])) {
            $_SESSION['attempt'][$username]['attempt_no'] = 0;

        }
        return true;
    }

    function user_attempt_update($username = '')
    {
        // ATTEMPT -  add attemp if user has no data yet else check validate if attempt no is greater than to maximum limit of attempt else plus one attempt to the user
        if (ATTEMPT_FLAG !== 1) {
            return false;
        }

        $user_attempt = isset($_SESSION['attempt'][$username]['attempt_no']) ? $_SESSION['attempt'][$username]['attempt_no'] : 0;

        if (!isset($_SESSION['attempt'][$username])) {

            $_SESSION['attempt'][$username] = array();
            $_SESSION['attempt'][$username]['attempt_no'] = 1;

        } else {

            $_SESSION['attempt'][$username]['attempt_no'] =  ++$user_attempt;

            if ($user_attempt == 3) {
                $_SESSION['attempt'][$username]['attempt_time'] = time()+ATTEMPT_TIME_LOCK;
            }

        }
        return true;
        // end
    }

    /* REMEMBER ME - helper */
    function remember_me_data()
    {
        $this->load->helper('cookie');
        $data = array();

        $remember_me = $this->input->cookie('remember_me', true);

        if ($remember_me !== false) {

            $uname = $this->input->cookie('uname', true);
            $upass = $this->input->cookie('upass', true);

            $data['remember_me'] = $remember_me;
            $data['uname'] = $uname;
            $data['upass'] = $upass;
        }
        return $data;
    }

    function remember_me_set()
    {
        if(!empty($_POST['remember_me'])) {

            $cookie_time = 300;
            
            $cookie = array(
                'name' => 'remember_me',
                'value' => 1, //secret_key
                'expire' => $cookie_time
            );
            $this->input->set_cookie($cookie);
            
            $cookie = array(
                'name' => 'uname',
                'value' => $_POST['username'], // add encrypt
                'expire' => $cookie_time
            );
            $this->input->set_cookie($cookie);
            
            $cookie = array(
                'name' => 'upass',
                'value' => $_POST['password'], //encrypt
                'expire' => $cookie_time
            );
            $this->input->set_cookie($cookie);
            /*
            setcookie("remember_me", "1", time()+3600, "/", "", 0);
            //add encrypt login details
            setcookie("uname", $_POST['username'] , time()+3600, "/", "", 0);
            setcookie("upass",  $_POST['password'], time()+3600, "/", "", 0);
            */
        } elseif ($this->input->cookie('remember_me') == 1) {

            $cookie_time = -300;
            
            $cookie = array(
                'name' => 'remember_me',
                'value' => '', //secret_key
                'expire' => $cookie_time
            );
            $this->input->set_cookie($cookie);
            
            $cookie = array(
                'name' => 'uname',
                'value' => '', 
                'expire' => $cookie_time
            );
            $this->input->set_cookie($cookie);
            
            $cookie = array(
                'name' => 'upass',
                'value' => '', 
                'expire' => $cookie_time
            );
            $this->input->set_cookie($cookie);
            /*
             setcookie("remember_me", "1", time()-3600, "/", "", 0);
            setcookie("uname",'' , time()-3600, "/", "", 0);
            setcookie("upass",'', time()-3600, "/", "", 0);
            */
        }
    }
}