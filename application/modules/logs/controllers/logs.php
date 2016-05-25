<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs extends My_Controller {

    public $model_name = 'mdl_logs';

    function __construct()
    {
        parent::__construct();
    }

    function _insert_delay($data) {

        $model_name = $this->model_name;
        $this->load->model($model_name);
        
        $query = $this->$model_name->_insert_delay($data);

        return $query;
    }


    public function addLog($type = '', $entry_type = '', $action = '')
    {

        //https://msdn.microsoft.com/en-us/library/zyysk5d0(v=vs.90).aspx
        $entry_types = array(
            'S' => 'Success',
            'E' => 'Error',
            'W' => 'Warning',
            'I' => 'Information',
            'F' => 'Failure',
            'N' => 'Notice',
        );

        $types = array(
            'database' =>  'Database Query error',
            'form' =>  'Form validation',
            'requests' => 'Requests'
        );

        $user_data = $this->session->userdata('logged_in');

        $this->load->library('user_agent');

        $user_agent_data = array(
            
            'browser' => $this->agent->browser(),
            'version' => $this->agent->version(),
            'mobile' => $this->agent->mobile(),
            'robot' => $this->agent->robot(),
            'platform' => $this->agent->platform(),
            'referrer' => $this->agent->referrer(),
            'agent_string' => $this->agent->agent_string(),
            'accept_lang' => $this->agent->accept_lang(),
            'accept_charset' => $this->agent->accept_charset(),
            
        );
        
        $source = array(
            'page_url'   => current_url(),
            'ip'         => $this->input->ip_address(),
            'user_agent' => $user_agent_data, //$_SERVER['HTTP_USER_AGENT'],
            'method'     => $_SERVER['REQUEST_METHOD'],
            'user_data'  => $user_data,
            'query'     => $this->db->last_query(),
            //'count'     => $this->db->num_rows()
        );

        if ($type == 'form' && $entry_type == 'E') {
            $source['validation_errors'] = validation_errors();
        }
        
        $data = array(
            'user_id' => !empty($user_data['user_id']) ? $user_data['user_id'] : 0,
            'time' => time(),
            'action' => $action,
            'entry_type' => $entry_type,
            //'type'  => $type,
            'source' => json_encode($source)
        );

        $this->_insert_delay($data);
    }

}