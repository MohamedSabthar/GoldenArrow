<?php

class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->library("pagination");
    }


    public function index()
    {
        // setting page header
        $header = array("title"=>"Administrator",
                        "dashboardTitle"=>"Administrator Dashboard",
                        "userName"=>"Administrator Name",
                        "userRole"=>"Administrator"); 
        
        $data['active'] = 'dashboard';

        // loding views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/home');
        $this->load->view('include/footer');
    }

    public function test() {
        $this->load->model('AccountantModel');
        $data['query'] = $this->AccountantModel->getPlayers();
        foreach ($data['query'] as $line) {
            echo $line->userName;
        }
    }


}