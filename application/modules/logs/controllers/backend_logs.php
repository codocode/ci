<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_logs extends Backend_Controller {

    public $model_name = 'mdl_logs';

    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->manage();
    }

    public function manage($page_no = 1)
    {

        // pagination
        $items_per_page = $this->input->get('items_per_page', TRUE);
        $items_per_page = $items_per_page > 0 ? $items_per_page : 10;
        $data['items_per_page_url'] = current_url();  // else reset to page 1 "base_url() . 'admin/logs/manage/?' . $_SERVER['QUERY_STRING']"
        $data['items_per_page_opts'] = array(5=>5, 10=>10, 20=>20, 50=>50, 100=>100);
        $data['items_per_page'] = $items_per_page;

        // pagination set page based on items_per_page // else reset to page 1
        if ($this->session->userdata('last_items_per_page')) {

            $last_items_per_page =  $this->session->userdata('last_items_per_page');
            $last_total_items =  $this->session->userdata('last_total_items');

            if ($last_items_per_page != $items_per_page) {

                $new_page_no = ceil(($last_items_per_page * $page_no) / $items_per_page);

                if ($new_page_no != $page_no){

                    $new_total_items = $new_page_no*$items_per_page;

                    if ($new_total_items > $last_total_items) {
                        $new_page_no = ceil($last_total_items/$items_per_page);
                    }

                    $new_url = base_url() . 'admin/logs/manage/' . $new_page_no . '?'. $_SERVER['QUERY_STRING'];

                    $this->session->unset_userdata('last_items_per_page');
                    $this->session->unset_userdata('last_total_items');

                    redirect($new_url);
                }

            }

        }
        
        
        // end

        // search
        $data['search']['log_id'] = $this->input->get('log_id', TRUE);
        $data['search']['action'] = $this->input->get('action', TRUE);
        $data['search']['entry_type'] = $this->input->get('entry_type', TRUE);
        $data['search']['type'] = $this->input->get('type', TRUE);

        //$this->_filter_search_data($data);

        $page_no = $page_no ? $page_no : 1;

        $get_data = $this->_get($page_no, $items_per_page, $data['search']);

        // pagination - items_per_page
        $this->session->set_userdata('last_items_per_page', $items_per_page);
        $this->session->set_userdata('last_total_items', $get_data['total']);
        // end

        // Load Libraries and Helpers
        $this->load->library('pagination');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $config = $this->config->item('pagination');
        $config['base_url'] = base_url() . 'admin/logs/manage/';
        $config['total_rows'] = $get_data['total'];
        $config['per_page'] = $items_per_page;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        $data['records'] = $get_data['records'];
        $data['pagination'] = $this->pagination->create_links();
        $data['pagination_stats'] = array('from' => $get_data['from'], 'to' => $get_data['to'], 'total' => $get_data['total']);
       // $data['status_vals'] = array('D' => 'Denied', 'A' => 'Approved', 'P' => 'Pending');

        $data['search_url'] = base_url() . 'admin/logs/manage/?' . $_SERVER['QUERY_STRING'];

        $data['m_active_url'] = base_url() . 'admin/logs/m_active';
        $data['m_delete_url'] = base_url() . 'admin/logs/m_delete';
        $data['m_action'] = base_url() . 'admin/logs/m_action';

        $this->load->view('logs/views/backend/manage_view', $data);

    }

    private function _get($page_no = 1, $items_per_page = 10, $data = array())
    {

        $model_name = $this->model_name;
        $this->load->model($model_name);

        return $this->$model_name->_get($page_no, $items_per_page, $data);

    }

    public function add()
    {
        $this->load->library('form_validation');
        $data = array();
        $data['row'] = $this->_filter_data();
       

        die($this->_show_form(0, $data));

    }

    private function _filter_data($data = array())
    {
        $row = array(
            'log_id'    => '',
            'user_id'   => 0,
            'action'    => '',
            'date'      => time(),
            'data'      => '',
            'type'      => 'I',
        );

        if (empty($data)) {
            return $row;
        }

        foreach($row as $k => $val) {
            if (empty($data[$k])) {
                $data[$k] = $val;
            }
        }

        return $data;
    }

    public function submit()
    {

        $this->_validate_post();

        $row = $this->_get_data_from_post();

        $id = $this->_insert($row);

        if ($id) {

            echo '<H1>success</h1>';
            $data['row'] = $row;
            die($this->_show_form($id, $data));

        } else {
            die('failed');
        }
    }

    public function view($id = 0)
    {

        if ($id > 0) {

            $row = $this->_get_row($id);

            if ($row) {

                $data = array();
                $data['row'] = $row;

                $data['title'] = 'View';
                $data['module'] = 'logs';
                $data['view_file'] = 'backend/view_view';
                //$this->load->view('backend/home_view', $data);
                die(Modules::run('templates/admin_panel', $data));

            }
        }

        die(show_404());
    }

    public function edit($id = 0)
    {
        if ($id > 0) {

            $row = $this->_get_row($id);

            if ($row) {

                $data = array();
                $data['row'] = $row;
                
                die($this->_show_form($id = 0, $data));

            }

        }

        die(show_404());
    }

    public function _show_form($id = 0, $data)
    {

        if ($id > 0) {

            $data['form_url'] = base_url() . 'admin/logs/update/' . $id;
            $data['title'] = 'Update';
            $data['btn_name'] = 'btn_update';

        } else {

             $data['form_url'] = base_url() . 'admin/logs/submit/';
             $data['title'] = 'Add';
             $data['btn_name'] = 'btn_add';

        }

        if (empty($data['errors'])) {

            $data['errors'] = '';
        }

        $data['module'] = 'logs';
        $data['view_file'] = 'backend/update_view';
                //$this->load->view('backend/home_view', $data);
        return Modules::run('templates/admin_panel', $data);
    }

    public function update($id = 0)
    {
        

        if ($id > 0) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $this->_validate_post();

                $data = $this->_get_data_from_post();

                $is_update = $this->_update($id, $data);

                if ($is_update) {
                    echo '<H1>success</h1>';

                    $this->edit($id);

                } else {
                    die('failed');
                }

            }

        }

        die(show_404());
    }

    function _validate_post($id = 0)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('row[user_id]', 'User Id', 'required');
        $this->form_validation->set_rules('row[action]', 'Action', 'required');

        if ($this->form_validation->run($this) === FALSE) {

            $data['row'] = $this->_get_data_from_post();
            $data['errors'] = validation_errors();
            die($this->_show_form($id, $data));

        }

        return true;
    }


    function _get_data_from_post()
    {
        $row = $this->input->post('row', TRUE);

        return $row;

    }

    function _get_row($id = 0) {

        $model_name = $this->model_name;
        $this->load->model($model_name);

        $query = $this->$model_name->get_row($id);

        return $query;

    }

    function _insert($data) {

        $model_name = $this->model_name;
        $this->load->model($model_name);
        
        $query = $this->$model_name->_insert($data);

        return $query;
    }

    function _update($id = 0, $data = array()) {

        $model_name = $this->model_name;
        $this->load->model($model_name);
        
        $query = $this->$model_name->_update($id, $data);

        return $query;

    }

    public function m_action()
    {
        if (isset($_POST['m_active'])) {

            $this->m_active();

        } elseif (isset($_POST['m_delete'])) {

            $this->m_delete();

        }

    }

    public function m_active()
    {
        fn_print_die('m_active', $_REQUEST);
    }


    public function m_delete()
    {
        fn_print_die('m_delete', $_REQUEST);
    }

    private function _get_rows($ids = array())
    {
        if (empty($ids)) {
            return false;
        }

        $model_name = $this->model_name;
        $this->load->model($model_name);

        return $this->$model_name->_get_rows($ids);

    }


/*
    function get($order_by) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_perfectcontroller');
        $count = $this->mdl_perfectcontroller->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_perfectcontroller');
        $max_id = $this->mdl_perfectcontroller->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
        return $query;
    }   
*/
}