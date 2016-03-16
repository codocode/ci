<?php
Class User extends CI_Model
{
    function login($username, $password, $user_type = 'U')
    {
        $this -> db -> select('id, username, password, user_type');
        $this -> db -> from('users');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', $this->fn_ecrypt_password($password));
        $this -> db -> where('user_type', $user_type);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if ($query -> num_rows() == 1) {
//var_dump($query->result()); exit;
            return $query->result();

        } else {

            return false;

        }
    }

    private function fn_ecrypt_password($password = '')
    {
      return MD5($password);
    }
}
