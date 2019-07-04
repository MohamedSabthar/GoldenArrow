<?php

class AdminController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('userRole') != 'admin') return redirect("/");
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

		// current date for today schedule
		$date = date("Y-m-d");

		// retrieve data
		$data['matches'] = $this->AdminModel->getDateMatches($date);

		$data['matchCount'] = $this->AdminModel->getMatchCount();
		$data['tournamentCount'] = $this->AdminModel->getTournamentCount();
		$data['playerCount'] = $this->AdminModel->getPlayerCount();
		$data['trainerCount'] = $this->AdminModel->getTrainerCount();

		// loading views
		$this->load->view('include/header', $header);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/home', $data);
		$this->load->view('include/footer');
	}

	public function viewPracticeSessions()
	{
		// to be implemented by another team member
	}

	public function viewMatches()
	{
		// header
		$header = array(
			"title" => "Matches",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'matches';

		// retrieve data
		$this->load->model('AdminModel');
		$data['matches'] = $this->AdminModel->getMatches();

		// load views
		$this->load->view('include/header', $header);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/match/view_matches', $data);
		$this->load->view('include/footer');
	}

	public function addMatch()
	{
		//  header
		$header = array(
			"title" => "Add Match",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// validation rules
		$this->form_validation->set_rules('tournamentId', 'Tournament ID', 'required');
		$this->form_validation->set_rules('matchName', 'Name', 'required');
		$this->form_validation->set_rules('matchLocation', 'Location', 'required');
		$this->form_validation->set_rules('matchDate', 'Date', 'required');
		$this->form_validation->set_rules('matchTime', 'Time', 'required');
		$this->form_validation->set_rules('matchPlayed', 'Played', 'required');

		if ($this->form_validation->run() == FALSE) {
			// form not submitted
			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/match/add_match');
			$this->load->view('include/footer');
		} else {
			//form submitted
			$this->load->model('AdminModel');
			$this->AdminModel->addMatch();

			// feedback
			$message['text'] = 'Match was addedd successfully';
			$message['redirect'] = base_url('index.php/AdminController/viewMatches');

			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/message', $message);
			$this->load->view('include/footer');
		}
	}

	public function editMatch($matchId)
	{
		//  header
		$header = array(
			"title" => "Edit Match",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// gather existing data
		$this->load->model('AdminModel');
		$data['match'] = $this->AdminModel->getMatch($matchId);

		// set validation rules
		$this->form_validation->set_rules('tournamentId', 'Tournament ID', 'required');
		$this->form_validation->set_rules('matchName', 'Name', 'required');
		$this->form_validation->set_rules('matchLocation', 'Location', 'required');
		$this->form_validation->set_rules('matchDate', 'Date', 'required');
		$this->form_validation->set_rules('matchTime', 'Time', 'required');
		$this->form_validation->set_rules('matchPlayed', 'Played', 'required');

		if ($this->form_validation->run() == FALSE) {
			// form not submitted
			// display form
			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/match/edit_match', $data);
			$this->load->view('include/footer');
		} else {
			$this->AdminModel->editMatch($matchId);

			$message['text'] = 'Match was updated successfully';
			$message['redirect'] = base_url('index.php/AdminController/viewMatches');

			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/message', $message);
			$this->load->view('include/footer');
		}
	}

	public function deleteMatchConfirmed($matchId)
	{
		//  header
		$header = array(
			"title" => "Delete Match",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// execute delete functions
		$this->load->model('AdminModel');
		$data['match'] = $this->AdminModel->deleteMatch($matchId);

		$message['text'] = 'Match was deleted successfully';
		$message['redirect'] = base_url('index.php/AdminController/viewMatches');

		$this->load->view('include/header', $header);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/message', $message);
		$this->load->view('include/footer');
	}

	public function deleteMatch($matchId)
	{
		//  header
		$header = array(
			"title" => "Delete Match",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// gather existing data
		$this->load->model('AdminModel');
		$data['match'] = $this->AdminModel->getMatch($matchId);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/match/delete_match', $data);
			$this->load->view('include/footer');
		} else {
			$this->AdminModel->deleteMatch($matchId);

			$message['text'] = 'Match was deleted successfully';
			$message['redirect'] = base_url('index.php/AdminController/viewMatches');

			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/message', $message);
			$this->load->view('include/footer');
		}
	}

	public function viewTournaments()
	{
		// header
		$header = array(
			"title" => "Tournaments",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'tournaments';

		// retrieve data
		$this->load->model('AdminModel');
		$data['tournaments'] = $this->AdminModel->getTournaments();

		// load views
		$this->load->view('include/header', $header);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/tournament/view_tournaments', $data);
		$this->load->view('include/footer');
	}

	public function viewTournament($tournamentId)
	{
		// retrieve data
		$this->load->model('AdminModel');
		$data['tournament'] = $this->AdminModel->getTournament($tournamentId);
		$data['matches'] = $this->AdminModel->getTournamentMatches($tournamentId);

		// header
		$tournamentName = $data['tournament']->tournamentName;
		$header = array(
			"title" => $tournamentName,
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// loading views
		$this->load->view('include/header', $header);
		$this->load->view('admin/sidebar', $data);
		$this->load->view("admin/tournament/profile", $data);
		$this->load->view('include/footer');
	}

	public function addTournament()
	{
		//  header
		$header = array(
			"title" => "Add Tournament",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// set validation rules
		$this->form_validation->set_rules('tournamentName', 'Name', 'required');
		$this->form_validation->set_rules('tournamentPlace', 'Place', 'required');

		if ($this->form_validation->run() == FALSE) {
			// form is nnot submitted
			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/tournament/add_tournament');
			$this->load->view('include/footer');
		} else {
			$this->load->model('AdminModel');
			$this->AdminModel->addTournament();

			// feedback
			$message['text'] = 'Tournament was added successfully';
			$message['redirect'] = base_url('index.php/AdminController/viewTournaments');

			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/message', $message);
			$this->load->view('include/footer');
		}
	}

	public function editTournament($tournamentId)
	{
		//  header
		$header = array(
			"title" => "Edit Tournament",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// gather existing data
		$this->load->model('AdminModel');
		$data['tournament'] = $this->AdminModel->getTournament($tournamentId);

		// set validation rules
		$this->form_validation->set_rules('tournamentName', 'Name', 'required');
		$this->form_validation->set_rules('tournamentPlace', 'place', 'required');

		if ($this->form_validation->run() == FALSE) {
			// form is not submitted
			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/tournament/edit_tournament', $data);
			$this->load->view('include/footer');
		} else {
			// submitted
			$this->AdminModel->editTournament($tournamentId);

			$message['text'] = 'Tournament was updated successfully';
			$message['redirect'] = base_url('index.php/AdminController/viewTournaments');

			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/message', $message);
			$this->load->view('include/footer');
		}
	}

	public function deleteTournamentConfirmed($tournamentId)
	{
		//  header
		$header = array(
			"title" => "Delete Tournament",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// execute functions
		$this->load->model('AdminModel');
		$data['tournament'] = $this->AdminModel->deleteTournament($tournamentId);

		// feedback
		$message['text'] = 'Tournament was deleted successfully';
		$message['redirect'] = base_url('index.php/AdminController/viewTournaments');

		// load message
		$this->load->view('include/header', $header);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/message', $message);
		$this->load->view('include/footer');
	}

	public function deleteTournament($tournamentId)
	{
		//  header
		$header = array(
			"title" => "Delete Tournament",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// gather existing data
		$this->load->model('AdminModel');
		$data['tournament'] = $this->AdminModel->getTournament($tournamentId);

		if ($this->form_validation->run() == FALSE) {
			// form is not run
			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/tournament/delete_tournament', $tournamentId);
			$this->load->view('include/footer');
		} else {
			// form submitted
			$this->AdminModel->deleteTournament($tournamentId);

			$message['text'] = 'Tournament was deleted successfully';
			$message['redirect'] = base_url('index.php/AdminController/viewTournaments');

			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/message', $message);
			$this->load->view('include/footer');
		}
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

		// set validation rules
		$this->form_validation->set_rules('userName', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('playerName', 'Name', 'required');

		if ($this->form_validation->run() == FALSE) {
			// form is not submitted
			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/player/add_player');
			$this->load->view('include/footer');
		} else {
			// form is submitted
			// execute functions
			$this->load->model('AdminModel');
			$this->AdminModel->addPlayer();

			// feedback
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
		$this->form_validation->set_rules('playerName', 'Name', 'required');

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
			$this->AdminModel->deletePlayer($userId);

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
			"title" => "Trainers",
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
		$this->form_validation->set_rules('trainerName', 'Name', 'required');

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
		$this->form_validation->set_rules('trainerName', 'Name', 'required');

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
			$this->AdminModel->deleteTrainer($userId);

			$message['text'] = 'Trainer was deleted successfully';
			$message['redirect'] = base_url('index.php/AdminController/viewTrainers');

			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/message', $message);
			$this->load->view('include/footer');
		}
	}








	public function viewAccountants()
	{
		// header
		$header = array(
			"title" => "Administrator",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'accountants';

		// retrieve data
		$this->load->model('AdminModel');
		$data['accountants'] = $this->AdminModel->getAccountants();

		// load views
		$this->load->view('include/header', $header);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/accountant/view_accountants', $data);
		$this->load->view('include/footer');
	}

	public function viewAccountant($userId)
	{
		// retrieve data
		$this->load->model('AdminModel');
		$data['accountant'] = $this->AdminModel->getAccountant($userId);

		// header
		$accountantName = $data['accountant']->name;
		$header = array(
			"title" => $accountantName,
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// loading views
		$this->load->view('include/header', $header);
		$this->load->view('admin/sidebar', $data);
		$this->load->view("admin/accountant/profile", $data);
		$this->load->view('include/footer');
	}

	public function addAccountant()
	{
		//  header
		$header = array(
			"title" => "Add Accountant",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		$this->form_validation->set_rules('userName', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('accountantName', 'Name', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/accountant/add_accountant');
			$this->load->view('include/footer');
		} else {
			$this->load->model('AdminModel');
			$this->AdminModel->addAccountant();

			$message['text'] = 'Accountant was addedd successfully';
			$message['redirect'] = base_url('index.php/AdminController/viewAccountants');

			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/message', $message);
			$this->load->view('include/footer');
		}
	}

	public function editAccountant($userId)
	{
		//  header
		$header = array(
			"title" => "Edit Accountant",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// gather existing data
		$this->load->model('AdminModel');
		$data['accountant'] = $this->AdminModel->getAccountant($userId);

		$this->form_validation->set_rules('userName', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('accountantName', 'Name', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/accountant/edit_accountant', $data);
			$this->load->view('include/footer');
		} else {
			$this->AdminModel->editAccountant($userId);

			$message['text'] = 'Accountant was updated successfully';
			$message['redirect'] = base_url('index.php/AdminController/viewAccountants');

			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/message', $message);
			$this->load->view('include/footer');
		}
	}

	public function deleteAccountantConfirmed($userId)
	{
		//  header
		$header = array(
			"title" => "Delete Accounant",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		$data['active'] = 'none';

		$this->load->model('AdminModel');
		$data['accountant'] = $this->AdminModel->deleteAccountant($userId);

		$message['text'] = 'Accountant was deleted successfully';
		$message['redirect'] = base_url('index.php/AdminController/viewAccountants');

		$this->load->view('include/header', $header);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/message', $message);
		$this->load->view('include/footer');
	}

	public function deleteAccountant($userId)
	{
		//  header
		$header = array(
			"title" => "Delete Accountant",
			"dashboardTitle" => "Administrator Dashboard",
			"userName" => "Administrator Name",
			"userRole" => "Administrator"
		);

		// sidebar
		$data['active'] = 'none';

		// gather existing data
		$this->load->model('AdminModel');
		$data['accountant'] = $this->AdminModel->getAccountant($userId);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('include/header', $header);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/accountant/delete_accountant', $data);
			$this->load->view('include/footer');
		} else {
			$this->AdminModel->deleteAccountant($userId);

			$message['text'] = 'Accountant was deleted successfully';
			$message['redirect'] = base_url('index.php/AdminController/viewAccountants');

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
		$data['date'] = "$year-$month-$day";

		$this->load->model('AdminModel');
		$data['matches'] = $this->AdminModel->getDateMatches("$year-$month-$day");

		//loding views
		$this->load->view('include/header', $header);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/day', $data);
		$this->load->view('include/footer');
	}
}
