<?php $this->load->view('home/header'); ?>


	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							

								<div class="item active">
									<div class="col-sm-6">
										<h1><span>Busana Muslim Wanita</span></h1>
										<h2>Tittle Pertama</h2>
										<p><?php echo strip_tags(substr('Lorem ipsum dolor sit amet, consectetur adipisicin...',0,200));?></p>

									</div>
									<div class="col-sm-6">
										<img src="<?php echo base_url();?>images/slider/77slide9.jpg" class="girl img-responsive" alt="Tittle Pertama" />
										
									</div>
								</div>

								<div class="item">
									<div class="col-sm-6">
										<h1><span>Busana Muslim Wanita</span></h1>
										<h2>Tittle Kedua</h2>
										<p><?php echo strip_tags(substr('Lorem ipsum dolor sit amet, consectetur adipisicin...',0,200));?></p>
									</div>
									<div class="col-sm-6">
										<img src="<?php echo base_url();?>images/slider/87slide4.jpg" class="girl img-responsive" alt="Tittle Kedua" />

									</div>
								</div>

                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>Busana Muslim Wanita</span></h1>
                                        <h2>Tittle Ketiga</h2>
                                        <p><?php echo strip_tags(substr('Lorem ipsum dolor sit amet, consectetur adipisicin...',0,200));?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="<?php echo base_url();?>images/slider/3370busana-muslim.jpg" class="girl img-responsive" alt="Tittle Ketiga" />

                                    </div>
                                </div>

							

							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">

                <?php $this->load->view('home/sidebar'); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Producs</h2>
						
						<?php
						foreach ($produk->result_array() as $value) { ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img style="height: 240px; width: 260px" src="<?php echo base_url();?>images/produk/<?php echo $value['gambar'];?>" alt="" />
											<h2>Rp. <?php echo $value['harga'];?></h2>
                                                <a href="<?php echo base_url();?>home/produk/<?php echo $value['id_produk'];?>"><h4 style="color: black"> <?php echo $value['nama_produk'];?></h4></a>
											<a href="<?php echo base_url();?>home/keranjang/<?php echo $value['id_produk'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
                                                <a href="<?php echo base_url();?>home/produk/<?php echo $value['id_produk'];?>"><img style="height: 240px; width: 260px" src="<?php echo base_url();?>images/produk/<?php echo $value['gambar'];?>" alt="" /></a>
                                                <a href="<?php echo base_url();?>home/produk/<?php echo $value['id_produk'];?>"><h2>Rp. <?php echo $value['harga'];?></h2></a>
												<a href="<?php echo base_url();?>home/produk/<?php echo $value['id_produk'];?>"><h4 style="color: black"> <?php echo $value['nama_produk'];?></h4></a>
												<a href="<?php echo base_url();?>home/keranjang/<?php echo $value['id_produk'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<?php
						}
						?>
						
						
						
						
						
						
						
					</div><!--features_items-->
					
					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								
										
										<div class="item active">	
											<?php
									foreach ($random_active->result_array() as $value) { ?>
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img style="height: 240px; width: 260px" src="<?php echo base_url();?>images/produk/<?php echo $value['gambar'];?>" alt="" />
                                                        <h2>Rp. <?php echo $value['harga'];?></h2>
                                                        <a href="<?php echo base_url();?>home/produk/<?php echo $value['id_produk'];?>"><h4 style="color: black"> <?php echo $value['nama_produk'];?></h4></a>
                                                        <a href="<?php echo base_url();?>home/keranjang/<?php echo $value['id_produk'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>
													
												</div>
											</div>
										</div>
										<?php
									}
									?>
									</div>
									

									
									<div class="item">	
										<?php
									foreach ($random->result_array() as $value) { ?>
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img style="height: 240px; width: 260px" src="<?php echo base_url();?>images/produk/<?php echo $value['gambar'];?>" alt="" />
                                                        <h2>Rp. <?php echo $value['harga'];?></h2>
                                                        <a href="<?php echo base_url();?>home/produk/<?php echo $value['id_produk'];?>"><h4 style="color: black"> <?php echo $value['nama_produk'];?></h4></a>
                                                        <a href="<?php echo base_url();?>home/keranjang/<?php echo $value['id_produk'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>
													
												</div>
											</div>
										</div>
										<?php
									}
									?>
									</div>
									
										
										

							
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>

<?php $this->load->view('home/footer'); ?>