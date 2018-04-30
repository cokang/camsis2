<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Deduction Mapping Work Order Request - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Deduction Mapping Work Order Request</div>
    <button onclick="javascript:myFunction('report_rmc?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_rmc?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
        <td align="left" colspan="6" style="font-weight: bold; font-size:14px;"> DEDUCTION FORMULA MAPPING - RCM <br /> HOSPITAL : <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?> - <?php echo $this->session->userdata('usersessn');?></td>
        <td align="left" valign="bottom" colspan="14" style="font-weight: bold; font-size:14px;">DATE : <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
    </tr>
  <tr>
    <td rowspan="2" class="td-r">No</td>
    <td rowspan="2" class="td-r">Complaint<br>Date</td>
    <td rowspan="2" class="td-r">Complaint No</td>
    <td rowspan="2" class="td-r" style="width:170px;">Complaint Details</td>
    <td rowspan="2" class="td-r">Service<br>Code</td>
    <td rowspan="2" class="td-r">Dept</td>
    <td colspan="<?=count($keyindlist)?>" class="td-r" style=""><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
    <td rowspan="2" class="td-r" style="width:100px;">Complete<br>Date</td>
    <td rowspan="2" class="td-r">Validate</td>
    <td rowspan="2" class="td-r" style="width:170px">Remarks</td>    
  </tr>
  <tr>
    <?php for ($ind = 1; $ind <= count($keyindlist); $ind++) { ?>
    <td class="td-r"><?=$ind?></td>
    <?php } ?>
  </tr>
 <?php  if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
					      			
	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= $numrow ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= ($row->RegisterDate) ? date("d/m/Y",strtotime($row->RegisterDate)) : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= ($row->V_Request_no) ? $row->V_Request_no : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= ($row->V_summary) ? $row->V_summary : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;text-align:center;"><?= ($row->V_servicecode) ? $row->V_servicecode : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;text-align:center;"><?= ($row->V_User_dept_code) ? $row->V_User_dept_code : 'N/A' ?></td>
    						
                            <?php for ($ind = 1;$ind <= count($keyindlist); $ind++) { ?>
                            <?php $indnom = 'v_IndicatorNo'.$ind; ?>
                            <td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
                            <?php } ?>

                            <!--<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"></td>-->
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= ($row->v_closeddate) ? $row->v_closeddate : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;vertical-align:top;"><?= ($row->V_requestor) ? $row->V_requestor : 'N/A' ?></td>
    						<td style="border:1px solid;font-family:Arial;font-size:9px;"><?= ($row->ActualVisit) ? $row->ActualVisit : 'N/A' ?></td>
  
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