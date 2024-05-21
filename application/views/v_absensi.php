<?php
$this->load->View('include/header.php');

if ($set=="absensi") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Absensi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>admin/absensi"><i class="fa fa-book"></i> Absensi</a></li>
        <!-- <li class="active">Lihat Histori Device</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <form action="<?=base_url();?>admin/lastabsensi" method="post">
                <div class="col-md-2">
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" class="form-control pull-right" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-danger">Ambil Data Absensi</button>
                </div>
              </form>
            </div>
            <div class="box-header">
              <?php echo "<br>"; echo $this->session->flashdata('pesan');?>
              <h1 class="box-title"><b>Absensi Masuk Hari ini</b> <b class="text-danger"><?php echo date("d M Y",time());?></b></h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="t1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">No</th>
                  <th style="text-align:center">Alat</th>
                  <th style="text-align:center">Nama</th>
                  <th style="text-align:center">Jurusan</th>
                  <th style="text-align:center">Keterangan</th>
                  <th style="text-align:center">Waktu</th>
                  <th style="text-align:center">Foto</th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($absensimasuk)){?>
                <tr>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                </tr>
                <?php } else{
                $no = 0;
                foreach($absensimasuk as $row){ $no++;?>
                <tr>
                  <td style="text-align:center"><b class="text-success"><?php echo $no;?></b></td>
                  <td style="text-align:center"><?php echo $row->nama_devices;?> (<?php echo $row->id_devices;?>)</td>
                  <td style="text-align:center"><?php echo $row->nama;?></td>
                  <td style="text-align:center"><?php echo $row->jabatan;?></td>
                  <td style="text-align:center"><?php echo $row->keterangan;?></td>
                  <td style="text-align:center"><?php echo date("H:i:s - d M Y",$row->created_at);?></td>
                  <td style="text-align:center"><img src="<?php echo $row->foto;?>" width="150" height="auto" alt="img not found" /></td>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <br>
              <h1 class="box-title"><b>Absensi Keluar Hari ini</b> <b class="text-danger"><?php echo date("d M Y",time());?></b></h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="t2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">No</th>
                  <th style="text-align:center">Alat</th>
                  <th style="text-align:center">Nama</th>
                  <th style="text-align:center">Jabatan/Kelas</th>
                  <th style="text-align:center">Keterangan</th>
                  <th style="text-align:center">Waktu</th>
                  <th style="text-align:center">Foto</th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($absensikeluar)){?>
                <tr>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                </tr>
                <?php } else{
                $no = 0;
                foreach($absensikeluar as $row){ $no++;?>
                <tr>
                  <td style="text-align:center"><b class="text-success"><?php echo $no;?></b></td>
                  <td style="text-align:center"><?php echo $row->nama_devices;?> (<?php echo $row->id_devices;?>)</td>
                  <td style="text-align:center"><?php echo $row->nama;?></td>
                  <td style="text-align:center"><?php echo $row->jabatan;?></td>
                  <td style="text-align:center"><?php echo $row->keterangan;?></td>
                  <td style="text-align:center"><?php echo date("H:i:s - d M Y",$row->created_at);?></td>
                  <td style="text-align:center"><img src="<?php echo $row->foto;?>" width="150" height="auto" alt="img not found" /></td>
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
} else if ($set=="last-absensi") {
  if (!isset($tanggal)) {
    $tanggal = "";
  }

  if (!isset($waktuabsensi)) {
    $waktuabsensi = "";
  }
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Absensi <?php echo $tanggal;?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>admin/histori"><i class="fa fa-book"></i> Absensi</a></li>
        <li class="active">Ambil Data Absensi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <div class="col-md-12">
                <div style="text-align:center;">
                  <a href="<?=base_url()?>admin/export2excel?tanggal=<?=$waktuabsensi;?>"><button class="btn btn-success">Download Laporan Excel</button></a>
                </div>
              </div>
            </div>
            <div class="box-header">
              <?php echo "<br>"; echo $this->session->flashdata('pesan');?>
              <h1 class="box-title"><b>Absensi Masuk</b> <b class="text-danger"><?php echo $tanggal;?></b></h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="t1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">No</th>
                  <th style="text-align:center">Alat</th>
                  <th style="text-align:center">Nama</th>
                  <th style="text-align:center">Jabatan/Kelas</th>
                  <th style="text-align:center">Keterangan</th>
                  <th style="text-align:center">Waktu</th>
                  <th style="text-align:center">Foto</th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($datamasuk)){?>
                <tr>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                </tr>
                <?php } else{
                $no = 0;
                foreach($datamasuk as $row){ $no++;?>
                <tr>
                  <td style="text-align:center"><b class="text-success"><?php echo $no;?></b></td>
                  <td style="text-align:center"><?php echo $row->nama_devices;?> (<?php echo $row->id_devices;?>)</td>
                  <td style="text-align:center"><?php echo $row->nama;?></td>
                  <td style="text-align:center"><?php echo $row->jabatan;?></td>
                  <td style="text-align:center"><?php echo $row->keterangan;?></td>
                  <td style="text-align:center"><?php echo date("H:i:s - d M Y",$row->created_at);?></td>
                  <td style="text-align:center"><img src="<?php echo $row->foto;?>" width="150" height="auto" alt="img not found" /></td>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <br>
              <h1 class="box-title"><b>Absensi Keluar </b> <b class="text-danger"><?php echo $tanggal;?></b></h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="t2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">No</th>
                  <th style="text-align:center">Alat</th>
                  <th style="text-align:center">Nama</th>
                  <th style="text-align:center">Jabatan/Kelas</th>
                  <th style="text-align:center">Keterangan</th>
                  <th style="text-align:center">Waktu</th>
                  <th style="text-align:center">Foto</th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($datakeluar)){?>
                <tr>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                </tr>
                <?php } else{
                $no = 0;
                foreach($datakeluar as $row){ $no++;?>
                <tr>
                  <td style="text-align:center"><b class="text-success"><?php echo $no;?></b></td>
                  <td style="text-align:center"><?php echo $row->nama_devices;?> (<?php echo $row->id_devices;?>)</td>
                  <td style="text-align:center"><?php echo $row->nama;?></td>
                  <td style="text-align:center"><?php echo $row->jabatan;?></td>
                  <td style="text-align:center"><?php echo $row->keterangan;?></td>
                  <td style="text-align:center"><?php echo date("H:i:s - d M Y",$row->created_at);?></td>
                  <td style="text-align:center"><img src="<?php echo $row->foto;?>" width="150" height="auto" alt="img not found" /></td>
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

<!-- date-range-picker -->
<script src="<?=base_url();?>components/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url();?>components/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#t1").DataTable();
    $('#t2').DataTable();
  });

  $(function () {
    //Date range picker
    $('#reservation').daterangepicker()

  })
</script>

</body>
</html>