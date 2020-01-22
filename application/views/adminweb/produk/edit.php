<div class="row-fluid">
					<div class="span12">
						
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>Edit Produk</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body form">
								
								<div id="form_sample_2" class="form-horizontal">
								
									<?php echo form_open_multipart('adminweb/produk_update/','class="form-horizontal"'); ?>
									<input type="hidden" name='id_produk' value="<?php echo $id_produk;?>"> 

									<div class="control-group">
										<label class="control-label">Kode Produk</label>
										<div class="controls">
											<input type="text" name="kode_produk" id="kode_produk" class="span6 m-wrap" value="<?php echo $kode_produk;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nama Poduk</label>
										<div class="controls">
											<input type="text" name="nama_produk" id="nama_produk" class="span6 m-wrap" required="required" value="<?php echo $nama_produk;?>" />
										</div>
									</div>

									
									


									<div class="control-group">
												<label class="control-label">Kategori</label>
												<div class="controls">
													<select id="select2_sample2" name="kategori_id" required="required" class="span6 select2">
														<option value=""></option>
														<?php
														foreach ($data_kategori->result_array() as $tampil) { 
															if ($kategori_id==$tampil['id_kategori']) { ?>
															<option value="<?php echo $tampil['id_kategori'];?>" selected="selected"><?php echo $tampil['nama_kategori'];?></option>
															<?php
															}
															else { ?>
															<option value="<?php echo $tampil['id_kategori'];?>"><?php echo $tampil['nama_kategori'];?></option>
															<?php
															}
														
														}
														?>
													</select>
												</div>
											</div>

									<div class="control-group">
										<label class="control-label">Harga</label>
										<div class="controls">
											<input type="text" name="harga" id="harga" required="required" class="span6 m-wrap" value="<?php echo $harga;?>" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Stok</label>
										<div class="controls">
											<input type="text" name="stok" id="stok" required="required" class="span6 m-wrap" value="<?php echo $stok;?>" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Deskripsi</label>
										<div class="controls">
											<textarea class="span12 wysihtml5 m-wrap" rows="6"  required="required" name="deskripsi" id="deskripsi" value="<?php echo $deskripsi;?>" ><?php echo $deskripsi;?></textarea>
											
										</div>
									</div>

									

									<div class="control-group">
										<label class="control-label">Gambar</label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="input-append">
													<div class="uneditable-input">
														<i class="icon-file fileupload-exists"></i> 
														<span class="fileupload-preview"></span>
													</div>
													<span class="btn btn-file">
													<span class="fileupload-new">Select file</span>
													<span class="fileupload-exists">Change</span>
													<input type="file" name="userfile" class="default" required="required"/>
													</span>
													<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												</div>
											</div>
										</div>
										<span class="label label-important">NOTE!</span>
											<span>
											File hanya dalam format gif,jpg,png,jpeg dengan resolusi 268PX x 249PX dan ukuran maksimal file sebesar 3 MB
											</span>
									</div>

									
									<div class="form-actions">
										<button type="submit" id="simpan" class="btn green"><i class="icon-ok"></i> Update</button>
										<a href="<?php echo base_url();?>adminweb/produk" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>
										
									</div>
									<?php echo form_close(); ?>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>


