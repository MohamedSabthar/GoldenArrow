<?php
defined('BASEPATH') or exit('No direct script access allowed');

class trainerModel extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	//CRUD for practice sessions
	function createData()
	{
		$data = array(
			'ps_id' => $this->input->post('ps_id'),
			'date' => $this->input->post('date'),
			'duration' => $this->input->post('duration'),
			'dribbling' => $this->input->post('dribbling'),
			'passing' => $this->input->post('passing'),
			'shooting' => $this->input->post('shooting'),
			'defending' => $this->input->post('defending'),
			'set_pieces' => $this->input->post('set_pieces'),
			'goal_keeper' => $this->input->post('goal_keeper'),
		);
		$this->db->insert('practice_sessions', $data);
	}

	function getAllData()
	{
		$query = $this->db->get('practice_sessions');
		return $query->result();
	}

	function getPracticeSessionsOnDate($date)
	{
		$query = $this->db->get_where('practice_sessions', array('date' => $date));
		return $query->result();
	}

	function getData($ps_id)
	{
		$this->db->where('ps_id', $ps_id);
		$query = $this->db->get('practice_sessions');
		return $query->row();
	}

	function updateData($ps_id)
	{
		$data = array(
			'ps_id' => $this->input->post('ps_id'),
			'date' => $this->input->post('date'),
			'duration' => $this->input->post('duration'),
			'dribbling' => $this->input->post('dribbling'),
			'passing' => $this->input->post('passing'),
			'shooting' => $this->input->post('shooting'),
			'defending' => $this->input->post('defending'),
			'set_pieces' => $this->input->post('set_pieces'),
			'goal_keeper' => $this->input->post('goal_keeper'),
		);
		$this->db->where('ps_id', $ps_id);
		$this->db->update('practice_sessions', $data);
	}

	function deleteData($ps_id)
	{
		$this->db->where('ps_id', $ps_id);
		$this->db->delete('practice_sessions');
	}

	//CRUD for targets

	function getAllDataTarget()
	{
		$query = $this->db->get('targets');
		return $query->result();
	}

	function getDataTarget($t_id)
	{
		$this->db->where('t_id', $t_id);
		$query = $this->db->get('targets');
		return $query->row();
	}

	function getDataTargetResult($t_id)
	{
		$this->db->where('t_id', $t_id);
		$query = $this->db->get('targets');
		return $query->result();
	}

	function updateDataTargetAtt($t_id)
	{
		$data = array(
			't_id' => $t_id,
			'att_goals' => $this->input->post('att_goals'),
			'att_assists' => $this->input->post('att_assists'),
		);
		$this->db->where('t_id', $t_id);
		$this->db->update('targets', $data);
	}

	function updateDataTargetMid($t_id)
	{
		$data = array(
			't_id' => $t_id,
			'mid_assists' => $this->input->post('mid_assists'),
			'mid_chances' => $this->input->post('mid_chances'),
		);
		$this->db->where('t_id', $t_id);
		$this->db->update('targets', $data);
	}

	function updateDataTargetDef($t_id)
	{
		$data = array(
			't_id' => $t_id,
			'def_balls_won' => $this->input->post('def_balls_won'),
			'def_tackles' => $this->input->post('def_tackles'),
		);
		$this->db->where('t_id', $t_id);
		$this->db->update('targets', $data);
	}

	function updateDataTargetGK($t_id)
	{
		$data = array(
			't_id' => $t_id,
			'clean_sheets' => $this->input->post('clean_sheets'),
			'saves' => $this->input->post('saves'),
		);
		$this->db->where('t_id', $t_id);
		$this->db->update('targets', $data);
	}
}
