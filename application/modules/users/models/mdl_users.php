<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_users extends CI_Model {

	//private 

	function __construct() {

		parent::__construct();
		$this->table_name = 'users';

	}

	function get_table() {
		$table = "users";
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


	/* MINE */
	public $navigate_data = true;
	public $table_name = 'users';
	public $primary_id = 'id';
	function get_row($id, $select = '*')
	{
		$select = !empty($select) && $select != '*' ? $this->primary_id.', '.$select : '*';
		if ($this->navigate_data) {
			$this->db->select($select.',
							(SELECT next.'.$this->primary_id.' FROM '.$this->table_name.' as next WHERE next.'.$this->primary_id.' > '.$this->table_name.'.'.$this->primary_id.' ORDER BY next.'.$this->primary_id.' ASC LIMIT 1) as next_id,
                            (SELECT prev.'.$this->primary_id.' FROM '.$this->table_name.' as prev WHERE prev.'.$this->primary_id.' < '.$this->table_name.'.'.$this->primary_id.' ORDER BY prev.'.$this->primary_id.' DESC LIMIT 1) as prev_id');
		}

		$this->db->limit(1);
		$query = $this->get_where($id);

		return $query->row_array();
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
     /*   if (!empty($data['content'])) {
            $this->db->like('messages.message', $data['content'], 'both'); 
        }
        if (!empty($data['voter_id'])) {
            $this->db->where('messages.voter_id',$data['voter_id']); 
        }
        if (!empty($data['voter_name'])) {
            $this->db->having('voter_name like', '%'.$data['voter_name'].'%'); 
        }
        if (!empty($data['status'])) {
            $this->db->where('messages.status', $data['status']);
        }*/

        //sorting
        //$this->db->order_by('timestamp', "desc");

        $query = $this->db->get();

        //die($this->db->last_query());

        if ($query->num_rows() > 0) {

            $query2 = $this->db->query('SELECT FOUND_ROWS() AS `count`');

            $response['records'] = $query->result();
            $response["total"] = $query2->row()->count;

            $response['from'] = $start+1;
            $sum = ($start+$limit_per_page);
            $response['to'] = $sum > $response["total"] ? $response["total"] : $sum;

            return $response;
        }

        return false;

    }

    public function login($username = '', $password = '', $user_type = 'U')
    {


        $this->db->select('id, username, password, user_type');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('user_type', $user_type);
        $this->db->limit(1);

         $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->row_array(); //$query->result(); //array

        } else {

            return false;

        }
    }
}