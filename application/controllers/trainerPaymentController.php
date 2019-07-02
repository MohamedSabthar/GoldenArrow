<?php

class TrainerPaymentController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data = array();
    }

    public function index()
    {
        $header = array("title"=>"Accountant",
                        "dashboardTitle"=>"Accountant Dashboard",
                        "userName"=>"Accountant Name",
                        "userRole"=>"Accountant"); //setting header data

        //pagination styling and configration
        $header = array("title"=>"Accountant",
        "dashboardTitle"=>"Accountant Dashboard",
        "userName"=>"Accountant Name",
        "userRole"=>"Accountant"); //setting header data
        $this->load->model('AccountantSalaryModel');

        $config = array();
        // setting up pagination
        $config["base_url"] = "/trainerPaymentController/index";
        $this->pagination->initialize($config);
        $this->load->model('AccountantModel');
        $config["total_rows"] = $this->AccountantSalaryModel->numberOfTrainers();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
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

        $this->data["trainers"] = $this->AccountantSalaryModel->viewTrainers($config["per_page"], $page);
        $this->data["searchTrainers"]=$this->AccountantSalaryModel->searchTrainer($this->input->post());
        
        //loding view
        $this->load->view('include/header', $header);
        $this->load->view('accountant/sideBar/sidebarActiveTrainerSalary');
        $this->load->view('accountant/trainerSalary', $this->data);
        $this->load->view('include/footer');
    }

    public function viewSalaryHistory()
    {
        $this->load->model('AccountantSalaryModel');
        $results = $this->AccountantSalaryModel->getTrainerSalaryHistory($this->input->post('trainerId'));
        if (empty($results)) {
            echo 'No records found';
            return;
        }
        $data = '';
        foreach ($results as $result) {
            $data.='<tr>';
            $data.='<td>'.$result->ammount.'</td>';
            $data.='<td>'.$result->paymentDate.'</td>';
            $data.='<td>'.$result->paymentType.'</td>';
            $data.='<td>
                        <form method="POST" action="/trainerPaymentController/deleteSalaryRecord" class="d-inline">
                            <input name="paymentId" type="hidden" value="'.$result->salaryId.'">
                            <button onClick="return confirm(`Are you sure you want to Delete ?`)"type="submit" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>';
            $data.='</tr>';
        }
        
        echo $data;
        return;
    }

    public function deleteSalaryRecord()
    {
        $this->load->model('AccountantSalaryModel');
        $paymentId = $this->input->post('paymentId');
        $this->AccountantSalaryModel->deleteSalaryRecord($paymentId); //deleting selected record from database
        
        redirect('/accountant/trainers', 'refresh'); //redirecting to dashboard
    }

    public function addSalaryRecord()
    {
        $this->load->model('AccountantSalaryModel');
        $this->AccountantSalaryModel->addSalaryRecord($this->input->post()); //insert payment record in to database

        redirect('/accountant/trainers', 'refresh'); //redirecting to dashboard
    }
}
