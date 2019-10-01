<?php
$assetone = "0";
$locationone = "0";
$x = $this->input->get('x');
switch ($x) {
	case "1":
		$tulis = "Received for the date";
		break;
	case "2":
		$tulis = "Completed for the day";
		break;
	case "3":
		$tulis = "Outstanding for the day";
		break;
	case "4":
		$tulis = "Accumulated Outstanding";
		break;
	case "5":
		$tulis = "Accumulated completed";
		break;
	case "6":
		$tulis = "Outstanding > 10days";
		break;
	case "7":
		$tulis = "Outstanding > 15days";
		break;
	case "8":
		$tulis = "Total of the month";
		break;
	case "9":
		$tulis = "Outstanding 1 Month";
		break;
	case "10":
		$tulis = "Outstanding 2 Month";
		break;
	case "11":
		$tulis = "Outstanding 3 Month";
		break;
	case "12":
		$tulis = "Outstanding 4 Month";
		break;
	case "13":
		$tulis = "Outstanding > 5 Month";
		break;

		case "14":
		$tulis = "Total Outstanding";
		break;
	default:
		$tulis = "";
		break;
}

if ($this->input->get('ex') == 'excel'){
	$filename = $tulis .date('F', mktime(0, 0, 0, date('m',strtotime($this->input->get('jobdate'))), 10)) .date('Y',strtotime($this->input->get('jobdate'))).".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}
?>

<?php if ($this->input->get('ex') == ''){?>
	<?php include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"><?php echo $tulis;?></div>
		<!-- <button onclick="javascript:myFunction('report_fdreport2?jobdate=<?=$this->input->get('jobdate')?>&ex=&stat=<?=$this->input->get('stat');?>&grp=<?=$this->input->get('grp');?>&wid=1&req=<?=$this->input->get('req');?>&broughtfwd=<?=$this->input->get('broughtfwd')?>&serv=<?=$this->input->get('serv')?>&x=<?=$this->input->get('x')?>&none=closed');" class="btn-button btn-primary-button">PRINT</button> -->
		<button onclick="javascript:myFunction('report_fdreport2?jobdate=<?=$this->input->get('jobdate')?>&x=<?=$this->input->get('x')?>&v=<?=$this->input->get('v')?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
		<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
			<a href="<?php echo base_url();?>index.php/contentcontroller/report_fdreport2?jobdate=<?=$this->input->get('jobdate')?>&x=<?=$this->input->get('x')?>&v=<?=$this->input->get('v')?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel">
			</a>
		<?php } ?>
	</div>
<?php } ?>

