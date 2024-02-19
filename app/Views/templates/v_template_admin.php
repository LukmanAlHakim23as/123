<!DOCTYPE html>
<!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
  -->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIP |</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('adminLTE') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="<?php echo base_url('Auth/LoginAdmin'); ?>">
            <i class="fas fa-sign-out-alt"></i> logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= base_url('') ?>/Logo.png" alt="Perpus40 Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Perpustakaan 40</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('adminLTE') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?php echo base_url('') ?>" class="d-block"><?= session()->get('f_nama') ?></a>
            <?php
            // Periksa logika kondisional
            if (session()->get('f_level') == 1) {
              echo '<a class="text-success"><i class="fa fa-check-circle"></i> Admin</a>';
            } else {
              echo '<a class="text-primary"><i class="fa fa-check-circle"></i> Pustakawan</a>';
            }

            ?>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('Admin') ?>" class="nav-link <?= $submenu == 'dashboard' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Buku') ?>" class="nav-link <?= $submenu == 'data buku' ? 'active' : '' ?>">
                <p>
                  <i class="nav-icon fas fa fa-book-open"></i>
                  Data Buku
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Kategori') ?>" class="nav-link <?= $submenu == 'data kategori' ? 'active' : '' ?>">
                <p>
                  <i class="nav-icon fas fa fa-book-open"></i>
                  Data Kategori
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Anggota') ?>" class="nav-link <?= $submenu == 'data anggota' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Daftar Anggota
                </p>
              </a>
            </li>
            <li class="nav-header">EXAMPLES</li>
            <li class="nav-item">
              <a href="<?=base_url('Peminjaman')?>" class="nav-link <?= $submenu == 'data peminjaman' ? 'active' : '' ?>">
                <p>
                  Peminjaman
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <p>
                  Pengembalian
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <?php

      if ($page) {
        echo view($page);
      }

      ?>

    </div>
  </div>
  </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url('adminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('adminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('adminLTE') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>