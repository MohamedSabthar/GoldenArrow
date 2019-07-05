<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrainerController extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('trainerModel');
        $this->load->library('session');
        if($this->session->userdata('userRole')!='trainer') return redirect("/");
    }

    //Practice sessions dashboard
	public function index() {
        //setting header data
        $header = array("title" => "Practice Sessions",
                        "dashboardTitle" => "Trainer Dashboard",
                        "userName" => $this->session->userdata('userName'),
                        "userRole" => "Trainer");

        $data['result'] = $this->trainerModel->getAllData();

        //loading view
        $this->load->view('include/header', $header);
        $this->load->view('trainer/sideBar/sidebarActivePracticeSessions');
        $this->load->view('trainer/practice_sessions', $data);
        $this->load->view('include/footer');
    }
    
    //CRUD for practice sessions
    public function create() {
        $this->trainerModel->createData();
        redirect("trainerController");
    }

    public function edit($ps_id) {
        $data['result'] = $this->trainerModel->getData($this->input->post('ps_id'));
        $this->load->view('trainer/practice_sessions', $data);
    }

    public function update($ps_id) {
        $this->trainerModel->updateData($ps_id);
        redirect("trainerController");
    }

    public function delete($ps_id) {
        $this->trainerModel->deleteData($ps_id);
        redirect("trainerController");
    }

    public function practiceSessions() {
        $this->load->view('trainer/practice_sessions');
    }
    //End of CRUD for practice sessions

    //load targets view
    public function targetsView() {
        $this->load->view('trainer/targets');
    }

    //Targets dashboard
	public function indexTarget() {
        //setting header data
        $header = array("title" => "Team Targets",
                        "dashboardTitle" => "Trainer Dashboard",
                        "userName" => $this->session->userdata('userName'),
                        "userRole" => "Trainer");

        $data['result'] = $this->trainerModel->getAllDataTarget();

        //loading view
        $this->load->view('include/header', $header);
    	$this->load->view('trainer/sideBar/sidebarActiveTargets');
        $this->load->view('trainer/targets', $data);
        $this->load->view('include/footer');
    }

    public function edit_target($t_id) {
        $data['result'] = $this->trainerModel->getDataTarget($this->input->post('t_id'));
        $this->load->view('trainer/targets', $data);
    }

    //Update modal for attackers
    public function update_target_att($t_id) {
        $this->trainerModel->updateDataTargetAtt($t_id);
        redirect("trainerController/indexTarget");
    }

    //Update modal for midfielders
    public function update_target_mid($t_id) {
        $this->trainerModel->updateDataTargetMid($t_id);
        redirect("trainerController/indexTarget");
    }

    //Update modal for defenders
    public function update_target_def($t_id) {
        $this->trainerModel->updateDataTargetDef($t_id);
        redirect("trainerController/indexTarget");
    }

    //Update modal for goal keeper
    public function update_target_gk($t_id) {
        $this->trainerModel->updateDataTargetGK($t_id);
        redirect("trainerController/indexTarget");
    }

    public function target() {
        $this->load->view('trainer/targets');
    }
}
