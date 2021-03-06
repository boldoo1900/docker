<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Dashboard</title>

  <link href="<?php BASEPATH.'..'; ?>/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php BASEPATH.'..'; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php BASEPATH. '..'; ?>/assets/vendor/select2/select2.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="<?php BASEPATH.'..'; ?>/assets/css/style.css" rel="stylesheet">

  <!-- Bootstrap core JavaScript -->
  <script src="<?php BASEPATH. '..'; ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php BASEPATH. '..'; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php BASEPATH. '..'; ?>/assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="<?php BASEPATH. '..'; ?>/assets/vendor/select2/select2.min.js"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">DASHBOARD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" style="padding-top: 30px;">
    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">Categories</h1>
            <div class="list-group">
                <a href="/profile" id="Profile" class="list-group-item">Profile</a>
                <a href="/blog" id="Blog" class="list-group-item">Blog</a>
                <a href="/article" id="Article" class="list-group-item">Article</a>
            </div>
        </div>
        <div class="col-lg-9">
          <?php echo Message::display(); ?><br><br>