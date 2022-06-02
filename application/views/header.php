<!DOCTYPE html>
<html lang="en">

<head>
  <title>E - Tiket PT. Anugrah Jala Chandra</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?php echo base_url('theme/user/home/') ?>css/animate.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo base_url('theme/user/home/') ?>css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url('theme/user/home/') ?>css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url('theme/user/home/') ?>css/magnific-popup.css">

  <link rel="stylesheet" href="<?php echo base_url('theme/user/home/') ?>css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?php echo base_url('theme/user/home/') ?>css/jquery.timepicker.css">

  <link rel="stylesheet" href="<?php echo base_url('theme/user/home/') ?>css/flaticon.css">
  <link rel="stylesheet" href="<?php echo base_url('theme/user/home/') ?>css/style.css">
</head>

<body>
  <?php
  if ($this->session->userdata('level') == '0') {
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('notelp');
    $this->session->unset_userdata('alamat');
    $this->session->unset_userdata('password');
    $this->session->unset_userdata('is_login');
    $this->session->unset_userdata('level');
  }
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">E - Tiket<span> PT. Anugrah Jala Chandra</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="<?php echo base_url('home'); ?>" class="nav-link">Home</a></li>
          <?php if (empty($this->session->userdata('is_login'))) { ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('daftar') ?>" role="button">Daftar</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login') ?>" role="button">Login</a></li>
          <?php } else { ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('akun') ?>" role="button">Profil & Transaksi</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login/logout') ?>" role="button">Logout</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>