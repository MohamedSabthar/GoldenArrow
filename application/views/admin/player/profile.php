<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-12">
					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Profile</h6>
						</div>
						<div class="card-body">
							<p>
								<h6>
									User ID
								</h6>
								<?php echo $player->userId ?>
							</p>
							<p>
								<h6>
									Username
								</h6>
								<?php echo $player->userName ?>
							</p>
							<p>
								<h6>
									Status
								</h6>
								<?php echo $player->accountStatus ?>
							</p>
							<p>
								<h6>
									Full name
								</h6>
								<?php echo $player->playerName ?>
							</p>
							<p>
								<h6>
									Position
								</h6>
								<?php echo $player->playerPosition ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>