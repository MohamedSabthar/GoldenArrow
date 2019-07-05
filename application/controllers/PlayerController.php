<?php
class PlayerController extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	$this->load->helper('url');
	//load Model
	$this->load->model('PlayerModel');
	}

	public function index(){

		$header = array("title"=>"Player",
		"dashboardTitle"=>"Player Dashboard",
		"userName"=>"Player Name",
		"userRole"=>"Player"); //setting header data

		 //loding view
		 $this->load->view('include/header', $header);
		 $this->load->view('player/sideBar/sidePlayerProfile');
		 $this->load->view('player/playerDashboard');
		 $this->load->view('include/footer');
	}

	public function player()
	{
		$header = array("title"=>"Player",
		"dashboardTitle"=>"Player Dashboard",
		"userName"=>"Player Name",
		"userRole"=>"Player"); //setting header data
		$this->load->view('include/header', $header);
		$this->load->view('player/sideBar/sidePlayerProfile');
		$this->load->model('PlayerModel');
		$this->load->view('player/viewplayerprofile', array('data'=>$this->PlayerModel->displayrecords($this->input->post('id'))));   
		$this->load->view('include/footer');
	}

	public function otherPlayer(){

		$header = array("title"=>"Player",
		"dashboardTitle"=>"Player Dashboard",
		"userName"=>"Player Name",
		"userRole"=>"Player"); //setting header data

		$id=$this->input->get('id');
		$result['data']=$this->PlayerModel->displayrecords($id);
		$this->load->view('viewOtherPlayer',$result);

		 //loding view
		 $this->load->view('include/header', $header);
		 $this->load->view('player/sideBar/sidePlayerProfile');
		 $this->load->view('player/viewOtherPlayer');
		 $this->load->view('include/footer');
	}

	

// DISPLAYING OF Data
public function viewPlayers()
{
	$header = array("title"=>"Player",
					"dashboardTitle"=>"Player Dashboard",
					"userName"=>"Player Name",
					"userRole"=>"Player"); //setting header data
	$this->load->model('PlayerModel');

	//loding view
	$this->data["players"] = $this->PlayerModel->viewPlayer($config["per_page"], $page);
	$this->data["searchPlayer"]=$this->PlayerModel->searchPlayer($this->input->post());
	$this->load->view('include/header', $header);
	$this->load->view('player/sideBar/sidePlayerProfile');
	$this->load->view('player/player', array('data'=>$this->data));
	$this->load->view('include/footer');

}

// public function updateProfile()
// 	{
// 		$header = array("title"=>"Player",
// 		"dashboardTitle"=>"Player Dashboard",
// 		"userName"=>"Player Name",
// 		"userRole"=>"Player"); //setting header data
// 		$this->load->view('include/header', $header);
// 		$this->load->view('player/sideBar/sidePlayerProfile');
// 		$this->load->model('PlayerModel');
// 		$this->load->view('player/updatePlayer', array('data'=>$this->PlayerModel->displayrecords($this->input->post('id'))));   
// 		$this->load->view('include/footer');
// 	}

// DISPLAYING OF Data
	public function dispdata()
	{
		$result['data']=$this->PlayerModel->displayrecords();
		$this->load->view('viewPlayerProfile',$result);
	}


// Update Data
    public function updatedata()
    {
		$header = array("title"=>"Player",
		"dashboardTitle"=>"Player Dashboard",
		"userName"=>"Player Name",
		"userRole"=>"Player"); //setting header data

		//loding view
		$this->load->view('include/header', $header);
		$this->load->view('player/sideBar/sidePlayerProfile');

        $id=$this->input->get('id');
		$result['data']=$this->PlayerModel->displayrecordsById($id);
		$this->load->view('player/updatePlayer',$result);
         
        if($this->input->post('player/updatePlayer'))
        {
            $n=$this->input->post('name');
            $e=$this->input->post('DOB');
            $m=$this->input->post('position');
			$this->PlayerModel->updaterecords($n,$e,$m,$id);
			redirect("playerController/player");
        }
    } 

}
