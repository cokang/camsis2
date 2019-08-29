<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Complaint Work Order Summary ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<script>
function barchart(a,b,c,d,e){
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php if ($this->uri->slash_segment(1) == 'contentcontroller/') { echo "pop_barchart"; } else { echo "contentcontroller/pop_barchart"; }?>?&bar=com&v1='+a+'&v2='+b+'&v3='+c+'&m='+d+'&y='+e, 'assetnumber', winProp);
	Win.window.focus();
}
</script>
<?php include 'content_btp.php';?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Complaint Number</div>
    <button onclick="javascript:myFunction('report_cwos?m=<?=$month?>&y=<?=$year?>&none=closed&ex=ex&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_cwos?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php //if($this->session->userdata('v_UserName') == 'nezam') {?>
	<span style="float:right; margin-right:90px;" onclick="barchart(<?php if ($complntsum[0]->total == 0){ echo '0';}else{echo $complntsum[0]->total;}?>,<?php if ($complntsum[0]->comp == 0){ echo '0';}else{echo $complntsum[0]->comp;}?>,<?php if ($complntsum[0]->notcomp == 0){ echo '0';}else{echo $complntsum[0]->notcomp;}?>,'<?= substr(date('M',mktime(0, 0, 0, $month, 10)),0,3)?>',<?=$year?>)"><img src="<?php echo base_url();?>images/Bar-Chart-icon.png" style="width:40px; height:38px; position:absolute;" title="Bar Chart"></span>
	<?php //} ?>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" >
<center>View List : 
<form method="get" action="">
		<?php 
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
		<?php echo form_dropdown('m', $month_list, set_value('m', isset($record[0]->Month) ? $record[0]->Month : $month) , 'style="width: 90px;" id="cs_month"'); ?>
		
		<?php 
			for ($dyear = '2015';$dyear <= date("Y");$dyear++){
				$year_list[$dyear] = $dyear;
			}
		?>
		<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>
<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">  
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<?php } ?>

<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="5">Complaint Work Order Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>Period</th>
				<th>Total Complaint</th>
				<th>Total Completed</th>
				<th>Total Outstanding</th>
			</tr>
			<tr style="text-align:center;">
				<td><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
				<?php if  ($this->input->get('ex') != 'excel'){ ?>
			    <td><?php if ($complntsum[0]->total == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volc?m='.$month.'&y='.$year.'&stat=fbfb&grp=&btp=1'.$this->input->get('grp'),$complntsum[0]->total);} ?></td>
			  <td><?php if ($complntsum[0]->comp == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volc?m='.$month.'&y='.$year.'&stat=A&grp=&btp=1'.$this->input->get('grp'),$complntsum[0]->comp);} ?></td>
			  <td><?php if ($complntsum[0]->notcomp == 0) { echo "0"; } else {echo anchor('contentcontroller/report_volc?m='.$month.'&y='.$year.'&stat=C&grp=&btp=1'.$this->input->get('grp'),$complntsum[0]->notcomp);} ?></td>
			  <?php }else{ ?>
			  <td><?php if ($complntsum[0]->total == 0) { echo "0"; } else {echo $complntsum[0]->total;} ?></td>
			  <td><?php if ($complntsum[0]->comp == 0) { echo "0"; } else {echo $complntsum[0]->comp;} ?></td>
			  <td><?php if ($complntsum[0]->notcomp == 0) { echo "0"; } else {echo $complntsum[0]->notcomp;} ?></td>
			  <?php } ?>
			</tr>
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
			<td width="50%">Complaint Work Order Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>

<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>	