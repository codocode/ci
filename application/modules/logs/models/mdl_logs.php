<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_logs extends CI_Model {

    private $table_name = 'logs';
    private $p_id = 'log_id';

    function __construct() {
        parent::__construct();
    }

    function get_row($id = 0) {

        if (!$id > 0) {
            return false;
        }

        $this->db->where($this->p_id, $id);
        $query = $this->db->get($this->table_name);

        return ($query->num_rows() == 1) ? $query->row_array() : false;
    }

    function _insert($data) {

        if (empty($data)) {
            return false;
        }

        $query = $this->db->insert($this->table_name, $data);

        return ($this->db->affected_rows() == 1) ? $this->db->insert_id() : false;
    }

    function _update($id, $data) {

        if (!$id > 0 || empty($data)) {
            return false;
        }

        $this->db->where($this->p_id, $id);

        return $this->db->update($this->table_name, $data);

    }

    function _insert_delay($data) {

        if (empty($data)) {
            return false;
        }

        $str = $this->db->insert_string($this->table_name, $data);

        $query = $this->db->query(str_replace('INSERT', 'INSERT DELAYED ', $str));

        return ($this->db->affected_rows() == 1) ? $this->db->insert_id() : false;
    }

    public function _get($page_no = 1, $limit_per_page = 10, $data = array())
    {

        $limit_per_page = $limit_per_page>0 ? $limit_per_page : 10;
        $start = $page_no > 1 ? ($page_no-1)*$limit_per_page : 0;

        $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
        $this->db->from($this->table_name);

        // pagination
        $this->db->limit($limit_per_page, $start);

        // search 
        if (!empty($data['action'])) {
            $this->db->like('action', $data['action'], 'both'); 
        }

        if (!empty($data['entry_type'])) {
            $this->db->where('entry_type', $data['entry_type']); 
        }

        if (!empty($data['type'])) {
            $this->db->where('type', $data['type']); 
        }

        //sorting
        $this->db->order_by('time', "desc");

        $query = $this->db->get();

        //die($this->db->last_query());

        if ($query->num_rows() > 0) {

            $query2 = $this->db->query('SELECT FOUND_ROWS() AS `count`');

            $response['records'] = $query->result_array(); //$query->result();
            $response["total"] = $query2->row()->count;

            $response['from'] = $start+1;
            $sum = ($start+$limit_per_page);
            $response['to'] = $sum > $response["total"] ? $response["total"] : $sum;

            return $response;
        }

        return false;

    }

    public function _get_rows($ids = array())
    {
        if (empty($ids)) {
            return false;
        }

        if (is_array($ids)) {
            $this->db->where_in($this->p_id, $ids);
        } else {
            $this->db->where($this->p_id, $ids);
        }

        $query = $this->db->select('*')->from($this->table_name)->get();

        return $query->num_rows() > 0 ? $query->result_array() : false;
    }


/*  function get_table() {
        $table = "tablename";
        return $table;
    }
    
    function get($order_by) {
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $table = $this->get_table();
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where_custom($col, $value) {
        $table = $this->get_table();
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function _insert($data) {
        $table = $this->get_table();
        $this->db->insert($table, $data);
    }

    function _update($id, $data) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function _delete($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    function count_where($column, $value) {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query=$this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function count_all() {
        $table = $this->get_table();
        $query=$this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_max() {
        $table = $this->get_table();
        $this->db->select_max('id');
        $query = $this->db->get($table);
        $row=$query->row();
        $id=$row->id;
        return $id;
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }
*/
}