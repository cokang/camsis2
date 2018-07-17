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
			<div class="middle-report-1">
				Number Work Order : <input type="text" name="n_wono" value="<?=$wono?>" class="form-control-button2">
			</div>
			<!-- <div  class="middle-report-2" style="height:35px;">&nbsp;</div> -->
			<div  class="middle-report-3">
				<input type="radio" id="radio-1-1" name="n_wotype" class="regular-radio" value = "Request"<?=$wotype == 'Request' ? 'checked' : 'checked'?>/>   
				<label for="radio-1-1"></label> Request <br />
				<input type="radio" id="radio-1-2" name="n_wotype" class="regular-radio" value = "PPM"<?=$wotype == 'PPM' ? 'checked' : ''?>/>   
				<label for="radio-1-2"></label> PPM <br />
				<input type="radio" id="radio-1-3" name="n_wotype" class="regular-radio" value = "Complaint"<?=$wotype == 'Complaint' ? 'checked' : ''?>/>   
				<label for="radio-1-3"></label> Complaint <br /> 
				<input type="hidden" name="data_file" value="Y">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="mysubmit" value="GO">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="myclear" value="CLEAR">
			</div>
			</form>
			<div class="middle-report-4" style="background-color:#E6FFED;">
				<?php if ($datafile == 'Y' AND $wono <> ''){  ?>
					<?php if ($record){ ?>
						<table class="tftabledetail ui-left_web" border="0" style="text-align:center;">
							<tr>	
								<th>No</th>
								<th>Request<br>Date</th>
								<th>Request<br>Number</th>
								<th>User<br>Dept</th>
								<th>Asset&nbsp;Number</th>
								<th>Respond Findings</th>
								<th>Type Of Work</th>
								<th>Status</th>
								<th>Respond<br>Date</th>
							</tr>
							<?php $numrow = 1;foreach ($record as $row): ?>
							<tr>
								<td><?=$numrow++?></td>
								<td><?=isset($row->D_date) ? date("d/m/Y",strtotime($row->D_date)) : ''?></td>
								<td><?=isset($row->V_Request_no) ? $row->V_Request_no : ''?></td>
								<td><?=isset($row->v_UserDeptDesc) ? $row->v_UserDeptDesc : ''?></td>
								<td><?=isset($row->V_Tag_no) ? $row->V_Tag_no : 'N/A'?></td>
								<td style="white-space: wrap; width:100px; word-break: break-all;"><?=isset($row->V_summary) ? $row->V_summary : ''?></td>
								<td><?=isset($row->V_request_type) ? $row->V_request_type : ''?></td>
								<td><?=isset($row->V_request_status) ? $row->V_request_status : ''?></td>
								<td><?=isset($row->v_respondate) ? date("d/m/Y",strtotime($row->v_respondate)) : ''?></td>
							</tr>
							<?php endforeach; ?>
						</table>
						<table class="ui-mobile-table-desk ui-left_mobile" style="color:black;">
							<tbody style="width: 100%;">
							<?php $rownum = 1;foreach ($record as $row): ?>
			    			<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >No</td>
								<td class="td-desk">: <?=$rownum?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Request&nbsp;Date</td>
								<td class="td-desk">: <?= isset($row->D_date) ? date("d/m/Y",strtotime($row->D_date)) : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Request&nbsp;Number</td>
								<td class="td-desk">: <?= isset($row->V_Request_no) ? $row->V_Request_no : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >User&nbsp;Dept</td>
								<td class="td-desk">: <?= isset($row->v_UserDeptDesc) ? $row->v_UserDeptDesc : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Asset&nbsp;Number</td>
								<td class="td-desk">: <?= isset($row->V_Tag_no) ? $row->V_Tag_no : 'N/A'?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Respond&nbsp;Findings</td>
								<td class="td-desk" style="white-space: wrap; width:100px; word-break: break-all;">: <?= isset($row->V_summary) ? $row->V_summary : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Type&nbsp;Of&nbsp;Work</td>
								<td class="td-desk">: <?= isset($row->V_request_type) ? $row->V_request_type : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Status</td>
								<td class="td-desk">: <?= isset($row->V_request_status) ? $row->V_request_status : ''?></td>
							</tr>
							<tr <?=($rownum % 2) == 1 ? 'class="ui-color-color-color"' : 'class="tr_color"'?>>
								<td >Respond&nbsp;Date</td>
								<td class="td-desk">: <?= isset($row->v_respondate) ? date("d/m/Y",strtotime($row->v_respondate)) : ''?></td>
							</tr>
						<?php endforeach;?>
						</tbody>
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
