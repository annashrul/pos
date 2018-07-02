<!DOCTYPE html>
<html>
  <head>
    <title>Masuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="anasrulysf.com">
    <meta name="author" content="Annashrul Yusuf">
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url().'assets/css/stylesl.css'?>" rel="stylesheet">
  </head>
  <style type="text/css" media="screen">
  	input.form-control{border-radius:0px;}
  	.btn{border-radius:0px;}
  </style>
  <body class="login-bg" style="background:#2A3F54;border:0px;">
		<div class="page-content container" style="margin-top:100px;">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-wrapper" style="border-radius:0px;">
		        <div class="box" style="border-radius:0px;">
	            <div class="content-wrap">
	            	<img src="<?=base_url('assets/img/pos.png')?>">
	              <p><?php echo $this->session->flashdata('msg');?></p>
		            <hr/>
	              <form action="<?php echo base_url().'administrator/cekuser'?>" method="post">
	              	<input class="form-control" type="text" name="username" placeholder="Username" required>
	                <input class="form-control" type="password" name="password" placeholder="Password" style="" required>
	                  <button type="submit" class="btn btn-lg btn-primary" style="width:310px;margin-top:0px;">Login</button>
	              </form>
	            </div>
		        </div>
			    </div>
				</div>
			</div>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    
  </body>
</html>