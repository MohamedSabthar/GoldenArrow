<?php

class AdminModel extends CI_Model
{
    public function getPlayers() {
        $query = $this->db->get_where('user', array('userRole' => 'player'));
        return $query->result();
    }

    public function getTrainers() {
        $query = $this->db->get_where('user', array('userRole' => 'trainer'));
        return $query->result();
    }

    public function getTournaments() {}

    public function getTournamentNames() {}

    public function getMatches() {}

    public function getPracticeSessions() {}

    public function getPlayerCount() {}
    
    public function getTournamentCount() {}

    public function getMatchCount() {}
}