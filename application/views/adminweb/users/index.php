<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Users</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									<?php 
									
													if ($this->session->flashdata('message')){
														echo "<div class='alert alert-block alert-error show'>
															  <button type='button' class='close' data-dismiss='alert'>×</button>
																 <span>Users Berhasil Dihapus</span>
																</div>";
													}


												
							?>
								</div>
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									<thead>
										<tr>
											<th>No</th>
                                            <th>Nama</th>
											<th>Email</th>
											<th>Username</th>
											<th>Phone</th>
											<th>Alamat</th>
                                            <th>Provinsi</th>
                                            <th>Kota</th>
                                            <th>Kode Pos</th>
                                            <th>Aksi</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										$no=1;
										if ($data_users->num_rows()>0) {
											foreach ($data_users->result_array() as $tampil) { ?>
										<tr >
											<td><?php echo $no;?></td>
											<td><?php echo $tampil['nama_users'];?></td>
											<td><?php echo $tampil['email'];?></td>
											<td><?php echo $tampil['username'];?></td>
											<td><?php echo $tampil['phone'];?></td>
                                            <td><?php echo $tampil['alamat'];?></td>
                                            <td><?php echo $tampil['provinsi'];?></td>
                                            <td><?php echo $tampil['kota'];?></td>
                                            <td><?php echo $tampil['kode_pos'];?></td>


                                            <td>
											<a class="btn red" href="<?php echo base_url();?>adminweb/users_delete/<?php echo $tampil['id_users'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_users'];?>?')"><i class="icon-trash"></i> Delete</a>


										</td>
										</tr>
										<?php
										$no++;
										}
										}
										
										else { ?>
										<tr>
											<td colspan="8">No Result Data</td>
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

				


				


