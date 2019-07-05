<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-4">
					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Confirm deletion</h6>
						</div>
						<div class='card-body'>
							Do you really want to delete <?= $player->playerName ?>?<p><br>
								<a href='<?= base_url("index.php/AdminController/deletePlayerConfirmed/$player->userId") ?>' class='btn btn-success'>Delete</a>
						</div>
					</div>
				</div>
			</div>

	</div>
	</section>