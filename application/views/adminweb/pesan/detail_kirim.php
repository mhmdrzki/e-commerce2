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
							?>

								
								<b></b>
							</li>
							<li class="sent"><a class="btn" href="<?php echo base_url();?>adminweb/pesan_kirim"  data-title="Sent">Sent</a><b></b></li>
							</ul>
					</div>
					<div class="span10">
						<div class="inbox-header">
							<h1 class="pull-left">View Send Message</h1>
							
						</div>
						<div class="inbox-loading"></div>
						<div class="inbox-content">
							<div class="inbox-header inbox-view-header">
	<h1 class="pull-left">Subject : <?php echo $judul;?></h1>
	
</div>
<div class="inbox-view-info row-fluid">
	<div class="span7"> 
		<span class="bold">Kepada:</span>
		<span>&#60;<?php echo $kepada;?>&#62;</span> from <span class="bold">me</span> 
	</div>
	
</div>
	</div>
<textarea class="span12  wysihtml5 m-wrap" name="pesan" id="pesan" rows="8" disabled=""><?php echo $isi_pesan_terkirim;?></textarea></div>
<hr>
				</div>
						
				


