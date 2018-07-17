<style>
.td-desk2{
 	display: inline-block;
	font-weight: bold;
	font-size: 14px;
	padding-left: 80px;	
}
</style>
<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="main-box">
		<div class="box">
			<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue'); shuffle($autocolor);?>
			<div class="small-box <?php echo $autocolor[0];?>">
				<div class="inner2" >
					<p>New MRIN</p>
				</div>
				<div class="icon"><i class="icon-file-text2"></i></div>
				<?php echo anchor ('Procurement?pro=new','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
			</div>
		</div>
	</div>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" align="center">
			<?php 
			$procument = $this->input->get('tab');

			switch ($procument) {
				case "1":
					$tulis = "Approved MRIN";
				break;
				case "2":
					$tulis = "Rejected, Returned MRIN";
				break;
				case "3":
					$tulis = "All MRIN";
				break;
				default:
					$tulis = "Pending MRIN";
			} 
			?>
			<?php include 'content_pro_tab.php';?>
			<tr class="ui-color-desk desk2">
				<td colspan="4" class="t-header" style="color:black; height:40px; padding-left:10px;"><b><?= $tulis ?></b> <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> </td>
			</tr>
			<tr class="ui-color-desk bg-red-blood"> 
				<td colspan="4">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr style="background:#B3130A;">
							<td width="3%" height="30px">							
								<a href="?pro=mrin&tab=<?=$this->input->get('tab') ?>&y=<?= $year-1?>&m=<?= $month?>">
									<img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon"/>
								</a>
							</td>
							<td width="3%">
								<a href="?pro=mrin&tab=<?=$this->input->get('tab') ?>&y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>">
									<img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon"/>
								</a>
							</td>
							<td width="88%" align="center">
								<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
								<a href="?pro=mrin&tab=<?=$this->input->get('tab') ?>&y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>">
									<img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon"/>
								</a>
							</td>
							<td width="3%">
								<a href="?pro=mrin&tab=<?=$this->input->get('tab') ?>&y=<?= $year+1?>&m=<?= $month?>">
									<img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon"/>
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td style="" valign="top" colspan="4">
					<table class="ui-content-middle-menu-workorder2 ui-landscape" width="100%">
						<tr class="ui-menu-color-header" style="color:white; font-size:12px;">
							<th >&nbsp;</th>
							<th style="text-align:left;">MRIN Reference No</th>
							<th >Work Order</th>
							<th >Asset</th>
							<th >Status</th>
							<th >Issue Date</th>
							<th >Remark</th>
						</tr>
						<style>
							.ui-content-middle-menu-workorder2 tr th {padding:8px;font-size:14px;}
							.ui-content-middle-menu-workorder2 tr td {padding:8px;font-size:14px;}
							.ui-content-middle-menu-workorder2 tr td.td-desk a{ font-weight:bold; font-size:14px;}
						</style>
						<?php if ($record){ ?>
							<?php $numrow = 1; foreach($record as $row): ?>
							<?php
								if ($user[0]->class_id == 1){
									if ($row->ApprStatusID == 6 || $row->ApprStatusID == 128){
										$pro = 'pending';
									}else {
										$pro = 'approved';
									}
								}else if ($user[0]->class_id == 2){
									if ($row->ApprStatusID == 6){
										$pro = 'pending';
										//$pro = 'approved';
									}else {
										$pro = 'approved';
										//$pro = 'pending';
									}
								}else if ($user[0]->class_id == 3){
									if ($row->ApprStatusID == 4 && ($row->ApprStatusIDx == 6 || $row->ApprStatusIDx == 128 || $row->ApprStatusIDx == NULL)){
										$pro = 'pending';
									}else {
										$pro = 'approved';
									}
								}

								if ($row->ApprStatusID == 4 && $row->ApprStatusIDx == 4 && $row->ApprStatusIDxx == 4){
									$r_status = $row->ApprStatusID;
								}else if ($row->ApprStatusID == 4 && $row->ApprStatusIDx != 4 && $row->ApprStatusIDxx != 4){
									$r_status = $row->ApprStatusIDx;
								}else{
									$r_status = $row->ApprStatusID;
								}
							?>   			
						<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
							<td class="td-desk"><?=$numrow++?></td>
							<td class="td-desk" style="text-align:left;">
								<a href="<?php echo base_url();?>index.php/Procurement?mrinno=<?=$row->DocReferenceNo?>&pro=<?=$pro?>">
									<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>
								</a>
							</td>
							<td class="td-desk"><?=isset($row->WorkOfOrder) ? $row->WorkOfOrder : ''?></td>
							<td class="td-desk"><?=isset($row->V_Asset_no) ? $row->V_Asset_no : ''?></td>
								<?php foreach($status as $stat){ ?>
									<?php
										$s_Proc = "";
										if ($row->ApprStatusID == $stat->StatusID){
											$s_AM = $stat->Status;	
										}
										if ($row->ApprStatusIDx == $stat->StatusID){
											$s_Proc = $stat->Status;
										}
										else if ($row->ApprStatusIDx== NULL){
											$s_Proc = 'Pending';
										}
										if ($row->ApprStatusIDxx == $stat->StatusID){
											$s_Log = $stat->Status;
										}
										else if ($row->ApprStatusIDxx== NULL){
											$s_Log = 'Pending';
										}
									?>
									<?php if ($r_status == $stat->StatusID) { ?>
							<td class="" align="left">
								<a rel="nofollow" title="Manager : <?=$s_AM?> <?php if ($s_AM != "Pending") { ?> ON <?=isset($row->DateApproval) ? date("d/m/Y H:i:s",strtotime($row->DateApproval)) : ''?>  <?php } ?> &#13;Procument : <?=$s_Proc?> <?php if ($s_Proc != "Pending") { ?> ON <?=isset($row->DateApprovalx) ? date("d/m/Y H:i:s",strtotime($row->DateApprovalx)) : ''?> &#13; <?=isset($row->DateApprovalxx) ? date("d/m/Y H:i:s",strtotime($row->DateApprovalxx)) : ''?>  
								<?php } ?>">
									<span class="td-desk2">
										Manager : <?=$s_AM?> <br>Procument : <?=$s_Proc?>
									</span>
								</a>
							</td>
									<?php } ?>
								<?php } ?>
							<td class="td-desk"><?=isset($row->DateCreated) ? date("d M Y",strtotime($row->DateCreated)) : ''?></td>
							<td class="td-desk"><?=isset($row->Commentsx) ? $row->Commentsx : ''?></td>
						</tr>
						<?php endforeach; ?>
						<?php } else { ?>
						<tr align="center" style="height:200px; background:white;">
							<td colspan="7" class="default-NO">NO <?php if($tulis == "All MRIN" ){ echo "MRIN";}else{ echo $tulis;}?> FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
						</tr>
						<?php } ?>
					</table>

					<table class="ui-portrait" width="100%" style="color: black;">
						<tbody>
							<?php if ($record){ ?>
								<?php
									if ($user[0]->class_id == 1){
										if ($row->ApprStatusID == 6 || $row->ApprStatusID == 128){
											$pro = 'pending';
										}else {
											$pro = 'approved';
										}
									}else if ($user[0]->class_id == 2){
										if ($row->ApprStatusID == 6){
											$pro = 'pending';
											//$pro = 'approved';
										}else {
											$pro = 'approved';
											//$pro = 'pending';
										}
									}else if ($user[0]->class_id == 3){
										if ($row->ApprStatusID == 4 && ($row->ApprStatusIDx == 6 || $row->ApprStatusIDx == 128 || $row->ApprStatusIDx == NULL)){
											$pro = 'pending';
										}else {
											$pro = 'approved';
										}
									}

									if ($row->ApprStatusID == 4 && $row->ApprStatusIDx == 4 && $row->ApprStatusIDxx == 4){
										$r_status = $row->ApprStatusID;
									}else if ($row->ApprStatusID == 4 && $row->ApprStatusIDx != 4 && $row->ApprStatusIDxx != 4){
										$r_status = $row->ApprStatusIDx;
									}else{
										$r_status = $row->ApprStatusID;
									}
								?>
								<?php $rownum = 1; foreach ($record as $row): ?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >No</td>
								<td class="td-desk">: <?=$rownum;?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>MRIN Reference No</td>
								<td class="td-desk">: 
									<a href="<?php echo base_url();?>index.php/Procurement?mrinno=<?=$row->DocReferenceNo?>&pro=<?=$pro?>">
										<?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?>
									</a><b></b>
								</td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Work Order</td>
								<td class="td-desk">: <?=isset($row->WorkOfOrder) ? $row->WorkOfOrder : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Asset</td>
								<td class="td-desk">: <?=isset($row->V_Asset_no) ? $row->V_Asset_no : ''?></td>
							</tr>
								<?php foreach($status as $stat){ ?>
									<?php
										$s_Proc = "";
										if ($row->ApprStatusID == $stat->StatusID){
											$s_AM = $stat->Status;	
										}
										if ($row->ApprStatusIDx == $stat->StatusID){
											$s_Proc = $stat->Status;
										}
										else if ($row->ApprStatusIDx== NULL){
											$s_Proc = 'Pending';
										}
										if ($row->ApprStatusIDxx == $stat->StatusID){
											$s_Log = $stat->Status;
										}
										else if ($row->ApprStatusIDxx== NULL){
											$s_Log = 'Pending';
										}
									?>
									<?php if ($r_status == $stat->StatusID) { ?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Status</td>
								<td class="td-desk">
									<a rel="nofollow" title="Manager : <?=$s_AM?> <?php if ($s_AM != "Pending") { ?> ON <?=isset($row->DateApproval) ? date("d/m/Y H:i:s",strtotime($row->DateApproval)) : ''?>  <?php } ?> &#13;Procument : <?=$s_Proc?> <?php if ($s_Proc != "Pending") { ?> ON <?=isset($row->DateApprovalx) ? date("d/m/Y H:i:s",strtotime($row->DateApprovalx)) : ''?> &#13; <?=isset($row->DateApprovalxx) ? date("d/m/Y H:i:s",strtotime($row->DateApprovalxx)) : ''?>  
									<?php } ?>">
										<span>
											Manager : <?=$s_AM?> <br>Procument : <?=$s_Proc?>
										</span>
									</a>
								</td>
							</tr>
									<?php } ?>
								<?php } ?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Issue Date</td>
								<td class="td-desk">: <?=isset($row->DateCreated) ? date("d M Y",strtotime($row->DateCreated)) : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td>Remark</td>
								<td class="td-desk">: <?=isset($row->Commentsx) ? $row->Commentsx : ''?></td>
							</tr>
								<?php endforeach;?>
							<?php }else{?>
								<tr align="center" style="height:200px; background:white;">
									<td colspan="2" class="default-NO">NO <?php if($tulis == "All MRIN" ){ echo "MRIN";}else{ echo $tulis;}?> FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</td>	
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
				</td>
			</tr>
		</table>	
	</div>
</div>
</body>
</html>