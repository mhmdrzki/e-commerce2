<?php $this->load->view('home/header'); ?>

	
	
	
	<section>
		<div class="container">
			<div class="row">
                <?php $this->load->view('home/sidebar'); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Producs</h2>
						<h2><?php foreach ($nama_kategori->result_array() as $value) {
							echo $value['nama_kategori'];
						}
						?>

						</h2>
						
						<?php
						if ($produk_kategori->num_rows()>0) {

							foreach ($produk_kategori->result_array() as $value) { 
							$no;
							?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img style="height: 240px; width: 260px" src="<?php echo base_url();?>images/produk/<?php echo $value['gambar'];?>" alt="" />
											<h2><?php echo $value['harga'];?></h2>
											<h4 style="color: black"><?php echo $value['nama_produk'];?></h4>
                                            <a href="<?php echo base_url();?>home/keranjang/<?php echo $value['id_produk'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
                                                <img style="height: 240px; width: 260px" src="<?php echo base_url();?>images/produk/<?php echo $value['gambar'];?>" alt="" />
												<h2><?php echo $value['harga'];?></h2>
												<h4 style="color: black"><?php echo $value['nama_produk'];?></h4>
                                                <a href="<?php echo base_url();?>home/keranjang/<?php echo $value['id_produk'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<?php
						
	 					
						}
						

						}
						else {
							echo "Tidak Ada Products";
						}
						?>
						

						
						
						
						
						
						
						
					</div><!--features_items-->
					
					
						
							<?php
								echo $paginator;
							?>
						
						
						
					
					
					
				</div>
			</div>
		</div>
	</section>

<?php $this->load->view('home/footer'); ?>