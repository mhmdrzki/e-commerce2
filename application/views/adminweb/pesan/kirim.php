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
						
						<div class="inbox-loading"></div>
						<div class="inbox-content">
							<?php 
									$pesan = $this->session->flashdata('message');
													if ($this->session->flashdata('message')){
									echo "<div class='alert alert-error show'>
												                   <span>Pesan Berhasil Dihapus</span>  
												                </div>";
													}
												
							?>
						<table class="table table-striped table-advance table-hover">
	<thead>
		<tr>
			<th colspan="3">
				
			</th>
			<th class="text-right" colspan="3">
				<ul class="unstyled inline inbox-nav">
					<!-- <li><span>1-30 of 789</span></li> -->
					<li><i class="icon-angle-left  pagination-left"  onclick="window.location.href='page1.php'"></i></li>
					<li><i class="icon-angle-right pagination-right" onclick="window.location.href='page2.php'"></i></li>
				</ul>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($data_pesan_kirim->result_array() as $tampil) { ?>

		
		<tr >
			<td class="inbox-small-cells">
				
			</td>
			<td class="inbox-small-cells"> <a href="<?php echo base_url();?>adminweb/pesan_kirim_hapus/<?php echo $tampil['id_pesan_terkirim'];?>" onclick="return confirm('Anda yakin ingin mengahapus pesan ?');">  <i class="icon-trash"></i></a></td>
			<td class="view-message  hidden-phone"><b><a href="<?php echo base_url();?>adminweb/pesan_kirim_detail/<?php echo $tampil['id_pesan_terkirim'];?>"><?php echo $tampil['kepada'];?></a></b></td>
			<td class="view-message "><b><a href="<?php echo base_url();?>adminweb/pesan_kirim_detail/<?php echo $tampil['id_pesan_terkirim'];?>"><?php echo substr($tampil['judul'],0,50);?></a></b></td>
			</tr>
		
		
		<?php
		}
		?>
	</tbody>
</table>

						</div>
					</div>
				</div>