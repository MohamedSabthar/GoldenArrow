<?php
class firstViewController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
		$this->load->helper('url');
		$this->load->library('session');
		//  $this->load->view('userLogin');
	}

	public function test()
	{
		if ($this->session->userdata('userId') != null) {

			$this->load->view('userFirstView');
		} else {
			// Redirect to Login Page
		}
	}
}
