<?php $trainerId = $trainer->userId ?>
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
								<?php echo $trainer->userId ?>
							</p>
							<p>
								<h6>
									Username
								</h6>
								<?php echo $trainer->userName ?>
							</p>
							<p>
								<h6>
									Full name
								</h6>
								<?php echo $trainer->trainerName ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		 <!-- Targets -->
                <section>
					<h1>Targets<br><br></h1>
                    <div class="row">
                        <!-- Attackers -->
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="h6 text-uppercase mb-0">Attackers - Targets</h3>
                                </div>

                                <div class="card-body">
                                    <table class="table table-hover table-lg card-text" style="font-size: 100; font-family: 'Raleway', sans-serif">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Total Goals Scored</th>
                                                <th scope="col">Total Assists</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($result as $row) { ?>
                                                <tr>
                                                    <!-- <th scope="row"><?php echo $row->t_id; ?></th> -->
                                                    <td><?php echo $row->att_goals; ?></td>
                                                    <td><?php echo $row->att_assists; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('AdminController/edit_target'); ?>/<?php echo $row->t_id; ?>" data-toggle="modal" data-target="#attModal" class="btn btn-outline-info btn-sm">Edit</a>

                                                        <!-- Update Modal -->
                                                        <div class="modal fade" id="attModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Enter Targets</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <form method="post" action="<?php echo site_url('AdminController/update_target_att') ?>/<?php echo $row->t_id; ?>">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Total Goals Scored</label>
                                                                                <input type="text" class="form-control" name="att_goals" value="<?php echo $row->att_goals ?>" aria-describedby="emailHelp">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Total Assists</label>
                                                                                <input type="text" class="form-control" name="att_assists" value="<?php echo $row->att_assists ?>" aria-describedby="emailHelp">
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary" value="save">Save Changes</button>
                                                                        </form>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Midfielders -->
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="h6 text-uppercase mb-0">Midfielders - Targets</h3>
                                </div>

                                <div class="card-body">
                                    <table class="table table-hover table-lg card-text" style="font-size: 100; font-family: 'Raleway', sans-serif">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Total Assists Provided</th>
                                                <th scope="col">Total Chances Created</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($result as $row) { ?>
                                                <tr>
                                                    <!-- <th scope="row"><?php echo $row->t_id; ?></th> -->
                                                    <td><?php echo $row->mid_assists; ?></td>
                                                    <td><?php echo $row->mid_chances; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('AdminController/edit_target'); ?>/<?php echo $row->t_id; ?>" data-toggle="modal" data-target="#midModal" class="btn btn-outline-info btn-sm">Edit</a>

                                                        <!-- Update Modal -->
                                                        <div class="modal fade" id="midModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Enter Session Details</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <form method="post" action="<?php echo site_url('AdminController/update_target_mid') ?>/<?php echo $row->t_id; ?>">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Total Assists Provided</label>
                                                                                <input type="text" class="form-control" name="mid_assists" value="<?php echo $row->mid_assists ?>" aria-describedby="emailHelp">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Total Chances Created</label>
                                                                                <input type="text" class="form-control" name="mid_chances" value="<?php echo $row->mid_chances ?>" aria-describedby="emailHelp">
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary" value="save">Save Changes</button>
                                                                        </form>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Defenders -->
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="h6 text-uppercase mb-0">Defenders - Targets</h3>
                                </div>

                                <div class="card-body">
                                    <table class="table table-hover table-lg card-text" style="font-size: 100; font-family: 'Raleway', sans-serif">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Total Balls Won</th>
                                                <th scope="col">Total Successful Tackles</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($result as $row) { ?>
                                                <tr>
                                                    <!-- <th scope="row"><?php echo $row->t_id; ?></th> -->
                                                    <td><?php echo $row->def_balls_won; ?></td>
                                                    <td><?php echo $row->def_tackles; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('AdminController/edit_target'); ?>/<?php echo $row->t_id; ?>" data-toggle="modal" data-target="#defModal" class="btn btn-outline-info btn-sm">Edit</a>

                                                        <!-- Update Modal -->
                                                        <div class="modal fade" id="defModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Enter Session Details</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <form method="post" action="<?php echo site_url('AdminController/update_target_def') ?>/<?php echo $row->t_id; ?>">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Total Balls Won</label>
                                                                                <input type="text" class="form-control" name="def_balls_won" value="<?php echo $row->def_balls_won ?>" aria-describedby="emailHelp">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Total Successful Tackles</label>
                                                                                <input type="text" class="form-control" name="def_tackles" value="<?php echo $row->def_tackles ?>" aria-describedby="emailHelp">
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary" value="save">Save Changes</button>
                                                                        </form>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Goal Keeper -->
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="h6 text-uppercase mb-0">Goal Keeper - Targets</h3>
                                </div>

                                <div class="card-body">
                                    <table class="table table-hover table-lg card-text" style="font-size: 100; font-family: 'Raleway', sans-serif">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Clean Sheets</th>
                                                <th scope="col">Total Saves</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($result as $row) { ?>
                                                <tr>
                                                    <!-- <th scope="row"><?php echo $row->t_id; ?></th> -->
                                                    <td><?php echo $row->clean_sheets; ?></td>
                                                    <td><?php echo $row->saves; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('AdminController/edit_target'); ?>/<?php echo $row->t_id; ?>" data-toggle="modal" data-target="#gkModal" class="btn btn-outline-info btn-sm">Edit</a>

                                                        <!-- Update Modal -->
                                                        <div class="modal fade" id="gkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Enter Session Details</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <form method="post" action="<?php echo site_url('AdminController/update_target_gk') ?>/<?php echo $row->t_id; ?>">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Clean Sheets</label>
                                                                                <input type="text" class="form-control" name="clean_sheets" value="<?php echo $row->clean_sheets ?>" aria-describedby="emailHelp">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Total Saves</label>
                                                                                <input type="text" class="form-control" name="saves" value="<?php echo $row->saves ?>" aria-describedby="emailHelp">
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary" value="save">Save Changes</button>
                                                                        </form>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php  }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                </section>
            </div>
