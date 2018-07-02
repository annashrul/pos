<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="M Fikri Setiadi">
    <title>Welcome To Point of Sale Apps</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
  	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
  	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
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
   <?php $this->load->view('admin/menu');?>
    <!-- Page Content -->
    <div class="container">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <center><?php echo $this->session->flashdata('msg');?></center>
          <h1 class="page-header">Data Pengguna
            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Pengguna</a>
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
                <th style="text-align:center;width:40px;">No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <!-- <th>Status</th> -->
                <th style="width:140px;text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no=0;
                foreach ($data->result_array() as $a):
                $no++;
                $id=$a['user_id'];
                $nm=$a['user_nama'];
                $username=$a['user_username'];
                $password=$a['user_password'];
                $level=$a['user_level'];
                $status=$a['user_status'];
              ?>
              <tr>
                <td style="text-align:center;"><?php echo $no;?></td>
                <td><?php echo $nm;?></td>
                <td><?php echo $username;?></td>
                <td><?php echo $password;?></td>
                <td>
                  <?php if($level == 1){ echo 'Admin'; }else{ echo 'Kasir'; } ?></td>
                <!-- <td><?php echo $status;?></td> -->
                <td style="text-align:center;">
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
              <h3 class="modal-title" id="myModalLabel">Tambah Pengguna</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/tambah_pengguna'?>">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label col-xs-3" >Nama</label>
                  <div class="col-xs-9">
                    <input name="nama" class="form-control" type="text" placeholder="Input Nama..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-xs-3" >Username</label>
                  <div class="col-xs-9">
                    <input name="username" class="form-control" type="text" placeholder="Input Username..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-xs-3" >Password</label>
                  <div class="col-xs-9">
                    <input name="password" class="form-control" type="password" placeholder="Input Password..." required>
                  </div>
                </div>
                    
                <div class="form-group">
                  <label class="control-label col-xs-3" >Ulangi Password</label>
                  <div class="col-xs-9">
                    <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..." required>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="control-label col-xs-3" >Level</label>
                  <div class="col-xs-9">
                    <select name="level" class="form-control" required>
                      <option value="1">Admin</option>
                      <option value="2">Kasir</option>
                    </select>
                  </div>
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

      <!-- ============ MODAL EDIT =============== -->
      <?php
        foreach ($data->result_array() as $a) {
        $id=$a['user_id'];
        $nm=$a['user_nama'];
        $username=$a['user_username'];
        $password=$a['user_password'];
        $level=$a['user_level'];
        $status=$a['user_status'];
      ?>
      <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="modal-title" id="myModalLabel">Edit Pengguna</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/edit_pengguna'?>">
              <div class="modal-body">
                <input name="kode" type="hidden" value="<?php echo $id;?>">
                <div class="form-group">
                  <label class="control-label col-xs-3" >Nama</label>
                  <div class="col-xs-9">
                    <input name="nama" class="form-control" type="text" value="<?php echo $nm;?>" placeholder="Input Nama..."  required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-xs-3" >Username</label>
                  <div class="col-xs-9">
                    <input name="username" class="form-control" type="text" value="<?php echo $username;?>" placeholder="Input Username..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-xs-3" >Password</label>
                  <div class="col-xs-9">
                    <input name="password" class="form-control" type="password" placeholder="Input Password...">
                  </div>
                </div>
                    
                <div class="form-group">
                  <label class="control-label col-xs-3" >Ulangi Password</label>
                  <div class="col-xs-9">
                    <input name="password2" class="form-control" type="password" placeholder="Ulangi Password...">
                  </div>
                </div> 

                <div class="form-group">
                  <label class="control-label col-xs-3" >Level</label>
                  <div class="col-xs-9">
                    <select name="level" class="form-control" required>
                      <?php if ($level=='1'):?>
                      <option value="1" selected>Admin</option>
                      <option value="2">Kasir</option>
                      <?php else:?>
                      <option value="1">Admin</option>
                      <option value="2" selected>Kasir</option>
                      <?php endif;?>
                    </select>
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
        $id=$a['user_id'];
        $nm=$a['user_nama'];
        $username=$a['user_username'];
        $password=$a['user_password'];
        $level=$a['user_level'];
        $status=$a['user_status'];
      ?>
      <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="modal-title" id="myModalLabel">Hapus Pengguna</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/delete'?>">
              <div class="modal-body">
                <p>Yakin mau menghapus pengguna dengan nama <b><?php echo $nm;?></b>..?</p>
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

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url('assets/admin/assets/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/assets/datatables/dataTables.bootstrap.js')?>"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#datatable').dataTable();
      } );
    </script>
    
</body>

</html>
