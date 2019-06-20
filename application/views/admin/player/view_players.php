<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-12">
					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Players</h6>
						</div>
						<div class="card-body">
							<table class="table card-text">
								<thead>
									<tr>
										<th>#</th>
										<th>Username</th>
										<th>Status</th>
										<th>Full name</th>
										<th>Position</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($players as $row) {
										$profileUrl = base_url("index.php/AdminController/viewPlayer/$row->userId");
										$editUrl = base_url("index.php/AdminController/viewPlayer/$row->userId");
										$deleteUrl = base_url("index.php/AdminController/viewPlayer/$row->userId");
										echo '<tr>';
										echo "<th scope='row'>$row->userId</th>";
										echo "<td>$row->userName</td>";
										if ($row->accountStatus == 1) {
											echo "<td>Active</td>";
										} else {
											echo "<td>Blocked</td>";
										}
										echo "<td>Jane Doe</td>";
										echo "<td>Defence</td>";
										echo "<td><a class='btn btn-primary' href='$profileUrl'>Profile</a>&nbsp<a class='btn btn-warning' href='$editUrl#'>Edit</a>&nbsp<a class='btn btn-warning' href='$deleteUrl'>Delete</a></td>";
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