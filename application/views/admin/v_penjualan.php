<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="anasrulysf.com">
  <meta name="author" content="Annashrul Yusuf">

  <title>Transaksi Penjualan</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
  <!-- <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet"> -->
  <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">

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
  <?php 
    $this->load->view('admin/menu');
  ?>
  <!-- Page Content -->
  <div class="container">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <center><?php echo $this->session->flashdata('msg');?></center>
        <h1 class="page-header">Transaksi
          <a href="#" data-toggle="modal" data-target="#largeModal" class="btn btn-primary">lihat barang</a>
        </h1> 
      </div>
    </div>
    <!-- /.row -->
    <!-- Projects Row -->
    <div class="row">
      <div class="col-lg-12">
        <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
          <table>
            <tr>
              <th>Kode Barang</th>
            </tr>
            <tr>
              <th><input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm"></th>                     
            </tr>
            <div id="detail_barang" style="position:absolute;"></div>
          </table>
        </form>
        <br/>
        <table class="table table-striped table-bordered" style="font-size:11px;">
          <thead>
            <tr>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th style="text-align:center;">Satuan</th>
              <th style="text-align:center;">Harga(Rp)</th>
              <th style="text-align:center;">Diskon(Rp)</th>
              <th style="text-align:center;">Qty</th>
              <th style="text-align:center;">Sub Total</th>
              <th style="width:100px;text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($this->cart->contents() as $items):?>

            <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
              <tr>
                <td><?=$items['id'];?></td>
                <td><?=$items['name'];?></td>
                <td style="text-align:center;"><?=$items['satuan'];?></td>
                <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                <td style="text-align:right;"><?php echo number_format($items['disc']);?></td>
                <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                <td style="text-align:center;">
                  <a href="<?php echo base_url().'admin/penjualan/remove/'.$items['rowid'];?>" class="btn btn-danger btn-xs">
                    <span class="fa fa-close"></span> Batal
                  </a>
                </td>
              </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        <form action="<?php echo base_url().'admin/penjualan/simpan_penjualan'?>" method="post">
          <div class="col-md-4" style="padding:0px 0px 0px 0px;">
            <div class="form-group">
              <label>Total Belanja</label>
              <input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" readonly>
              <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm"  readonly>
            </div>
            <div class="form-group">
              <label>Tunai</label>
              <input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" required>
              <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" required>
            </div>
            <div class="form-group">
              <label>Kemablian</label>
              <input type="text" id="kembalian" name="kembalian" class="form-control input-sm" required>
            </div>
            <button type="submit" class="btn btn-info btn-lg"> Simpan</button>
          </div>
          
        </form>
      </div>
      <!-- /.row -->
      <!-- ============ MODAL ADD =============== -->
      <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="modal-title" id="myModalLabel">Data Barang</h3>
            </div>
            <div class="modal-body" style="overflow:scroll;height:500px;">
              <table class="table table-bordered table-condensed" style="font-size:11px;" id="datatable">
                <thead>
                  <tr>
                    <th style="text-align:center;"">No</th>
                    <th style="">Kode Barang</th>
                    <th style="">Nama Barang</th>
                    <th>Satuan</th>
                    <th style="">Harga (Eceran)</th>
                    <th>Stok</th>
                    <th style="text-align:center;">Aksi</th>
                  </tr>
                </thead>
              <tbody>
                <?php 
                  $no=0;
                  foreach ($data->result_array() as $a):
                    $no++;
                    $id=$a['barang_id'];
                    $nm=$a['barang_nama'];
                    $satuan=$a['barang_satuan'];
                    $harpok=$a['barang_harpok'];
                    // $harjul=$a['barang_harjul'];
                    // $harjul_grosir=$a['barang_harjul_grosir'];
                    $stok=$a['barang_stok'];
                    // $min_stok=$a['barang_min_stok'];
                    $kat_id=$a['barang_kategori_id'];
                    $kat_nama=$a['kategori_nama'];
                ?>
                <tr>
                  <td style="text-align:center;"><?php echo $no;?></td>
                  <td><?php echo $id;?></td>
                  <td><?php echo $nm;?></td>
                  <td style="text-align:center;"><?php echo $satuan;?></td>
                  <td style="text-align:right;"><?php echo 'Rp '.number_format($harpok);?></td>
                  <td style="text-align:center;"><?php echo $stok;?></td>
                  <td style="text-align:center;">
                    <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
                      <input type="hidden" name="kode_brg" value="<?php echo $id?>">
                      <input type="hidden" name="nabar" value="<?php echo $nm;?>">
                      <input type="hidden" name="satuan" value="<?php echo $satuan;?>">
                      <input type="hidden" name="stok" value="<?php echo $stok;?>">
                      <input type="hidden" name="harpok" value="<?php echo number_format($harpok);?>">
                      <input type="hidden" name="diskon" value="0">
                      <input type="hidden" name="qty" value="1" required>
                      <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                    </form>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>          
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ============ MODAL HAPUS =============== -->
    <!--END MODAL-->
  </div>
  <!-- /.container -->
  <!-- jQuery -->
  <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
  <script src="<?php echo base_url('assets/admin/assets/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/admin/assets/datatables/dataTables.bootstrap.js')?>"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').dataTable();
    } );
  </script>
  <script type="text/javascript">
    $(function(){
      $('#jml_uang').on("input",function(){
        var total=$('#total').val();
        var jumuang=$('#jml_uang').val();
        var hsl=jumuang.replace(/[^\d]/g,"");
        $('#jml_uang2').val(hsl);
        $('#kembalian').val(hsl-total);
      })
    });
  </script>
  <script type="text/javascript">
    $(function(){
      $('.jml_uang').priceFormat({
        prefix: '',
        //centsSeparator: '',
        centsLimit: 0,
        thousandsSeparator: ','
      });
      $('#jml_uang2').priceFormat({
        prefix: '',
        //centsSeparator: '',
        centsLimit: 0,
        thousandsSeparator: ''
      });
      $('#kembalian').priceFormat({
        prefix: '',
        //centsSeparator: '',
        centsLimit: 0,
        thousandsSeparator: ','
      });
      $('.harjul').priceFormat({
        prefix: '',
        //centsSeparator: '',
        centsLimit: 0,
        thousandsSeparator: ','
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#kode_brg").focus();
      $("#kode_brg").on("input",function(){
        var kobar = {kode_brg:$(this).val()};
        $.ajax({
          type: "POST",
          url : "<?php echo base_url().'admin/penjualan/get_barang';?>",
          data: kobar,
          success: function(msg){
            $('#detail_barang').html(msg);
          }
        });
      }); 
      $("#kode_brg").keypress(function(e){
        if(e.which==13){
          $("#jumlah").focus();
        }
      });
    });
  </script>
</body>
</html>
