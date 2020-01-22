<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Transaksi Proses</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										
										
									</div>
									<?php

                                    if($this->session->flashdata('berhasil')){
                                        echo "<div class='alert alert-block alert-success show'>
															  <button type='button' class='close' data-dismiss='alert'>×</button>
																 <span>Transaksi Sudah Di Proses</span>
																</div>";
                                    }elseif($this->session->flashdata('tolak')){
                                        echo "<div class='alert alert-block alert-success show'>
															  <button type='button' class='close' data-dismiss='alert'>×</button>
																 <span>Transaksi Sudah Di Tolak</span>
																</div>";
                                    }
													
							?>
								</div>
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode Transaksi</th>
											<th>Nama </th>
											<th>Email</th>
											<th>Bank</th>

                                            <th>Status</th>
											<th>Aksi</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										$no=1;
										if ($data_transaksi->num_rows()>0) {
											foreach ($data_transaksi->result_array() as $tampil) { ?>
										<tr >
											<td><?php echo $no;?></td>
											<td><?php echo $tampil['kode_transaksi'];?></td>
											<td><?php echo $tampil['nama_users'];?></td>
											<td><?php echo $tampil['email'];?></td>
											<td><?php echo $tampil['nama_bank'];?></td>

                                            <td>
                                                <?php
                                                if ($tampil['status']==0){
                                                    echo 'Belum Konfirmasi';
                                                }elseif($tampil['status']==2){
                                                    echo 'Sudah Konfirmasi';
                                                }
                                                else{

                                                }
                                                ?>
                                            </td>

											<td>
                                                <a class="btn green" href="<?php echo base_url();?>adminweb/transaksi_proses/<?php echo $tampil['id_transaksi'];?>"><i class="icon-edit"></i> Proses</a>
                                                <a class="btn green" href="<?php echo base_url();?>adminweb/transaksi_tolak/<?php echo $tampil['id_transaksi'];?>"><i class="icon-edit"></i> Tolak</a>
											<a class="btn blue" href="<?php echo base_url();?>adminweb/transaksi_detail/<?php echo $tampil['id_transaksi'];?>/<?php echo $tampil['kode_transaksi'];?>"><i class="icon-search"></i> Detail</a>


										</td>
										</tr>
										<?php
										$no++;
										}
										}
										
										else { ?>
										<tr>
											<td colspan="12">No Result Data</td>
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

				


				


