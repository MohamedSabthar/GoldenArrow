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
								if (empty($matches)) {
									echo "There are no matches scheduled today!";
								} else {
									foreach ($matches as $row) {
										echo "<h3>$row->matchName</h3>";
										echo "<p><strong>Tournament: </strong>$row->tournamentName";
										echo "<p><strong>Location: </strong>$row->matchLocation";
										echo "<p><strong>Time: </strong>$row->matchTime";
										echo "<p><strong>Score: </strong>";
										if ($row->matchPlayed == 1) {
											echo "$row->matchScore - $row->matchScoreOpponent";
										} else {
											echo "Not played";
										}
										echo "<br><br>";
									}
								}
								?>
							</div>
						</div>
					</div>
			</section>