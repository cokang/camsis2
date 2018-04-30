<div class="ui-middle-screen">
	<div class="content-workorder">
	<?php if($this->input->get('rs') == 1){?>
	<div style="margin:10px;"></div>
	<?php } ?>
		<div class="ui-main-report">
			<div class="ui-main-report-header">
				<table align="center" height="40px" border="0" class="report_selection">
					<tr>
						<td>Visit Log Report</td>
					</tr>
				</table>
			</div>
			<form action="" method="POST" name="myform">
			<div class="middle-report-1">
				Work Order : <input type="text" name="n_wono" value="<?=$wono?>" class="form-control-button2">
			</div>
			<div  class="middle-report-2" style="height:35px;">&nbsp;</div>
			<div  class="middle-report-3">
				<input type="radio" id="radio-1-1" name="n_wotype" class="regular-radio" value = "Request"<?=$wotype == 'Request' ? 'checked' : 'checked'?>/>   
				<label for="radio-1-1"></label> Request <br />
				<input type="radio" id="radio-1-2" name="n_wotype" class="regular-radio" value = "PPM"<?=$wotype == 'PPM' ? 'checked' : ''?>/>   
				<label for="radio-1-2"></label> PPM <br />
				<input type="radio" id="radio-1-3" name="n_wotype" class="regular-radio" value = "Complaint"<?=$wotype == 'Complaint' ? 'checked' : ''?>/>   
				<label for="radio-1-3"></label> Complaint <br /> 
				<input type="hidden" name="data_file" value="Y">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="mysubmit" value="GO" id="GO">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="myclear" value="CLEAR" id="Clear">
			</div>
			</form>
			<div class="middle-report-4">
				<?php if ($datafile == 'Y' AND $wono <> ''){ ?>
				<?php if ($record){ ?>
				<table class="tftabledetail" id="loginTable" border="0" style="text-align:center;" >
					<tr>	
						<th>No</th>
						<th>Work Order Number</th>
						<th>Summary</th>
						<th>Work Order Date</th>
						<th>Response Date</th>
						<th>Respond Findings</th>
						<th>Responder</th>
						<th>Visit Date(all visit)</th>
						<th>Visit Finding(all visit)</th>
						<th>Technical Incharge(Name only)</th>
						<th>Job Close Date</th>
						<th>Job Done Action Taken</th>
					</tr>
					<?php $numrow = 1;foreach ($record as $row): ?>
					<tr>
						<td><?=$numrow++?></td>
						<td><?=isset($row->V_Request_no) ? $row->V_Request_no : 'N/A'?></td>
						<td><?=isset($row->V_summary) ? $row->V_summary : 'N/A'?></td>
						<td><?=isset($row->D_date) ? date("d-m-Y",strtotime($row->D_date)) : 'N/A'?></td>
						<td><?=isset($row->v_respondate) ? date("d-m-Y",strtotime($row->v_respondate)) : 'N/A'?></td>
						<td><?=isset($row->R_ActionTaken) ? $row->R_ActionTaken : 'N/A'?></td>
						<?php $n_Resp = 1; ?>
						<?php if ($wotype != 'Complaint') { ?>
						<td><?=isset($row->Resp1) && $row->Resp1 != 'N/A-' ? $n_Resp.'. '.$row->Resp1 : ''?><?=isset($row->Resp2) && $row->Resp2 != 'N/A-'? '<br>'.++$n_Resp.'. '.$row->Resp2 : ''?><?=isset($row->Resp3) && $row->Resp3 != 'N/A-' ? '<br>'.++$n_Resp.'. '.$row->Resp3 : ''?></td>
						<?php } else { ?>
						<td><?=isset($row->Resp1) && $row->Resp1 != 'N/A-' ? $n_Resp.'. '.$row->Resp1 : ''?></td>
						<?php } ?>
						<td><?=isset($row->V_Date) ? date("d-m-Y",strtotime($row->V_Date)) : 'N/A'?></td>
						<td><?=isset($row->V_ActionTaken) ? $row->V_ActionTaken : 'N/A'?></td>
						<?php $n_VTech = 1; ?>
						<?php if ($wotype != 'Complaint') { ?>
						<td><?=isset($row->V_Tech1) && $row->V_Tech1 != 'N/A-' ? $n_VTech.'. '.$row->V_Tech1 : ''?><?=isset($row->V_Tech2) && $row->V_Tech2 != 'N/A-'? '<br>'.++$n_VTech.'. '.$row->V_Tech2 : ''?><?=isset($row->V_Tech3) && $row->V_Tech3 != 'N/A-' ? '<br>'.++$n_VTech.'. '.$row->V_Tech3 : ''?></td>
						<?php } else { ?>
						<td><?=isset($row->V_Tech1) && $row->V_Tech1 != 'N/A-' ? $n_Resp.'. '.$row->V_Tech1 : ''?></td>
						<?php } ?>
						<td><?=isset($row->v_closeddate) ? date("d-m-Y",strtotime($row->v_closeddate)) : 'N/A'?></td>
						<td><?=isset($row->J_Summary) ? $row->J_Summary : 'N/A'?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				<?php } else { ?>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<td style="color:red; text-align:center; height:50px;" colspan="8">Result: No matching record found.</th>
					</tr>
				</table>
				<?php } ?>
				<?php } ?>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	//$(document).ready(function(){
	//	$("#GO").click(function(){
	//		$("#loginTable").show();
	//	});
	//	$("#Clear").click(function(){
	//		$("#loginTable").hide();
	//});
	//});
    //$(document).ready(function(){
    //$('.check:button').toggle(function(){
    //    $('input:checkbox').attr('checked','checked');
    //    $(this).val('Deselect all')
    //},function(){
    //    $('input:checkbox').removeAttr('checked');
    //    $(this).val('Select All');        
    //})
	//})
   </script>
</div>
</body>
</html>
