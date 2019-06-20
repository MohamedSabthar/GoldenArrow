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

    public function deletePlayer($userId)
    {
        $this->db->where('userId', $userId);
        $this->db->delete('user');

        $this->db->where('playerId', $userId);
        $this->db->delete('playerData');
    }

    public function getTrainers()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('userRole', 'trainer');
        $this->db->join('trainerData', 'user.userId = trainerData.trainerId');

        //$query = $this->db->get_where('user', array('userRole' => 'player'));
        $query = $this->db->get();

        return $query->result();
    }

    public function getTrainer($userId)
    {
        $this->db->select('');
        $this->db->from('user');
        $this->db->where('userRole', 'trainer');
        $this->db->where('userId', $userId);
        $this->db->join('trainerData', 'user.userId = trainerData.trainerId');

        //$query = $this->db->get_where('user', array('userRole'=>'player', 'userId'=>$userId));
        $query = $this->db->get();

        return $query->row();
    }

    public function addTrainer()
    {
        // init user
        $userData = array(
            'userName' => $this->input->post('userName'),
            'password' => $this->input->post('password'),
            'userRole' => 'trainer',
            'accountStatus' => 1
        );

        $this->db->insert('user', $userData);

        // get userId of player record
        $query = $this->db->get_where('user', $userData);
        $result = $query->row();

        // add player specific data to playerData table
        $trainerData = array(
            'trainerId' => $result->userId,
            'name' => $this->input->post('name'),
        );

        $this->db->insert('trainerData', $trainerData);
    }

    public function editTrainer($userId)
    {
        // init user
        $userData = array(
            'userId' => $userId,
            'userName' => $this->input->post('userName'),
            'password' => $this->input->post('password'),
            'userRole' => 'trainer',
            'accountStatus' => 1
        );

        $this->db->replace('user', $userData);

        // add player specific data to playerData table
        $trainerData = array(
            'trainerId' => $userId,
            'name' => $this->input->post('name'),
        );

        $this->db->replace('trainerData', $trainerData);
    }



    public function deleteTrainer($userId)
    {
        $this->db->where('userId', $userId);
        $this->db->delete('user');

        $this->db->where('trainerId', $userId);
        $this->db->delete('trainerData');
    }


    public function getAccountants()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('userRole', 'accountant');
        $this->db->join('trainerData', 'user.userId = accountantData.accountantId');

        //$query = $this->db->get_where('user', array('userRole' => 'player'));
        $query = $this->db->get();

        return $query->result();
    }

    public function getAccountant($userId)
    {
        $this->db->select('');
        $this->db->from('user');
        $this->db->where('userRole', 'accountant');
        $this->db->where('userId', $userId);
        $this->db->join('accountantData', 'user.userId = accountantData.accountantId');

        //$query = $this->db->get_where('user', array('userRole'=>'player', 'userId'=>$userId));
        $query = $this->db->get();

        return $query->row();
    }

    public function addAccountant()
    {
        // init user
        $userData = array(
            'userName' => $this->input->post('userName'),
            'password' => $this->input->post('password'),
            'userRole' => 'accountant',
            'accountStatus' => 1
        );

        $this->db->insert('user', $userData);

        // get userId of player record
        $query = $this->db->get_where('user', $userData);
        $result = $query->row();

        // add player specific data to playerData table
        $accountantData = array(
            'accontantId' => $result->userId,
            'name' => $this->input->post('name'),
        );

        $this->db->insert('accountantData', $accountantData);
    }

    public function editAccountant($userId)
    {
        // init user
        $userData = array(
            'userId' => $userId,
            'userName' => $this->input->post('userName'),
            'password' => $this->input->post('password'),
            'userRole' => 'accountant',
            'accountStatus' => 1
        );

        $this->db->replace('user', $userData);

        // add player specific data to playerData table
        $trainerData = array(
            'trainerId' => $userId,
            'name' => $this->input->post('name'),
        );

        $this->db->replace('trainerData', $trainerData);
    }



    public function deleteTrainer($userId)
    {
        $this->db->where('userId', $userId);
        $this->db->delete('user');

        $this->db->where('trainerId', $userId);
        $this->db->delete('trainerData');
    }
/*
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
