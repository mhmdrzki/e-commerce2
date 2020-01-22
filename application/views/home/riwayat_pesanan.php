<?php $this->load->view('home/header'); ?>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol style="margin-bottom: 20px" class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Riwayat Pesanan</li>
            </ol>
        </div>




            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td>No</td>
                        <td>Tanggal</td>
                        <td>Kode Transaksi</td>
                        <td>Status</td>
                        <td>Aksi</td>

                        <td></td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $no=1;
                    if ($data_riwayat->num_rows()>0) {
                        foreach ($data_riwayat->result_array() as $tampil) { ?>
                            <tr >
                                <td><?php echo $no;?></td>
                                <td><?php echo $tampil['tanggal'];?></td>
                                <td><?php echo $tampil['kode_transaksi'];?></td>
                                <td>
                                    <?php
                                    if($tampil['status']==0){
                                        echo 'Segera Lakukan Pembayaran';
                                    }elseif($tampil['status']==1){
                                        echo 'Telah Di Konfirmasi';
                                    }
                                    elseif($tampil['status']==2){
                                        echo 'Menunggu Konfirmasi';
                                    }
                                    else{
                                        echo 'Ditolak';
                                    }
                                    ?>
                                </td>

                                <td><a href="<?php echo base_url();?>home/detail_riwayat/<?php echo $tampil['id_transaksi'];?>/<?php echo $tampil['kode_transaksi'];?>">Detail</a></td>


                            </tr>
                            <?php
                            $no++;
                        }
                    }

                    else { ?>
                        <tr>
                            <td colspan="11">No Result Data</td>
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