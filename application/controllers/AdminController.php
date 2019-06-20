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

    public function deletePlayerConfirmed($userId)
    {
        //  header
        $header = array(
            "title" => "Delete Player",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        $data['active'] = 'none';

        $this->load->model('AdminModel');
        $data['player'] = $this->AdminModel->deletePlayer($userId);

        $message['text'] = 'Player was deleted successfully';
        $message['redirect'] = base_url('index.php/AdminController/viewPlayers');

        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/message', $message);
        $this->load->view('include/footer');
    }

    public function deletePlayer($userId)
    {
        //  header
        $header = array(
            "title" => "Delete Player",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        // sidebar
        $data['active'] = 'none';

        // gather existing data
        $this->load->model('AdminModel');
        $data['player'] = $this->AdminModel->getPlayer($userId);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/player/delete_player', $data);
            $this->load->view('include/footer');
        } else {
            $this->AdminModel->editPlayer($userId);

            $message['text'] = 'Player was deleted successfully';
            $message['redirect'] = base_url('index.php/AdminController/viewPlayers');

            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/message', $message);
            $this->load->view('include/footer');
        }
    }

    public function viewTrainers()
    {
        // header
        $header = array(
            "title" => "Administrator",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        // sidebar
        $data['active'] = 'trainers';

        // retrieve data
        $this->load->model('AdminModel');
        $data['trainers'] = $this->AdminModel->getTrainers();

        // load views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/trainer/view_trainers', $data);
        $this->load->view('include/footer');
    }

    public function viewTrainer($userId)
    {
        // retrieve data
        $this->load->model('AdminModel');
        $data['trainer'] = $this->AdminModel->getTrainer($userId);

        // header
        $trainerName = $data['trainer']->name;
        $header = array(
            "title" => $trainerName,
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        // sidebar
        $data['active'] = 'none';

        // loading views
        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        $this->load->view("admin/trainer/profile", $data);
        $this->load->view('include/footer');
    }

    public function addTrainer()
    {
        //  header
        $header = array(
            "title" => "Add Trainer",
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
            $this->load->view('admin/trainer/add_trainer');
            $this->load->view('include/footer');
        } else {
            $this->load->model('AdminModel');
            $this->AdminModel->addTrainer();

            $message['text'] = 'Trainer was addedd successfully';
            $message['redirect'] = base_url('index.php/AdminController/viewTrainers');

            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/message', $message);
            $this->load->view('include/footer');
        }
    }

    public function editTrainer($userId)
    {
        //  header
        $header = array(
            "title" => "Edit Trainer",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        // sidebar
        $data['active'] = 'none';

        // gather existing data
        $this->load->model('AdminModel');
        $data['trainer'] = $this->AdminModel->getTrainer($userId);

        $this->form_validation->set_rules('userName', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/trainer/edit_trainer', $data);
            $this->load->view('include/footer');
        } else {
            $this->AdminModel->editTrainer($userId);

            $message['text'] = 'Trainer was updated successfully';
            $message['redirect'] = base_url('index.php/AdminController/viewTrainers');

            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/message', $message);
            $this->load->view('include/footer');
        }
    }

    public function deleteTrainerConfirmed($userId)
    {
        //  header
        $header = array(
            "title" => "Delete Player",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        $data['active'] = 'none';

        $this->load->model('AdminModel');
        $data['trainer'] = $this->AdminModel->deleteTrainer($userId);

        $message['text'] = 'Trainer was deleted successfully';
        $message['redirect'] = base_url('index.php/AdminController/viewTrainers');

        $this->load->view('include/header', $header);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/message', $message);
        $this->load->view('include/footer');
    }

    public function deleteTrainer($userId)
    {
        //  header
        $header = array(
            "title" => "Delete Trainer",
            "dashboardTitle" => "Administrator Dashboard",
            "userName" => "Administrator Name",
            "userRole" => "Administrator"
        );

        // sidebar
        $data['active'] = 'none';

        // gather existing data
        $this->load->model('AdminModel');
        $data['trainer'] = $this->AdminModel->getTrainer($userId);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/trainer/delete_trainer', $data);
            $this->load->view('include/footer');
        } else {
            $this->AdminModel->editTrainer($userId);

            $message['text'] = 'Trainer was deleted successfully';
            $message['redirect'] = base_url('index.php/AdminController/viewTrainers');

            $this->load->view('include/header', $header);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/message', $message);
            $this->load->view('include/footer');
        }
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
