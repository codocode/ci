<?php
Class Categories_mdl extends CI_Model
{
    function get()
    {
        $this -> db -> select('*');
        $this -> db -> from('users');

        $query = $this -> db -> get();
        return $query->result();
    }
}
