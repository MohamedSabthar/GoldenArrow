<?php

class AccountantController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data = array();
		$this->load->library('session');
		if ($this->session->userdata('userRole') != 'accountant') return redirect("/");
	}

	public function index()
	{
		$header = array(
			"title" => "Accountant",
			"dashboardTitle" => "Accountant Dashboard",
			"userName" => "Accountant Name",
			"userRole" => "Accountant"
		); //setting header data

		//pagination styling and configration
		$config = array();
		$config["base_url"] = "/accountant";
		$this->pagination->initialize($config);
		$this->load->model('AccountantModel');
		$config["total_rows"] = $this->AccountantModel->numberOfPayment();
		$config["per_page"] = 5;
		$config["uri_segment"] = 2;
		$config['page_query_string'] = false;
		$config['query_string_segment'] = '';
		$config['full_tag_open'] = '<ul class="pagination pagination-sm" style="font-size:1.1em">';
		$config['full_tag_close'] = '</ul><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page mx-2">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page mx-2">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page mx-2">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page mx-2">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active mx-2"><a href="" class="text-success" >';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page mx-2">';
		$config['num_tag_close'] = '</li>';
		$config['anchor_class'] = 'follow_link';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$this->data["links"] = $this->pagination->create_links();
		$this->data["paymentsForThisMonth"] = $this->AccountantModel->loadThisMonthPayment($config["per_page"], $page);  //loading current month payments with pagination
		$this->data["playerHistory"] = $this->AccountantModel->getPlayerPaymentHistory(array("playerName" => $this->input->post("playerName"), "playerId" => $this->input->post("playerId")));
		$this->data["noOfPayments"] = $config["total_rows"];
		$this->data["totalPayment"] = $this->AccountantModel->totalPayment();
		$this->data['searchName'] = $this->input->post('playerName');

		//loding view
		$this->load->view('include/header', $header);
		$this->load->view('accountant/sideBar/sidebarActivePlayerPayments');
		$this->load->view('accountant/playersPayment', $this->data);
		$this->load->view('include/footer');
	}


	public function deletePaymentRecord()
	{
		$this->load->model('AccountantModel');
		$paymentId = $this->input->post('paymentId');
		$this->AccountantModel->deletePaymentRecord($paymentId); //deleting selected record from database

		redirect('/accountantController/index', 'refresh'); //redirecting to dashboard
	}

	public function updatePaymentRecord()
	{
		$this->load->model('AccountantModel');
		$paymentId = $this->input->post('paymentId');
		$this->AccountantModel->updatePaymentRecord($paymentId, $this->input->post()); //updating selected record from database

		redirect('/accountantController/index', 'refresh'); //redirecting to dashboard
	}

	public function addPaymentRecord()
	{
		$this->load->model('AccountantModel');
		$this->AccountantModel->addPaymentRecord($this->input->post()); //updating selected payment record in database

		redirect('/accountantController/index', 'refresh'); //redirecting to dashboard
	}

	public function blockPlayerAccount()
	{
		$this->load->model('AccountantModel');
		$this->AccountantModel->blockPlayerAccount($this->input->post()); //updating selected account status

		redirect('/accountantController/index', 'refresh'); //redirecting to dashboard
	}

	public function viewPlayers()
	{
		$header = array(
			"title" => "Accountant",
			"dashboardTitle" => "Accountant Dashboard",
			"userName" => "Accountant Name",
			"userRole" => "Accountant"
		); //setting header data
		$this->load->model('AccountantModel');

		$config = array();

		$config["base_url"] = "/accountantController/viewPlayers";
		$this->pagination->initialize($config);
		$this->load->model('AccountantModel');
		$config["total_rows"] = $this->AccountantModel->numberOfPlayers();
		$config["per_page"] = 5;
		$config["uri_segment"] = 2;
		$config['page_query_string'] = false;
		$config['query_string_segment'] = '';
		$config['full_tag_open'] = '<ul class="pagination pagination-sm" style="font-size:1.1em">';
		$config['full_tag_close'] = '</ul><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page mx-2">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page mx-2">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page mx-2">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page mx-2">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active mx-2"><a href="" class="text-success" >';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page mx-2">';
		$config['num_tag_close'] = '</li>';
		$config['anchor_class'] = 'follow_link';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$this->data["links"] = $this->pagination->create_links();

		$this->data["players"] = $this->AccountantModel->viewPlayer($config["per_page"], $page);
		$this->data["searchPlayers"] = $this->AccountantModel->searchPlayer($this->input->post());
		$this->load->view('include/header', $header);
		$this->load->view('accountant/sideBar/sidebarActiveViewPlayers');
		$this->load->view('accountant/viewPlayers', $this->data);
		$this->load->view('include/footer');
	}
}
