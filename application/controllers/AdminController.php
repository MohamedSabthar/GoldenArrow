<?php

class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
    }

    public function index()
    {
        $this->load->model('AdminModel');

        // setting header
        $header = array(
            "title" => "Administrator",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        // sidebar
        $data['active'] = 'dashboard';

        // retrieve data
        $data['tournaments'] = $this->AdminModel->getPlayers();
        $data['matches'] = $this->AdminModel->getPlayers();

        // loading views
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
        // header
        $header = array(
            "title" => "Administrator",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        // sidebar
        $data['active'] = 'players';

        // retrieve data
        $this->load->model('AdminModel');
        $data['players'] = $this->AdminModel->getPlayers();

        // load views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/player/view_players', $data);
        $this->load->view('include/footer');
    }

    public function viewPlayer($userId)
    {
        // retrieve data
        $this->load->model('AdminModel');
        $data['player'] = $this->AdminModel->getPlayer($userId);

        // header
        $playerName = $data['player']->name;
        $header = array(
            "title" => $playerName,
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        // sidebar
        $data['active'] = 'none';

        // loading views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        $this->load->view("admin/player/profile", $data);
        $this->load->view('include/footer');
    }

    public function addPlayer()
    {
        //  header
        $header = array(
            "title" => "Add Player",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        // sidebar
        $data['active'] = 'none';

        $this->form_validation->set_rules('userName', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/player/add_player');
            $this->load->view('include/footer');
        } else {
            $this->load->model('AdminModel');
            $this->AdminModel->addPlayer();

            $message['text'] = 'Player was addedd successfully';
            $message['redirect'] = base_url('index.php/AdminController/viewPlayers');

            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/message', $message);
            $this->load->view('include/footer');
        }
    }

    public function editPlayer($userId)
    {
        //  header
        $header = array(
            "title" => "Edit Player",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        // sidebar
        $data['active'] = 'none';

        // gather existing data
        $this->load->model('AdminModel');
        $data['player'] = $this->AdminModel->getPlayer($userId);

        $this->form_validation->set_rules('userName', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/player/edit_player', $data);
            $this->load->view('include/footer');
        } else {
            $this->AdminModel->editPlayer($userId);

            $message['text'] = 'Player was updated successfully';
            $message['redirect'] = base_url('index.php/AdminController/viewPlayers');

            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/message', $message);
            $this->load->view('include/footer');
        }
    }

    public function deletePlayer($userId)
    {
        $data['title'] = 'Edit Tournament';

        $this->load->model('TournamentModel');
        $data['query'] = $this->TournamentModel->getTournament($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('place', 'Place', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('opposing_teams', 'Opposing teams', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('nav');
            $this->load->view('edit_tournament', $data);
            $this->load->view('footer');
        } else {
            $this->TournamentModel->editTournament($id);

            $data['message'] = "Tournament updated successfully!";

            $this->load->view('header', $data);
            $this->load->view('nav');
            $this->load->view('success', $data);
            $this->load->view('footer');
        }
        //ex
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
        $this->load->view("admin/player/edit_player", $data);
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
