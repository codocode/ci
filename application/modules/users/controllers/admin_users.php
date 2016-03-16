<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_users extends MX_Controller {

    public $submit_status = false;

    function __construct() {
        parent::__construct();

        $this->model_name = 'mdl_users';
    }

    public function index()
    {
        $this->load->view('users/views/admin/index');
    }

    public function create()
    {
        $data = array();



/*$this->load->module('templates/admin');
$this->admin->admin_panel2($data);*/

        //echo Modules::run('templates/admin_panel2', $data);
        //echo Modules::run('templates/test/admin_panel2', $data);
        //echo Modules::run('templates/admin/admin_panel2', $data);
        //echo Modules::run('admin/templates/admin_panel', $data);

        $this->_form();
    }

    public function admin_panel2()
    {
        die('damn0');
    }

    public function update($update_id = 0)
    {

        $this->_form($update_id);
    }


        private function _form($update_id = 0)
        {
            $this->load->helper('form');
            $this->load->library('form_validation');


            if ($update_id > 0 && $this->submit_status == false) {

                $data = $this->get_data_from_db($update_id, '*');

                $data['update_id'] = $update_id;
            } else {
 
                $data = $this->get_data_from_post($update_id);

                if ($this->submit_status === true) {

                    $data['update_id'] = $update_id;

                    $data['prev_id'] = $this->input->post('prev_id', TRUE);
                    $data['next_id'] = $this->input->post('next_id', TRUE);
                }
                
            }

            //$data = $this->common_data($data);

            //template
            $data['page_title'] = is_numeric($update_id) ? 'Update User' : 'New User';
            //$data['page_title'] = $update_flag ? $this->title_form_update : $this->title_form_add;
            $data['module'] = 'admin/users'; //$data['module'] = $this->module_name;
            //$data['view_file'] = 'form';
            //$this->load->view('users/views/admin/form', $data);
            echo $this->load->view('admin/form', $data, TRUE);
        }

        function get_data_from_post($update_id = 0) {

            $data['username'] = $this->input->post('username', TRUE);
            $data['password'] = $this->input->post('password', TRUE);
            $data['user_type'] = $this->input->post('user_type', TRUE);

            return $data;
        }

        function get_data_from_db($update_id = 0, $select = '*') {

           $data = $this->get_row($update_id, $select);
           
            if (empty($data)) {
                 show_404();
            }
            //$data = $this->_db_edit_data($data);

            return $data;
        }


    function get($order_by) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_users');
        $this->mdl_users->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_users');
        $this->mdl_users->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_users');
        $this->mdl_users->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_users');
        $count = $this->mdl_users->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_users');
        $max_id = $this->mdl_users->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->_custom_query($mysql_query);
        return $query;
    }

    /* MINE */
    function get_row($id, $select = '*') {

        $model_name = $this->model_name;
        $this->load->model($model_name);

        return $this->$model_name->get_row($id, $select);
    }
}
