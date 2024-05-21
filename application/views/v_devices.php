<?php
$this->load->View('include/header.php');

if ($set=="devices") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Alat
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gears"></i> Data Alat</a></li>
        <!-- <li class="active">Dashboard</li> -->
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
              <a href="<?php base_url()?>add_devices"><button type="button" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-plus"></i> Tambah Device</button></a>
              <br><br><br>
              <h1 class="box-title">Data Alat</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="t1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">No</th>
                  <th style="text-align:center">ID Alat</th>
                  <th style="text-align:center">Nama Device</th>
                  <th style="text-align:center">Mode</th>
                  <th style="text-align:center">#</th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($devices)){?>
                <tr>
                  <td>Data tidak ditemukan</td>
                  <td>Data tidak ditemukan</td>
                  <td>Data tidak ditemukan</td>
                  <td>Data tidak ditemukan</td>
                  <td>Data tidak ditemukan</td>
                </tr>
                <?php } else{
                $no=0;
                foreach($devices as $row){ $no++;?>
                <tr>
                  <td style="text-align:center"><?php echo $no;?></td>
                  <td style="text-align:center"><b class="text-success"><?php echo $row->id_devices;?></b></td>
                  <td style="text-align:center"><?php echo $row->nama_devices;?></td>
                  <td style="text-align:center">
                    <?php
                    if ($row->mode == "SCAN") {
                      echo "READER";
                    } else if ($row->mode == "ADD") {
                      echo "ADD CARD";
                    } else{
                      echo "UNKNOWN";
                    }
                    ?>
                  </td>
                  <td style="text-align:center">
                   <a href="<?=base_url()?>/admin/edit_devices/<?=$row->id_devices?>" class="btn btn-info btn-sm" title="rubah nama"><i class="glyphicon glyphicon-pencil"></i></a>
                   <a href="<?=base_url()?>/admin/edit_devices_mode/<?=$row->id_devices?>" class="btn btn-warning btn-sm" title="rubah mode"><i class="glyphicon glyphicon-cog"></i></a>
                   <!-- <a href="<?php site_url()?>/admin/hapus_devices/<?=$row->id_devices?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a> -->
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
} else if ($set=="add-devices") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Alat
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gears"></i> Data Alat</a></li>
        <li class="active">Tambah Alat</li>
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
              <h1 class="box-title">Tambah Alat</h1>
            </div>
            <!-- /.box-header -->
            <form role="form" action="<?=base_url();?>/admin/save_devices" method="post">
              <div class="box-body">
                <!-- <div class="form-group"> -->
                  <!-- <input type="hidden" name="id" value=""> -->
                  <!-- <label>ID Alat</label>
                  <input type="number" name="id" class="form-control" placeholder="id (number)" required>
                </div> -->
                <div class="form-group">
                  <label>Nama Devices</label>
                  <input type="text" name="nama" class="form-control" placeholder="nama devices" required>
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
} else if ($set=="edit-devices") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Alat
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gears"></i> Data Alat</a></li>
        <li class="active">Edit Alat</li>
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
              <h1 class="box-title">Edit Alat</h1>
            </div>
            <!-- /.box-header -->
            <form role="form" action="<?=base_url();?>/admin/save_edit_devices" method="post">              
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}?>">
                  <!-- <label>ID Device</label>
                  <input type="number" name="id" class="form-control" placeholder="Enter id" required> -->
                </div>
                <div class="form-group">
                  <label>Nama Alat</label>
                  <input type="text" name="nama" value="<?php if(isset($nama_devices)){echo $nama_devices;}?>" class="form-control" placeholder="nama bus" required>
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
} else if ($set=="edit-devices-mode") {
?>
  <style>
    .labelmode {
      position: relative;
      display: inline-block;
      width: 65px;
      height: 34px;
    }
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    .switch input {display:none;}
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #2196F3;
      -webkit-transition: .4s;
      transition: .4s;
    }
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    input:checked + .slider {
      background-color: #2196F3;
    }
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    .slider.round {
      border-radius: 34px;
    }
    .slider.round:before {
      border-radius: 50%;
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Mode Alat
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gears"></i> Data Alat</a></li>
        <li class="active">Edit Mode Alat</li>
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
              <h1 class="box-title">Edit Mode Alat</h1>

              <form action="<?=base_url();?>/admin/save_edit_devices_mode" method="post">
              <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}?>">
              <div class="col-md-12 text-center">
                <label class="labelmode">
                  READER
                </label>
                <label class="switch">
                  <input type="checkbox" name="mode" <?php if($mode=="ADD") echo "checked";?>>
                  <span class="slider round"></span>
                </label>
                <label class="labelmode">
                  ADD CARD
                </label>
              </div>
              <div class="col-md-12 text-center" style="padding-top:30px; padding-bottom:30px;">
                <input type="submit" class="btn btn-danger" value="Set Mode">
              </div>
              </form>
            </div>
            <!-- /.box-header -->
            
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