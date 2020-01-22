<?php $this->load->view('home/header'); ?>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol style="margin-bottom: 20px" class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Riwayat Pesanan</li>
            </ol>
        </div>



        <h2 class="title text-center">Transaksi Detail</h2>
        <div class="table-responsive cart_info">

            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">

                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Penerima</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Propinsi</th>
                    <th>Kota</th>
                    <th>Kode Pos</th>
                    <th>Bank</th>




                </tr>
                </thead>
                <tbody>

                <tbody>
                <?php
                $no=1;
                $status = null;

                if ($data_header->num_rows()>0) {
                    foreach ($data_header->result_array() as $tampil)
                        $status = $tampil['status'];
                    { ?>
                        <tr >
                            <td><b><?php echo $no;?></b></td>
                            <td><?php echo $tampil['kode_transaksi'];?></td>
                            <td><?php echo $tampil['nama_users'];?></td>
                            <td><?php echo $tampil['email'];?></td>
                            <td><?php echo $tampil['alamat'];?></td>
                            <td><?php echo $tampil['phone'];?></td>
                            <td><?php echo $tampil['provinsi'];?></td>
                            <td><?php echo $tampil['kota'];?></td>
                            <td><?php echo $tampil['kode_pos'];?></td>
                            <td><?php echo $tampil['nama_bank'];?></td>


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


                </tbody>
            </table>

        </div>
        <h2 class="title text-center">Detail Produk</h2>
        <div  class="table-responsive cart_info">

            <table class="table table-condensed" >
                <thead>
                <tr class="cart_menu">
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>


                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                if ($data_detail->num_rows()>0) {
                    foreach ($data_detail->result_array() as $tampil) { ?>
                        <tr >
                            <td><b><?php echo $no;?></b></td>
                            <td><?php echo $tampil['kode_transaksi'];?></td>
                            <td><?php echo $tampil['kode_produk'];?></td>
                            <td><?php echo $tampil['nama_produk'];?></td>
                            <td>Rp. <?php echo $tampil['harga'];?></td>
                            <td><?php echo $tampil['jumlah'];?></td>


                        </tr>

                        <?php
                        $no++;
                    }
                    ?>
                    <tr>

                        <?php
                        $total_ongkir = null;
                        foreach ($ongkir->result_array() as $value) {
                            $total_ongkir  =  $value['ongkir'];
                        }
                        ?>
                        <td colspan="3"></td>
                        <td class="td-keranjang" align="center" colspan="1"><b style="">Ongkos Kirim</b></td>
                        <td class="td-keranjang" colspan=2><b >Rp. <?php echo $total_ongkir;?></b></td>

                    </tr>
                    <tr>

                        <?php
                        foreach ($data_total->result_array() as $value) {
                            $total  =  $value['total']+$total_ongkir;
                        }
                        ?>
                        <td colspan="3"></td>
                        <td class="td-keranjang" align="center" colspan="1"><b style="font-size: 20px">Total Belanja</b></td>
                        <td class="td-keranjang" colspan=2><b style="font-size: 20px">Rp. <?php echo $total;?></b></td>

                    </tr>
                    <?php
                }

                else { ?>
                    <tr>
                        <td colspan="6">No Result Data</td>
                    </tr>
                    <?php

                }
                ?>

                </tbody>


            </table>


        </div>

        <h2 class="title text-center">Status Pembayaran</h2>
        <div style="margin-bottom: 0;" class="table-responsive cart_info">

            <table class="table table-condensed" >
                <thead>
                <tr class="cart_menu">
                    <th>Tanggal</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Nama Bank Anda</th>
                    <th>No. Rekening</th>
                    <th>Atas Nama</th>
                    <th>Status</th>



                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;

                if ($detail_bayar->num_rows()>0) {
                    foreach ($detail_bayar->result_array() as $tampil) {

                        ?>
                        <tr >
                            <td><?php echo $tampil['tanggal_byr'];?></td>
                            <td>Rp. <?php echo $tampil['jumlah_byr'];?></td>
                            <td><?php echo $tampil['nama_bank'];?></td>
                            <td><?php echo $tampil['no_rek'];?></td>
                            <td><?php echo $tampil['atas_nama'];?></td>
                            <td><?php
                                if($status==1){
                                    echo "Telah Di Konfirmasi";
                                }elseif ($status==2){
                                    echo "Menunggu Konfirmasi";
                                }elseif($status==3){
                                    echo "Ditolak";
                                }else{

                                }

                                ?>
                            </td>



                        </tr>

                        <?php
                        $no++;
                    }
                    ?>

                    <?php
                }

                else { ?>
                    <tr>
                        <td colspan="6">
                            <div style="margin: 0" class="register-req" align="center">
                                Anda belum melakukan pembayaran, Silahkan melakukan konfirmasi pembayaran agar transaksi anda segere diproses.
                            </div>

                        </td>
                    </tr>
                    <?php

                }
                ?>

                </tbody>


            </table>


        </div>
        <a href="<?php echo base_url(); ?>home"><div style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px;" class="btn btn-default get pull-right">Lanjut Belanja</div></a>
        <a href="<?php echo base_url(); ?>home/riwayat"><div style="margin-top: 10px; margin-bottom: 10px;" class="btn btn-default get pull-right">Kembali</div></a>



    </div>



</section> <!--/#cart_items-->


<?php $this->load->view('home/footer'); ?>