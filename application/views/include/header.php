<?php
if($this->session->userdata('userlogin'))     // mencegah akses langsung tanpa login
{ 
  $users = $this->session->userdata('userlogin');
  $avatar = $this->session->userdata('avatar');
}else{
  //masuk tanpa login
  $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Mohon Login terlebih dahulu</div>");
  redirect(base_url().'login');
}
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url();?>components/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>components/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>components/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url();?>components/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>components/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url();?>components/dist/css/skins/_all-skins.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url();?>components/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url();?>components/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?=base_url();?>components/dist/img/LOGOSMK.png" alt="User Image" height="50px" width="auto"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SMKN 1 BRONDONG</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url();?>components/dist/img/<?=$avatar;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('userlogin');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url();?>components/dist/img/<?=$avatar;?>" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('userlogin');?>
                  <small></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#" class="btn btn-default btn-flat">Profil</a> -->
                </div>
                <div class="pull-right">
                  <a href="<?=base_url();?>login/logout" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url();?>components/dist/img/<?=$avatar;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="white-space: nowrap; width: 12em; overflow: hidden;	text-overflow: ellipsis;"><?=$this->session->userdata('userlogin');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php if($this->uri->segment(2)=="dashboard"){echo 'class="active"';}?>>
        	<a href="<?=base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Beranda</a>
        </li>
        <li <?php if($this->uri->segment(2)=="list_users"){echo 'class="active"';}?>>
        	<a href="<?=base_url();?>admin/list_users"><i class="fa fa-users"></i> Daftar Admin</a>
        </li>
        <li <?php if($this->uri->segment(2)=="devices"){echo 'class="active"';}?>>
          <a href="<?=base_url();?>admin/devices"><i class="fa fa-gears"></i> Data Alat</a>
        </li>
        <li class="treeview <?php if($this->uri->segment(2)=="rfid"){echo 'active';}?>">
          <a href="#">
            <i class="fa fa-credit-card"></i>
            <span>Data RFID</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(3)=="rfidnew"){echo 'class="active"';}?>><a href="<?=base_url();?>admin/rfid/rfidnew"><i class="fa fa-credit-card"></i> Kartu RFID Baru</a></li>
            <li <?php if($this->uri->segment(3)=="datarfid"){echo 'class="active"';}?>><a href="<?=base_url();?>admin/rfid/datarfid"><i class="fa fa-credit-card"></i> Data RFID</a></li>
          </ul>
        </li>
        <li <?php if($this->uri->segment(2)=="absensi"){echo 'class="active"';}?>>
          <a href="<?=base_url();?>admin/absensi"><i class="fa fa-book"></i> Absensi</a>
        </li>
        <li <?php if($this->uri->segment(2)=="histori"){echo 'class="active"';}?>>
          <a href="<?=base_url();?>admin/histori"><i class="fa fa-retweet"></i> Histori Alat</a>
        </li>
        <li <?php if($this->uri->segment(2)=="setting"){echo 'class="active"';}?>>
          <a href="<?=base_url();?>admin/setting"><i class="fa fa-gear"></i> Setting</a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>