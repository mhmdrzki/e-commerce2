<?php $this->load->view('home/header'); ?>


    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol style="margin-bottom: 20px" class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="register-req">
                <ul>
                    <li>Apabila Anda mengubah jumlah (Qty), jangan lupa tekan tombol Update Keranjang Belanja</li>
                    <li>Untuk menghaspus barang pada keranjang belanja, klik tombol Hapus.</li>
                    <!-- <li>Total harga di atas belum termasuk ongkos kirim yang akan dihitung saat Selesai Belanja</li> -->
                </ul>
            </div>
            <?php if(!$this->cart->contents()):
                echo '<div class="register-req"> Maaf, Keranjang Belanja Anda Masih Kosong. </div>';
            else:
            ?>

            <div class="row">
                <div class="col-md-9">
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="cart_menu">

                                <td class="image">Gambar</td>
                                <td class="description">Nama Barang</td>
                                <td style="padding-left: 5px" class="image">Jumlah</td>
                                <td class="price">Harga</td>
                                <td class="quantity">Sub Total</td>
                                <td class="total">Hapus</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1; ?>
                            <?php foreach($this->cart->contents() as $items): ?>
                                <?php echo form_open('home/keranjang_update'); ?>
                                <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                                <tr <?php if($i&1){ echo 'class="alt"'; }?>>
                                    <td class="td-keranjang">
                                        <img style="height: 50px; width: 50px; margin-left: 25px" src="<?php echo base_url();?>images/produk/<?php echo $items['gbar'];?>" />
                                    </td>
                                    <td class="td-keranjang"><?php echo $items['name']; ?></td>

                                    <td class="td-keranjang">
                                        <select name="qty[]" class="input-teks">
                                            <?php
                                            for($i=1;$i<=$items['stok_brg'];$i+=1)
                                            {
                                                if($i==$items['qty'])
                                                {
                                                    echo "<option selected>".$items['qty']."</option>";

                                                }
                                                else
                                                {
                                                    echo "<option>".$i."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>

                                    <td class="td-keranjang">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                                    <td class="td-keranjang">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                    <td class="td-keranjang" align="center"><a href="<?php echo base_url(); ?>home/keranjang_hapus/<?php echo $items['rowid']; ?>"><i class="fa fa-times"></i></a></td>
                                </tr>

                                <?php $i++; ?>
                            <?php endforeach; ?>

                            <tr>

                                <?php
                                $total_ongkir = null;
                                foreach ($ongkir->result_array() as $value) {
                                    $total_ongkir  =  $value['ongkir'];
                                }
                                ?>
                                <td colspan="3"></td>
                                <td class="td-keranjang" align="center" colspan="1"><b style="">Ongkos Kirim</b></td>
                                <td class="td-keranjang" colspan=2><b >Rp. <?php echo number_format($total_ongkir,2,".",",");?></b></td>

                            </tr>
                            <tr>

                                <?php

                                $total  =  $this->cart->total()+$total_ongkir   ;

                                ?>
                                <td colspan="3"></td>
                                <td class="td-keranjang" align="center" colspan="1"><b style="font-size: 20px">Total Belanja</b></td>
                                <td class="td-keranjang" colspan=2><b style="font-size: 20px">Rp. <?php echo number_format($total,2,".",",");?></b></td>

                            </tr>


                            </tbody>

                        </table>
                        <a href="<?php base_url();?>home" style="background-color:#fe5925; margin-top: 0px; margin-right: 5px; margin-left: 5px; width: 200px;" type="submit" class="btn btn-default get pull-right">Lanjut Belanja</a>
                        <input style="background-color:#fe5925; margin-top: 0px; width: 200px;" type="submit" class="btn btn-default get pull-right" value="Update Keranjang">
                        <?php
                        echo form_close();

                        ?>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="cart_menu">

                                <td class="image">Metode Pembayaran</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="alt">
                                <td>
                                    <?php echo form_open('home/keranjang_invoice');?>
                                    <select name="bank_id">
                                        <?php
                                        foreach ($bank->result_array() as $value) { ?>
                                            <option value="<?php echo $value['id_bank'];?>"><?php echo $value['nama_bank'];?>- <?php echo $value['no_rekening'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </td>
                            </tr>
                            <tr class="cart_menu">

                            <tr>
                                <td>

                                    <button style="background-color:#fe5925;width: 200px; margin-left: 26px; margin-top: 0; margin-bottom: -20px; font-size: 16px" class="btn btn-primary" type="submit">Pesan Barang</button>
                                    <?php echo form_close();?>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>


                </div>
                <?php endif; ?>
            </div>
        </div>







        <?php if(validation_errors()) { ?>
            <div class="alert alert-block alert-danger show">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo validation_errors(); ?>
            </div>
            <?php
        }
        ?>



        <div class="shopper-informations">
            <div class="row">



            </div>
        </div>

        </div>



    </section> <!--/#cart_items-->


<?php $this->load->view('home/footer'); ?>