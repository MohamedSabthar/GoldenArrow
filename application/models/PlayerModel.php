<?php
class PlayerModel extends CI_Model 
{
	function displayrecords($id)
	{
		$query=$this->db->query("select * from player where id='".$id."'");
		return $query->result();
	}


// Update data
	function displayrecordsById($id)
	{
		$query=$this->db->query("select * from player where id='".$id."'");
		return $query->result();
	}
	
	function updaterecords($name,$DOB,$position,$id)
	{
		$query=$this->db->query("update player SET name='$name',DOB='$DOB',position='$position' where id='".$id."'");
	} 

	// function viewPlayer($limit, $start)
	// {
	//     $this->db->select('id,name');
	//     $this->db->limit($limit, $start); //loading specific number of records to handle pagination
		
	//     $query = $this->db->get('');
	//     return $query->result();
	// }
	
	//  function searchPlayer($nameAndId)
	// {
	//     $this->db->select('id,name'); //searching for player with given userId or userName
	//     $this->db->from('player');
	   
	//     if (!empty($nameAndId["id"])) {
	//         $this->db->where('id');
	//     }
	//     if (!empty($nameAndId["name"])) {
	//         $this->db->like('name', 'after');
	//     }
	//     if (!empty($nameAndId["id"])|| !empty($nameAndId["name"])) {
	//         $query = $this->db->get();
	//         return $query->result();
	//     } else {
	//         return -1; //if not input presented returning -1 for conditional rendering
	//     }
	// }

}
