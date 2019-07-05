<?php

class AdminModel extends CI_Model
{
	public function getTournaments()
	{
		$this->db->select('*');
		$this->db->from('tournament');

		$query = $this->db->get();

		return $query->result();
	}

	public function getTournament($tournamentId)
	{
		$this->db->select('*');
		$this->db->from('tournament');
		$this->db->where('tournamentId', $tournamentId);

		$query = $this->db->get();

		return $query->row();
	}

	public function addTournament()
	{
		// init user
		$tournamentData = array(
			'tournamentName' => $this->input->post('tournamentName'),
			'tournamentPlace' => $this->input->post('tournamentPlace'),
		);

		$this->db->insert('tournament', $tournamentData);
	}

	public function editTournament($tournamentId)
	{
		// init user
		$tournamentData = array(
			'tournamentId' => $tournamentId,
			'tournamentName' => $this->input->post('tournamentName'),
			'tournamentPlace' => $this->input->post('tournamentPlace'),
		);

		$this->db->replace('tournament', $tournamentData);
	}

	public function deleteTournament($tournamentId)
	{
		$this->db->where('tournamentId', $tournamentId);
		$this->db->delete('tournament');
	}

	public function getMatches()
	{
		$this->db->select('*');
		$this->db->from('matchData');
		$this->db->join('tournament', 'matchData.tId = tournament.tournamentId');

		$query = $this->db->get();

		return $query->result();
	}

	public function getMatch($matchId)
	{
		$this->db->select('*');
		$this->db->from('matchData');
		$this->db->where('matchId', $matchId);
		$this->db->join('tournament', 'matchData.tId = tournament.tournamentId');

		$query = $this->db->get();

		return $query->row();
	}

	public function getTournamentMatches($tournamentId)
	{
		$this->db->select('*');
		$this->db->from('matchData');
		$this->db->where('tId', $tournamentId);
		$this->db->join('tournament', 'matchData.tId = tournament.tournamentId');

		$query = $this->db->get();
		return $query->result();
	}

	public function addMatch()
	{
		// init user
		$matchData = array(
			'tId' => $this->input->post('tournamentId'),
			'matchName' => $this->input->post('matchName'),
			'matchLocation' => $this->input->post('matchLocation'),
			'matchDate' => $this->input->post('matchDate'),
			'matchTime' => $this->input->post('matchTime'),
			'matchPlayed' => $this->input->post('matchPlayed'),
		);

		if ($this->input->post('matchPlayed') == 1) {
			$matchData += array(
				'matchScore' => $this->input->post('matchScore'),
				'matchScoreOpponent' => $this->input->post('matchScoreOpponent'),
			);
		}

		$this->db->insert('matchData', $matchData);

		// get userId of player record
		$query = $this->db->get_where('matchData', $matchData);
		$result = $query->row();
	}

	public function editMatch($matchId)
	{
		// init user
		$matchData = array(
			'matchId' => $matchId,
			'tId' => $this->input->post('tournamentId'),
			'matchName' => $this->input->post('matchName'),
			'matchLocation' => $this->input->post('matchLocation'),
			'matchDate' => $this->input->post('matchDate'),
			'matchTime' => $this->input->post('matchTime'),
			'matchPlayed' => $this->input->post('matchPlayed'),
		);

		if ($this->input->post('matchPlayed') == 1) {
			$matchData += array(
				'matchScore' => $this->input->post('matchScore'),
				'matchScoreOpponent' => $this->input->post('matchScoreOpponent'),
			);
		}
		$this->db->replace('matchData', $matchData);
	}

	public function deleteMatch($matchId)
	{
		$this->db->where('matchId', $matchId);
		$this->db->delete('matchData');
	}

	public function getPlayers()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('userRole', 'player');
		$this->db->join('playerData', 'user.userId = playerData.playerId');

