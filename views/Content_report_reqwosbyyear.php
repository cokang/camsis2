<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Schedule Corrective Maintenance (SCM) Summary by Year".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<script>
function barchart(a,b,c,d,e){
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php if ($this->uri->slash_segment(1) == 'contentcontroller/') { echo "pop_barchart"; } else { echo "contentcontroller/pop_barchart"; }?>?&bar=req&v1='+a+'&v2='+b+'&v3='+c+'&m='+d+'&y='+e, 'assetnumber', winProp);
	Win.window.focus();
}
</script>
<?php include 'content_btp.php';?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Schedule Corrective Maintenance (SCM) Report Summary By Year</div>
    <button onclick="javascript:myFunction('report_reqwosbyyear?m=<?=$month?>&y=<?=$year?>&none=closed&grp=<?=$this->input->get('grp');?>&req=<?=$this->input->get('req');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_reqwosbyyear?req=<?=$this->input->get('req');?>&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&ex=excel&none=close&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php //if($this->session->userdata('v_UserName') == 'nezam') {?>
	<span style="float:right; margin-right:90px;" onclick="barchart(2,2,3,<?=$year?>)"><img src="<?php echo base_url();?>images/Bar-Chart-icon.png" style="width:40px; height:38px; position:absolute;" title="Bar Chart"></span>
	<?php //} ?>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">

<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<div id="Instruction" >
<center>View List : 
<form method="get" action="">
		<?php 
		$idArray = array_map('toArray', $this->session->userdata('accessr'));
		if (!(in_array("contentcontroller/Schedule(main)", $idArray))) { 
			 if ($this->session->userdata('usersess')=="HKS") {
			$req_type = array(
			'A1' => 'A1 - Breakdown Maintenance (BM)',
			'A2' => 'A2 - Schedule Corrective Maintenance (SCM)',
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
		 );
		 }
		?>
		<?php echo form_dropdown('req', $req_type, set_value('req', $reqtype) , 'style="width: 300px;" id="cs_month"'); ?>

		<?php } else {
		$_POST['req'] = '';
		}
			for ($dyear = '2015';$dyear <= date("Y");$dyear++){
				$year_list[$dyear] = $dyear;
			}
		?>
		<?php echo form_dropdown('y', $year_list, set_value('y', $year) , 'style="width: 65px;" id="cs_year"'); ?>
<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<?php $req = $this->input->get('req');?>
			<?php switch ($req) {
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
        $tulis = "A1 - Breakdown Maintenance (BM)";	
				break;
			} ?>
			<?php if ($this->input->get('req') == $req) {?>
			<td colspan="5">Schedule Corrective Maintenance (SCM) Report Summary <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if (($this->input->get('req')) and (($this->input->get('grp') == '2') or ($this->input->get('grp') == '3'))){ echo 'Group'.$this->input->get('grp').','.$tulis; } elseif ($this->input->get('req')){echo $tulis; }elseif ($this->input->get('grp') == ''){ echo ' A1 - Breakdown Maintenance (BM)';}else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
			<?php } ?>
		</tr>
	</table>
	
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>Period <?php if ($this->session->userdata('usersess') == 'FES'){ echo '/ Categories';}?></th>
				<th>Total Work Order Request</th>
				<th>Total Completed</th>
				<th>Total Outstanding</th>
			</tr>
			<tr style="text-align:center;">
				<td><?=$year?></td>
				<td><?php if ($rqsum[0]->total == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=fbfb&grp='.$this->input->get('grp').'&btp=1',$rqsum[0]->total);} ?></td>
			  <td><?php if ($rqsum[0]->comp == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=A&grp='.$this->input->get('grp').'&btp=1',$rqsum[0]->comp);} ?></td>
			  <td><?php if ($rqsum[0]->notcomp == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=C&grp='.$this->input->get('grp').'&btp=1',$rqsum[0]->notcomp);} ?></td>
			</tr>
			<?php if ($this->session->userdata('usersess') == 'FES'){ ?>
				<tr style="text-align:center;">
					<td>Electrical</td>
					<td><?php if ($rqelec[0]->total == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=fbfb&grp='.$this->input->get('grp').'&btp=1&serv=ele',$rqelec[0]->total);} ?></td>
			  <td><?php if ($rqelec[0]->comp == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=A&grp='.$this->input->get('grp').'&btp=1&serv=ele',$rqelec[0]->comp);} ?></td>
			  <td><?php if ($rqelec[0]->notcomp == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=C&grp='.$this->input->get('grp').'&btp=1&serv=ele',$rqelec[0]->notcomp);} ?></td>
			</tr>
				<tr style="text-align:center;">
					<td>Mechanical</td>
					<td><?php if ($rqmech[0]->total == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=fbfb&grp='.$this->input->get('grp').'&btp=1&serv=mec',$rqmech[0]->total);} ?></td>
			  <td><?php if ($rqmech[0]->comp == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=A&grp='.$this->input->get('grp').'&btp=1&serv=mec',$rqmech[0]->comp);} ?></td>
			  <td><?php if ($rqmech[0]->notcomp == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=C&grp='.$this->input->get('grp').'&btp=1&serv=mec',$rqmech[0]->notcomp);} ?></td>
			</tr>
				<tr style="text-align:center;">
					<td>Civil</td>
					<td><?php if ($rqcivil[0]->total == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=fbfb&grp='.$this->input->get('grp').'&btp=1&serv=civ',$rqcivil[0]->total);} ?></td>
			  <td><?php if ($rqcivil[0]->comp == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=A&grp='.$this->input->get('grp').'&btp=1&serv=civ',$rqcivil[0]->comp);} ?></td>
			  <td><?php if ($rqcivil[0]->notcomp == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&req='.$reqtype.'&stat=C&grp='.$this->input->get('grp').'&btp=1&serv=civ',$rqcivil[0]->notcomp);} ?></td>
			</tr>
			<?php } ?>
	</table>
	<?php if ($this->input->get('ex') != 'excel'){?>
	<div id="container" class="qapgraf2"></div>
	<?php } ?>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Schedule Corrective Maintenance (SCM) Report Summary <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>
