<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Transaksi Detail</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										
										
									</div>
								
								</div>
								<table class="table table-striped table-hover table-bordered" >
									<thead>
										<tr>
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
										<?php
										$no=1;
                                        $status = null;
										if ($data_header->num_rows()>0) {
											foreach ($data_header->result_array() as $tampil)
                                                $status = $tampil['status'];{ ?>
										<tr >
											<td><?php echo $no;?></td>
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
								</table>
							</div>
						</div>
						
					</div>
				</div>


<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Transaksi Produk</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										
										
									</div>
								
								</div>
								<table class="table table-striped table-hover table-bordered" >
									<thead>
										<tr>
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
											<td><?php echo $no;?></td>
											<td><?php echo $tampil['kode_transaksi'];?></td>
											<td><?php echo $tampil['kode_produk'];?></td>
											<td><?php echo $tampil['nama_produk'];?></td>
											<td><?php echo $tampil['harga'];?></td>
											<td><?php echo $tampil['jumlah'];?></td>
											
											
										</tr>
										<?php
										$no++;
										}
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

								<?php 
								foreach ($data_total->result_array() as $value) {
									$total  =  $value['total'];
								}
								?>

								Total Transaksi =  <?php echo $total;?>
							</div>
						</div>

					</div>
				</div>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div style="margin-bottom: 15px" class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-edit"></i>Detail Pembayaran</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>

                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">


                    </div>

                </div>
                <table class="table table-striped table-hover table-bordered" >
                    <thead>
                    <tr>
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
                    if ($detail_byr->num_rows()>0) {
                        foreach ($detail_byr->result_array() as $tampil) { ?>
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
                        }
                    }

                    else { ?>
                        <tr>
                            <td colspan="6">
                                <div style="margin: 0" class="register-req" align="center">
                                    Pelanggan ini belum melakukan konfirmasi pembayaran.
                                </div>
                            </td>
                        </tr>
                        <?php

                    }
                    ?>

                    </tbody>


                </table>

                <?php
                foreach ($data_total->result_array() as $value) {
                    $total  =  $value['total'];
                }
                ?>

            </div>
        </div>
        <a href="<?php echo base_url();?>adminweb/semua_transaksi" class="btn">Kembali</a>
    </div>
</div>
				


				




				


				


