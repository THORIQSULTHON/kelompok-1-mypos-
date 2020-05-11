<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/assets_landingpage/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/assets_landingpage/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/assets_landingpage/css/flaticon.css"/>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/assets_landingpage/css/slicknav.min.css"/>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/assets_landingpage/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/assets_landingpage/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/assets_landingpage/css/animate.css"/>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/assets_landingpage/css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site-logo">
							<img src="<?= base_url(); ?>assets/assets_landingpage/img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-4 col-lg-5 ml-5">
						<div class="user-panel">
							<div class="up-item main-menu ml-2">
								<i class="flaticon-profile"></i>
								<?php
								 $sesi = $this->session->userdata('customerid');
								if(!empty($sesi)) : ?>
								<!-- kondisi berhasil login -->
								<li><a href="#">Menu user</a>
								<ul class="sub-menu">
									<li><a href="<?= base_url('Auth_user/logout') ?>">Logout</a></li>
									<li><a href="#">Ganti Password</a></li>
									<li><a data-target="#modalUpload" data-toggle="modal" class="btn">Upload bukti Pembayaran</a></li>
									</ul>
								</li>
								
								<?php else :?>
								<!-- kondisi gagal -->
								<a href="<?= base_url('Auth_user');?>" class="ml-7">Sign</a> In or <a href="<?= base_url('Auth_user/registrasi');?>">Create Account</a>
								<?php endif;?>
							</div>
							<?php
								$seso = $this->session->userdata('customerid');
								if(!empty($seso)) : ?>
							<div class="up-item mr-3 ml-10">
								<div class="shopping-card">
									<i class="fa fa-cart-plus"></i>
									<span>0</span>
								</div>
								<a href="<?= base_url('Home/cart');?>">Keranjang </a>
							</div>
							<!-- <div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="<?= base_url('Home/cart');?>">Barang pending</a>
							</div> -->
								<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="<?= base_url('Home');?>">Home</a></li>
					<?php
					$sese = $this->session->userdata('customerid');
					if(!empty($sese)) :?>
					<li><a href="<?= base_url('Home/cart');?>">Cart</a></li>
					<?php endif;?>
					<!-- <li><a href="#">Men</a></li> -->
					<!-- <li><a href="#">Jewelry
						<span class="new">New</span>
					</a></li> -->
					<!-- <li><a href="#">Shoes</a>
						<ul class="sub-menu">
							<li><a href="#">Sneakers</a></li>
							<li><a href="#">Sandals</a></li>
							<li><a href="#">Formal Shoes</a></li>
							<li><a href="#">Boots</a></li>
							<li><a href="#">Flip Flops</a></li>
						</ul>
					</li> -->
					<li><a href="#">Menu user</a>
						<ul class="sub-menu">
							<li><a href="./product.html">Upload bukti Pembayaran</a></li>
							<li><a href="./category.html">Ganti Password</a></li>
						</ul>
					</li>
					<!-- <li><a href="#">Blog</a></li> -->
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->

			<!-- modal Upload foto -->
			<div class="modal fade" id="modalUpload">
    		<div class="modal-dialog modal-sm">
        		<div class="modal-content">
            		<div class="modal-header">
                		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    		<span aria-hidden="true">&times;</span>
                		</button>
                			<h4 class="modal-tittle">Silahkan Upload Bukti Pembayaran</h4>
            		</div>
			<form action="<?=base_url('Home/prosesct');?>" id="formEdit" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="qty"></label>
							<input type="hidden" class="form-control" value="<?= $this->session->userdata('customerid'); ?>" id="qty12" name="qty12" placeholder="Menu Name">
							<input type="file" class="form-control" value="" id="qty12" name="qty12" placeholder="Menu Name">
					</div>
				</div>
            <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger" name="edit_tombol" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>