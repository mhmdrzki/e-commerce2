
<?php $this->load->view('home/header'); ?>

	
<section>
    <div id="contact-page" class="container">
    	<div class="bg">
	    	  	
    		<div class="row">  	
    			<h2 class="title text-center">LOGIN</h2>
	    		<div class="col-sm-offset-3 col-sm-6 ">
	    			<div class="contact-form">
	    				
	    				<?php

							if ($this->session->flashdata('error')){
								echo "<div class='alert alert-block alert-danger show'>
									  	<button type='button' class='close' data-dismiss='alert'>×</button>
										<span>Username atau Password Salah!</span>
									</div>";
							}
                            elseif ($this->session->flashdata('checkout')){
                                echo "<div class='alert alert-block alert-danger show'>
                                            <button type='button' class='close' data-dismiss='alert'>×</button>
                                            <span>Silahkan Login Terlebih Dahulu, Untuk Melakukan Pemesanan</span>
                                        </div>";
                            }
							
							echo form_open('home/login','class="form-vertical"');					
							?>

						
	    				<div class="status alert alert-success" style="display: none"></div>
				            <div class="form-group col-md-12">
				                <input type="text" name="username" class="form-control" required="required" placeholder="username">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="password" name="password" class="form-control" required="required" placeholder="password">
				            </div>
				                          
				            <div class="form-group col-md-6">
				                <p class="animate6 bounceIn"><a href="<?php echo base_url();?>home/daftar" class="btn btn-default btn-block">DAFTAR</a></p>
				            </div>
				            <div class="form-group col-md-6">
				                <p class="animate6 bounceIn"><button type="submit" class="btn btn-default btn-block">LOGIN</button></p>
				            </div>				            
				        <?php echo form_close(); ?>
	    			</div>
	    		</div>
	    			    		
   			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
  </section>



<?php $this->load->view('home/footer'); ?>