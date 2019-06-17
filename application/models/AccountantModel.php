<?php

class AccountantModel extends CI_Model
{
    public function getPlayers() {
        $query = $this->db->get_where('user', array('userRole' => 'player'));
        return $query;
    }
}