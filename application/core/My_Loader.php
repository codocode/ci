<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

require_once(APPPATH.'third_party/smarty/smarty.php');

/*
class CI_Smarty extends Smarty {
 
    function __construct()
    {
        parent::__construct();
        //$this->setTemplateDir(APPPATH.'views/templates');
        
        $this->setTemplateDir(APPPATH.'modules/'); //$this->setTemplateDir(APPPATH.'views/');
        $this->setCompileDir(APPPATH.'views/templates_c');
        $this->setConfigDir(APPPATH.'libraries/smarty/configs');
        $this->setCacheDir(APPPATH.'libraries/smarty/cache');
 
        $this->assign( 'APPPATH', APPPATH );
        $this->assign( 'BASEPATH', BASEPATH );
        if ( method_exists( $this, 'assignByRef') )
        {
            $ci =& get_instance();
            $this->assignByRef("ci", $ci);
        }
        $this->force_compile = 1;
        $this->caching = true;
        $this->cache_lifetime = 120;
 
    }
 
    function view($template_name) {
        if (strpos($template_name, '.') === FALSE && 
        strpos($template_name, ':') === FALSE) {
            $template_name .= '.tpl';
        }
        parent::display($template_name);
    }
}*/

class My_Loader extends MX_Loader {

	var $ci;
	/* 1st way */
	var $smarty;

	function __construct() {
		
		parent::__construct();
		$this->smarty = new CI_Smarty; //$this->smarty = new CI_Smarty;

		$this->ci =& get_instance();
	}


    public function view($view, $vars = array(), $return = FALSE) {
// NEW
        $view .= '.tpl'; // add extension

        list($path, $_view) = Modules::find($view, $this->_module, 'views/');
        
        if ($path != FALSE) {
            $this->_ci_view_paths = array($path => TRUE) + $this->_ci_view_paths;
            $view = $_view;
        }

        //fn_print_r($this->_module, $this->_ci_view_paths, $path, $view);
//fn_print_die(APP_AREA);
        // Validation Rules
//        define('APP_AREA', 'A');

        $file_path = $path . $view;

        if (defined('APP_AREA')) {
            
            $required_folder = APP_AREA == 'A' ? 'views/admin/' : 'views/frontend/';

            if (stripos($file_path, $required_folder) === false) {
                fn_print_die('Invalid Area');
            }
        }

        
        

// AJAX 
        if (defined('IS_AJAX') && IS_AJAX === 1) {
            $return = TRUE;
        }
        //var_dump($vars); exit;
        // 1st way 
        foreach($vars as $k => $var) {
            $this->smarty->assign($k, $var);
        }
        $this->smarty->assign("dis" , $this);


        $this->smarty->assign("this" , $this->ci);
//fn_print_r($this->smarty->getTemplateDir());
       // $this->smarty->setTemplateDir(BASEPATH);

        if ($return == TRUE) {
            ob_start();
            $this->smarty->view($file_path);
            return ob_get_clean();
        } else {
            $this->smarty->view($file_path);
        }



// END NEW




/*	2nd way
		$this->ci =& get_instance();
		$this->ci->smarty->view('index.tpl');
*/

		

/*
		// Get file
		if (empty($view)) {

			$this->ci =& get_instance();
			$cur_class = $this->ci->router->fetch_class();
	        $cur_method = $this->ci->router->fetch_method();
	        $view = $cur_class.'/'.$cur_method;
		}

		// Separate Admin and Frontend
		$path = '';
		$tpl = '';
		if (defined('APP_AREA')) {

			if (APP_AREA == 'A') {
				$path = 'admin/';
				$tpl = 'admin';
				$vars['menu'] = $this->admin_menu();
			} else {
				$path = ''; //$path = 'frontend/';
				$tpl = ''; //$tpl = 'public';
			}

		}
		// end 

		// Template
		if (defined('IS_TEMPLATE') && !defined('HAS_TEMPLATE')) {

			$vars['template'] = $tpl;
			define('HAS_TEMPLATE', 1);

		}

		if (!empty($vars['template'])) {

			$vars['view_file'] = $view;

			$view = 'templates/'.$vars['template'];
			
			unset($vars['template']);
			//unset($vars['menu']);

		}
		// End Template


		$view = $path.$view;

		// AJAX 
		if (defined('IS_AJAX') && IS_AJAX === 1) {
			$return = TRUE;
		}
		//var_dump($vars); exit;
		// 1st way 
		foreach($vars as $k => $var) {
			$this->smarty->assign($k, $var);
		}
		$this->smarty->assign("dis" , $this);


		$this->smarty->assign("this" , $this->ci);


		$this->smarty->view($view.'.tpl');
*/

/*	2nd way
		foreach($vars as $k => $var) {
			$this->ci->smarty->assign($k, $var);
		}
		$this->ci->smarty->assign("dis" , $this);

		$this->ci->smarty->assign("this" , $ci);


		$this->ci->smarty->view($view.'.tpl');
*/


		//return parent::view($view, $vars, $return);

		//return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
	}



	/** Load a module view **/
	/*public function view($view, $vars = array(), $return = FALSE) {
		list($path, $_view) = Modules::find($view, $this->_module, 'views/');
		
		if ($path != FALSE) {
			$this->_ci_view_paths = array($path => TRUE) + $this->_ci_view_paths;
			$view = $_view;
		}
		
		return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
	}*/


	 function admin_menu()
	{
		// Navigation
        $navs = array(
            'nav_0'     => array(
                'url'       => 'link.php',
                'title'     => 'Link',
                'active'    => 0,
                'sub_menu'  => array(
                    'sub_menu_0'     => array(
                        'url'       => 'submenu0.php',
                        'title'     => 'Sub Menu 0',
                        'active'    => 0,
                        'sub_menu'  => array(

                        )
                    ),
                    'sub_menu_01'     => array(
                        'url'       => 'submenu01.php',
                        'title'     => 'Sub Menu 01',
                        'active'    => 0,
                        'sub_menu'  => array(

                        )
                    )
                )
            )
            
        );
        //$navs = array();
        $navs['nav_1'] = array();
        $navs['nav_1']['url'] = 'link1.php';
        $navs['nav_1']['title'] = 'Link 1';
        $navs['nav_1']['active'] = 0;
        $navs['nav_1']['sub_menu'] = array();

        $navs['nav_1']['sub_menu']['sub_menu1'] = array();
        $navs['nav_1']['sub_menu']['sub_menu1']['url'] = 'sublink1.php';
        $navs['nav_1']['sub_menu']['sub_menu1']['title'] = 'Sub Menu 1';
        $navs['nav_1']['sub_menu']['sub_menu1']['active'] = 0;
        $navs['nav_1']['sub_menu']['sub_menu1']['sub_menu'] = array();

        $navs['nav_1']['sub_menu']['sub_menu2'] = array();
        $navs['nav_1']['sub_menu']['sub_menu2']['url'] = site_url('/admin/home');
        $navs['nav_1']['sub_menu']['sub_menu2']['title'] = 'Home';
        $navs['nav_1']['sub_menu']['sub_menu2']['active'] = 0;
        $navs['nav_1']['sub_menu']['sub_menu2']['sub_menu'] = array();

        return $navs;
        // End Navigation
	}
}