<?php if( $this->input->get("none")=="closed" ){ ?>

	<?php $numrow=1; foreach ($record as $row): ?>
		<?php if ($numrow==1 OR $numrow%18==1) {?>
			<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
				<?php include 'content_headprint.php';?>
			<?php } ?>

			<div class="m-div">
				<table class="rport-header">
					<tr>
						<td colspan="4" valign="top"><?php echo $tulis;?> - <?=date('F', mktime(0, 0, 0, date('m',strtotime($this->input->get('jobdate'))), 10))?> <?=date('Y',strtotime($this->input->get('jobdate')))?> - <?php echo $this->session->userdata('usersessn');?></td>
					</tr>
				</table>

				<table class="tftable tbl-go" border="1" style="text-align:center;">
					<tr>
						<th>No</th>
						<th <?php if($this->input->get('wid')== 1){ echo "style='width:30px;'";}?>>Date Req</th>
						<th>Time Req</th>
						<th>Request No</th>
						<th>Asset No</th>
						<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>Request Summary</th>
						<th>ULC</th>
						<th>Requestor<br>Name</th>
						<th>Status</th>
						<?php if ($this->input->get('x') == '2') {?>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Completion<br>Date</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Completion<br>Time</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Closed<br>By</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Acceptance By<br>By</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Duration<br>of Repair (Days)</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>Actual Work Done</th>
						<?php  } else {?>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Respond<br>Date</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Respond<br>Time</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Responded<br>By</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Duration<br>of Repair (Days)</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>Respond Finding</th>
						<?php } ?>

						<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>Dept/Loc</th>
						<th><?php if($this->input->get('wid')== 1){ echo "grp";}else{ if($this->input->get('broughtfwd') != ''){echo "Work Order Group";} else{echo "Asset Group";}}?></th>
					</tr>
				<?php } ?>

					<tr>
						<td><?=$numrow?></td>
						<td><?=isset($row->D_date) ? date("d-m-Y",strtotime($row->D_date)) : 'N/A' ?></td>
						<td><?=isset($row->D_time) ? $row->D_time : 'N/A' ?></td>
						<td><?=($row->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.date("m",strtotime($this->input->get('jobdate'))).'&y='.date("Y",strtotime($this->input->get('jobdate'))).'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state'),''.$row->V_Request_no.'' ) : 'N/A' ?></td>
						<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->v_tag_no.'' ) : 'N/A' ?></td>
						<td><?= ($row->ReqSummary) ? $row->ReqSummary : 'N/A' ?></td>
						<td><?= ($row->v_location_code) ? $row->v_location_code : 'N/A' ?></td>
						<td><?= ($row->V_requestor) ? $row->V_requestor : 'N/A' ?></td>
						<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
						<?php if ($this->input->get('x') == '2') {?>
							<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
							<td><?= ($row->v_closedtime) ? $row->v_closedtime : 'N/A' ?></td>
							<td><?= ($row->closedby) ? $row->closedby : 'N/A' ?></td>
							<td><?= ($row->v_AcceptedBy) ? $row->v_AcceptedBy : 'N/A' ?></td>
							<td><?= (($row->V_request_type == "A10") || ($row->V_request_type == "A3") || ($row->v_tag_no == $assetone)) ? '0' : $row->DiffDate ?></td>
							<td><?= ($row->v_summary) ? $row->v_summary : 'N/A' ?></td>
						<?php } else { ?>
							<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>
							<td><?= ($row->v_Time) ? $row->v_Time : 'N/A' ?></td>
							<td><?= ($row->v_Personal1) ? $row->v_Personal1 : 'N/A' ?></td>
							<td><?= (($row->V_request_type == "A10") || ($row->V_request_type == "A3") || (($row->v_tag_no == $assetone) && ($row->v_location_code == $locationone)) || ($row->linker != "none")) ? '0' : $row->DiffDate ?></td>
							<?php  if (($row->v_tag_no) && $row->v_tag_no != 'N/A') {$assetone = $row->v_tag_no;} else {$assetone = $numrow;}
							if (($row->v_location_code) && $row->v_location_code != 'N/A') {$locationone = $row->v_location_code;} else {$locationone = $numrow;} ?>
							<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
						<?php } ?>
						<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' / '.$row->v_location_name : 'N/A' ?></td>
						<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
					</tr>
				<?php $numrow++; ?>
				<?php //if (($numrow-1)%13==0) {
				if ((($numrow-1)%18==0) || (($numrow-1)== count($record))) {
				?>
				</table>
			</div>
			<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
				<table width="99%" border="0">
					<tr>
						<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
					</tr>
					<tr>
						<td width="50%"><?php echo $tulis;?> Report<br><i>Computer Generated - CAMSIS</i></td>
						<td width="50%" align="right"></td>
					</tr>
				</table>

				<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
			<?php } ?>
		<?php } ?>
	<?php endforeach;?>

	<?php include 'content_footerprint.php';?>

