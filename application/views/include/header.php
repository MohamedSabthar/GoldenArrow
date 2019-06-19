<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?=$title?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="all,follow" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url("");?>/vendor/bootstrap/css/bootstrap.min.css" />
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.0/css/all.css" crossorigin="anonymous" />
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800" />
    <!-- orion icons-->
    <link rel="stylesheet" href="<?php echo base_url("/css/orionicons.css");?>" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url("/css/style.default.css");?>" id="theme-stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url("/css/custom.css");?>" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url("/img/favicon.png?3");?>" />
</head>

<body>
    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
            <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a>
            <a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">
                <?=$dashboardTitle?>
            </a>
            <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
                <li class="nav-item dropdown ml-auto">
                    <a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="nav-link dropdown-toggle">
                        <img src="<?=base_url('/img/avatar-6.jpg')?>" alt="<?=$userName?>" style="max-width: 2.5rem;"
                            class="img-fluid rounded-circle shadow" />
                    </a>

                    <div aria-labelledby="userInfo" class="dropdown-menu">
                        <a href="#" class="dropdown-item">
                            <strong class="d-block text-uppercase headings-font-family">
                                <?=$userName?>
                            </strong>
                            <small><?=$userRole?></small>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Profile Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="login.html" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>