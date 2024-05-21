<?php
$this->load->View('include/header.php');

if ($set=="histori") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Histori Alat
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>admin/histori"><i class="fa fa-book"></i> Histori Alat</a></li>
        <!-- <li class="active">Lihat Histori Device</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php echo "<br>"; echo $this->session->flashdata('pesan');?>
              <h1 class="box-title"></h1>
              <div style="text-align:right">
                <!-- <a href="<?=base_url()?>admin/hapus_histori" onclick="return confirm('Anda Yakin menghapus data histori?')"><button type="button" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-trash"></i> Hapus Data Histori</button></a> -->
                <button disabled="" type="button" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-trash"></i> Hapus Data Histori</button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <div class="tablehistori">
              <!-- <table id="t1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">ID Histori</th>
                  <th style="text-align:center">UID RFID</th>
                  <th style="text-align:center">Keterangan</th>
                  <th style="text-align:center">Nama Device</th>
                  <th style="text-align:center">Waktu</th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($histori)){?>
                <tr>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                  <td style="text-align:center">Data tidak ditemukan</td>
                </tr>
                <?php } else{
                foreach($histori as $row){ ?>
                <tr>
                  <td style="text-align:center"><b class="text-success"><?php echo $row->id_histori;?></b></td>
                  <td style="text-align:center"><?php echo $row->uid;?></td>
                  <td style="text-align:center"><?php echo $row->keterangan;?></td>
                  <td style="text-align:center"><?php echo $row->nama_devices;?> (<?php echo $row->id_devices;?>)</td>
                  <td style="text-align:center"><?php echo date("d M Y, H:i:s",$row->waktu);?></td>
                </tr>
                <?php }}?>
                
                </tbody>
              </table> -->
            </div>
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

<script type="text/javascript">

  setInterval(function() {
    $('.tablehistori').load('<?=base_url();?>api/realtimehistori');
  }, 500);

  // var ajax_call = function(){
  //   $.getJSON("<?=base_url();?>api/realtimehistori", function(result){
  //       console.log(result);
  //       console.log(result.data);
  //       if (result.status == "foundnewcard") {
  //         if(result.data == "set"){
  //           window.location.replace(result.link);
  //         }else{
  //           alert("RFID Card tidak terdaftar");
  //         }
  //       }
  //   });
  // };
  // var interval = 500; // where 1000 is 1 second

  // setInterval(ajax_call, interval);
</script>
</body>
</html>