		$query = $this->db->get();
		return $query->result();
	}

	public function getPlayer($userId)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('userRole', 'player');
		$this->db->where('userId', $userId);
		$this->db->join('playerData', 'user.userId = playerData.playerId');

		$query = $this->db->get();
		return $query->row();
	}

	public function addPlayer()
	{
		// init user
		$userData = array(
			'userName' => $this->input->post('userName'),
			'password' => $this->input->post('password'),
			'userRole' => 'player',
			'accountStatus' => $this->input->post('accountStatus'),
		);

		$this->db->insert('user', $userData);

		// get userId of player record
		$query = $this->db->get_where('user', $userData);
		$result = $query->row();

		$playerId = $result->userId;

		// add player specific data to playerData table
		$playerData = array(
			'playerId' => $playerId,
			'playerName' => $this->input->post('playerName'),
			'playerPosition' => $this->input->post('playerPosition')
		);

		$this->db->insert('playerData', $playerData);
	}

	public function editPlayer($userId)
	{
		// init user
		$userData = array(
			'userId' => $userId,
			'userName' => $this->input->post('userName'),
			'password' => $this->input->post('password'),
			'userRole' => 'player',
			'accountStatus' => $this->input->post('accountStatus'),
		);

		$this->db->replace('user', $userData);

		// add player specific data to playerData table
		$playerData = array(
			'playerId' => $userId,
			'playerName' => $this->input->post('playerName'),
			'playerPosition' => $this->input->post('playerPosition')
		);

		$this->db->replace('playerData', $playerData);
	}

	public function deletePlayer($userId)
	{
		$this->db->where('userId', $userId);
		$this->db->delete('user');

		$this->db->where('playerId', $userId);
		$this->db->delete('playerData');
	}

	public function getTrainers()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('userRole', 'trainer');
		$this->db->join('trainerData', 'user.userId = trainerData.trainerId');

		$query = $this->db->get();
		return $query->result();
	}

	public function getTrainer($userId)
	{
		$this->db->select('');
		$this->db->from('user');
		$this->db->where('userRole', 'trainer');
		$this->db->where('userId', $userId);
		$this->db->join('trainerData', 'user.userId = trainerData.trainerId');

		$query = $this->db->get();
		return $query->row();
	}

	public function addTrainer()
	{
		// init user
		$userData = array(
			'userName' => $this->input->post('userName'),
			'password' => $this->input->post('password'),
			'userRole' => 'trainer',
			'accountStatus' => 1
		);

		$this->db->insert('user', $userData);

		// get userId of player record
		$query = $this->db->get_where('user', $userData);
		$result = $query->row();

		// add player specific data to playerData table
		$trainerData = array(
			'trainerId' => $result->userId,
			'trainerName' => $this->input->post('trainerName'),
		);

		$this->db->insert('trainerData', $trainerData);

		// add empty target record
		$targetData = array(
			't_id' => $result->userId,
			'att_goals' => 0,
			'att_assists' => 0,
			'mid_assists' => 0,
			'mid_chances' => 0,
			'def_balls_won' => 0,
			'def_tackles' => 0,
			'clean_sheets' => 0,
			'saves' => 0,
		);

		$this->db->insert('targets', $targetData);
	}

	public function editTrainer($userId)
	{
		// init user
		$userData = array(
			'userId' => $userId,
			'userName' => $this->input->post('userName'),
			'password' => $this->input->post('password'),
			'userRole' => 'trainer',
			'accountStatus' => 1,
		);

		$this->db->replace('user', $userData);

		// add player specific data to playerData table
		$trainerData = array(
			'trainerId' => $userId,
			'trainerName' => $this->input->post('trainerName'),
		);

		$this->db->replace('trainerData', $trainerData);
	}

	public function deleteTrainer($userId)
	{
		$this->db->where('userId', $userId);
		$this->db->delete('user');

		$this->db->where('trainerId', $userId);
		$this->db->delete('trainerData');
	}

	public function getAccountants()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('userRole', 'accountant');
		$this->db->join('accountantData', 'user.userId = accountantData.accountantId');

		$query = $this->db->get();
		return $query->result();
	}

	public function getAccountant($userId)
	{
		$this->db->select('');
		$this->db->from('user');
		$this->db->where('userRole', 'accountant');
		$this->db->where('userId', $userId);
		$this->db->join('accountantData', 'user.userId = accountantData.accountantId');

		$query = $this->db->get();
		return $query->row();
	}

	public function addAccountant()
	{
		// init user
		$userData = array(
			'userName' => $this->input->post('userName'),
			'password' => $this->input->post('password'),
			'userRole' => 'accountant',
			'accountStatus' => 1
		);

		$this->db->insert('user', $userData);

		// get userId of player record
		$query = $this->db->get_where('user', $userData);
		$result = $query->row();

		// add player specific data to playerData table
		$accountantData = array(
			'accountantId' => $result->userId,
			'accountantName' => $this->input->post('accountantName'),
		);

		$this->db->insert('accountantData', $accountantData);
	}

	public function editAccountant($userId)
	{
		// init user
		$userData = array(
			'userId' => $userId,
			'userName' => $this->input->post('userName'),
			'password' => $this->input->post('password'),
			'userRole' => 'accountant',
			'accountStatus' => 1
		);

		$this->db->replace('user', $userData);

		// add player specific data to playerData table
		$accountantData = array(
			'accountantId' => $userId,
			'accountantName' => $this->input->post('accountantName'),
		);

		$this->db->replace('accountantData', $accountantData);
	}

	public function deleteAccountant($userId)
	{
		$this->db->where('userId', $userId);
		$this->db->delete('user');

		$this->db->where('accountantId', $userId);
		$this->db->delete('accountantData');
	}

	public function getPlayerCount()
	{
		$query = $this->db->count_all('playerData');  // Produces an integer, like 25
		return $query;
	}

	public function getTrainerCount()
	{
		$query = $this->db->count_all('trainerData');  // Produces an integer, like 25
		return $query;
	}

	public function getMatchCount()
	{
		$query = $this->db->count_all('matchData');  // Produces an integer, like 25
		return $query;
	}

	public function getTournamentCount()
	{
		$query = $this->db->count_all('tournament');  // Produces an integer, like 25
		return $query;
	}

	public function getDateMatches($date)
	{
		$this->db->select('*');
		$this->db->from('matchData');
		$this->db->where('matchDate', $date);

		$this->db->join('tournament', 'matchData.tId = tournament.tournamentId');

		$query = $this->db->get();
		return $query->result();
	}
}
