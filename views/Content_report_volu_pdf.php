<?php include 'pdf_head.php';?>
<?php
$colspan='colspan="16"';
$rowspan ="";


if (($this->session->userdata('usersess')=='BES') && ($this->input->get('req') <> 'A9')) {
$rowspan = 'rowspan="2"';
$colspan='colspan="18"';
//exit();
}
?>
	<html>
	<head>
	<style>
	.rport-header{padding-bottom:10px;}
	</style>
	</head>
	<body>
	<?php $assetone = "0";$locationone = "0";?>
	<?php $req = $this->input->get('req'); $assetone = "0";?>
			<?php switch ($req) {
			case "A1":
				$tulis = "A1 - Breakdown Maintenance (BM)";
				break;
			case "A2":
				$tulis = "A2 - Schedule Corrective Maintenance (SCM)";
				break;
			case "A3":
				$tulis = "A3 - Corrective Maintenance (CM)";
				break;
			case "A4":
				$tulis = "A4 - User Requests";
				break;
			case "A5":
				$tulis = "A5 - Investigation of Incidences";
				break;
			case "A6":
				$tulis = "A6 - Technical Advice";
				break;
			case "A7":
				$tulis = "A7 - User Training";
				break;
			case "A8":
				$tulis = "A8 - Testing and Commissioning (T&C)";
				break;
			case "A9":
				$tulis = "A9 - Internal Request";
				break;
			case "A10":
				$tulis = "A10 - Reimbursable Work";
				break;
			case "F":
				$tulis = "Floor - Related Report";
				break;
			case "WD":
				$tulis = "Wall / Door - Related Report";
				break;
			case "C":
				$tulis = "Ceiling - Related Report";
				break;
			case "W":
				$tulis = "Window - Related Report";
				break;
			case "FIX":
				$tulis = "Fixtures - Related Report";
				break;
			case "FUR":
				$tulis = "Furniture / Fitting - Related Report";
				break;
			default:
				$tulis = "All";
				break;
			} ?>
