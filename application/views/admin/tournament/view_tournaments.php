<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-12">
					<div class="card">
						<div class="card-header">
							<h6 style='float:left' class="text-uppercase mb-0">Players</h6>
							<div style='float:right'><a class='btn btn-primary' href="<?=base_url('index.php/AdminController/addTournament')?>">+</a></div>
						</div>
						<div class="card-body">
							<table class="table card-text">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Place</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($tournaments as $row) {
										$profileUrl = base_url("index.php/AdminController/viewTournament/$row->tournamentId");
										$editUrl = base_url("index.php/AdminController/editTournament/$row->tournamentId");
										$deleteUrl = base_url("index.php/AdminController/deleteTournament/$row->tournamentId");
										echo '<tr>';
										echo "<th scope='row'>$row->tournamentId</th>";
										echo "<td>$row->name</td>";
										echo "<td>$row->place</td>";
										echo "<td style='text-align: right'><a class='btn btn-primary' href='$profileUrl'>Profile</a>&nbsp<a class='btn btn-warning' href='$editUrl'>Edit</a>&nbsp<a class='btn btn-danger' href='$deleteUrl'>Delete</a></td>";
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