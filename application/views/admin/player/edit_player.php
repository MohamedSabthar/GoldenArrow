<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<!-- Form Elements -->
				<div class="col-lg-12 mb-5">
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">Edit Player</h3>
						</div>
						<div class="card-body">
							<?php echo validation_errors(); ?>
							<?php echo form_open("AdminController/editPlayer/$player->userId", 'class="form-horizontal"'); ?>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Username</label>
								<div class="col-md-9">
									<input type="text" name='userName' class="form-control" value='<?php echo $player->userName ?>'>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-3 form-control-label">Password</label>
								<div class="col-md-9">
									<input type="password" name='password' class="form-control" value='<?php echo $player->password ?>''>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 form-control-label">Status</label>
									<div class="col-md-9">
										<select name="accountStatus" class="form-control">
											<option <?php if ($player->accountStatus == 1) echo 'selected' ?> value=' 1'>Active</option>
									<option <?php if ($player->accountStatus == 0) echo 'selected' ?> value='0'>Blocked</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-3 form-control-label">Name</label>
								<div class="col-md-9">
									<input type="text" name='playerName' class="form-control" value='<?php echo $player->playerName ?>''>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 form-control-label">Position</label>
									<div class="col-md-9">
										<select name="playerPosition" class="form-control">
											<option <?php if (strcmp($player->playerPosition, 'Attacker') == 0) echo 'selected' ?> >Attacker</option>
											<option <?php if (strcmp($player->playerPosition, 'Mid-fielder') == 0) echo 'selected' ?> >Mid-fielder</option>
											<option <?php if (strcmp($player->playerPosition, 'Defender') == 0) echo 'selected' ?> >Defender</option>
											<option <?php if (strcmp($player->playerPosition, 'Goal-keeper') == 0) echo 'selected' ?> >Goal-keeper</option>
										</select>
									</div>
								</div>

								<div class="form-group row">
								<label class="col-md-3 form-control-label">Date</label>
								<div class="col-md-9">
									<input type="date" name='DOB' class="form-control" value='<?php echo $player->DOB ?>'>
								</div>
							</div>

								<div class="line"></div>
								<div class="form-group row">
									<div class="col-md-9 ml-auto">
										<button type="submit" class="btn btn-primary">Save</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>