<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>Edit Kota</div>
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
									<input type="hidden" name="id_kota" id="id_kota" value="<?php echo $id_kota;?>">


                                    <div class="control-group">
                                        <label class="control-label">Kota</label>
                                        <div class="controls">
                                            <input type="text" name="nama_kota" id="nama_kota" class="span6 m-wrap" value="<?php echo $nama_kota;?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Ongkir</label>
                                        <div class="controls">
                                            <input type="text" name="ongkir" id="ongkir" class="span6 m-wrap" value="<?php echo $ongkir;?>"/>
                                        </div>
                                    </div>
									
									<div class="form-actions">
										<button type="submit" id="update" class="btn green"><i class="icon-ok"></i> Update</button>
										<a href="<?php echo base_url();?>adminweb/kota" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>
										
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
			

			var id_kota = $("#id_kota").val();
            var nama_kota = $("#nama_kota").val();
            var ongkir = $("#ongkir").val();
	
	            	$.ajax({
					type:"POST",
					url:"<?php echo base_url();?>adminweb/kota_update",
					data:"id_kota="+id_kota+"&nama_kota="+nama_kota+"&ongkir="+ongkir,
					success:function(data) {

						if (data=="1") {
							$("#box_error").show();
						
						}
                        else if(nama_kota =="") {
                            alert("Silahkan isi form kosong!");
                        }
                        else if(ongkir =="") {
                            alert("Silahkan isi form kosong!");
                        }
						else {
							$("#box").show();
						}						
						

					}
				});
            

			
		});

	});
</script>