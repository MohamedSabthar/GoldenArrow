<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Login</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="<?= base_url('/vendor/bootstrap/css/bootstrap.min.css') ?>">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!-- Google fonts - Popppins for copy-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
  <!-- orion icons-->
  <link rel="stylesheet" href="<?= base_url('/css/orionicons.css') ?>">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="<?= base_url('/css/style.default.css') ?>" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="<?= base_url('/css/custom.css') ?>">
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?= base_url('/img/favicon.png?3') ?>">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <div class="page-holder d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center py-5">
        <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
          <div class="pr-lg-5"><img src="<?= base_url('/img/Soccer.jpg') ?>" alt="" class="img-fluid"></div>
        </div>
        <div class="col-lg-5 px-lg-4">
          <h1 class="text-base text-primary text-uppercase mb-4">Golden Arrow mAster Football CLub</h1>
          <h2 class="mb-4">Welcome !</h2>
          <p class="text-muted">Welcome to the official Golden Arrow Football Club Web Platform. Collobrate with the trainees and players and mantain a virtual environment. Recieve trainig session updates, match scheduels for your finger tips. Create an online account and browse through our stunning website.</p>
          <?php if ($error = $this->session->flashdata('login_fail')) : ?>

            <span class="text-danger"> <?= $error ?> </span>
          <?php endif ?>

          <form id="loginForm" method="POST" class="mt-4" action='<?= site_url('LoginController/login') ?>'>
            <div class="form-group mb-4">
              <input type="text" name="username" placeholder="Username" class="form-control border-0 shadow form-control-lg">
            </div>
            <div class="form-group mb-4">
              <input type="password" name="password" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet">
            </div>
            <div class="form-group mb-4">

            </div>
            <input type="submit" class="btn btn-primary shadow px-5" value="Log in" name="login">
          </form>
        </div>
      </div>
      <p class="mt-5 mb-0 text-gray-400 text-center">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Group No:13</a>for the moduel Rapid Application Development</p>
      <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="<?php echo base_url('vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('/vendor/popper.js/umd/popper.min.js'); ?>"> </script>
  <script src="<?php echo base_url('/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('/vendor/jquery.cookie/jquery.cookie.js'); ?>"> </script>
  <script src="<?php echo base_url('/vendor/chart.js/Chart.min.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
  <script src="<?php echo base_url('/js/front.js'); ?>"></script>
</body>

</html>