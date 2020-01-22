<?php $this->load->view('home/header'); ?>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol style="margin-bottom: 20px" class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Konfirmasi Pembayaran</li>
            </ol>
        </div>




            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td>No</td>
                        <td>Tanggal</td>
                        <td>Kode Transaksi</td>
                        <td align="center">Aksi</td>

                        <td></td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $no=1;
                    if ($data_konfirmasi->num_rows()>0) {
                        foreach ($data_konfirmasi->result_array() as $tampil) { ?>
                            <tr >
                                <td><?php echo $no;?></td>
                                <td><?php echo $tampil['tanggal'];?></td>
                                <td><?php echo $tampil['kode_transaksi'];?></td>
                                <td align="center"><a href="<?php echo base_url(); ?>home/konfirmasi_pembayaran/<?php echo $tampil['id_transaksi'];?>/<?php echo $tampil['kode_transaksi'];?>">Konfirmasi Pembayaran</a></td>

                            </tr>
                            <?php

                            $no++;
                        }
                    }

                    else { ?>
                        <tr>
                            <td colspan="11">
                                <div style="margin: 0" class="register-req" align="center">
                                    Anda sedang tidak melakukan transaksi apapun.
                                </div>
                            </td>
                        </tr>
                        <?php

                    }
                    ?>


                    </tbody>
                </table>

            </div>





    </div>



</section> <!--/#cart_items-->


<?php $this->load->view('home/footer'); ?>