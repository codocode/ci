<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class My_smarty extends Smarty {

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
}

/* End of file My_smarty.php */