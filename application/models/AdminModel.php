<?php

class AdminModel extends CI_Model
{
    public function getPlayers()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('userRole', 'player');
        $this->db->join('playerData', 'user.userId = playerData.playerId');

        //$query = $this->db->get_where('user', array('userRole' => 'player'));
        $query = $this->db->get();

        return $query->result();
    }

    public function getPlayer($userId)
    {
        $this->db->select('');
        $this->db->from('user');
        $this->db->where('userRole', 'player');
        $this->db->where('userId', $userId);
        $this->db->join('playerData', 'user.userId = playerData.playerId');

        //$query = $this->db->get_where('user', array('userRole'=>'player', 'userId'=>$userId));
        $query = $this->db->get();

        return $query->row();
    }

    public function addPlayer()
    {
        // init user
        $userData = array(
            'userName' => $this->input->post('userName'),
            'password' => $this->input->post('password'),
            'userRole' => 'player',
            'accountStatus' => $this->input->post('accountStatus'),
        );

        $this->db->insert('user', $userData);

        // get userId of player record
        $query = $this->db->get_where('user', $userData);
        $result = $query->row();

        $playerId = $result->userId;

        // add player specific data to playerData table
        $playerData = array(
            'playerId' => $playerId,
            'name' => $this->input->post('name'),
            'position' => $this->input->post('position')
        );

        $this->db->insert('playerData', $playerData);
    }

    public function editPlayer($userId)
    {
        // init user
        $userData = array(
            'userId' => $userId,
            'userName' => $this->input->post('userName'),
            'password' => $this->input->post('password'),
            'userRole' => 'player',
            'accountStatus' => $this->input->post('accountStatus'),
        );

        $this->db->replace('user', $userData);

        // add player specific data to playerData table
        $playerData = array(
            'playerId' => $userId,
            'name' => $this->input->post('name'),
            'position' => $this->input->post('position')
        );

        $this->db->replace('playerData', $playerData);
    }


    /*
public function deletePlayer($userId)
{ }

public function getTrainers()
{
    $query = $this->db->get_where('user', array('userRole' => 'trainer'));
    return $query->result();
}

public function getTourname nts()
{}

public function getTournamentNa mes()
{}

public function getMatc hes()
{}

public function getPracticeSessi ons()
{}

public function getPlayerCo unt()
{}

public function getTournamentCo unt()
{}

public function getMatchCo unt()
{}
    */
}
