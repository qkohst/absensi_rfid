<?php
$this->load->View('include/header.php');

if ($set=="setting") {
  $skey = "";
  $waktumasuk = "";
  $waktukeluar = "";
  if (isset($waktuoperasional)) {
    foreach ($waktuoperasional as $d => $value) {
      if ($value->id_waktu_operasional == 1) {
        $waktumasuk = $value->waktu_operasional;
      }
      if ($value->id_waktu_operasional == 2) {
        $waktukeluar= $value->waktu_operasional;
      }
    }
  }
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>admin/setting"><i class="fa fa-gear"></i> Setting</a></li>
        <!-- <li class="active">Lihat Histori Device</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php echo $this->session->flashdata('pesan');?>
              <form action="<?=base_url();?>admin/setwaktuoperasional" method="post">
              <div class="box-body col-md-12 text-center">
                <div class="col-md-6">
                  <h3 class="box-title">Waktu Masuk</h3><br>
                  <input class="form-control" type="text" name="masuk" value="<?=$waktumasuk;?>" style="text-align:center;" placeholder="jam:menit-jam:menit">
                </div>
                <div class="col-md-6">
                  <h3 class="box-title">Waktu Keluar</h3><br>
                  <input class="form-control" type="text" name="keluar" value="<?=$waktukeluar;?>" style="text-align:center;" placeholder="jam:menit-jam:menit">
                </div>
                <div class="box-body col-md-12 text-center">
                  <input class="btn btn-danger" type="submit" value="set waktu operasional">
                </div>
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

</body>
</html>