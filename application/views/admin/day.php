<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-4">
					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Events on <?= $date ?></h6>
						</div>
						<div class='card-body'>
							<?php
							if (empty($matches) && empty($practice_sessions)) {
								echo "There are no matches and practice scheduled on this date";
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
			</div>
			</section>
		</div>
