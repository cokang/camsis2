<?php 
if ($this->input->get('ex') == 'excel'){
$filename ="Deduction Mapping 2 - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}

$assetone = "0";
$locationone = "0";
		 $tajuk = [
    ['1', 'Unscheduled Brought Foward Work Order Details'],
	['2', 'Scheduled Brought Foward Work Order Details' ],
	['3', 'Complaint'],
	['4', 'Other activities'],

];
?>



<?php if ($this->input->get('ex') == ''){?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr" style="text-transform:uppercase;">Deduction Mapping 2</div>
		
		<button onclick="javascript:myFunction('deductmapping_2?sev=<?=$this->input->get('sev')?>&mth=<?=$this->input->get('mth')?>&yr=<?=$this->input->get('yr')?>&reqstatus=<?=$this->input->get('reqstatus')?>');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>acg_report?tabIndex=1';">CANCEL</button>
		<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/deductmapping_2?sev=<?=$this->input->get('sev')?>&mth=<?=$this->input->get('mth')?>&yr=<?=$this->input->get('yr')?>&reqstatus=<?=$this->input->get('reqstatus')?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<a href="<?php echo base_url();?>index.php/contentcontroller/deductmapping_2?pdf=1&sev=<?=$this->input->get('sev')?>&mth=<?=$this->input->get('mth')?>&yr=<?=$this->input->get('yr')?>&reqstatus=<?=$this->input->get('reqstatus')?>"  value="2" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:38px; height:36px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
	</div>
	<?php } ?>
	<div class=Section1> 

	
<table style="text-align:left; " align="left">
<tr>
<th>THIS MONTH</th>
</tr>
<tr>
<td style="width:20%; padding-left:5px;"></td>
<td style="width:20%; padding-left:5px;">COMPLETED</td>
</tr>
</table>
<table  class="tbl-wo" border="0" style="text-align:left; " align="left">
		<tr>
		<?php foreach ($tajuk as $list) {
	if ($list[0] == $reqstatus){?>

			<td colspan="5"><?php echo $list[1] ?> - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		<?php } ?>
		<?php } ?>
		</tr>
	</table>

<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No</th>
			<th>Date Req</th>
			<th>Request No</th>
			<th>Asset No</th>				
			<th>Request Summary</th>
			<th>ULC</th>
			<th>Requestor<br>Name</th>
			<th>Status</th>
			<th>Completion<br>Date</th>
			<th>Duration<br>of Repair (Days)</th>
			<th>Actual Work Done</th>			
			<th>Dept/Loc</th>
			<th>Validity</th>
			<th>>15</th>
			<th>Remark</th>
		</tr>
		
		<?php  if (!empty($record)) {?>
			<?php if ($reqstatus == 1) { ?>	
				<?php $numrow = 1; foreach($record as $row):?>
					      			
	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    		<td><?= $numrow ?></td>
			<td><?= ($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>	
			<td> <?=isset($row->V_Request_no) ? $row->V_Request_no : ''?></td>
			<td> <?=isset($row->V_Tag_no) ? $row->V_Tag_no : ''?></td>
			<td><?= ($row->V_summary) ? $row->V_summary : 'N/A' ?></td>
			<td><?= ($row->V_Location_code) ? $row->V_Location_code : 'N/A' ?></td>
			<td><?= ($row->V_requestor) ? $row->V_requestor : 'N/A' ?></td>
			<td><?= ($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>


			<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
	
			<td><?= $row->DiffDate ?></td>

			<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
		
			<td><?= ($row->v_Location_Name) ? $row->v_Location_Name : 'N/A' ?></td>
		    <td></td>
			<td></td>
			<td><?=  ($row->v_VCM_Remarks) ? $row->v_VCM_Remarks :'N/A' ?></td>

  
	        			</tr>	
	        			<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		
						<?php } else { ?>
						
							<?php $numrow = 1; foreach($record as $row):?>
					      			
	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    		<td><?= $numrow ?></td>
			<td><?= ($row->d_StartDt) ?  date("d/m/Y",strtotime($row->d_StartDt)) : 'N/A' ?></td>	
			<td> <?=isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : ''?></td>
			<td> <?=isset($row->v_Asset_no) ? $row->v_Asset_no : ''?></td>
			<td><?= ($row->V_summary) ? $row->V_summary : 'N/A' ?></td>
			<td><?= ($row->V_Location_code) ? $row->V_Location_code : 'N/A' ?></td>
			<td><?= ($row->v_Personal1) ? $row->v_Personal1 : 'N/A' ?></td>
			<td><?= ($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : 'N/A' ?></td>


			<td><?= ($row->v_closeddate) ? date("d/m/Y",strtotime($row->v_closeddate)) : 'N/A' ?></td>
	
			<td><?= $row->DiffDate ?></td>

			<td><?= ($row->v_ActionTaken) ? $row->v_ActionTaken : 'N/A' ?></td>
		
			<td><?= ($row->v_Location_Name) ? $row->v_Location_Name : 'N/A' ?></td>
		    <td></td>
			<td></td>
			<td><?=  ($row->v_VCM_Remarks) ? $row->v_VCM_Remarks :'N/A' ?></td>

  
	        			</tr>	
	        			<?php $numrow++; ?>
			    		<?php endforeach;?>				
						
						<?php } ?>
						<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="15"><span style="color:red;">NO RECORDS FOUND FOR THIS WORK ORDER.</span></td>
	    				</tr>
						<?php } ?>
	</table>
</div>	

</div>
	</div><br>

	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>


