<?php
class loginModel extends CI_Model{

    public function checkLogin($username,$password){
        $this->db->where('userName', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        return $query->row_array();
        

    }




}


?>