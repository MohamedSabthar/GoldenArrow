<?php

class AccountantReportController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->userdata('userName');

        if($this->session->userdata('userRole')!='accountant') return redirect("/");

    }

    public function index()
    {
        $header = array("title"=>"Accountant",
        "dashboardTitle"=>"Accountant Dashboard",
        "userName"=>$this->session->userdata('userName'),
        "userRole"=>"Accountant"); //setting header data

        //loding view
        $this->load->view('include/header', $header);
        $this->load->view('accountant/sideBar/sidebarActiveDashboard');
        $this->load->view('accountant/dashboard');
        $this->load->view('include/footer');
    }
    
    public function generateReport()
    {
        $startDate="2019-09-19";
        $endDate="2019-09-21";


        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Payments & salary '. $startDate . ' - ' .$endDate);
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Golden-Arrow');
        $pdf->SetDisplayMode('real', 'default');

        $pdf->AddPage();
       
        $html =  "file content here";

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


      
        $pdf->Output('My-File-Name.pdf', 'I');
    }

    public function generateMebershipPaymentReport(){
        
    }

    public function generateSalaryPaymentReport(){
        
    }
}