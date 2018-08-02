<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="main-box">
		<div class="box">
			<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue'); shuffle($autocolor);?>
			<div class="small-box <?php echo $autocolor[0];?>">
				<div class="inner2" >
					<p>NEW Release Note</p>
				</div>
				<div class="icon"><i class="icon-file-text2"></i></div>
				<?php echo anchor ($this->uri->slash_segment(1).str_replace("/","",$this->uri->slash_segment(2)).'?pro=new','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
				<?php //echo anchor ('Procurement/Release_note?pro=new','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
			</div>
		</div>
	</div>

	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" align="center">
			<tr class="ui-color-desk desk2">
				<td colspan="4" class="ui-main-form-header" style="color:white; height:40px; padding-left:10px; text-align:left;"><b>RELEASE NOTE </b> <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			</tr>
			<tr class="ui-color-desk bg-red-blood"> 
				<td colspan="4">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr style="background:#B3130A;">
							<td width="3%" height="30px">
								<a href="?&y=<?= $year-1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="3%">
								<a href="?&y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="88%" align="center">
								<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
								<a href="?&y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="3%">
								<a href="?&y=<?= $year+1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="4" style="background-color: #fffefc;" valign="top" >
					<table class="ui-content-middle-menu-workorder2 ui-landscape" width="100%">
						<tr class="ui-menu-color-header" style="color:white; font-size:12px;">
							<th >&nbsp;</th>
							<th style="text-align:left;">RN Number</th>
							<th >Shipment Type</th>
							<th >Courier</th>
							<th >Status</th>
							<th >RN Date</th>
							<th >Consignment Date</th>
						</tr>
						<style>
							.ui-content-middle-menu-workorder2 tr th {padding:8px;font-size:14px;}
							.ui-content-middle-menu-workorder2 tr td {padding:8px;font-size:14px;}
							.ui-content-middle-menu-workorder2 tr td.td-desk a{ font-weight:bold; font-size:14px;}
						</style>
						<?php $numrow = 1; ?>
						
						<?php if(!empty($records)){?>
						<?php foreach($records as $row):$status="";if($row->rn_status==0){$status="Send";}?>  			
						<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
							<td class="td-desk"><?=$numrow++?></td>
							<td class="td-desk" style="text-align:left;"><a href="<?php echo base_url();?>index.php/Procurement/print_release_note?RN_No=<?=$row->rn_no?>">	<?=$row->rn_no?> </a></td>
							<td class="td-desk"><?= ($row->shipment_type) == 1 ? 'By hand' : 'Courier' ?> </td>
							<td class="td-desk">
								<?= ($row->courier == 1 ? 'ABX' : ($row->courier == 2 ? 'CityLink' : ($row->courier == 3 ? 'DHL' : 'Other'))) ?>
							</td>
							<td class="td-desk"><?=$status;?></td>
							<td class="td-desk"><?= ($row->Date_Stamp) ? date("d-m-Y", strtotime($row->Date_Stamp)) : 'N/A' ;?> </td>
							<td class="td-desk"><?= ($row->consignment_date) ? date("d-m-Y", strtotime($row->Date_Stamp)) : 'N/A' ;?> </td>
						</tr>
						<?php endforeach;?>
						<?php }else{ ?>		
						<tr align="center" style="height:200px; background:white;">
							<td colspan="7" class="default-NO">NO RELEASE NOTE FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
						</tr>
						<?php } ?>
					</table>

					<table class="ui-portrait" style="color:black;">
						<tbody style="width: 100%;">
							<?php if(!empty($records)){?>
							<?php foreach($records as $row):$status="";if($row->rn_status==0){$status="Send";}?>
							<?php $rownum=1;?>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >No</td>
								<td class="td-desk">: <?=$rownum;?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >RN Number</td>
								<td class="td-desk">: <a href="<?php echo base_url();?>index.php/Procurement/Release_note?pro=edit">	<?=$row->RN_No?> </a></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Shipment Type</td>
								<td class="td-desk">: <?=$row->shipment_type;?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Courier</td>
								<td class="td-desk">: <?=$row->courier;?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Status</td>
								<td class="td-desk">: <?=$status;?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >RN Date</td>
								<td class="td-desk">: <?=$row->Date_Stamp;?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Consignment Date</td>
								<td class="td-desk">: <?=$row->consignment_date;?></td>
							</tr>
							<?php $rownum++;endforeach;?>
							<?php }else{ ?>
							<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO RELEASE NOTE FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>.</span></td>
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