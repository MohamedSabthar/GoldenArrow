<?php

class AccountantModel extends CI_Model
{
    public function loadThisMonthPayment($limit, $start)
    {
        $this->db->limit($limit, $start); //loading specific number of records to handle pagination
        $this->db->like('paymentDate', date('Y-m'), 'after'); //searching for current-month payment in tabe playerPayment
        $this->db->from('playerPayment');
        $query = $this->db->get();
       
        return $query->result();
    }


    public function numberOfPayment()
    {
        $this->db->like('paymentDate', date('Y-m'), 'after'); //searching for current month payment in database tabe playerPayment
        $this->db->from('playerPayment');
        $query = $this->db->get();
        
        return $query->num_rows(); //returning the number of rows
    }


    public function deletePaymentRecord($paymentId)
    {
        $this->db->where('paymentId', $paymentId); //deleting selected payment record from playerPayment table
        $this->db->delete('playerPayment');

        return;
    }


    public function addPaymentRecord($addData)
    {
        $this->db->insert('playerPayment', $addData);   //adding new payment record to the playerPayment table

        return;
    }


    public function updatePaymentRecord($paymentId, $updatedData)
    {
        $this->db->where('paymentId', $paymentId); //updating selected payment records in playerPayment table
        $this->db->update('playerPayment', $updatedData);

        return;
    }


    public function getPlayerPaymentHistory($nameAndId)
    {
        //get al reacords with given user id or userName from database
        $this->db->select('*');
        $this->db->from('playerPayment');
        $this->db->join('user', 'user.userId = playerPayment.playerId');
        
        if ($nameAndId["playerId"]!="") {
            $this->db->where('userId', $nameAndId["playerId"]);
        }
        if ($nameAndId["playerName"]!="") {
            $this->db->like('userName', $nameAndId["playerName"], 'after');
        }
        if ($nameAndId["playerId"]!="" || $nameAndId["playerName"]!="") {
            $query = $this->db->get();
            return $query->result();
        } else {
            return -1; //returning -1 if not any input presented used for conditional rendering in view
        }
    }

    public function totalPayment()
    {
        $date = date('Y-m');
        $result = $this->db->query("SELECT sum(ammount) as ammount from playerPayment where paymentDate like '".$date."%'");
    
        return $result->row()->ammount; //returning sum of current month payments
    }

    
    public function blockPlayerAccount($blockData)
    {
        $this->db->where('userId', $blockData['paymentId']); //updating selected payment records from db
        $this->db->update('user', array("accountStatus"=>!$blockData['accountStatus']));

        return;
    }

    public function numberOfPlayers()
    {
        $this->db->where('userRole', 'player');
        $this->db->select('userId,userName');
        $query = $this->db->get('user');
        
        return $query->num_rows(); //returning the number of rows
    }

    public function viewPlayer($limit, $start)
    {
        $this->db->where('userRole', 'player');
        $this->db->select('userId,userName');
        $this->db->limit($limit, $start); //loading specific number of records to handle pagination
        
        $query = $this->db->get('user');
        return $query->result();
    }

    public function searchPlayer($nameAndId)
    {
        $this->db->select('userId,userName');
        $this->db->from('user');
       
        
        if (!empty($nameAndId["playerId"])) {
            $this->db->where('userId', $nameAndId["playerId"]);
        }
        if (!empty($nameAndId["playerName"])) {
            $this->db->like('userName', $nameAndId["playerName"], 'after');
        }
        if (!empty($nameAndId["playerId"])|| !empty($nameAndId["playerName"])) {
            $query = $this->db->get();
            return $query->result();
        } else {
            return -1;
        }
    }
}