<?php

$status = array('' => 'All' ,
				'A' => 'A',
				'BO'=> 'BO',
				'C'=> 'C');
//echo "nilai lalalal : ".cal_days_in_month(CAL_GREGORIAN, $this->input->get('m'), $this->input->get('y'));
if ($this->input->get('broughtfwd') != ''){
   $tajuk = 'Unscheduled Brought Forward Work Order Details';
}else{
  $tajuk = 'Work Order Listing Unscheduled';
}
if ($this->input->get('ex') == 'excel'){
$filename = $tajuk .date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}

$assetone = "0";
$locationone = "0";

?>
<?php $req = $this->input->get('req');?>
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
<div class="none">
<?php if ($this->input->get('ex') == ''){?>
<?php include 'content_btp.php';?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr"><?php if ($this->input->get('broughtfwd') != ''){?>Unscheduled Brought Forward Work Order Details<?php }else{ ?>Work Order Report Listing<?php }?></div>
    <button onclick="javascript:myFunction('report_volu?from=<?=$from?>&to=<?=$to?>&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&special_cat=<?=$this->input->get('special_cat');?>&ex=&stat=<?=$this->input->get('stat');?>&grp=<?=$this->input->get('grp');?>&wid=1&req_status=<?=$this->input->get('req_status');?>&broughtfwd=<?=$this->input->get('broughtfwd')?>&serv=<?=$this->input->get('serv')?>&tag=<?=$this->input->get('tag')?>&cm=<?=$this->input->get('cm')?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_volu?req=<?=$this->input->get('req');?>&from=<?=$from?>&to=<?=$to?>&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&req_status=<?=$this->input->get('req_status');?>&special_cat=<?=$this->input->get('special_cat');?>&ex=excel&none=close&stat=<?=$this->input->get('stat');?>&resch=<?=$this->input->get('resch');?>&broughtfwd=<?=$this->input->get('broughtfwd');?>&xxx=export&grp=<?=$this->input->get('grp');?>&serv=<?=$this->input->get('serv')?>>&tag=<?=$this->input->get('tag')?>&cm=<?=$this->input->get('cm')?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_volu?req=<?=$this->input->get('req');?>&from=<?=$from?>&to=<?=$to?>&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&req_status=<?=$this->input->get('req_status');?>&special_cat=<?=$this->input->get('special_cat');?>&ex=excel&none=close&stat=<?=$this->input->get('stat');?>&resch=<?=$this->input->get('resch');?>&broughtfwd=<?=$this->input->get('broughtfwd');?>&pdf=1&grp=<?=$this->input->get('grp');?>&serv=<?=$this->input->get('serv')?>&tag=<?=$this->input->get('tag')?>&cm=<?=$this->input->get('cm')?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
</div>
<?php } ?>

