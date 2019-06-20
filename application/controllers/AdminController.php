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
        //setting header
        $header = array(
            "title" => "Administrator",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        $data['active'] = 'dashboard';

        $this->load->model('AdminModel');
        $data['players'] = $this->AdminModel->getPlayers();
        $data['trainers'] = $this->AdminModel->getTrainers();
        $data['tournaments'] = $this->AdminModel->getPlayers();
        $data['matches'] = $this->AdminModel->getPlayers();

        //loding views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/home', $data);
        $this->load->view('include/footer');
    }

    public function viewPracticeSessions()
    {
        //setting header
        $header = array(
            "title" => "Practice Sessions",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        $data['active'] = 'practice_sessions';

        $this->load->model('AdminModel');
        $data['players'] = $this->AdminModel->getPlayers();
        $data['trainers'] = $this->AdminModel->getTrainers();
        $data['tournaments'] = $this->AdminModel->getPlayers();
        $data['matches'] = $this->AdminModel->getPlayers();

        //loding views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        //$this->load->view('admin/home', $data);
        $this->load->view('include/footer');
    }

    public function viewMatches()
    {
        //setting header
        $header = array(
            "title" => "Matches",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        $data['active'] = 'matches';

        $this->load->model('AdminModel');
        $data['players'] = $this->AdminModel->getPlayers();
        $data['trainers'] = $this->AdminModel->getTrainers();
        $data['tournaments'] = $this->AdminModel->getPlayers();
        $data['matches'] = $this->AdminModel->getPlayers();

        //loding views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        //$this->load->view('admin/home', $data);
        $this->load->view('include/footer');
    }

    public function viewTournaments()
    {
        //setting header
        $header = array(
            "title" => "Administrator",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        $data['active'] = 'tournaments';

        $this->load->model('AdminModel');
        $data['players'] = $this->AdminModel->getPlayers();
        $data['trainers'] = $this->AdminModel->getTrainers();
        $data['tournaments'] = $this->AdminModel->getPlayers();
        $data['matches'] = $this->AdminModel->getPlayers();

        //loding views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        //$this->load->view('admin/home', $data);
        $this->load->view('include/footer');
    }

    public function viewPlayers()
    {
        //setting header
        $header = array(
            "title" => "Administrator",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        $data['active'] = 'players';

        $this->load->model('AdminModel');
        $data['players'] = $this->AdminModel->getPlayers();

        //loding views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/player/view_players', $data);
        $this->load->view('include/footer');
    }

    public function viewPlayer($userId)
    {
        $this->load->model('AdminModel');
        $data['player'] = $this->AdminModel->getPlayer($userId);

        //setting header
        $header = array(
            "title" => "Administrator",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        $data['active'] = 'none';

        //loding views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        $this->load->view("admin/player/profile", $data);
        $this->load->view('include/footer');
    }

    public function viewTrainers()
    {
        //setting header
        $header = array(
            "title" => "Administrator",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        $data['active'] = 'trainers';

        $this->load->model('AdminModel');
        $data['players'] = $this->AdminModel->getPlayers();
        $data['trainers'] = $this->AdminModel->getTrainers();
        $data['tournaments'] = $this->AdminModel->getPlayers();
        $data['matches'] = $this->AdminModel->getPlayers();

        //loding views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        //$this->load->view('admin/home', $data);
        $this->load->view('include/footer');
    }

    public function dayView($year, $month, $day)
    {
        //setting header
        $header = array(
            "title" => "Events on $year-$month-$day",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );
        $data['active'] = 'none';
        //loding views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        //$this->load->view('admin/home', $data);
        $this->load->view('include/footer');
    }
}
