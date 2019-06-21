<?php

class AccountantSalaryModel extends CI_Model
{
    public function deleteSalaryRecord($paymentId)
    {
        $this->db->where('salaryId', $paymentId); //deleting selected payment record from playerPayment table
        $this->db->delete('trainerSalary');

        return;
    }


    public function addSalaryRecord($addData)
    {
        $this->db->insert('trainerSalary', $addData);   //adding new payment record to the playerPayment table

        return;
    }


   


    public function getTrainerSalaryHistory($trainerId)
    {
        // get al reacords with given user id or userName from database
        $this->db->select('*');
        $this->db->from('trainerSalary');
        $this->db->join('user', 'user.userId = trainerSalary.trainerId');
        $this->db->where('userId', $trainerId);
        $query=$this->db->get();
        return $query->result();
    }

    public function numberOfTrainers()
    {
        $this->db->where('userRole', 'trainer');
        $this->db->select('userId,userName');
        $query = $this->db->get('user');
        
        return $query->num_rows(); //returning the number of rows
    }

    public function viewTrainers($limit, $start)
    {
        $this->db->where('userRole', 'trainer');
        $this->db->select('userId,userName');
        $this->db->limit($limit, $start); //loading specific number of records to handle pagination
        
        $query = $this->db->get('user');
        return $query->result();
    }

    public function searchTrainer($nameAndId)
    {
        $this->db->select('userId,userName'); //searching for trainer with given userId or userName
        $this->db->from('user');
        $this->db->where('userRole', 'trainer');
        if (!empty($nameAndId["trainerId"])) {
            $this->db->where('userId', $nameAndId["trainerId"]);
        }
        if (!empty($nameAndId["trainerName"])) {
            $this->db->like('userName', $nameAndId["trainerName"], 'after');
        }
        if (!empty($nameAndId["trainerId"])|| !empty($nameAndId["trainerName"])) {
            $query = $this->db->get();
            return $query->result();
        } else {
            return -1; //if not input presented returning -1 for conditional rendering
        }
    }
}
