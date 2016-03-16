<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menus extends My_Controller_Admin {

    function __construct()
    {
        parent::__construct();

    }

    // Manage
    function index()
    {

        $data['result'] = $this->get()->result();

        /*
        convert stdClass to array
        $data['result'] = json_decode(json_encode($data['result']), true);
        */

        $data['template'] = 'admin';
        $this->load->view('menus/index', $data);

    }

    // Create
    function create()
    {
        $this->_form();
    }

    // Update
    function update($id = 0)
    {
        $this->_form($id);
    }
    
        // Create / Update
        function _form($id = 0)
        {

            $data['template'] = 'admin';
            $this->load->view('menus/form', $data);
        }


    function submit($id = 0)
    {

    }

    function get_data_from_post($update_id = 0) {

       

        $menu_data = $this->input->post('menu_data', TRUE);
        return $data;
    }

    function get($order_by = '') {
        $this->load->model('menus_mdl');
        $query = $this->menus_mdl->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('menus_mdl');
        $query = $this->menus_mdl->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('menus_mdl');
        $query = $this->menus_mdl->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('menus_mdl');
        $query = $this->menus_mdl->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('menus_mdl');
        $this->menus_mdl->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('menus_mdl');
        $this->menus_mdl->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('menus_mdl');
        $this->menus_mdl->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('menus_mdl');
        $count = $this->menus_mdl->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('menus_mdl');
        $max_id = $this->menus_mdl->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('menus_mdl');
        $query = $this->menus_mdl->_custom_query($mysql_query);
        return $query;
    }   

}
