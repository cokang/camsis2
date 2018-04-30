<div class="ui-middle-screen">
	<div class="content-workorder">
	<?php if($this->input->get('rs') == 1){?>
	<div style="margin:10px;"></div>
	<?php } ?>
	
		<div class="ui-main-report">
			<div class="ui-main-report-header">
				<table align="center" height="40px" border="0" class="report_selection">
					<tr>
						<td>Selection</td>
					</tr>
				</table>
			</div>
			<form action="" method="POST" name="myform">
			<div class="middle-report-3">
				Search By Location : <input type="text" name="n_dept" id="n_user_department1" value="<?=$dept?>" class="form-control-button2" readonly> 
				<input type="text" name="n_loc" id="n_location" value="<?=$loc?>" class="form-control-button2" readonly> <span class="icon-windows" onclick="fCalllocation('2',this)">
			</div>
			<div  class="middle-report-3">
				<input type="radio" id="radio-1-1" name="n_wotype" class="regular-radio" value = "Request"<?=$wotype == 'Request' ? 'checked' : 'checked'?>/>   
				<label for="radio-1-1"></label> Request <br />
				<input type="radio" id="radio-1-2" name="n_wotype" class="regular-radio" value = "Complaint"<?=$wotype == 'Complaint' ? 'checked' : ''?>/>   
				<label for="radio-1-2"></label> Complaint <br /> 
				<input type="hidden" name="data_file" value="Y">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="mysubmit" value="GO">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="myclear" value="CLEAR">
			</div>
			</form>
			<div class="middle-report-4">
				<?php if ($datafile == 'Y' AND $dept <> '' AND $loc <> ''){ ?>
				<?php if ($record){ ?>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<th>No</th>
						<th>Date</th>
						<th>Time</th>
						<th>Work Order</th>
						<th>Summary</th>
					</tr>
					<?php $numrow = 1; foreach($record as $row): ?>
					<tr>
						<td><?=$numrow++?></td>
						<td><?=isset($row->D_date) ? date("d-m-Y",strtotime($row->D_date)) : 'N/A'?></td>
						<td><?=isset($row->D_time) ? date("g:i a",strtotime($row->D_time)) : 'N/A'?></td>
						<td><?=isset($row->V_Request_no) ? $row->V_Request_no : 'N/A'?></td>
						<td><?=isset($row->V_summary) ? $row->V_summary : 'N/A'?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				<?php } else { ?>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<td style="color:red; text-align:center; height:50px;" colspan="4">Result: No matching record found.</th>
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
	//	});
	//});
    // $(document).ready(function(){
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
<?php include 'content_jv_popup.php';?>