<?php }else{ ?>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
		<?php include 'content_headprint.php';?>
	<?php } ?>

	<div class="m-div">
		<table class="rport-header">
			<tr>
				<td colspan="4" valign="top"><?php echo $tulis;?> - <?=date('F', mktime(0, 0, 0, date('m',strtotime($this->input->get('jobdate'))), 10))?> <?=date('Y',strtotime($this->input->get('jobdate')))?> - <?php echo $this->session->userdata('usersessn');?></td>
			</tr>
		</table>

		<div id="constrainer" style="height: 63%;">
			<div class="scrolltable1">
				<table class="tftable tbl-go" border="1" style="text-align:center;">
					<tr>
						<th>No</th>
						<th <?php if($this->input->get('wid')== 1){ echo "style='width:30px;'";}?>>Date Req</th>
						<th>Time Req</th>
						<th>Request No</th>
						<th>Asset No</th>
						<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>Request Summary</th>
						<th>ULC</th>
						<th>Requestor<br>Name</th>
						<th>Status</th>
						<?php if ($this->input->get('x') == '2') {?>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Completion<br>Date</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Completion<br>Time</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Closed<br>By</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Acceptance<br>By</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Duration<br>of Repair (Days)</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>Actual Work Done</th>
						<?php  } else {?>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Respond<br>Date</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Respond<br>Time</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Responded<br>By</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Duration<br>of Repair (Days)</th>
							<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>Respond Finding</th>
						<?php } ?>

						<th <?=($this->input->get('wid')== 1) ? "style='width:10%;'" : "";?> >Dept/Loc</th>
						<th><?=(($this->input->get('wid')== 1) ? "grp" : (($this->input->get('broughtfwd') != '') ? "Work Order Group" : "Asset Group"));?></th>
					</tr>

					<?php if( !empty($record) ){ ?>
						<?php $numrow=1; foreach ($record as $row): ?>
					<tr>
						<td><?=$numrow?></td>
						<td><?=isset($row->D_date) ? date("d-m-Y",strtotime($row->D_date)) : 'N/A' ?></td>
						<td><?=isset($row->D_time) ? $row->D_time : 'N/A' ?></td>
					 <?php if ($this->input->get('ex')=='') { ?>
				      <td><?=($row->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.date("m",strtotime($this->input->get('jobdate'))).'&y='.date("Y",strtotime($this->input->get('jobdate'))).'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state'),''.$row->V_Request_no.'' ) : 'N/A' ?></td>
						<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->v_tag_no.'' ) : 'N/A' ?></td>
						<?php }else{ ?>
			            <td><?=($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?></td>
						<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? $row->v_tag_no : 'N/A' ?></td>
						<?php } ?>

						<td><?= ($row->ReqSummary) ? $row->ReqSummary : 'N/A' ?></td>
						<td><?= ($row->v_location_code) ? $row->v_location_code : 'N/A' ?></td>
						<td><?= ($row->V_requestor) ? $row->V_requestor : 'N/A' ?></td>
						<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
						<?php if ($this->input->get('x') == '2') {?>
							<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
							<td><?= ($row->v_closedtime) ? $row->v_closedtime : 'N/A' ?></td>
							<td><?= ($row->closedby) ? $row->closedby : 'N/A' ?></td>
							<td><?= ($row->v_AcceptedBy) ? $row->v_AcceptedBy : 'N/A' ?></td>
							<td><?= (($row->V_request_type == "A10") || ($row->V_request_type == "A3") || ($row->v_tag_no == $assetone)) ? '0' : $row->DiffDate ?></td>
							<td><?= ($row->v_summary) ? $row->v_summary : 'N/A' ?></td>
						<?php } else { ?>
							<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>
							<td><?= ($row->v_Time) ? $row->v_Time : 'N/A' ?></td>
							<td><?= ($row->v_Personal1) ? $row->v_Personal1 : 'N/A' ?></td>
							<td><?= (($row->V_request_type == "A10") || ($row->V_request_type == "A3") || (($row->v_tag_no == $assetone) && ($row->v_location_code == $locationone)) || ($row->linker != "none")) ? '0' : $row->DiffDate ?></td>
							<?php  if (($row->v_tag_no) && $row->v_tag_no != 'N/A') {$assetone = $row->v_tag_no;} else {$assetone = $numrow;}
							if (($row->v_location_code) && $row->v_location_code != 'N/A') {$locationone = $row->v_location_code;} else {$locationone = $numrow;} ?>
							<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
						<?php } ?>
						<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' / '.$row->v_location_name : 'N/A' ?></td>
						<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
					</tr>
					<?php $numrow++; endforeach; ?>
					<?php }else{ ?>
					<tr>
						<td colspan="16" style="height: 191px;" align="center">No Record Found</td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
				<table width="99%" border="0">
					<tr>
						<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
					</tr>
					<tr>
						<td width="50%"><?php echo $tulis;?> Report<br><i>Computer Generated - CAMSIS</i></td>
						<td width="50%" align="right"></td>
					</tr>
				</table>

				<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
			<?php } ?>
		</div>
	</div>

	<?php include 'content_footerprint.php';?>
<?php } ?>
