<?php $this->load->view('home/header'); ?>

	
	<section>
		<div class="container">
			<div class="row">
                <?php $this->load->view('home/sidebar'); ?>
				<?php

						foreach ($data_produk->result_array() as $value) {
							$id_produk 		= $value['id_produk'];
							$kode_produk 	= $value['kode_produk'];
							$nama_produk 	= $value['nama_produk'];
							$harga 			= $value['harga'];
							$stok 			= $value['stok'];
							$deskripsi 		= $value['deskripsi'];
							$gambar 		= $value['gambar'];
							$nama_kategori 	= $value['nama_kategori'];
						}

						?>

				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
								<img src="<?php echo base_url();?>images/produk/<?php echo $gambar;?>" alt="" />
								
							</div>
							</div>
							</div>
							

						</div>
						
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><?php echo $nama_produk;?></h2>
								<p>Kode Produk: <?php echo $kode_produk;?></p>
								<span style="margin-top: 0">
									<span>Rp. <?php echo $harga;?></span>
                                    <br>
									<label>Stok: <?php echo $stok;?></label>
								<p><b>Category:</b> <?php echo $nama_kategori;?></p>

                                </span>

                                <br>
                                <a href="<?php echo base_url();?>home/keranjang/<?php echo $id_produk;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

                                <span><p><b>Deskripsi:</b> <br><?php echo $deskripsi;?></p></span>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->



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