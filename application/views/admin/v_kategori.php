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
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
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
          <h1 class="page-header">Kategori Barang
              <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#largeModal">
              <span class="fa fa-plus"></span> Tambah Kategori</a>
          </h1>
        </div>
      </div>
      <!-- /.row -->
      <!-- Projects Row -->
      <div class="row">
        <div class="col-lg-12">
          <table id="datatable" class="table table-striped table-bordered" style="font-size:11px;">
            <thead>
              <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no=0;
                foreach ($data->result_array() as $a):
                $no++;
                $id=$a['kategori_id'];
                $nm=$a['kategori_nama'];
              ?>
              <tr>
                <td style="width:50px;"><?php echo $no;?></td>
                <td><?php echo $nm;?></td>
                <td style="text-align:center;width:140px;">
                  <a class="btn btn-xs btn-info" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                  <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.row -->
      <!-- ============ MODAL ADD =============== -->
      <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="modal-title" id="myModalLabel">Tambah Kategori</h3>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kategori/tambah_kategori'?>">
                <div class="form-group">
                  <label class="control-label col-xs-3" >Nama Kategori</label>
                  <div class="col-xs-9">
                    <input name="kategori" class="form-control" type="text" placeholder="Input Nama Kategori..." required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  <button class="btn btn-info">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- ============ MODAL EDIT =============== -->
      <?php
        foreach ($data->result_array() as $a) {
        $id=$a['kategori_id'];
        $nm=$a['kategori_nama'];
      ?>
      <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="modal-title" id="myModalLabel">Edit Kategori</h3>
            </div>
              <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kategori/edit_kategori'?>">
                <div class="modal-body">
                  <input name="kode" type="hidden" value="<?php echo $id;?>">
                  <div class="form-group">
                    <label class="control-label col-xs-3" >Kategori</label>
                    <div class="col-xs-9">
                      <input name="kategori" class="form-control" type="text" value="<?php echo $nm;?>" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  <button type="submit" class="btn btn-info">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php } ?>

        <!-- ============ MODAL HAPUS =============== -->
        <?php
          foreach ($data->result_array() as $a) {
          $id=$a['kategori_id'];
          $nm=$a['kategori_nama'];
        ?>
        <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Kategori</h3>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kategori/hapus_kategori'?>">
                <div class="modal-body">
                  <p>Yakin mau menghapus kategori <strong><?=$nm?></strong></p>
                  <input name="kode" type="hidden" value="<?php echo $id; ?>">
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php } ?>
        <!--END MODAL-->
        
      </div>
      <!-- /.container -->
      <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
      <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
      <!-- <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
      <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script> -->
      <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
      <script src="<?php echo base_url('assets/admin/assets/datatables/jquery.dataTables.min.js')?>"></script>
      <script src="<?php echo base_url('assets/admin/assets/datatables/dataTables.bootstrap.js')?>"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#datatable').dataTable();
        } );
      </script>

  </body>

</html>
