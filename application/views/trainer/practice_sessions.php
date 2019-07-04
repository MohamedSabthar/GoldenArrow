<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Practice Sessions</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url("vendor/bootstrap/css/bootstrap.min.css"); ?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="<?php echo base_url("css/orionicons.css"); ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url("css/style.default.css"); ?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url("css/custom.css"); ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url("img/favicon.png?3"); ?>">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
            <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
                <i class="fas fa-align-left"></i>
            </a>
            <a href="#" class="navbar-brand font-weight-bold text-uppercase text-base">Trainer Dashboard - Practice Sessions</a>
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
        <!-- Side bar -->
        <div id="sidebar" class="sidebar py-3">
            <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">Tools</div>
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Practice Sessions</span></a></li>
                <li class="sidebar-list-item"><a href="<?php echo site_url('trainerController/indexTarget'); ?>" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Targets</span></a></li>
            </ul>
        </div>

        <div class="page-holder w-100 d-flex flex-wrap">
            <div class="container-fluid px-xl-5">
                <!-- Create new session button -->
                <section class="py-5">
                    <div class="row">
                        <!-- Modal Form-->
                        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                            <!-- <div class="col-lg-4 mb-5"> -->
                            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <div class="dot mr-3 bg-blue"></div>
                                    <div class="text">
                                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Create New Session</button>
                                        <!-- Modal -->
                                        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                            <div role="document" class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 id="exampleModalLabel" class="modal-title">Enter Session Details</h4>
                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form method="post" action="<?php echo site_url('trainerController/create') ?>">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Session ID</label>
                                                                <input type="text" class="form-control" name="ps_id" aria-describedby="emailHelp" placeholder="Enter session ID">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Date</label>
                                                                <input type="date" class="form-control" name="date" aria-describedby="emailHelp" placeholder="Enter date">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Duration (Hours)</label>
                                                                <input type="text" class="form-control" name="duration" aria-describedby="emailHelp" placeholder="Enter duration">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Dribbling</label>
                                                                <select class="custom-select" name="dribbling">
                                                                    <option value="select">--SELECT--</option>
                                                                    <option value="Precision Dribbling">Precision Dribbling</option>
                                                                    <option value="Obstacle Course">Obstacle Course</option>
                                                                    <option value="Speed Dribbling">Speed Dribbling</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Passing</label>
                                                                <select class="custom-select" name="passing">
                                                                    <option value="select">--SELECT--</option>
                                                                    <option value="Crossing Scenarios">Crossing Scenarios</option>
                                                                    <option value="1-2 Passing">1-2 Passing</option>
                                                                    <option value="Timed Through Pass">Timed Through Pass</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Shooting</label>
                                                                <select class="custom-select" name="shooting">
                                                                    <option value="select">--SELECT--</option>
                                                                    <option value="First Touch Volley">First Touch Volley</option>
                                                                    <option value="Speed Shooting">Speed Shooting</option>
                                                                    <option value="Long Shot Practice">Long Shot Practice</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Defending</label>
                                                                <select class="custom-select" name="defending">
                                                                    <option value="select">--SELECT--</option>
                                                                    <option value="Pass Interception">Pass Interception</option>
                                                                    <option value="Tackle Practice">Tackle Practice</option>
                                                                    <option value="Defending Scenarios">Defending Scenarios</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Set Pieces</label>
                                                                <select class="custom-select" name="set pieces">
                                                                    <option value="select">--SELECT--</option>
                                                                    <option value="Precision Penalty">Precision Penalty</option>
                                                                    <option value="Direct Free Kick">Direct Free Kick</option>
                                                                    <option value="Pinpoint Crossing">Pinpoint Crossing</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Goal Keeper</label>
                                                                <select class="custom-select" name="goal keeper">
                                                                    <option value="select">--SELECT--</option>
                                                                    <option value="Artillery Saving">Artillery Saving</option>
                                                                    <option value="Keeper Throws">Keeper Throws</option>
                                                                    <option value="1-on-1 Against Striker">1-on-1 Against Striker</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary" value="save">Submit</button>
                                                        </form>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary mr-auto">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="icon text-white bg-blue">
                                            <i class="fas fa-receipt"></i>
                                        </div> -->
                                </div>
                            </div>
                        </div>
                </section>

                <!-- Table -->
                <section>
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="h6 text-uppercase mb-0">Practice Sessions</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-hover table-sm card-text" style="font-size: 90%; font-family: 'Raleway', sans-serif">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th scope="col">Session ID</th> -->
                                            <th scope="col">Date</th>
                                            <th scope="col">Duration (Hours)</th>
                                            <th scope="col">Dribbling</th>
                                            <th scope="col">Passing</th>
                                            <th scope="col">Shooting</th>
                                            <th scope="col">Defending</th>
                                            <th scope="col">Set Pieces</th>
                                            <th scope="col">Goal Keeper</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $modal_count = 1;
                                        foreach ($result as $row) { ?>
                                            <tr>
                                                <!-- <th scope="row"><?php echo $row->ps_id; ?></th> -->
                                                <td><?php echo $row->date; ?></td>
                                                <td><?php echo $row->duration; ?></td>
                                                <td><?php echo $row->dribbling; ?></td>
                                                <td><?php echo $row->passing; ?></td>
                                                <td><?php echo $row->shooting; ?></td>
                                                <td><?php echo $row->defending; ?></td>
                                                <td><?php echo $row->set_pieces; ?></td>
                                                <td><?php echo $row->goal_keeper; ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('trainerController/edit'); ?>/<?php echo $row->ps_id; ?>" data-toggle="modal" data-target="<?php echo "#exampleModal2" . $modal_count; ?>" class="btn btn-outline-info btn-sm">Edit</a> <a href="<?php echo site_url('trainerController/delete'); ?>/<?php echo $row->ps_id; ?>" class="btn btn-outline-info btn-sm">Delete </a>

                                                    <!-- Update Modal -->
                                                    <div class="modal fade" id="<?php echo "exampleModal2" . $modal_count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Enter Session Details</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form method="post" action="<?php echo site_url('trainerController/update') ?>/<?php echo $row->ps_id; ?>">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Session ID</label>
                                                                            <input type="text" class="form-control" name="ps_id" value="<?php echo $row->ps_id ?>" aria-describedby="emailHelp" placeholder="Enter session ID">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Date</label>
                                                                            <input type="text" class="form-control" name="date" value="<?php echo $row->date ?>" aria-describedby="emailHelp" placeholder="Enter first name">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Duration (Hours)</label>
                                                                            <input type="text" class="form-control" name="duration" value="<?php echo $row->duration ?>" aria-describedby="emailHelp" placeholder="Enter duration">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Dribbling</label>
                                                                            <select class="custom-select" name="dribbling">
                                                                                <option value="<?php echo $row->dribbling ?>"><?php echo $row->dribbling ?></option>
                                                                                <option value="Precision Dribbling">Precision Dribbling</option>
                                                                                <option value="Obstacle Course">Obstacle Course</option>
                                                                                <option value="Speed Dribbling">Speed Dribbling</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Passing</label>
                                                                            <select class="custom-select" name="passing">
                                                                                <option value="<?php echo $row->passing ?>"><?php echo $row->passing ?></option>
                                                                                <option value="Crossing Scenarios">Crossing Scenarios</option>
                                                                                <option value="1-2 Passing">1-2 Passing</option>
                                                                                <option value="Timed Through Pass">Timed Through Pass</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Shooting</label>
                                                                            <select class="custom-select" name="shooting">
                                                                                <option value="<?php echo $row->shooting ?>"><?php echo $row->shooting ?></option>
                                                                                <option value="First Touch Volley">First Touch Volley</option>
                                                                                <option value="Speed Shooting">Speed Shooting</option>
                                                                                <option value="Long Shot Practice">Long Shot Practice</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Defending</label>
                                                                            <select class="custom-select" name="defending">
                                                                                <option value="sele<?php echo $row->defending ?>ct"><?php echo $row->defending ?></option>
                                                                                <option value="Pass Interception">Pass Interception</option>
                                                                                <option value="Tackle Practice">Tackle Practice</option>
                                                                                <option value="Defending Scenarios">Defending Scenarios</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Set Pieces</label>
                                                                            <select class="custom-select" name="set pieces">
                                                                                <option value="<?php echo $row->set_pieces ?>"><?php echo $row->set_pieces ?></option>
                                                                                <option value="Precision Penalty">Precision Penalty</option>
                                                                                <option value="Direct Free Kick">Direct Free Kick</option>
                                                                                <option value="Pinpoint Crossing">Pinpoint Crossing</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Goal Keeper</label>
                                                                            <select class="custom-select" name="goal keeper">
                                                                                <option value="<?php echo $row->goal_keeper ?>"><?php echo $row->goal_keeper ?></option>
                                                                                <option value="Artillery Saving">Artillery Saving</option>
                                                                                <option value="Keeper Throws">Keeper Throws</option>
                                                                                <option value="1-on-1 Against Striker">1-on-1 Against Striker</option>
                                                                            </select>
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
                                            <?php $modal_count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
    <script src="<?php echo base_url("vendor/popper.js/umd/popper.min.js"); ?>"> </script>
    <script src="<?php echo base_url("vendor/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("vendor/jquery.cookie/jquery.cookie.js"); ?>"> </script>
    <script src="<?php echo base_url("vendor/chart.js/Chart.min.js"); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="<?php echo base_url("js/front.js"); ?>"></script>

</body>

</html>