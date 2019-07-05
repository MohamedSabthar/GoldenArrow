<?php 
	class registrationModel extends CI_Model{

		public function checkUsername($newUsername)
		{   
			$this->db->select('userName');
			$this->db->where('userName',$newUsername);
			$query = $this->db->get('user');
		   // echo $query->result_array();
			foreach($query->result_array() as $element)
			{
					if($element){
						return true;
					}

			}
			return false;





		}


	  public function addUser($name,$age,$hometown,$role,$username,$password)
		{   $password=md5($password);
			$query="insert into user(username,password,userRole,name,hometown,age)values('$username','$password','$role','$name','$hometown','$age')";
			$this->db->query($query);
		}

		











	}
