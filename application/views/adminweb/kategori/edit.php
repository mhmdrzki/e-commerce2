<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>Edit Kategori</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								
								<div id="form_sample_2" class="form-horizontal">
								<div id="box" class="alert alert-success hide">
										Data Berhasil Diupdate
									</div>
                                    <div id="box_error" class="alert alert-error hide">
                                        Data Sudah Ada!
                                    </div>
                                    <div id="box_kosong" class="alert alert-error hide">
                                        Masukan Nama Kategori!
                                    </div>
									<input type="hidden" name="id_kategori" id="id_kategori" value="<?php echo $id_kategori;?>">
									

									<div class="control-group">
										<label class="control-label">Kategori</label>
										<div class="controls">
											<input type="text" name="nama_kategori" id="nama_kategori" class="span6 m-wrap" value="<?php echo $nama_kategori;?>" required/>
										</div>
									</div>
									
									<div class="form-actions">
										<button type="submit" id="update" class="btn green"><i class="icon-ok"></i> Update</button>
										<a href="<?php echo base_url();?>adminweb/kategori" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>
										
									</div>
								</div>
								<!-- END FORM-->
							</div>
						</div>
						<!-- END VALIDATION STATES-->
					</div>
				</div>


<script type="text/javascript">
	
	$(document).ready(function(){

		$("#update").click(function(){
			

			var id_kategori = $("#id_kategori").val();
			var nama_kategori = $("#nama_kategori").val();
	
	            	$.ajax({
					type:"POST",
					url:"<?php echo base_url();?>adminweb/kategori_update",
					data:"id_kategori="+id_kategori+"&nama_kategori="+nama_kategori,
					success:function(data) {

						if (data=="1") {
							$("#box_error").show();
						
						}
                        if (nama_kategori=="") {
                            $("#box_kosong").show();

                        }
						else {
							$("#box").show();
						}						
						

					}
				});
            

			
		});

	});
</script>