<div class="menu" style="position:relative;">
<?php if ($this->input->get('xxx') == 'export') { ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<?php if ($this->input->get('req') == $req) {?>
			<td colspan="4" valign="top"><?php if ($this->input->get('broughtfwd') != ''){?>Unscheduled Brought Forward Work Order Details<?php }else{ ?>Work Order Report Listing<?php }?>- <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if (($this->input->get('req')) and (($this->input->get('grp') == '2') or ($this->input->get('grp') == '3'))){ echo 'Group'.$this->input->get('grp').','.$tulis; } elseif ($this->input->get('req')){echo $tulis; }elseif ($this->input->get('grp') == ''){ echo 'All';}else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
			<?php } ?>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;"><!--filexcel-->
		<tr>
			<th>No</th>
			<th >Date Req</th>
			<th>Time Req</th>
			<th>Request No</th>
			<th>Asset No</th>
			<th>Request Summary</th>
			<th>ULC</th>
			<th>Requestor<br>Name</th>
			<th>Status</th>
			<?php if ($this->input->get('stat') == 'A') {?>
			<th>Completion<br>Date</th>
			<th>Completion<br>Time</th>
			<th>Closed<br>By</th>
			<th>Duration<br>of Repair (Days)</th>
			<th>Actual Work Done</th>
			<?php  } else {?>
			<th>Respond<br>Date</th>
			<th>Respond<br>Time</th>
			<th>Responded<br>By</th>
			<th>Duration<br>of Repair (Days)</th>
			<th>Respond Finding</th>
			<?php } ?>
			<th>Dept/Loc</th>
			<?php if ($this->input->get('broughtfwd') != '') { ?>
			<th>Work Order Group</th>
			<?php }  ?>
			<th>Medical Device classification</th>
			<th>Specialty category</th>
			<?php  ?>
		</tr>

		<?php  if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
    		<td><?= $numrow ?></td>
			<td><?= ($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
			<td><?= ($row->D_time) ? $row->D_time : 'N/A' ?></td>
			<?php if  ($this->input->get('ex') != 'excel'){ ?>
			<td><?=($row->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state'),''.$row->V_Request_no.'' ) : 'N/A' ?></td>
			<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->v_tag_no.'' ) : 'N/A' ?></td>
			<?php }else{ ?>
			<td> <?=isset($row->V_Request_no) ? $row->V_Request_no : ''?></td>
			<td> <?=isset($row->v_tag_no) ? $row->v_tag_no : ''?></td>
			<?php } ?>
			<td><?= ($row->ReqSummary) ? $row->ReqSummary : 'N/A' ?></td>
			<td><?= ($row->v_location_code) ? $row->v_location_code : 'N/A' ?></td>
			<td><?= ($row->V_requestor) ? $row->V_requestor : 'N/A' ?></td>
			<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
			<?php if ($this->input->get('stat') == 'A') {?>
			<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
			<td><?= ($row->v_closedtime) ? $row->v_closedtime : 'N/A' ?></td>
			<td><?= ($row->closedby) ? $row->closedby : 'N/A' ?></td>
			<?php if (($this->input->get('broughtfwd') != '') && ($row->v_tag_no != $assetone) && ($row->V_request_type != "A34") && ($row->V_request_type != "A10") && ($row->linker == "none")){ ?>
			<!--<td><?=$row->DiffDate?></td>-->
			<td><?= ($row->DiffDate) ? (($row->DiffDate > cal_days_in_month(CAL_GREGORIAN, $this->input->get('m'), $this->input->get('y'))) ? cal_days_in_month(CAL_GREGORIAN, $this->input->get('m'), $this->input->get('y')) : $row->DiffDate) : '1' ?></td>
			<?php } else { ?>
			<td><?= (($row->V_request_type == "A10") || ($row->V_request_type == "A34") || ($row->v_tag_no == $assetone) || ($row->linker != "none")) ? '0' : $row->DiffDate ?></td>
			<?php } ?>
			<?php  if (($row->v_tag_no) && $row->v_tag_no != 'N/A') {$assetone = $row->v_tag_no;} else {$assetone = $numrow;}
			if (($row->v_location_code) && $row->v_location_code != 'N/A') {$locationone = $row->v_location_code;} else {$locationone = $numrow;}
			?>
			<td><?= ($row->v_summary) ? $row->v_summary : 'N/A' ?></td>
			<?php  } else {?>
			<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>
			<td><?= ($row->v_Time) ? $row->v_Time : 'N/A' ?></td>
			<td><?= ($row->v_Personal1) ? $row->v_Personal1 : 'N/A' ?></td>
			<?php if (($this->input->get('broughtfwd') != '') && ($row->v_location_code != $locationone) && ($row->v_tag_no != $assetone) && ($row->V_request_type != "A34") && ($row->V_request_type != "A10") && ($row->linker == "none")){ ?>
			<!--<td><?=$row->DiffDate?></td>-->
			<td><?= ($row->DiffDate) ? (($row->DiffDate > date('t', mktime(0, 0, 0, (int)$this->input->get('m'), 1, (int)$this->input->get('y')))) ? date('t', mktime(0, 0, 0, (int)$this->input->get('m'), 1, (int)$this->input->get('y'))) : $row->DiffDate) : '1' ?></td>
			<?php } else { ?>
			<td><?= (($row->V_request_type == "A10") || ($row->V_request_type == "A34") || ($row->v_tag_no == $assetone) || ($row->v_location_code == $locationone) || ($row->linker != "none")) ? '0' : $row->DiffDate ?></td>
			<?php } ?>
			<?php  if (($row->v_tag_no) && $row->v_tag_no != 'N/A') {$assetone = $row->v_tag_no;} else {$assetone = $numrow;}
						 if (($row->v_location_code) && $row->v_location_code != 'N/A') {$locationone = $row->v_location_code;} else {$locationone = $numrow;}
			?>
			<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
			<?php } ?>
			<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' / '.$row->v_location_name : 'N/A' ?></td>
			<?php if ($this->input->get('broughtfwd') != '') { ?>
			<td><?= ($row->V_Asset_WG_code) ? $row->V_Asset_WG_code : 'N/A' ?></td>
			<?php }  ?>
			<td><?= ($row->medical_dev_class) ? $row->medical_dev_class : 'N/A' ?></td>
			<td><?= ($row->specialty_cat) ? $row->specialty_cat : 'N/A' ?></td>
			<?php  ?>
	        			</tr>
	        			<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="15"><span style="color:red;">NO RECORDS FOUND FOR THIS WORK ORDER.</span></td>
	    				</tr>
						<?php } ?>
	</table>
</div>
<?php } ?>




