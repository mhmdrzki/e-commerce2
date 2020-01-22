<?php $this->load->view('home/header'); ?>


<section>
    <div id="contact-page" class="container">
        <div class="bg">

            <div class="row">
                <h2 class="title text-center">Konfirmasi Pembayaran</h2>
                <div class="col-sm-offset-3 col-sm-6 ">
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
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>home/kirim_konfirmasi">
                            <input type="hidden" name="id" class="form-control" required="required" value="<?php echo $this->uri->segment(3);?>">
                            <input type="hidden" name="kode" class="form-control" required="required" value="<?php echo $this->uri->segment(4);?>">

                            <div class="form-group col-md-12">
                                <input type="date" name="tgl_byr" class="form-control" required="required" placeholder="Tanggal Pembayaran">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="jmlh_byr" class="form-control" required="required" placeholder="Jumlah Pembayaran">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="nama_bank" class="form-control" required="required" placeholder="Nama Bank Anda">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="no_rek" class="form-control" required="required" placeholder="No Rekening Anda">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="atas_nama" class="form-control" required="required" placeholder="Atas Nama">
                            </div>



                            <div class="form-group col-md-6">
                                <p class="animate6 bounceIn"><a href="<?php echo base_url(); ?>home/konfirmasi_halaman" class="btn btn-danger btn-block">Kembali</a></p>
                            </div>
                            <div  class="form-group col-md-6">
                                <p class="animate6 bounceIn"><button type="submit" class="btn btn-success btn-block">Konfirmasi Pembayaran</button></p>
                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div><!--/#contact-page-->
</section>



<?php $this->load->view('home/footer'); ?>