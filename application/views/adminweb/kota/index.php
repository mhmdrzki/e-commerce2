<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Kota</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										
										<a  class="btn green" href="#form_modal10" data-toggle="modal">
													Add New <i class="icon-plus"></i>
													</a> 
									</div>
									<?php 
									
													if ($this->session->flashdata('message')){
									echo "<div class='alert alert-error show'>
												                   <span>Kota Berhasil Dihapus</span>  
												                </div>";
													}
													else if($this->session->flashdata('berhasil')){
														echo "<div class='alert alert-success show'>
												                   <span>Kota Berhasil Disimpan</span>  
												                </div>";
													}
												
							?>
								</div>
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									<thead>
										<tr>
											<th>No</th>
                                            <th>Nama Kota</th>
                                            <th>Ongkir</th>
											<th>Action</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										$no=1;
										if ($data_kota->num_rows()>0) {
											foreach ($data_kota->result_array() as $tampil) { ?>
										<tr >
											<td><?php echo $no;?></td>
                                            <td><?php echo $tampil['nama_kota'];?></td>
                                            <td>Rp <?php echo number_format(($tampil['ongkir']),0,",",".");?></td>

											<td><a class="btn green" href="<?php echo base_url();?>adminweb/kota_edit/<?php echo $tampil['id_kota'];?>"><i class="icon-edit"></i> Edit</a>
											<a class="btn red" href="<?php echo base_url();?>adminweb/kota_delete/<?php echo $tampil['id_kota'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_kota'];?>?')"><i class="icon-trash"></i> Delete</a>


										</td>
										</tr>
										<?php
										$no++;
										}
										}
										
										else { ?>
										<tr>
											<td colspan="4">No Result Data</td>
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

				<!-- Halaman Tambah kota -->

				<div id="form_modal10" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h3 id="myModalLabel10">Add Kota</h3>
											</div>
											<div class="modal-body">
												<div class="row-fluid">
													<div class="form-horizontal">

                                                        <div class="control-group">
                                                            <label class="control-label">Nama Kota</label>
                                                            <div class="controls">
                                                                <input class="span8 m-wrap" name="nama_kota" id="nama_kota" required="required" type="text" value=""  />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Ongkir</label>
                                                            <div class="controls">
                                                                <input class="span8 m-wrap" name="ongkir" id="ongkir" type="text" value=""  />
                                                            </div>
                                                        </div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
												<button class="btn green btn-primary" id="simpan" >Save</button>
											</div>

				<!-- Akhir Halaman kota -->


				


<script type="text/javascript">
	$(document).ready(function(){

		$("#simpan").click(function(){
			var nama_kota = $("#nama_kota").val();
            var ongkir = $("#ongkir").val();
			$.ajax({

				type:"POST",
				url:"<?php echo base_url();?>adminweb/kota_simpan",
				data:"nama_kota="+nama_kota+"&ongkir="+ongkir,
				success:function(data) {
                    if(data=="1") {
                        alert("Nama kota Sudah Ada");
                    }
                    else if(nama_kota =="") {
                        alert("Silahkan isi form kosong!");
                    }
                    else if(ongkir =="") {
                        alert("Silahkan isi form kosong!");
                    }
					else {
						
						window.location.reload();
					}
				}

			});

		});

	});
</script>