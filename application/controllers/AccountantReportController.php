<?php

class AccountantReportController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $header = array("title"=>"Accountant",
        "dashboardTitle"=>"Accountant Dashboard",
        "userName"=>"Accountant Name",
        "userRole"=>"Accountant"); //setting header data

        //loding view
        $this->load->view('include/header', $header);
        $this->load->view('accountant/sideBar/sidebarActiveDashboard');
        $this->load->view('accountant/dashboard');
        $this->load->view('include/footer');
    }
    
    public function generateReport()
    {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('My Title');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');

        $pdf->AddPage();

        $pdf->Write(5, 'Some sample text');
        $pdf->Output('My-File-Name.pdf', 'I');
    }
}