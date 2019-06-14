<?php

class AccountantModel extends CI_Model
{
    public function loadThisMonthPayment($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->like('paymentDate', date('Y-m'), 'after'); //searching for current month payment in database tabe playerPayment
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
        $this->db->where('paymentId', $paymentId); //deleting selected payment record from db
        $this->db->delete('playerPayment');
    }

    public function addPaymentRecord($addData)
    {
        $this->db->insert('playerPayment', $addData);
    }

    public function updatePaymentRecord($paymentId, $updatedData)
    {
        $this->db->where('paymentId', $paymentId); //updating selected payment records from db
        $this->db->update('playerPayment', $updatedData);
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
            return null;
        }
    }

    public function totalPayment()
    {
        $date = date('Y-m');
        $result = $this->db->query("SELECT sum(ammount) as ammount from playerPayment where paymentDate like '".$date."%'");
    
        return $result->row()->ammount;
    }

    public function getAccountStatus($playerId)
    {
        $this->db->select('accountStatus');
        $this->db->get('user');
        $query = $this->db->where('userId', $playerId);
        print_r($query->row()->userId);
        return $query->row()->userId;
    }
}