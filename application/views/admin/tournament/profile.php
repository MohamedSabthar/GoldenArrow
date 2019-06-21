<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-3 mb-12">
					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Tournament</h6>
						</div>
						<div class="card-body">
							<p>
								<h6>
									Tournament ID
								</h6>
								<?php echo $tournament->tournamentId ?>
							</p>
							<p>
								<h6>
									Name
								</h6>
								<?php echo $tournament->name ?>
							</p>
							<p>
								<h6>
									Place
								</h6>
								<?php echo $tournament->place ?>
							</p>
						</div>
					</div>
				</div>

				<div class="col-lg-9 mb-12">
					<div class="card">
						<div class="card-header">
							<h6 style='float:left' class="text-uppercase mb-0">Players</h6>
							<div style='float:right'><a class='btn btn-primary' href="<?=base_url("index.php/AdminController/addTournamentMatch/$tournament->tournamentId")?>">+</a></div>
						</div>
						<div class="card-body">
							<table class="table card-text">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Location</th>
										<th>Date</th>
										<th>Time</th>
										<th>Played</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($matches as $row) {
										$editUrl = base_url("index.php/AdminController/editMatch/$row->matchId");
										$deleteUrl = base_url("index.php/AdminController/deleteMatch/$row->matchId");
										echo '<tr>';
										echo "<th scope='row'>$row->tournamentId</th>";
										echo "<td>$row->name</td>";
										echo "<td>$row->location</td>";
										echo "<td>$row->date</td>";
										echo "<td>$row->time</td>";
										if ($row->played==1) {
											echo "<td>Yes ($row->score-$row->scoerOpponent)</td>";
										}
										else {
											echo "<td>No</td>";
										}

										echo "<td style='text-align: right'><a class='btn btn-warning' href='$editUrl'>Edit</a>&nbsp<a class='btn btn-danger' href='$deleteUrl'>Delete</a></td>";
										echo '</tr>';
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>