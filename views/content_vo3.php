<div class="ui-middle-screen">
<table class="table-middle-screen-2" border="0">
<tr>
    <td style="width: 13%; border-style:none;";>
<?php include 'content_tab_vo.php';?>
<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="98%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="10"><b>VO Catalog - <?=$this->session->userdata('hosp_code')?></b></td>
			</tr>
			<tr>
				<td colspan="10" class="t-header">List of all VO for <?=$this->session->userdata('hosp_code')?>.</td>
			</tr>
			<tr>
				<td>
					<div class="ui-left_web">
					<table style="border-collapse:collapse; color:black;">
						<tr align="center" class="color-pop-asset" style="font-weight:bold; font-size:16px;">
							<td ></td>
							<td>Period</td>
							<td>Site</td>
							<td>Report Number</td>
							<td>Registration Date</td>
							<td>Report Status</td>
							<td>Total Items</td>
							<td>Total Fee DW (RM)</td>
							<td>Total Fee PW (RM) </td>
							<td>Last Update</td>
						</tr>
						<?php $rowno = 1; foreach($records as $row):?>  
						<tr align="center" <?=($rowno % 2) == 1 ? 'class="ui-color-color-color"' : ''?> >
							<td><?=$rowno++;?></td>
							<td><?=isset($row->vvfPeriod) == TRUE ? $row->vvfPeriod : 'N/A'?></td>
							<td><?=isset($row->vvfhospitalcode) == TRUE ? $row->vvfhospitalcode : 'N/A'?></td>
							<td><?php echo anchor ('contentcontroller/vo3_vvf?&rpt_no='.$row->vvfReportno,''.$row->vvfReportno.'' ) ?></td>
							<td><?=isset($row->vvfDateStart) == TRUE && isset($row->vvfDateEnd) == TRUE ? date_format(new DateTime($row->vvfDateStart), 'd-m-Y'). '</br>-</br> ' .date_format(new DateTime($row->vvfDateEnd), 'd-m-Y') : 'N/A'?></td>
							<td><?= isset($row->vvfSubmissionDate) == TRUE && $row->vvfReportStatus == 'C' ? 'Completed. Submitted.' : 'Completed. Not yet submitted.'?></td>				
							<td><?=isset($row->nTotalItem) == TRUE ? $row->nTotalItem : 'N/A'?></td>
							<td><?=isset($row->nTotalFeeDW) == TRUE ? $row->nTotalFeeDW : 'N/A'?></td>
							<td><?=isset($row->nTotalFeePW) == TRUE ? $row->nTotalFeePW : 'N/A'?></td>
							<td><?=isset($row->vvfTimestamp) == TRUE ? date_format(new DateTime($row->vvfTimestamp), 'd-m-Y h:i A') : 'N/A'?></td>
						</tr>
						<?php endforeach;?>
					</table>
					</div>
					<div class="ui-left_mobile">
					<table class="ui-mobile-table-desk" style="color:black; width:100%;">
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
					</table>
				</div>
				</td>
			</tr>
			
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="10" >
				</td>
			</tr>
		</table>
						
	</div>
	</td>
	</tr>
	</table>
</div>

