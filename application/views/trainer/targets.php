<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Team Targets</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="all,follow" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url("vendor/bootstrap/css/bootstrap.min.css"); ?>" />
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800" />
    <!-- orion icons-->
    <link rel="stylesheet" href="<?php echo base_url("css/orionicons.css"); ?>" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url("css/style.default.css"); ?>" id="theme-stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url("css/custom.css"); ?>" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url("img/favicon.png?3"); ?>" />
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
        ><![endif]-->
</head>

<body>
    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
            <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
                <i class="fas fa-align-left"></i>
            </a>
            <a href="#" class="navbar-brand font-weight-bold text-uppercase text-base">Trainer Dashboard - Targets</a>
            <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
                <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="<?php echo base_url("img/avatar-6.jpg"); ?>" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
                    <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">Mark Stephen</strong><small>Trainer</small></a>
                        <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log </a>
                        <div class="dropdown-divider"></div><a href="login.html" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="d-flex align-items-stretch">

        <!-- Side Bar -->
        <div id="sidebar" class="sidebar py-3">
            <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">Tools</div>
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-list-item"><a href="<?php echo site_url('trainerController/index'); ?>" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Practice Sessions</span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray active"></i><span>Targets</span></a></li>
            </ul>
        </div>

        <div class="page-holder w-100 d-flex flex-wrap">
            <div class="container-fluid px-xl-5">
                <section class="py-5">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <div class="dot mr-3 bg-violet"></div>
                                    <div class="text">
                                        <h6 class="mb-0">Stats for this Season</h6>
                                        <!-- <span class="text-gray">380</span> -->
                                    </div>
                                </div>
                                <div class="icon text-white bg-violet">
                                    <i class="fas fa-server"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <div class="dot mr-3 bg-green"></div>
                                    <div class="text">
                                        <h6 class="mb-0">Tournaments</h6>
                                        <span class="text-gray">6</span>
                                    </div>
                                </div>
                                <div class="icon text-white bg-green">
                                    <i class="far fa-clipboard"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <div class="dot mr-3 bg-blue"></div>
                                    <div class="text">
                                        <h6 class="mb-0">Matches</h6>
                                        <span class="text-gray">280</span>
                                    </div>
                                </div>
                                <div class="icon text-white bg-blue">
                                    <i class="fa fa-dolly-flatbed"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <div class="dot mr-3 bg-red"></div>
                                    <div class="text">
                                        <h6 class="mb-0">Players in Team Sheet</h6>
                                        <span class="text-gray">36</span>
                                    </div>
                                </div>
                                <div class="icon text-white bg-red">
                                    <i class="fas fa-receipt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Table section -->
                <section>
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
                                                        <a href="<?php echo site_url('trainerController/edit_target'); ?>/<?php echo $row->t_id; ?>" data-toggle="modal" data-target="#attModal" class="btn btn-outline-info btn-sm">Edit</a>

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
                                                                        <form method="post" action="<?php echo site_url('trainerController/update_target_att') ?>/<?php echo $row->t_id; ?>">
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
                                                        <a href="<?php echo site_url('trainerController/edit_target'); ?>/<?php echo $row->t_id; ?>" data-toggle="modal" data-target="#midModal" class="btn btn-outline-info btn-sm">Edit</a>

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
                                                                        <form method="post" action="<?php echo site_url('trainerController/update_target_mid') ?>/<?php echo $row->t_id; ?>">
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
                                                        <a href="<?php echo site_url('trainerController/edit_target'); ?>/<?php echo $row->t_id; ?>" data-toggle="modal" data-target="#defModal" class="btn btn-outline-info btn-sm">Edit</a>

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
                                                                        <form method="post" action="<?php echo site_url('trainerController/update_target_def') ?>/<?php echo $row->t_id; ?>">
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
                                                        <a href="<?php echo site_url('trainerController/edit_target'); ?>/<?php echo $row->t_id; ?>" data-toggle="modal" data-target="#gkModal" class="btn btn-outline-info btn-sm">Edit</a>

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
                                                                        <form method="post" action="<?php echo site_url('trainerController/update_target_gk') ?>/<?php echo $row->t_id; ?>">
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

            <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-left text-primary">
                            <p class="mb-2 mb-md-0">Golden Arrow</p>
                        </div>
                        <div class="col-md-6 text-center text-md-right text-gray-400">
                            <p class="mb-0">Developed by UCSC-46</p>
                            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="<?php echo base_url("vendor/jquery/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("vendor/popper.js/umd/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("vendor/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("vendor/jquery.cookie/jquery.cookie.js"); ?>"></script>
    <script src="<?php echo base_url("vendor/chart.js/Chart.min.js"); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="<?php echo base_url("js/charts-home.js"); ?>"></script>
    <script src="<?php echo base_url("js/front.js"); ?>"></script>
</body>

</html>