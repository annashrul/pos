<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="anasrulysf.com">
    <meta name="author" content="Annashrul Yusuf">
    <title>Welcome To Point of Sale Apps</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <!--TAMBAHAN-->
    <link href="<?php echo base_url('assets/admin/assets/ionicon/css/ionicons.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/admin/css/material-design-iconic-font.min.css')?>" rel="stylesheet">
    <!-- animate css -->
    <link href="<?php echo base_url('assets/admin/css/animate.css')?>" rel="stylesheet" />
    <!-- Waves-effect -->
    <link href="<?php echo base_url('assets/admin/css/waves-effect.css')?>" rel="stylesheet">
    <!-- DataTables -->
    <link href="<?php echo base_url('assets/admin/assets/datatables/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Custom Files -->
    <link href="<?php echo base_url('assets/admin/css/helper.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/admin/css/style.css')?>" rel="stylesheet" type="text/css" />

  </head>
  <body>
    <!-- Navigation -->
    <?php $this->load->view('admin/menu'); ?>
    <!-- Page Content -->
    <div class="container">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Laporan</h1>
        </div>
      </div>
      <!-- /.row -->
      <!-- Projects Row -->
      <div class="row">
        <div class="col-lg-12">
          <table id="datatable" class="table table-striped table-bordered" style="font-size:11px;">
            <thead>
              <tr>
                <th style="text-align:center;width:40px;">No</th>
                <th>Laporan</th>
                <th style="width:100px;text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align:center;vertical-align:middle">1</td>
                <td style="vertical-align:middle;">Laporan Data Barang</td>
                <td style="text-align:center;">
                  <a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/laporan/lap_data_barang'?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                </td>
              </tr>
             <!--  <tr>
                <td style="text-align:center;vertical-align:middle">2</td>
                <td style="vertical-align:middle;">Laporan Stok Barang</td>
                <td style="text-align:center;">
                  <a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/laporan/lap_stok_barang'?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                </td>
              </tr> -->
              <tr>
                <td style="text-align:center;vertical-align:middle">3</td>
                <td style="vertical-align:middle;">Laporan Penjualan</td>
                <td style="text-align:center;">
                  <a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/laporan/lap_data_penjualan'?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                </td>
              </tr>
              <tr>
                <td style="text-align:center;vertical-align:middle">4</td>
                <td style="vertical-align:middle;">Laporan Penjualan PerTanggal</td>
                <td style="text-align:center;">
                  <a class="btn btn-sm btn-default" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                </td>
              </tr>
              <tr>
                <td style="text-align:center;vertical-align:middle">5</td>
                <td style="vertical-align:middle;">Laporan Penjualan PerBulan</td>
                <td style="text-align:center;">
                  <a class="btn btn-sm btn-default" href="#lap_jual_perbulan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                </td>
              </tr>
              <tr>
                <td style="text-align:center;vertical-align:middle">6</td>
                <td style="vertical-align:middle;">Laporan Penjualan PerTahun</td>
                <td style="text-align:center;">
                  <a class="btn btn-sm btn-default" href="#lap_jual_pertahun" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                </td>
              </tr>

               <!-- <tr>
                  <td style="text-align:center;vertical-align:middle">7</td>
                  <td style="vertical-align:middle;">Laporan Laba/Rugi</td>
                  <td style="text-align:center;">
                      <a class="btn btn-sm btn-default" href="#lap_laba_rugi" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                  </td>
              </tr> -->
              
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.row -->
      <!-- ============ MODAL ADD =============== -->
      <div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/laporan/lap_penjualan_pertanggal'?>" target="_blank">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label col-xs-3" >Tanggal</label>
                  <div class="col-xs-9">
                    <div class='input-group date' id='datepicker'>
                      <input type='text' name="tgl" class="form-control" value="" placeholder="Tanggal..." required/>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ============ MODAL ADD =============== -->
      <div class="modal fade" id="lap_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/laporan/lap_penjualan_perbulan'?>" target="_blank">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label col-xs-3" >Bulan</label>
                  <div class="col-xs-9">
                    <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="100%" required/>
                      <?php foreach ($jual_bln->result_array() as $k) {
                        $bln=$k['bulan'];
                      ?>
                      <option><?php echo $bln;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ============ MODAL ADD =============== -->
      <div class="modal fade" id="lap_jual_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/laporan/lap_penjualan_pertahun'?>" target="_blank">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label col-xs-3" >Tahun</label>
                  <div class="col-xs-9">
                    <select name="thn" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="100%" required/>
                      <?php foreach ($jual_thn->result_array() as $t) {
                        $thn=$t['tahun'];
                      ?>
                      <option><?php echo $thn;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
              </div>
            </form>
          </div>
        </div>
      </div>
       <!-- ============ MODAL ADD =============== -->
      <div class="modal fade" id="lap_laba_rugi" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/laporan/lap_laba_rugi'?>" target="_blank">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label col-xs-3" >Bulan</label>
                  <div class="col-xs-9">
                    <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="100%" required/>
                      <?php foreach ($jual_bln->result_array() as $k) {
                        $bln=$k['bulan'];
                      ?>
                      <option><?php echo $bln;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--END MODAL-->
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url('assets/admin/assets/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/assets/datatables/dataTables.bootstrap.js')?>"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#datatable').dataTable();
      } );
    </script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
    <script type="text/javascript">
      $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'DD MMMM YYYY HH:mm',
        });
        
        $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        $('#datepicker2').datetimepicker({
            format: 'YYYY-MM-DD',
        });

        $('#timepicker').datetimepicker({
            format: 'HH:mm'
        });
      });
    </script>
  </body>
</html>
