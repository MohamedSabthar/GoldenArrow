<?php

class AccountantReportController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // security route to prevent unauthorized login
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


    public function generateMebershipPaymentReport(){
        $this->load->model('AccountantReportModel');
        // print_r($this->AccountantReportModel->getMebershipPayments($this->input->get()));
        $payments = $this->AccountantReportModel->getMebershipPayments($this->input->get());
        if(empty($payments)){
        $this->session->set_flashdata('notification','No Membership payment in the given period');
        redirect('/accountant/dashboard', 'refresh'); //redirecting to dashboard

        }

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Payments & salary '. $this->input->get('startDate') . ' - ' .$this->input->get('endDate'));
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Golden-Arrow');
        $pdf->SetDisplayMode('real', 'default');

        $pdf->AddPage();
       
        $html = '   <style>
                        h1 {
                            color: navy;
                            font-family: times;
                            font-size: 16pt;
                            
                        }
                    
                        p.first {
                            color: #003300;
                            font-family: helvetica;
                            font-size: 12pt;
                        }
                        
                        .center{
                            margin:0 auto;
                        }

                        p.first span {
                            color: #006600;
                            font-style: italic;
                        }
                    
                        p#second {
                            color: rgb(00, 63, 127);
                            font-family: times;
                            font-size: 12pt;
                            text-align: justify;
                        }
                    
                        p#second>span {
                            background-color: #FFFFAA;
                        }
                    
                        table.first {
                            color: #003300;
                            font-family: helvetica;
                            font-size: 8pt;
                            border-left: 3px solid red;
                            border-right: 3px solid #FF00FF;
                            border-top: 3px solid green;
                            border-bottom: 3px solid blue;
                            background-color: #ccffcc;
                        }
                    
                        td {
                            border: 2px solid blue;
                            background-color: #ffffee;
                        }
                    
                        td.second {
                            border: 2px dashed green;
                        }
                    
                        div.test {
                            color: #CC0000;
                            background-color: #FFFF66;
                            font-family: helvetica;
                            font-size: 10pt;
                            border-style: solid solid solid solid;
                            border-width: 2px 2px 2px 2px;
                            border-color: green #FF00FF blue red;
                            text-align: center;
                        }
                    
                        .lowercase {
                            text-transform: lowercase;
                        }
                    
                        .uppercase {
                            text-transform: uppercase;
                        }
                    
                        .capitalize {
                            text-transform: capitalize;
                        }
                    </style>
    <div align="center">
    <h1 class="title">Membership payment Report   {'.$this->input->get('startDate') .' - '. $this->input->get('endDate').'}</h1>
    
    <table class="first" cellpadding="4" cellspacing="6">
        <tr>
            <td width="70" align="center"><b>Player ID</b></td>
            <td width="150" align="center" ><b>Paid Date</b></td>
            <td width="150" align="center"><b>Payment Type</b></td>
            <td width="120" align="center"> <b>Ammount Paid</b></td>
        </tr>';


        
        foreach($payments as $row){
            $html.='<tr>';
            $html.='<td width="70" align="center">'.$row->playerId.'</td>';
            $html.='<td width="150" align="center" >'.$row->paymentDate.'</td>';           
            $html.='<td width="150">'.$row->paymentType.'</td>';
            $html.='<td width="120">'.$row->ammount.'</td>';
            $html.='</tr>';
        }
        
        $html.='<tr><td width="381" align="center" bgcolor="#FFFF00">Total</td>
        <td width="120" align="center" bgcolor="#FFFF00"> <b>'.$this->AccountantReportModel->totalPayment($this->input->get(),'playerPayment').'</b></td>
        </tr>';

    $html.='</table>
    </div>';

        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


      
        $pdf->Output('My-File-Name.pdf', 'I');
        
    }

    public function generateSalaryPaymentReport(){

        $this->load->model('AccountantReportModel');
        // print_r($this->AccountantReportModel->getMebershipPayments($this->input->get()));

        $payments = $this->AccountantReportModel->getSalaryPayments($this->input->get());
        if(empty($payments)){
            $this->session->set_flashdata('notification','No Salary payment in the given period');
            redirect('/accountant/dashboard', 'refresh'); //redirecting to dashboard

        }

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Payments & salary '. $this->input->get('startDate') . ' - ' .$this->input->get('endDate'));
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Golden-Arrow');
        $pdf->SetDisplayMode('real', 'default');

        $pdf->AddPage();
       
        $html = '<style>
        h1 {
            color: navy;
            font-family: times;
            font-size: 16pt;
            
        }
    
        p.first {
            color: #003300;
            font-family: helvetica;
            font-size: 12pt;
        }
        
        .center{
            margin:0 auto;
        }

        p.first span {
            color: #006600;
            font-style: italic;
        }
    
        p#second {
            color: rgb(00, 63, 127);
            font-family: times;
            font-size: 12pt;
            text-align: justify;
        }
    
        p#second>span {
            background-color: #FFFFAA;
        }
    
        table.first {
            color: #003300;
            font-family: helvetica;
            font-size: 8pt;
            border-left: 3px solid red;
            border-right: 3px solid #FF00FF;
            border-top: 3px solid green;
            border-bottom: 3px solid blue;
            background-color: #ccffcc;
        }
    
        td {
            border: 2px solid blue;
            background-color: #ffffee;
        }
    
        td.second {
            border: 2px dashed green;
        }
    
        div.test {
            color: #CC0000;
            background-color: #FFFF66;
            font-family: helvetica;
            font-size: 10pt;
            border-style: solid solid solid solid;
            border-width: 2px 2px 2px 2px;
            border-color: green #FF00FF blue red;
            text-align: center;
        }
    
        .lowercase {
            text-transform: lowercase;
        }
    
        .uppercase {
            text-transform: uppercase;
        }
    
        .capitalize {
            text-transform: capitalize;
        }
    </style>
    <div align="center">
    <h1 class="title">Salary payment Report   {'.$this->input->get('startDate') .' - '. $this->input->get('endDate').'}</h1>
    
    <table class="first" cellpadding="4" cellspacing="6">
        <tr>
            <td width="70" align="center"><b>Trainer ID</b></td>
            <td width="150" align="center" ><b>Paid Date</b></td>
            <td width="150" align="center"><b>Payment Type</b></td>
            <td width="120" align="center"> <b>Ammount Paid</b></td>
        </tr>';


        foreach($payments as $row){
            $html.='<tr>';
            $html.='<td width="70" align="center">'.$row->trainerId.'</td>';
            $html.='<td width="150" align="center" >'.$row->paymentDate.'</td>';           
            $html.='<td width="150">'.$row->paymentType.'</td>';
            $html.='<td width="120">'.$row->ammount.'</td>';
            $html.='</tr>';
        }
        
        $html.='<tr><td width="381" align="center" bgcolor="#FFFF00">Total</td>
        <td width="120" align="center" bgcolor="#FFFF00"> <b>'.$this->AccountantReportModel->totalPayment($this->input->get(),'trainerSalary').'</b></td>
        </tr>';

    $html.='</table>
        </div>';

        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->Output('My-File-Name.pdf', 'I');
        
    }
}