<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#2A3F54;border:0px;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="margin-top:10px;color:white!important;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url().'welcome'?>" style="color:white!important;"><b>Point of Sale</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php $h=$this->session->userdata('akses'); ?>
        <?php $u=$this->session->userdata('user'); ?>
        <?php if($h=='1'){ ?> 
        <!--dropdown-->
        <li>
          <a href="<?php echo base_url().'admin/barang'?>"><span class="fa fa-cubes"></span> Barang</a>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/kategori'?>"><span class="fa fa-tags"></span> Kategori Barang</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-exchange" aria-hidden="true"></span> Transaksi</a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url().'admin/penjualan'?>"> Penjualan</a></li> 
            <!-- <li><a href="<?php echo base_url().'admin/penjualan_grosir'?>"> Penjualan (Grosir)</a></li>  -->
           <!--  <li><a href="<?php echo base_url().'admin/pembelian'?>">Pembeliaan</a></li>  -->
          </ul>
        </li>
        <!--ending dropdown-->
        <li>
          <a href="<?php echo base_url().'admin/pengguna'?>"><span class="fa fa-users"></span> Pengguna</a>
        </li>
       <!--  <li>
          <a href="<?php echo base_url().'admin/retur'?>"><span class="fa fa-refresh"></span> Retur</a>
        </li> -->
        <li>
          <a href="<?php echo base_url().'admin/grafik'?>"><span class="fa fa-line-chart"></span> Grafik</a>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/laporan'?>"><span class="fa fa-file"></span> Laporan</a>
        </li>
       <!--   <li>
          <a href="<?php echo base_url().'admin/suplier'?>"><span class="fa fa-truck"></span> Supplier</a>
        </li> -->
        <?php }?>
        <?php if($h=='2'){ ?> 
        <!--dropdown-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-exchange" aria-hidden="true"></span> Transaksi</a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url().'admin/penjualan'?>"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Penjualan</a></li> 
            <!-- <li><a href="<?php echo base_url().'admin/penjualan_grosir'?>"><span class="fa fa-cubes" aria-hidden="true"></span> Penjualan (Grosir)</a></li> --> 
          </ul>
        </li>
        <!--ending dropdown-->
       <!--  <li>
          <a href="<?php echo base_url().'admin/retur'?>"><span class="fa fa-refresh"></span> Retur</a>
        </li> -->
        <?php }?>
        <li>
          <a href="<?php echo base_url().'administrator/logout'?>"><span class="fa fa-sign-out"></span> Logout</a>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>