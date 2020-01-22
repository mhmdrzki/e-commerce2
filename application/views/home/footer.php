<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>Toko Busana Muslim Wanita</span></h2>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p> -->
                    </div>
                </div>
                <div class="col-sm-7">
                    <?php
                    foreach ($bank->result_array() as $value) {?>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">

                                <div class="">
                                    <img src="<?php echo base_url();?>/images/bank/<?php echo $value['gambar'];?>" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>

                                <p><?php echo $value['nama_pemilik'];?></p>
                                <h2><?php echo $value['no_rekening'];?></h2>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                </div>
                <div class="col-sm-3">
                    <div class="address">

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2018 Toko Busana Muslim Wanita. All rights reserved.</p>

            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="<?php echo base_url();?>asset/js/jquery.js"></script>
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>asset/js/jquery.scrollUp.min.js"></script>
<script src="<?php echo base_url();?>asset/js/price-range.js"></script>
<script src="<?php echo base_url();?>asset/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url();?>asset/js/main.js"></script>
</body>
</html>