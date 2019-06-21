<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<!-- Form Elements -->
				<div class="col-lg-12 mb-5">
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">Edit Match</h3>
						</div>
						<div class="card-body">
							<?php echo validation_errors(); ?>
							<?php echo form_open("AdminController/editMatch/$match->matchId", 'class="form-horizontal"'); ?>
							
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Tournament ID</label>
								<div class="col-md-9">
									<input type="text" name='tournamentId' class="form-control" value='<?php echo $match->tournamentId?>'>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-3 form-control-label">Name</label>
								<div class="col-md-9">
									<input type="text" name='name' class="form-control" value='<?php echo $match->name?>'>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-3 form-control-label">Location</label>
								<div class="col-md-9">
									<input type="text" name='location' class="form-control" value='<?php echo $match->location?>'>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-3 form-control-label">Date</label>
								<div class="col-md-9">
									<input type="date" name='date' class="form-control" value='<?php echo $match->date?>'>
								</div>
							</div>
	
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Time</label>
								<div class="col-md-9">
									<input type="time" name='time' class="form-control" value='<?php echo $match->time?>'>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-3 form-control-label">Played</label>
								<div class="col-md-9">
									<select name="played" class="form-control">
										<option <?php if ($match->played==1) echo 'selected'?> value='1'>Yes</option>
										<option <?php if ($match->played==0) echo 'selected'?> value='0'>No</option>
									</select> </div>
							</div>

							<div class="form-group row">
								<label class="col-md-3 form-control-label">Score</label>
								<div class="col-md-9">
									<input type="text" name='score' class="form-control" <?php if ($match->played==1) echo "value='$match->score'"?> >
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-3 form-control-label">Opponent score</label>
								<div class="col-md-9">
									<input type="text" name='scoreOpponent' class="form-control" <?php if ($match->played==1) echo "value='$match->scoreOpponent'"?>>
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