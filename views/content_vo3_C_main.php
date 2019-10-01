<div class="ui-middle-screen">
<?php include 'content_tab_vo.php';?>

<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="98%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="10"><b>VO Catalog - All Sites</b> <span style="font-size:14px;"><i>List of all VO for all sites for period <?php echo $Period ?>.</i></span></td>
			</tr>
			<tr style="background:#B3130A;">
				<td colspan="12" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr>
							<td width="3%" height="30px">
							<a href="?p=m<?= $Period; ?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<a href="?p=m<?= $Period; ?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="88%" align="center">
							<?php echo $Period ?>
							</td>
							<td width="3%">
							<a href="?p=p<?= $Period; ?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<a href="?p=p<?= $Period; ?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>			
			<tr>
			<style>
			table.tbl-vo{
			border-collapse:collapse; color:black; width:100%;
			}
			table.tbl-vo tr th,table.tbl-vo tr td,table.tbl-vo tr td a{
			font-size:14px;
			}
			</style>
				<td colspan="12" style="">
					<div class="ui-left_web">
					<table class="tbl-vo">			
						<tr style="color:white; ">
							<th style="font-size:1px;"></th>
							<th style="font-size:14px;">Period</th>
							<th>Site</th>
							<th>Report Number</th>
							<th>Registration Date</th>
							<th>Report Status</th>
							<th>Total Items</th>
							<th>Total Fee DW (RM)</th>
							<th>Total Fee PW (RM) </th>
							<th >Last Update</th>
						</tr>
						<?php  if (!empty($records)) {?>
						<?php $rowno = 1; foreach($records as $row):?>  
						<tr align="center" <?=($rowno % 2) == 1 ? 'class="ui-color-color-color"' : ''?> >
							<td><?=$rowno++;?></td>
							<td><?=isset($row->vvfPeriod) == TRUE ? $row->vvfPeriod : 'N/A'?></td>
							<td><?=isset($row->vvfhospitalcode) == TRUE ? $row->vvfhospitalcode : 'N/A'?></td>
							<td><?php echo anchor ('contentcontroller/vo3_vvf?&rpt_no='.$row->vvfReportno,''.$row->vvfReportno.'' ) ?></td>
							<td style="width:200px;"><?=isset($row->vvfDateStart) == TRUE && isset($row->vvfDateEnd) == TRUE ? date_format(new DateTime($row->vvfDateStart), 'd-m-Y'). ' - ' .date_format(new DateTime($row->vvfDateEnd), 'd-m-Y') : 'N/A'?></td>
							<td><?= isset($row->vvfSubmissionDate) == TRUE && $row->vvfReportStatus == 'C' ? 'Completed. Submitted.' : 'Completed. Not yet submitted.'?></td>
							<td><?=isset($row->nTotalItem) == TRUE ? $row->nTotalItem : 'N/A'?></td>
							<td><?=isset($row->nTotalFeeDW) == TRUE ? $row->nTotalFeeDW : 'N/A'?></td>
							<td><?=isset($row->nTotalFeePW) == TRUE ? $row->nTotalFeePW : 'N/A'?></td>
							<td style="width:100px;"><?=isset($row->vvfTimestamp) == TRUE ? date_format(new DateTime($row->vvfTimestamp), 'd-m-Y h:i A') : 'N/A'?></td>
						</tr>
						<?php endforeach;?>
						<?php }else { ?>
								<tr align="center" style="height:200px;">
								<td colspan="10" class="default-NO">NO VO Catalog COMPLAINTS FOUND for period <?php echo $Period ?></td>
							</tr>
							<?php } ?>
					</table>
					</div>
					<div class="ui-left_mobile">
						<table class="ui-mobile-table-desk" style="color:black; width:100%;">
							<?php  if (!empty($records)) {?>
								<?php $numrow = 1; foreach($records as $row):?>   			
			    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td >No</td>
								<td class="td-desk">: <?=$numrow?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
								<td>Period</td>
								<td class="td-desk">: <?=isset($row->vvfPeriod) == TRUE ? $row->vvfPeriod : 'N/A'?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Site</td>
								<td class="td-desk">: <?=isset($row->vvfhospitalcode) == TRUE ? $row->vvfhospitalcode : 'N/A'?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Report Number</td>
								<td class="td-desk">: <?php echo anchor ('contentcontroller/vo3_vvf?&rpt_no='.$row->vvfReportno,''.$row->vvfReportno.'' ) ?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Registration Date</td>
								<td class="td-desk">: <?=isset($row->vvfDateStart) == TRUE && isset($row->vvfDateEnd) == TRUE ? date_format(new DateTime($row->vvfDateStart), 'd-m-Y'). ' - ' .date_format(new DateTime($row->vvfDateEnd), 'd-m-Y') : 'N/A'?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Report Status</td>
								<td class="td-desk">: <?= isset($row->vvfSubmissionDate) == TRUE && $row->vvfReportStatus == 'C' ? 'Completed. Submitted.' : 'Completed. Not yet submitted.'?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Total Items</td>
								<td class="td-desk">: <?=isset($row->nTotalItem) == TRUE ? $row->nTotalItem : 'N/A'?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Total Fee DW (RM)</td>
								<td class="td-desk">: <?=isset($row->nTotalFeeDW) == TRUE ? $row->nTotalFeeDW : 'N/A'?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Total Fee PW (RM) </td>
								<td class="td-desk">: <?=isset($row->nTotalFeePW) == TRUE ? $row->nTotalFeePW : 'N/A'?></td>
							</tr>
							<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
								<td>Last Update</td>
								<td class="td-desk">: <?=isset($row->vvfTimestamp) == TRUE ? $row->vvfTimestamp : 'N/A'?></td>
							</tr>
			        		<?php $numrow++?> 			 
								<?php endforeach;?>
								<?php }else { ?>
								<tr align="center" style="height:200px;">
								<td colspan="10" class="default-NO">NO VO Catalog COMPLAINTS FOUND for period <?php echo $Period ?></td>
							</tr>
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
	<?php echo form_hidden('period',$Period) ?>
</div>