<?php  if (empty($record)) {?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>

<?php if (($this->input->get('ex') == '' && $this->input->get('broughtfwd') == '') OR ($this->input->get('ex') != '' && $this->input->get('broughtfwd') != '')){?>
<div id="Instruction" >
<center>View List : 
<form method="get" action="">

		<?php
		
    $idArray = array_map('toArray', $this->session->userdata('accessr'));
		if (!(in_array("contentcontroller/Schedule(main)", $idArray))) { 
		 if ($this->session->userdata('usersess')=="HKS") {
			$req_type = array(
			'' => 'All',
			'A1' => 'A1 - Breakdown Maintenance (BM)',
			//'A2' => 'A2 - Schedule Corrective Maintenance (SCM)',
			'A3' => 'A3 - Corrective Maintenance (CM)',
			'A4' => 'A4 - User Requests',
			'A5' => 'A5 - Investigation of Incidences',
			'A6' => 'A6 - Technical Advice',
			'A7' => 'A7 - User Training',
			'A8' => 'A8 - Testing and Commissioning (T&C)',
			'A9' => 'A9 - Internal Request',
			'A10' => 'A10 - Reimbursable Work',
			'F' => 'Floor - Related Report',
			'WD' => 'Wall / Door - Related Report',
			'C' => 'Ceiling - Related Report',
			'W' => 'Window - Related Report',
			'FIX' => 'Fixtures - Related Report',
			'FUR' => 'Furniture / Fitting - Related Report'
		 ); } else {
		 		$req_type = array(
			'' => 'All',
			'A1' => 'A1 - Breakdown Maintenance (BM)',
			//'A2' => 'A2 - Schedule Corrective Maintenance (SCM)',
			'A3' => 'A3 - Corrective Maintenance (CM)',
			'A4' => 'A4 - User Requests',
			'A5' => 'A5 - Investigation of Incidences',
			'A6' => 'A6 - Technical Advice',
			'A7' => 'A7 - User Training',
			'A8' => 'A8 - Testing and Commissioning (T&C)',
			'A9' => 'A9 - Internal Request',
			'A10' => 'A10 - Reimbursable Work'
		 );
		 }/*
			$req_type = array(
			'' => 'All',
			'A1' => 'A1 - Breakdown Maintenance (BM)',
			'A2' => 'A2 - Schedule Corrective Maintenance (SCM)',
			'A3' => 'A3 - Corrective Maintenance (CM)',
			'A4' => 'A4 - User Requests',
			'A5' => 'A5 - Investigation of Incidences',
			'A6' => 'A6 - Technical Advice',
			'A7' => 'A7 - User Training',
			'A8' => 'A8 - Testing and Commissioning (T&C)',
			'A9' => 'A9 - Internal Request',
			'A10' => 'A10 - Reimbursable Work'
		 );*/
		?>
		<?php echo form_dropdown('req', $req_type, set_value('req', $reqtype) , 'style="width: 300px;" id="cs_month"'); ?><br><br>
		Status : 
		<?php echo form_dropdown('req_status', $status, set_value('req_status', $this->input->get('req_status')) , 'style="width: 100px;" id="cs_month"'); ?>
		Special Category : 
		<?php echo form_dropdown('special_cat', $special_cat, set_value('special_cat', $this->input->get('special_cat')) , 'style="width: 350px;" id="cs_month"'); ?><br><br>
		Hospitals : 
		<?php echo form_dropdown('hospitalcodes', $hospitalcodes, set_value('hospitalcodes', $this->input->get('hospitalcodes')) , 'style="width: 100px;" id="cs_month"'); ?>
		Type Of Work Order : 
		<?php echo form_dropdown('typeOfWrkOrd', $typeOfWrkOrd, set_value('typeOfWrkOrd', $this->input->get('typeOfWrkOrd')) , 'style="width: 100px;" id="cs_month"'); ?><br>
		<?php  } else {
		$_POST['req'] = '';
		}
			$month_list = array(
			'01' => 'January',
			'02' => 'February',
			'03' => 'March',
			'04' => 'April',
			'05' => 'May',
			'06' => 'June',
			'07' => 'July',
			'08' => 'August',
			'09' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December'
		 );
		?>
		<!-- <?php echo form_dropdown('m', $month_list, set_value('m', isset($record[0]->Month) ? $record[0]->Month : $month) , 'style="width: 90px;" id="cs_month"'); ?> -->
		Date Range:
		<input type="date" name="from" id="from" value="<?php echo $from ?>" class="form-control-button2 ">
		<?php 
			for ($dyear = '2015';$dyear <= date("Y");$dyear++){
				$year_list[$dyear] = $dyear;
			}
		?>
		<!-- <?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?> -->
		<input type="date" name="to" id="to" value="<?php echo $to ?>" class="form-control-button2 ">
<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">				
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<?php if ($this->input->get('req') == $req) {?>
			<td colspan="4" valign="top"><?php if ($this->input->get('broughtfwd') != ''){?>Unscheduled Brought Forward Work Order Details<?php }else{ ?>Work Order Report Listing<?php }?>- <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if (($this->input->get('req')) and (($this->input->get('grp') == '2') or ($this->input->get('grp') == '3'))){ echo 'Group'.$this->input->get('grp').','.$tulis; } elseif ($this->input->get('req')){echo $tulis; }elseif ($this->input->get('grp') == ''){ echo 'All';}else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
			<?php } ?>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No</th>
			<th>Date Req</th>
			<th>Time Req</th>
			<th>Request No</th>
			<th>Asset No</th>				
			<th>Request Summary</th>
			<th>ULC</th>
			<th>Requestor<br>Name</th>
			<th>Status</th>
			<?php if ($this->input->get('stat') == 'A') {?>
			<th>Completion<br>Date</th>
			<th>Completion<br>Time</th>
			<th>Closed<br>By</th>
			<th>Duration<br>of Repair (Days)</th>
			<th>Actual Work Done</th>
			<?php  } else {?>
			<th>Respond<br>Date</th>
			<th>Respond<br>Time</th>
			<th>Responded<br>By</th>
			<th>Duration<br>of Repair (Days)</th>
			<th>Respond Finding</th>
			<?php } ?>
			<th>Dept/Loc</th>
			<?php if ($this->input->get('broughtfwd') != '') { ?>
			<th>Work Order Group</th>
			<?php }  ?>
			<th>Medical Device classification</th>
			<th>Specialty category</th>
			<?php  ?>
		</tr>

						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="17"><span style="color:red;">NO RECORDS FOUND FOR THIS WORK ORDER.</span></td>
	    				</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%"><?php if ($this->input->get('broughtfwd') != ''){?>Unscheduled Brought Forward Work Order Status Report<?php }else{ ?>Work Order Status Report<?php }?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>

						<?php } ?>




<?php if ($this->input->get('xxx') != 'export') { ?>
<?php $numrow = 1; foreach($record as $row):?>
<?php //if ($numrow==1 OR $numrow%13==1) { 
if ($numrow==1 OR $numrow%18==1) {
?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>

<?php if (($this->input->get('ex') == '' && $this->input->get('broughtfwd') == '') OR ($this->input->get('ex') != '' && $this->input->get('broughtfwd') != '')){?>
<div id="Instruction" >
<center>View List : 
<form method="get" action="">

		<?php
		
    $idArray = array_map('toArray', $this->session->userdata('accessr'));
		if (!(in_array("contentcontroller/Schedule(main)", $idArray))) { 
		 if ($this->session->userdata('usersess')=="HKS") {
			$req_type = array(
			'' => 'All',
			'A1' => 'A1 - Breakdown Maintenance (BM)',
			//'A2' => 'A2 - Schedule Corrective Maintenance (SCM)',
			'A3' => 'A3 - Corrective Maintenance (CM)',
			'A4' => 'A4 - User Requests',
			'A5' => 'A5 - Investigation of Incidences',
			'A6' => 'A6 - Technical Advice',
			'A7' => 'A7 - User Training',
			'A8' => 'A8 - Testing and Commissioning (T&C)',
			'A9' => 'A9 - Internal Request',
			'A10' => 'A10 - Reimbursable Work',
			'F' => 'Floor - Related Report',
			'WD' => 'Wall / Door - Related Report',
			'C' => 'Ceiling - Related Report',
			'W' => 'Window - Related Report',
			'FIX' => 'Fixtures - Related Report',
			'FUR' => 'Furniture / Fitting - Related Report'
		 ); } else {
		 		$req_type = array(
			'' => 'All',
			'A1' => 'A1 - Breakdown Maintenance (BM)',
			//'A2' => 'A2 - Schedule Corrective Maintenance (SCM)',
			'A3' => 'A3 - Corrective Maintenance (CM)',
			'A4' => 'A4 - User Requests',
			'A5' => 'A5 - Investigation of Incidences',
			'A6' => 'A6 - Technical Advice',
			'A7' => 'A7 - User Training',
			'A8' => 'A8 - Testing and Commissioning (T&C)',
			'A9' => 'A9 - Internal Request',
			'A10' => 'A10 - Reimbursable Work'
		 );
		 }/*
			$req_type = array(
			'' => 'All',
			'A1' => 'A1 - Breakdown Maintenance (BM)',
			'A2' => 'A2 - Schedule Corrective Maintenance (SCM)',
			'A3' => 'A3 - Corrective Maintenance (CM)',
			'A4' => 'A4 - User Requests',
			'A5' => 'A5 - Investigation of Incidences',
			'A6' => 'A6 - Technical Advice',
			'A7' => 'A7 - User Training',
			'A8' => 'A8 - Testing and Commissioning (T&C)',
			'A9' => 'A9 - Internal Request',
			'A10' => 'A10 - Reimbursable Work'
		 );*/
		?>
		<?php echo form_dropdown('req', $req_type, set_value('req', $reqtype) , 'style="width: 300px;" id="cs_month"'); ?><br><br>
		Status : 
		<?php echo form_dropdown('req_status', $status, set_value('req_status', $this->input->get('req_status')) , 'style="width: 100px;" id="cs_month"'); ?>
		Special Category : 
		<?php echo form_dropdown('special_cat', $special_cat, set_value('special_cat', $this->input->get('special_cat')) , 'style="width: 350px;" id="cs_month"'); ?><br><br>
		Hospitals : 
		<?php echo form_dropdown('hospitalcodes', $hospitalcodes, set_value('hospitalcodes', $this->input->get('hospitalcodes')) , 'style="width: 100px;" id="cs_month"'); ?>
		Type Of Work Order : 
		<?php echo form_dropdown('typeOfWrkOrd', $typeOfWrkOrd, set_value('typeOfWrkOrd', $this->input->get('typeOfWrkOrd')) , 'style="width: 100px;" id="cs_month"'); ?><br>
		<?php  } else {
		$_POST['req'] = '';
		}
			$month_list = array(
			'01' => 'January',
			'02' => 'February',
			'03' => 'March',
			'04' => 'April',
			'05' => 'May',
			'06' => 'June',
			'07' => 'July',
			'08' => 'August',
			'09' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December'
		 );
		?>
		<!-- <?php echo form_dropdown('m', $month_list, set_value('m', isset($record[0]->Month) ? $record[0]->Month : $month) , 'style="width: 90px;" id="cs_month"'); ?> -->
		Date Range:
		<input type="date" name="from" id="from" value="<?php echo $from ?>" class="form-control-button2 ">
		<?php 
			for ($dyear = '2015';$dyear <= date("Y");$dyear++){
				$year_list[$dyear] = $dyear;
			}
		?>
		<!-- <?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?> -->
		<input type="date" name="to" id="to" value="<?php echo $to ?>" class="form-control-button2 ">
<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">				
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<?php if ($this->input->get('req') == $req) {?>
			<td colspan="4" valign="top"><?php if ($this->input->get('broughtfwd') != ''){?>Unscheduled Brought Forward Work Order Details<?php }else{ ?>Work Order Report Listing<?php }?>- <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if (($this->input->get('req')) and (($this->input->get('grp') == '2') or ($this->input->get('grp') == '3'))){ echo 'Group'.$this->input->get('grp').','.$tulis; } elseif ($this->input->get('req')){echo $tulis; }elseif ($this->input->get('grp') == ''){ echo 'All';}else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
			<?php } ?>
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
			<?php if ($this->input->get('stat') == 'A') {?>
			<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Completion<br>Date</th>
			<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Completion<br>Time</th>
			<th <?php if($this->input->get('wid')== 1){ echo "style='width:5%;'";}?>>Closed<br>By</th>
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
			<?php if($this->input->get('broughtfwd') != '') {?><th <?php if($this->input->get('wid')== 1){ echo "grp";}?>>Work Order Group</th> <?php }?>
			<!-- <th><?php if($this->input->get('wid')== 1){ echo "grp";}else{ if($this->input->get('broughtfwd') != ''){echo "Work Order Group";} else{echo "Medical Device classification";}}?></th> -->
			<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>Medical Device classification</th>
	  <th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>Specialty category</th>
      </tr>
		<?php } ?>

	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>

    		<td><?= $numrow ?></td>
			<td><?= ($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
			<td><?= ($row->D_time) ? $row->D_time : 'N/A' ?></td>
			<?php if  ($this->input->get('ex') != 'excel'){ ?>
			<td><?=($row->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state'),''.$row->V_Request_no.'' ) : 'N/A' ?></td>
			<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->v_tag_no.'' ) : 'N/A' ?></td>
			<?php }else{ ?>
			<td> <?=isset($row->V_Request_no) ? $row->V_Request_no : ''?></td>
			<td> <?=isset($row->v_tag_no) ? $row->v_tag_no : ''?></td>
			<?php } ?>
			<td><?= ($row->ReqSummary) ? $row->ReqSummary : 'N/A' ?></td>
			<td><?= ($row->v_location_code) ? $row->v_location_code : 'N/A' ?></td>
			<td><?= ($row->V_requestor) ? $row->V_requestor : 'N/A' ?></td>
			<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
			<?php if ($this->input->get('stat') == 'A') {?>
			<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
			<td><?= ($row->v_closedtime) ? $row->v_closedtime : 'N/A' ?></td>
			<td><?= ($row->closedby) ? $row->closedby : 'N/A' ?></td>

			<?php if (($this->input->get('broughtfwd') != '') && ($row->v_tag_no != $assetone) && ($row->V_request_type != "A34") && ($row->V_request_type != "A10") && ($row->linker == "none")){ ?>
			<!--<td><?=$row->DiffDate?></td>-->
			<td><?= ($row->DiffDate) ? (($row->DiffDate > cal_days_in_month(CAL_GREGORIAN, $this->input->get('m'), $this->input->get('y'))) ? cal_days_in_month(CAL_GREGORIAN, $this->input->get('m'), $this->input->get('y')) : $row->DiffDate) : '1' ?></td>
			<?php } else { ?>
			<td><?= (($row->V_request_type == "A10") || ($row->V_request_type == "A34") || ($row->v_tag_no == $assetone) || ($row->linker != "none")) ? '0' : $row->DiffDate ?></td>
			<?php } ?>

                        <?php  if (($row->v_tag_no) && $row->v_tag_no != 'N/A') {$assetone = $row->v_tag_no;} else {$assetone = $numrow;}
						 if (($row->v_location_code) && $row->v_location_code != 'N/A') {$locationone = $row->v_location_code;} else {$locationone = $numrow;}
			?>

			<td><?= ($row->v_summary) ? $row->v_summary : 'N/A' ?></td>
			<?php  } else {?>
			<td><?= ($row->d_Date) ? date("d/m/Y",strtotime($row->d_Date)) : 'N/A' ?></td>
			<td><?= ($row->v_Time) ? $row->v_Time : 'N/A' ?></td>
			<td><?= ($row->v_Personal1) ? $row->v_Personal1 : 'N/A' ?></td>

			<?php if (($this->input->get('broughtfwd') != '') && ($row->v_location_code != $locationone) && ($row->v_tag_no != $assetone) && ($row->V_request_type != "A34") && ($row->V_request_type != "A10") && ($row->linker == "none")){ ?>
			<!--<td><?=$row->DiffDate?></td>-->
			<td><?= ($row->DiffDate) ? (($row->DiffDate > date('t', mktime(0, 0, 0, (int)$this->input->get('m'), 1, (int)$this->input->get('y')))) ? date('t', mktime(0, 0, 0, (int)$this->input->get('m'), 1, (int)$this->input->get('y'))) : $row->DiffDate) : '1' ?></td>
			<?php } else { ?>
			<td><?= (($row->V_request_type == "A10") || ($row->V_request_type == "A34") || ($row->v_tag_no == $assetone) || ($row->v_location_code == $locationone) || ($row->linker != "none")) ? '0' : $row->DiffDate ?></td>
			<?php } ?>

			<?php  if (($row->v_tag_no) && $row->v_tag_no != 'N/A') {$assetone = $row->v_tag_no;} else {$assetone = $numrow;}
						 if (($row->v_location_code) && $row->v_location_code != 'N/A') {$locationone = $row->v_location_code;} else {$locationone = $numrow;}
			?>
			<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
			<?php } ?>
			<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc.' / '.$row->v_location_name : 'N/A' ?></td>
			<?php if ($this->input->get('broughtfwd') != '') { ?>
			<td><?= ($row->V_Asset_WG_code) ? $row->V_Asset_WG_code : 'N/A' ?></td>
			<?php }  ?>
			<td><?= ($row->medical_dev_class) ? $row->medical_dev_class : 'N/A' ?></td>
			<td><?= ($row->specialty_cat) ? $row->specialty_cat : 'N/A' ?></td>
			<?php  ?>

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
			<td width="50%"><?php if ($this->input->get('broughtfwd') != ''){?>Unscheduled Brought Forward Work Order Status Report<?php }else{ ?>Work Order Status Report<?php }?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
	
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>
</div>
<?php } ?>
<?php endforeach;?>

<?php } ?>

<?php include 'content_footerprint.php';?>
</div>
</div>
