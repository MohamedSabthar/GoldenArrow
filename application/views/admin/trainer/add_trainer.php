<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<!-- Form Elements -->
				<div class="col-lg-12 mb-5">
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">Add Trainer</h3>
						</div>
						<div class="card-body">
							<?php echo validation_errors(); ?>
							<?php echo form_open('AdminController/addTrainer', 'class="form-horizontal"'); ?>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Username</label>
									<div class="col-md-9">
										<input type="text" name='userName' class="form-control">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 form-control-label">Password</label>
									<div class="col-md-9">
										<input type="password" name='password' class="form-control">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 form-control-label">Name</label>
									<div class="col-md-9">
										<input type="text" name='trainerName' class="form-control">
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