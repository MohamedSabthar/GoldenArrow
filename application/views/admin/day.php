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
							if (empty($matches)) {
								echo "There are no matches scheduled on this date";
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
									echo "<br>";
									echo "<br><br>";
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>