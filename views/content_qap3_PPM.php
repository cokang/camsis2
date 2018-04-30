
<div class="ui-middle-screen">
<?php include 'content_tab_qap3.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="80%" align="center">
			<?php include 'content_tab_qap3menu.php';?>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" height="30px" valign="bottom" style="padding-left:10px; color:black;" class="t-header">All SIQ PPM <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			</tr>
			<tr style="background:#B3130A;">
				<td colspan="12" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr>
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>&siq=1"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&siq=1"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&siq=1"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>&siq=1"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr  class="ui-color-contents-style-1">
				<td style="" width="" colspan="12" valign="top" align="center">
					<div class="ui-left_web">
					<table class="ui-desk-style-table" style="color:black; background:white; text-align:center;" cellpadding="4" cellspacing="0" width="100%">      			
	    				<tr class="ui-menu-color-header" style="color:white; font-weight:bold;">
							<td>&nbsp;</td>
							<td>SIQ Number</td>
							<td>Type Code</td>
							<td>CAR Number</td>
							<td>QC Code</td>
							<td>Asset Code</td>
							<td>Car Created </td>
							<td>CAR Period</td>
							<td>CAR Status</td>
						</tr>
						<tr align="center" style=" font-size:12px; font-weight:;">
							<?php if ($validPeriod == 'true') { ?>
							<?php if (!empty($records)) { ?>
							<?php $numrow=1; foreach($records as $row):?>
							<?= $numrow%2==0 ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
							<?php 
							$CarEndDate = date_format(new DateTime($row->car_to), 'd-m-Y');
							if ($row->status == 1){
								$Status = "<span style=color:green;>".'CLOSED'."</span>";
							}
							else{
								$Status = "<span style=color:red;>".'OPEN'."</span>";
								if ($row->car_to < date('Y-m-d')){
									$CarEndDate = "<span style=color:red;>".date_format(new DateTime($row->car_to), 'd-m-Y')."</span>";
								}
							}
							?>
							<td style="padding-top:3px; padding-bottom:3px;"><?=$numrow?></td>
							<td ><?php echo anchor ('contentcontroller/qap3_SIQ_Number_update?ssiq='.$row->ssiq.'&m='.$month.'&y='.$year.'&siq='.$this->input->get('siq'),''.$row->ssiq.'' ) ?></td>
							<td ><?= isset($row->type_code) ? $row->type_code : ''?></td>
							<td ><?= is_null($row->car_no) ? "<span style=color:red;>".'NO CAR FOUND'."</span>" : $row->car_no ?></td>
							<td ><?= isset($row->qc_code) ? $row->qc_code : '' ?></td>
							<td ><?= isset($row->equip_code) ? $row->equip_code : '' ?></td>
							<td ><?= isset($row->car_date) ? date_format(new DateTime($row->car_date), 'd-m-Y') : '' ?></td>
							<td ><?= date_format(new DateTime($row->car_to), 'd-m-Y').' - '.$CarEndDate ?></td>
							<td ><?= $Status ?></td>
						</tr>
						<?php $numrow++ ?>
						<?php endforeach;?>
						<?php } else { ?>
						<tr>
						<td align="center" style="height:200px; background:white;" colspan="12">
						<span style="color:red; text-transform: uppercase; font-size:14px; display:table-cell; text-align:center; vertical-align:middle; width:98%;">NO PPM SIQ HAS BEEN GENERATED ON THIS MONTH.</span>
						<?php } ?>
						<?php } else { ?>
						<?php  if (strtotime($year . '-' . $month . '-01') > strtotime('2008-09-01')) { ?>
						<tr>
						<td align="center" style="height:200px; background:white;" colspan="12">
						<span style="color:red; text-transform: uppercase; font-size:14px; display:table-cell; text-align:center; vertical-align:middle; width:98%;">NO SIQ EVALUATION HAS BEEN DONE FOR THIS MONTH.</span>
						<?php } else { ?>
						<tr>
						<td align="center" style="height:200px; background:white;" colspan="12">
						<span style="color:red; text-transform: uppercase; font-size:14px; display:table-cell; text-align:center; vertical-align:middle; width:98%;">NO SIQ HAS BEEN GENERATED ON THIS MONTH.</span>
						<?php } ?>
						<?php } ?>
					</td>
				</tr>
					</table>
				</div>
					<div class="ui-left_mobile">
						<table class="ui-mobile-table-desk" style="color:black; width:100%;">
							<?php if ($validPeriod == 'true') { ?>
							<?php if (!empty($records)) { ?>
							<?php $numrow=1; foreach($records as $row):?>
							<?php 
							$CarEndDate = date_format(new DateTime($row->car_to), 'd-m-Y');
							if ($row->status == 1){
								$Status = "<span style=color:green;>".'CLOSED'."</span>";
							}
							else{
								$Status = "<span style=color:red;>".'OPEN'."</span>";
								if ($row->car_to < date('Y-m-d')){
									$CarEndDate = "<span style=color:red;>".date_format(new DateTime($row->car_to), 'd-m-Y')."</span>";
								}
							}
							?>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >No</td>
								<td class="td-desk">: <?=$numrow?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >SIQ Number</td>
								<td class="td-desk">: <?php echo anchor ('contentcontroller/qap3_SIQ_Number_update?ssiq='.$row->ssiq.'&m='.$month.'&y='.$year.'&siq='.$this->input->get('siq'),''.$row->ssiq.'' ) ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Type Code</td>
								<td class="td-desk">: <?= isset($row->type_code) ? $row->type_code : ''?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>CAR Number</td>
								<td class="td-desk">: <?= is_null($row->car_no) ? "<span style=color:red;>".'NO CAR FOUND'."</span>" : $row->car_no ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>QC Code</td>
								<td class="td-desk">: <?= isset($row->qc_code) ? $row->qc_code : '' ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Asset Code</td>
								<td class="td-desk">: <?= isset($row->equip_code) ? $row->equip_code : '' ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Car Created</td>
								<td class="td-desk">: <?= isset($row->car_date) ? date_format(new DateTime($row->car_date), 'd-m-Y') : '' ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>CAR Period</td>
								<td class="td-desk">: <?= date_format(new DateTime($row->car_to), 'd-m-Y').' - '.$CarEndDate ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>CAR Status</td>
								<td class="td-desk">: <?= $Status ?></td>
							</tr>
						<?php $numrow++ ?>
						<?php endforeach;?>
						 		<?php } else { ?>
						<tr>
						<td align="center" style="height:200px; background:white;" class="default-NO" colspan="12">
						NO PPM SIQ HAS BEEN GENERATED ON THIS MONTH.
						<?php } ?>
						<?php } else { ?>
						<?php  if (strtotime($year . '-' . $month . '-01') > strtotime('2008-09-01')) { ?>
						<tr>
						<td align="center" style="height:200px; background:white;" class="default-NO" colspan="12">
						NO SIQ EVALUATION HAS BEEN DONE FOR THIS MONTH.
						<?php } else { ?>
						<tr>
						<td align="center" style="height:200px; background:white;" class="default-NO" colspan="12">
						NO SIQ HAS BEEN GENERATED ON THIS MONTH.
						<?php } ?>
						<?php } ?>	
					</table>
					</div>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="10">
				</td>
			</tr>
		</table>
	</div>
</div>