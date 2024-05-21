<?php
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Tracking</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url();?>comp_adm/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>comp_adm/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>comp_adm/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>comp_adm/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url();?>comp_adm/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url();?>"><b>My</b> Tracking</a><br>
    <img src="<?=base_url();?>comp_adm/dist/img/logo.jpg" width="40%" height="auto">
  </div>
<?php
  if (isset($data)) {
    if ($data=="change_pass") {
      if (!isset($id)) {
        $id=0;
      }
?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset password kamu</p>

    <!-- notifikasi -->
    <?php echo $this->session->flashdata('pesan')?>

    <form action="<?=base_url();?>lostpass/changepass" method="post">
      <div class="form-group has-feedback">
        <input name="id" type="hidden" value="<?=$id;?>" required>
        <input name="password" type="password" class="form-control" placeholder="Password baru" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
<?php
    } if ($data=="link_not_valid") {
?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset password kamu</p>
    <!-- notifikasi -->
    <?php echo $this->session->flashdata('pesan')?>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <a href="<?=base_url();?>"><button class="btn btn-primary btn-block btn-flat">Kembali</button></a>
        </div>
        <!-- /.col -->
      </div>
  </div>
  <!-- /.login-box-body -->
<?php
    }
  }else{
?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset password kamu</p>

    <!-- notifikasi -->
    <?php echo $this->session->flashdata('pesan')?>

    <form action="<?=base_url();?>lostpass/checkuser" method="post">
      <div class="form-group has-feedback">
        <input name="username" type="text" class="form-control" placeholder="Username atau Email" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->

<?php
  }
?>

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?=base_url();?>comp_adm/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>comp_adm/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url();?>comp_adm/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
