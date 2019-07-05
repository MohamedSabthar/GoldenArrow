<?php

class AccountantReportModel extends CI_Model
{
	public function getMebershipPayments($dates)
	{ 

		
		$this->db->where('paymentDate >= ', $dates['startDate']);
		$this->db->where('paymentDate <= ', $dates['endDate']);
		$this->db->from('playerPayment');
		$query = $this->db->get();

		return $query->result();


	}

	public function totalPayment($dates,$table)
	{

		$result = $this->db->query("SELECT sum(ammount) as ammount from ".$table." where paymentDate > '" . $dates['startDate'] ."'AND paymentDate < '" . $dates['endDate']."'" );

		return $result->row()->ammount; //returning sum of payment for given period
	}

	public function getSalaryPayments($dates)
	{ 
		$this->db->where('paymentDate >= ', $dates['startDate']);
		$this->db->where('paymentDate <= ', $dates['endDate']);
		$this->db->from('trainerSalary');
		$query = $this->db->get();

		return $query->result();
	}
}
