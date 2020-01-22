 <?php
    $query = $this->db->query("select count(status) as stts from tbl_pesan where status='0'");
        foreach ($query->result_array() as $tampil) {
        	$status = $tampil['stts'];
        }
?>
<div class="row-fluid inbox">
					<div class="span2">
						<ul class="inbox-nav margin-bottom-10">
							<li class="compose-btn">
								<a href="<?php echo base_url();?>adminweb/pesan_add" data-title="Compose" class="btn green"> 
								<i class="icon-edit"></i> Compose
								</a>
							</li>
							<li class="inbox active">
								<?php
							if ($status!="0") { ?>
							<a href="<?php echo base_url();?>adminweb/pesan" class="btn" data-title="Inbox">Inbox(<?php echo $status;?>)</a>
							<?php
							}
							else { ?>
								<a href="<?php echo base_url();?>adminweb/pesan" class="btn" data-title="Inbox">Inbox</a>
							<?php
							}
							?><b></b>
							</li>
							<li class="sent"><a class="btn" href="<?php echo base_url();?>adminweb/pesan_kirim"  data-title="Sent">Sent</a><b></b></li>
							</ul>
					</div>
					<div class="span10">
						<div class="inbox-header">
							<h1 class="pull-left">Reply Message</h1>
							
						</div>
						<div class="inbox-loading"></div>
						<div class="inbox-content">

							<div class="inbox-compose form-horizontal" >
	
									<div class="inbox-control-group">
										<label class="control-label">To:</label>
										<div class="controls">
											<input type="text" class="m-wrap span12" name="email" id="email" value="<?php echo $email;?>">
											
										</div>
									</div>
									<div class="inbox-control-group">
										<label class="control-label">Subject:</label>
										<div class="controls">
											<input type="text" class="m-wrap span12" name="judul" id="judul">
										</div>
									</div>
									<div class="inbox-control-group">
										<textarea class="span12  wysihtml5 m-wrap" name="isi_pesan_terkirim" id="isi_pesan_terkirim" rows="12"></textarea>
									</div>
									
									
									<div class="inbox-compose-btn">
										<button class="btn blue" id="simpan"><i class="icon-check"></i>Send</button>
										
										
									</div>
							</div>
							
						</div>
					</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		
		$("#simpan").click(function(){

			var email = $("#email").val();
			var judul = $("#judul").val();
			var isi_pesan_terkirim = $("#isi_pesan_terkirim").val();

			var email_check = email.split("@");

			

			if (email=="") {
				alert("To Masih Kosong");
				$("#email").focus();
			}
			else if (judul=="") {
				alert("Subject Masih Kosong");
				$("#judul").focus();
			}
			else if (isi_pesan_terkirim=="") {
				alert("Isi Pesan Masih Kosong");
				$("#isi_pesan_terkirim").focus();
			}

			else if (email!=""){
                            if (email_check[1]) {
                                var email_check2 = email_check[1].split(".");
                            }
                                                
                            if (!email_check[1] || !email_check2[0] || !email_check2[1]) {
                                alert('Penulisan Email Tidak Valid');
                                return false;
                            }
                            else {
                            	 $.ajax({
                                    type:"POST",
                                    url :"<?php echo base_url();?>adminweb/pesan_balas_simpan",
                                     data:"email="+email+"&judul="+judul+"&isi_pesan_terkirim="+isi_pesan_terkirim,
                                    success : function (data) {
                                   	alert("Pesan Berhasil Dikirim")
   									window.location.href="<?php echo base_url();?>adminweb/pesan_kirim";
                                    }


                                    });

                            }
                    }

		});


		
	})
</script>
						
				


