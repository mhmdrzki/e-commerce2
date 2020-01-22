<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="">
    <title>Busana Muslim Wanita</title>

    <link href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>asset/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>asset/js/respond.min.js"></script>
    <![endif]-->
    <!-- <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> -->
</head><!--/head-->
<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">

						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 085263014676></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> celcosiven@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">

							<ul class="nav navbar-nav">
                                <?php
                             if($this->session->userdata("logged_user")=="LoginOke") { ?>
                                <li style="padding-top: 10px">Selamat Datang,&nbsp</li>
                                <li style="padding-top: 10px" class="dropdown user">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <b><?php echo $this->session->userdata('nama_users');?></b>
                                        <i style="padding: 0" class="icon-angle-down"></i>
                                    </a>
                                        <ul style="min-width: 200px" class="dropdown-menu">
                                            <li style="min-width: 200px" ><a  href="<?php echo base_url();?>home/profile/<?php echo $this->session->userdata('id_users'); ?>"><i class="icon-user"></i>Update Profile</a></li>

                                            <li style="min-width: 200px"><a  href="<?php echo base_url();?>home/riwayat"><i style="padding-right: 18px" class="icon-dollar"></i>Riwayat Pemesanan</a></li>
                                            <li style="min-width: 200px"><a  href="<?php echo base_url();?>home/konfirmasi_halaman"><i style="padding-right: 14px" class="icon-check"></i>Konfirmasi Pembayaran</a></li>

                                            <li style="min-width: 200px"><a href="<?php echo base_url();?>home/logout"><i style="padding-right: 13px" class="icon-key"></i>Log Out</a></li>

                                        </ul>
                                </li>

                                <?php }else{ ?>
                                <li style="padding-top: 10px;padding-right: 5px"><a href="<?php echo base_url();?>home/daftar"><b>Daftar</b></a></li>
                                <li style="padding-top: 10px;padding-right: 5px">|</a></li>
                                <li style="padding-top: 10px"><a href="<?php echo base_url();?>home/login"><b>Login</b></a></li>

                            <?php } ?>
                            </ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">

							<a href="<?php echo base_url();?>"><img style="width: 200px; height: 45px;" src="<?php echo base_url();?>images/logo/09102018195518A.png" alt="Busana Muslim Wanita" /></a>
						</div>

						<div class="btn-group pull-right">
							
							
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                <li><a href="<?php echo base_url();?>" >Home</a></li>
								<li><a href="<?php echo base_url();?>home/cara_belanja"> Cara Belanja</a></li>
                                <li><a href="<?php echo base_url();?>home/tentang_kami"> Tentang Kami</a></li>
								<li><a href="<?php echo base_url();?>home/hubungi_kami"> Hubungi Kami</a></li>
								<li><a href="<?php echo base_url();?>home/keranjang"> Keranjang Belanja</a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url();?>" class="active">Home</a></li>

								<li class="dropdown"><a href="#">Category<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	<?php
                                    	foreach ($kategori->result_array() as $value) { ?>

                                        <li><a href="<?php echo base_url();?>home/kategori/<?php echo $value['id_kategori'];?>"><?php echo $value['nama_kategori'];?></a></li>
                                    	<?php
                                    	}
                                    	?>

                                    </ul>
                                </li>


							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<?php echo form_open('home/cari');?>
						<div class="search_box pull-right">
							<input type="text" name="cari" placeholder="Search"/>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->