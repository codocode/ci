<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Menus_mdl extends CI_Model {

    public $table = 'menus';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_table() {
        //$table = "tasks";
        $table=$this->table;
        return $table;
    }
    
    function get( $order_by = '') {
        $table = $this->get_table();
        
        if (!empty($order_by)) {
            $this->db->order_by( $order_by );
        }
        
        $query = $this->db->get($table);
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
        $this->db->where($this->id, $id);

        $query=$this->db->get($table);
        //var_dump($query); exit;
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
        $this->db->where($this->id, $id);
        $this->db->update($table, $data);
    }

    function _delete($id) {
        $table = $this->get_table();
        $this->db->where($this->id, $id);
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
        $this->db->select_max($this->id);
        $query = $this->db->get($table);
        $row=$query->row();
        $id=$row->id;
        return $id;
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }
    
    function db_delete($ids) {
        $table = $this->get_table();
        if (is_array($ids)) {
            $this->db->where_in($this->id, $ids);
        } else {
            $this->db->where($this->id, $ids);
        }
        $this->db->delete($table);
        
    }
}