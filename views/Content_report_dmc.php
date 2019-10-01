<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Deduction Mapping Complaint - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
	<div class="header-pr">Deduction Mapping Complaint</div>
	<button onclick="javascript:myFunction('report_dmc?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
	<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_dmc?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<div class="menu">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>

	<div class="m-div">
		<table style="border:1px solid;border-collapse:collapse;" cellpadding="2" cellspacing="0" width="100%" class="rport-content2">
    <tr>
        <td align="left" colspan="6" style="font-weight: bold; font-size:14px;">DEDUCTION FORMULA MAPPING - COMPLAINT <br /> HOSPITAL : <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?> - <?php echo $this->session->userdata('usersessn');?></td>
        <td align="left" valign="bottom" colspan="14" style="font-weight: bold; font-size:14px;">DATE : <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
    </tr>
  <tr>
    <td rowspan="2" class="td-r">No</td>
    <td rowspan="2" class="td-r">Complaint<br>Date</td>
    <td rowspan="2" class="td-r">Complaint No</td>
    <td rowspan="2" class="td-r" style="width:170px;">Complaint Details</td>
    <td rowspan="2" class="td-r">Service<br>Code</td>
    <td rowspan="2" class="td-r">Dept</td>
    <td colspan="11" class="td-r" style=""><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
    <td rowspan="2" class="td-r" style="width:100px;">Complete<br>Date</td>
    <td rowspan="2" class="td-r">Validate</td>
    <td rowspan="2" class="td-r" style="width:170px">Remarks</td>    
  </tr>
  <tr>
    <td class="td-r">1</td>
    <td class="td-r">2</td>
    <td class="td-r">3</td>
    <td class="td-r">4</td>
    <td class="td-r">5</td>
    <td class="td-r">6</td>
    <td class="td-r">7</td>
    <td class="td-r">8</td>
    <td class="td-r">9</td>
    <td class="td-r">10</td>
    <td class="td-r">11</td> 
  </tr>

	<?php  if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
					      			
	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= $numrow ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= ($row->d_ComplaintDt) ? $row->d_ComplaintDt : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= ($row->v_ComplaintNo) ? $row->v_ComplaintNo : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= ($row->v_Complaint) ? $row->v_Complaint : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;text-align:center;"><?= ($row->v_ServiceCode) ? $row->v_ServiceCode : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;text-align:center;"><?= ($row->v_UserDeptCode) ? $row->v_UserDeptCode : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= ($row->d_CompleteDt) ? $row->d_CompleteDt : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= ($row->v_PersonnelCode) ? $row->v_PersonnelCode : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"><?= ($row->v_Remark) ? $row->v_Remark : 'N/A' ?></td>
  
	        			</tr>	
	        			<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="20"><span style="color:red;">NO COMPLAINT RECORDS FOUND FOR THIS WORK ORDER.</span></td>
	    				</tr>
						<?php } ?>	
	
</table>
	</div>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
</body>
</html>	