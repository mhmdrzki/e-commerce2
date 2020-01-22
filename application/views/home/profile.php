<?php $this->load->view('home/header'); ?>


	
	<section>
		<div class="container">
			<div class="row">

				
			<div class="col-sm-6 col-sm-offset-3">
					<div class="blog-post-area">
						<h2 class="title text-center">Update Profile</h2>
                        <div class="contact-form">

                            <?php

                            if ($this->session->flashdata('error')){
                                echo "<div class='alert alert-block alert-danger show'>
									  	<button type='button' class='close' data-dismiss='alert'>×</button>
										<span>Username atau Email Telah Terdaftar!</span>
									</div>";
                            }


                            ?>


                            <div class="status alert alert-success" style="display: none"></div>
                            <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>home/profil_update">
                            <?php
                            foreach ($detail_users->result_array() as $tampil) { ?>
                                <input type="hidden" name='id_users' value="<?php echo $tampil['id_users'];?>">
                                <div class="form-group col-md-12">
                                    <input type="text" name="nama_users" class="form-control" required="required" value="<?php echo $tampil['nama_users']?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="username" class="form-control" required="required" value="<?php echo $tampil['username']?>" readonly>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="Email" name="email" class="form-control" required="required" value="<?php echo $tampil['email']?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="password" name="password" class="form-control" required="required" placeholder="Password">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="phone" class="form-control" required="required" value="<?php echo $tampil['phone']?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <TEXTAREA type="text" name="alamat" class="form-control" required="required" ><?php echo $tampil['alamat']?></TEXTAREA>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="kode_pos" class="form-control" required="required" value="<?php echo $tampil['kode_pos']?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="provinsi" class="form-control" required="required" value="<?php echo $tampil['provinsi']?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <select required class="form-control" name="kota">

                                        <?php

                                        foreach ($kota->result_array() as $row) {
                                            if ($tampil['kota']==$row['nama_kota']){
                                                echo "<option selected value=$row[nama_kota]>$row[nama_kota]</option>";
                                            }
                                            else{
                                                echo "<option value=$row[nama_kota]>$row[nama_kota]</option>";
                                            }

                                        }
                                        ?>
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <p class="animate6 bounceIn"><a href="<?php echo base_url();?>/home" class="btn btn-danger btn-block">Batal</a></p>
                                </div>
                                <div  class="form-group col-md-6">
                                    <p class="animate6 bounceIn"><button type="submit" class="btn btn-success btn-block">Update</button></p>
                                </div>

                                <?php } ?>
                            </form>

                        </div>
					</div><!--/blog-post-area-->



					
					
					
					
				</div>	



			</div>
		</div>
	</section>

<?php $this->load->view('home/footer'); ?>