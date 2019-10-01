<?php include 'pdf_head.php'?>

<?php 

$locationone = "0";
		 $tajuk = [
    ['1', 'Unscheduled Brought Foward Work Order Details'],
	['2', 'Scheduled Brought Foward Work Order Details' ],
	['3', 'Complaint'],
	['4', 'Other activities'],

];
?>
<html>
	<head>

	</head>
	<body>

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
	
		<table class="tftable" border="1" style="text-align:center; font-size:7px; width:115%; margin:0 auto; background:white;" cellpadding="4">
		<tr>
			<th style="width:2%;">No</th>
			<th style="width:5%;">Date Req</th>
			<th style="width:10%;">Request No</th>
			<th>Asset No</th>				
			<th>Request Summary</th>
			<th>ULC</th>
			<th>Requestor<br>Name</th>
			<th style="width:4%;">Status</th>
			<th style="width:5%;">Completion<br>Date</th>
			<th style="width:5%;">Duration<br>of Repair (Days)</th>
			<th>Actual Work Done</th>			
			<th style="width:10%;">Dept/Loc</th>
			<th style="width:4%;">Validity</th>
			<th style="width:3%;">>15</th>
			<th>Remark</th>
		</tr>
		
		<?php  if (!empty($record)) {?>
			<?php if ($reqstatus == 1) { ?>	
				<?php $numrow = 1; foreach($record as $row):?>
					      			
	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    		<td ><?= $numrow ?></td>
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
	</body>
</html>
<?php include 'pdf_footer.php'?>