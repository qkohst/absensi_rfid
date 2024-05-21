<?php
$this->load->View('include/header.php');

if ($set=="list-users") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Admin
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Daftar Admin</a></li>
        <!-- <li class="active">Dashboard</li> -->
      </ol>
    </section>

        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php echo "<br>"; echo $this->session->flashdata('pesan');?>
              <a href="<?php base_url()?>add_users"><button type="button" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-plus"></i> Tambah Admin</button></a>
              <br><br><br>
              <h1 class="box-title">Daftar Admin</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="t1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">No</th>
                  <th style="text-align:center">Nama</th>
                  <th style="text-align:center">Email</th>
                  <th style="text-align:center">Username</th>
                  <th style="text-align:center">Gambar</th>
                  <th style="text-align:center">#</th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($data)){?>
                <tr>
                  <td>Data tidak ditemukan</td>
                  <td>Data tidak ditemukan</td>
                  <td>Data tidak ditemukan</td>
                  <td>Data tidak ditemukan</td>
                  <td>Data tidak ditemukan</td>
                  <td>Data tidak ditemukan</td>
                </tr>
                <?php } else{
                $no=0;
                foreach($data as $row){ $no++;?>
                <tr>
                  <td style="text-align:center"><?php echo $no;?></td>
                  <td style="text-align:center"><?php echo $row->nama;?></td>
                  <td style="text-align:center"><?php echo $row->email;?></td>
                  <td style="text-align:center"><?php echo $row->username;?></td>
                  <td style="text-align:center"><img src="<?=base_url();?>components/dist/img/<?php echo $row->avatar;?>" class="img-circle" width="auto" height="100px" alt="User Image"></td>
                  <td style="text-align:center">
                    <?php
                    if ($row->id_user != 1){
                    ?>
                      <a href="<?=base_url()?>admin/edit_users/<?=$row->id_user?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a href="<?=base_url()?>admin/hapus_users/<?=$row->id_user?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php
                    }
                    ?>
                  </td>
                </tr>
                <?php }}?>
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php
} else if ($set=="add-users") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Users
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>admin/list_users"><i class="fa fa-user"></i> Daftar Users</a></li>
        <li class="active">Tambah Users</li>
      </ol>
    </section>

        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php echo $this->session->flashdata('pesan');?>
              <br>
              <h1 class="box-title">Tambah Users</h1>
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart(base_url().'admin/save_users'); ?>
              <div class="box-body">
                <div class="form-group">
                  <!-- <input type="hidden" name="id" value=""> -->
                  <label>Nama Users</label>
                  <input type="text" name="users" class="form-control" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="pass" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="InputFile">Pilih Foto ("jpg", "jpeg", "gif", "png")</label>
                  <input type="file" name="image" id="InputFile" value="" required>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php
} else if ($set=="edit-users") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Users
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>admin/list_users"><i class="fa fa-user"></i> Daftar Users</a></li>
        <li class="active">Edit Users</li>
      </ol>
    </section>

        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php echo "<br>"; echo $this->session->flashdata('pesan');?>
              <br>
              <h1 class="box-title">Edit Users</h1>
            </div>
            <!-- /.box-header -->
            <form role="form" action="<?=base_url();?>admin/save_edit_users" enctype="multipart/form-data" method="post" accept-charset="utf-8">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}?>">
                  <label>Nama Users</label>
                  <input type="text" name="users" class="form-control" value="<?php if(isset($nama)){echo $nama;}?>" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" name="email" class="form-control" value="<?php if(isset($email)){echo $email;}?>" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?php if(isset($username)){echo $username;}?>">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <input type="password" name="pass" class="form-control" value="<?php if(isset($password)){echo $password;}?>">
                    <div class="input-group-addon">
                      Ganti Password ? <input type="checkbox" name="changepass">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                <img src="<?=base_url();?>components/dist/img/<?php if(isset($avatar)){echo $avatar;}?>" width="auto" height="200px"><br>
                  <input type="hidden" name="img" value="<?php if(isset($avatar)){echo $avatar;}?>">
                  <label for="InputFile">Pilih Foto ("jpg", "jpeg", "gif", "png")</label>
                  <input type="file" name="image" id="InputFile">
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php
} 

$this->load->view('include/footer.php');
?>

</div>  <!-- penutup header -->

<!-- jQuery 3 -->
<script src="<?=base_url();?>components/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>components/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>components/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>components/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url();?>components/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>components/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#t1").DataTable();
  });
</script>

</body>
</html>