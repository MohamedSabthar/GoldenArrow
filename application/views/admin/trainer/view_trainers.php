<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-12">
					<div class="card">
						<div class="card-header">
							<h6 style='float:left' class="text-uppercase mb-0">Trainers </h6>
							<div style='float:right'><a class='btn btn-primary' href="<?= base_url('index.php/AdminController/addTrainer') ?>">+</a></div>
						</div>
						<div class="card-body">
							<table class="table card-text">
								<thead>
									<tr>
										<th>#</th>
										<th>Username</th>
										<th>Full name</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($trainers as $row) {
										$profileUrl = base_url("index.php/AdminController/viewTrainer/$row->userId");
										$editUrl = base_url("index.php/AdminController/editTrainer/$row->userId");
										$deleteUrl = base_url("index.php/AdminController/deleteTrainer/$row->userId");
										echo '<tr>';
										echo "<th scope='row'>$row->userId</th>";
										echo "<td>$row->userName</td>";
										echo "<td>$row->trainerName</td>";
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