<table class="rport-header">
		<tr>
			<?php if ($this->input->get('req') == $req) {?>
			<td colspan="4" valign="top"><h3><?php if (($this->input->get('broughtfwd') != '')&&($req !='A10')){?>Unscheduled Brought Forward Work Order Details
			<?php } elseif (($this->input->get('broughtfwd') != '') && ($req == 'A10')){?>Work Order A10 Summary Report
			<?php }else{ ?>Work Order Report Listing<?php }?>- <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if (($this->input->get('req')) and (($this->input->get('grp') == '2') or ($this->input->get('grp') == '3'))){ echo 'Group'.$this->input->get('grp').','.$tulis; } elseif ($this->input->get('req')){echo $tulis; }elseif ($this->input->get('grp') == ''){ echo 'All';}else{ echo 'Group '.$this->input->get('grp');} ?> )</h3></td>
			<?php } ?>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; font-size:7px;" cellpadding="5" cellspacing="0">
		<tr nobr="true">
			<th <?=$rowspan?> style="width:19px;">No</th>
			<th <?=$rowspan?>>Date Req</th>
			<th <?=$rowspan?>>Time Req</th>
			<th <?=$rowspan?>>Request No</th>
			<th>MRIN No</th>
			<th <?=$rowspan?>>Asset No</th>
			<th>Work Order <br> Reference</th>
			<th <?=$rowspan?>>Request Summary</th>
			<th <?=$rowspan?>>ULC</th>
			<th <?=$rowspan?>>Requestor<br>Name</th>
			<th <?=$rowspan?>>Status</th>
			<?php if (($this->session->userdata('usersess')=='BES') && ($this->input->get('req') <> 'A9')) { ?>
			<th <?=$display?> colspan="2">Test</th>
			<?php } ?>
			<?php if ($this->input->get('stat') == 'A') {?>
			<th <?=$rowspan?>>Completion<br>Date</th>
			<th <?=$rowspan?>>Completion<br>Time</th>
			<th <?=$rowspan?>>Closed<br>By</th>
			<th <?=$rowspan?>>Acceptance By</th>
			<th <?=$rowspan?>>Duration<br>of Repair (Days)</th>
			<th <?=$rowspan?>>Actual Work Done</th>
			<?php  } else {?>
			<th <?=$rowspan?>>Respond<br>Date</th>
			<th <?=$rowspan?>>Respond<br>Time</th>
			<!-- <th <?=$rowspan?>>Responded<br>By</th>
			<th <?=$rowspan?>>Duration<br>of Repair (Days)</th> -->
			<th <?=$rowspan?>>Respond Finding</th>
			<?php } ?>
			<th <?=$rowspan?> style="width:85px;">Dept/Loc</th>
			<?php if ($this->input->get('broughtfwd') != '') { ?>
			<th <?=$rowspan?>>Work Order Group</th>
			<?php } else { ?>
			<th <?=$rowspan?> style="width:35px;">Asset Group</th>
			<?php } ?>
			<th <?=$rowspan?>>Medical Device classification</th>
			<th <?=$rowspan?>>Specialty category</th>
			<th>Summary Rootcause</th>
		</tr>
			<?php if (($this->session->userdata('usersess')=='BES') && ($this->input->get('req') <> 'A9')) { ?>
		   <tr>
			<th>S</th>
			<th>P</th>
		   </tr>
			<?php } ?>
		<?php  if (!empty($record)) {?>
		<?php $numrow = 1; foreach($record as $row):?>
			<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color" nobr="true">' : '<tr nobr="true">'; ?>

    		<td><?= $numrow ?></td>
			<td><?= ($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
			<td><?= ($row->D_time) ? $row->D_time : 'N/A' ?></td>
			<?php if  ($this->input->get('ex') != 'excel'){ ?>
			<td><?=($row->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state'),''.$row->V_Request_no.'' ) : 'N/A' ?></td>
			<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->v_tag_no.'' ) : 'N/A' ?></td>
			<?php }else{ ?>
			<td> <?=isset($row->V_Request_no) ? $row->V_Request_no : ''?></td>
			<td> <?=isset($row->DocReferenceNo) ? $row->DocReferenceNo : ''?></td>
			<td> <?=isset($row->v_tag_no) ? $row->v_tag_no : ''?></td>
			<td><?= isset($row->link_ap19) ? $row->link_ap19 : '' ?></td>
			<?php } ?>
			<td><?= ($row->ReqSummary) ? $row->ReqSummary : 'N/A' ?></td>
			<td><?= ($row->v_location_code) ? $row->v_location_code : 'N/A' ?></td>
			<td><?= ($row->V_requestor) ? $row->V_requestor : 'N/A' ?></td>
			<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
				<?php if (($this->session->userdata('usersess')=='BES') && ($this->input->get('req') <> 'A9')) { ?>
			<td><?= ($row->v_stest) ? $row->v_stest : 'N/A' ?></td>
			<td><?= ($row->v_ptest) ? $row->v_ptest : 'N/A' ?></td>
				<?php } ?>
			<?php if ($this->input->get('stat') == 'A') {?>
			<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
			<td><?= ($row->v_closedtime) ? $row->v_closedtime : 'N/A' ?></td>
			<td><?= ($row->closedby) ? $row->closedby : 'N/A' ?></td>
			<td><?= isset($row->v_AcceptedBy) ? $row->v_AcceptedBy : 'N/A' ?></td>

			<?php if (($this->input->get('broughtfwd') != '') && ($row->v_tag_no != $assetone) && ($row->V_request_type != "A34") && ($row->V_request_type != "A10") && ($row->linker == "none")){ ?>
			<!--<td><?=$row->DiffDate?></td>-->
			<td><?= ($row->DiffDate) ? (($row->DiffDate > cal_days_in_month(CAL_GREGORIAN, $this->input->get('m'), $this->input->get('y'))) ? cal_days_in_month(CAL_GREGORIAN, $this->input->get('m'), $this->input->get('y')) : $row->DiffDate) : '1' ?></td>
			<?php } else { ?>
			<td><?= (($row->V_request_type == "A10") || ($row->V_request_type == "A34") || ($row->v_tag_no == $assetone)) ? '0' : $row->DiffDate ?></td>
			<?php } ?>

					<?php  if (($row->v_tag_no) && $row->v_tag_no != 'N/A') {$assetone = $row->v_tag_no;} else {$assetone = $numrow;}
						if (($row->v_location_code) && $row->v_location_code != 'N/A') {$locationone = $row->v_location_code;} else {$locationone = $numrow;}
					?>

			<td><?= ($row->v_summary) ? $row->v_summary : 'N/A' ?></td>
			<?php  } else {?>
			<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>
			<td><?= ($row->v_Time) ? $row->v_Time : 'N/A' ?></td>
			<!-- <td><?= ($row->v_Personal1) ? $row->v_Personal1 : 'N/A' ?></td> -->

			<?php if (($this->input->get('broughtfwd') != '') && ($row->v_location_code != $locationone) && ($row->v_tag_no != $assetone) && ($row->V_request_type != "A34") && ($row->V_request_type != "A10") && ($row->linker == "none")){ ?>
			<!--<td><?=$row->DiffDate?></td>-->
			<td><?= ($row->DiffDate) ? (($row->DiffDate > date('t', mktime(0, 0, 0, (int)$this->input->get('m'), 1, (int)$this->input->get('y')))) ? date('t', mktime(0, 0, 0, (int)$this->input->get('m'), 1, (int)$this->input->get('y'))) : $row->DiffDate) : '1' ?></td>
			<?php } else { ?>
			<!-- <td><?= (($row->V_request_type == "A10") || ($row->V_request_type == "A34") || ($row->v_tag_no == $assetone) || ($row->v_location_code == $locationone) || ($row->linker != "none")) ? '0' : $row->DiffDate ?></td> -->
			<?php } ?>

			<?php  if (($row->v_tag_no) && $row->v_tag_no != 'N/A') {$assetone = $row->v_tag_no;} else {$assetone = $numrow;}
						 if (($row->v_location_code) && $row->v_location_code != 'N/A') {$locationone = $row->v_location_code;} else {$locationone = $numrow;}
			?>
			<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
			<?php } ?>
			<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' / '.$row->v_location_name : 'N/A' ?></td>
			<?php if ($this->input->get('broughtfwd') != '') { ?>
			<td><?= ($row->V_Asset_WG_code) ? $row->V_Asset_WG_code : 'N/A' ?></td>
			<?php } else { ?>
			<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
			<?php } ?>
			<td><?= ($row->medical_dev_class) ? $row->medical_dev_class : 'N/A' ?></td>
			<td><?= ($row->specialty_cat) ? $row->specialty_cat : 'N/A' ?></td>
			<td><?= ($row->nama) ? $row->nama : 'N/A' ?></td>
		</tr>
		<?php $numrow++; ?>
		<?php endforeach;?>
		<?php }else { ?>
		<tr align="center" style="background:white; height:200px;">
			<td <?=$colspan?>><span style="color:red;">NO RECORDS FOUND FOR THIS WORK ORDER.</span></td>
		</tr>
		<?php } ?>
	</table>
	<body>
</html>
<?php include 'pdf_footer.php';?>
