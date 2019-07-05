<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<!-- Cards -->
		<section class="py-5">
			<div class="row">
				<div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
					<div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
						<div class="flex-grow-1 d-flex align-items-center">
							<div class="dot mr-3 bg-violet"></div>
							<div class="text">
								<h6 class="mb-0">Matches</h6>
								<span class="text-gray"><?= $matchCount ?></span>
							</div>
						</div>
						<div class="icon text-white bg-violet">
							<i class="fas fa-futbol"></i>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
					<div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
						<div class="flex-grow-1 d-flex align-items-center">
							<div class="dot mr-3 bg-green"></div>
							<div class="text">
								<h6 class="mb-0">Tournaments</h6>
								<span class="text-gray"><?= $tournamentCount ?></span>
							</div>
						</div>
						<div class="icon text-white bg-green">
							<i class="fas fa-trophy"></i>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
					<div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
						<div class="flex-grow-1 d-flex align-items-center">
							<div class="dot mr-3 bg-blue"></div>
							<div class="text">
								<h6 class="mb-0">Players</h6>
								<span class="text-gray"><?= $playerCount ?></span>
							</div>
						</div>
						<div class="icon text-white bg-blue">
							<i class="fas fa-users"></i>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
					<div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
						<div class="flex-grow-1 d-flex align-items-center">
							<div class="dot mr-3 bg-red"></div>
							<div class="text">
								<h6 class="mb-0">Trainers</h6>
								<span class="text-gray"><?= $trainerCount ?></span>
							</div>
						</div>
						<div class="icon text-white bg-red">
							<i class="fas fa-user-tie"></i>
						</div>
					</div>
				</div>
			</div>

			<!--Calendar-->
			<section class="py-5">

				<div class="row">
					<div class="col-xl-8 col-lg-8 mb-12 mb-xl-0">
						<div class="card">
							<div class="card-header">
								<h6 class="text-uppercase mb-0">Calendar (<?php echo (date("Y, M")) ?>)</h6>
							</div>
							<div class="card-body">
								<div class="flex-grow-1 d-flex align-items-center">
									<?php $this->load->view('admin/calendar'); ?>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 mb-12 mb-xl-0">
						<div class="card">
							<div class="card-header">
								<h6 class="text-uppercase mb-0">Schedule</h6>
							</div>
							<div class="card-body">
								<?php
								if (empty($matches) && empty($practice_sessions)) {
									echo "There are no matches and practice sessions today!";
								} elseif (empty($matches)) {
									echo "There are no matches today!";
								} elseif (empty($practice_sessions)) {
									echo "There are no matches today!";
								} else {
									foreach ($matches as $row) {
										echo "<h3>$row->matchName</h3><br>";
										echo "<strong>Tournament: </strong>$row->tournamentName<br>";
										echo "<strong>Location: </strong>$row->matchLocation<br>";
										echo "<strong>Time: </strong>$row->matchTime<br>";
										echo "<strong>Score: </strong>";
										if ($row->matchPlayed == 1) {
											echo "$row->matchScore - $row->matchScoreOpponent";
										} else {
											echo "Not played";
										}
										echo "<br><br>";
										$matchesURL = base_url('AdminController/viewMatches');
										echo "<a class='btn btn-sm btn-primary' href='$matchesURL'>Details</a>";
										echo "<br><br>";
									}

									foreach ($practice_sessions as $row) {
										echo "<h3>Practice Session ($row->duration hours)</h3><br>";
										echo "<strong>Dribbling: </strong>$row->dribbling<br>";
										echo "<strong>Passing: </strong>$row->passing<br>";
										echo "<strong>Shooting: </strong>$row->shooting<br>";
										echo "<strong>Defending: </strong>$row->defending<br>";
										echo "<strong>Set Pieces: </strong>$row->set_pieces<br>";
										echo "<strong>Goal Keeper: </strong>$row->goal_keeper<br>";
										echo "<br>";
										$practiceSessionsURL = base_url('index.php/AdminController/viewPracticeSessions');
										echo "<a class='btn btn-sm btn-warning' href='$practiceSessionsURL'>Details</a>";
										echo "<br><br>";
									}
								}
								?>
							</div>
						</div>
					</div>
			</section>
		</div>
