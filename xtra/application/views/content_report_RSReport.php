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
				Start Date : <input type="te"  id = "date0" name="n_startdate" value="<?=$startdate?>" class="form-control-button2"> <!--<?=$startdate ? date('d-m-Y',strtotime($startdate)) : ''?>-->
			</div>
			<div  class="middle-report-2">
				End Date : <input type="te"  id = "date1" name="n_enddate" value="<?=$enddate?>" class="form-control-button2"> <!--<?=$enddate ? date('d-m-Y',strtotime($enddate)) : ''?>-->
			</div>
			<div  class="middle-report-3">
				<input type="radio" id="radio-1-1" name="n_wotype" class="regular-radio" value = "A"<?=$wotype == 'A' ? 'checked' : 'checked'?>/>   
				<label for="radio-1-1"></label> All Requests <br />
				<input type="radio" id="radio-1-2" name="n_wotype" class="regular-radio" value = "C"<?=$wotype == 'C' ? 'checked' : ''?>/>   
				<label for="radio-1-2"></label> Completed Only <br />
				<input type="radio" id="radio-1-3" name="n_wotype" class="regular-radio" value = "BO"<?=$wotype == 'BO' ? 'checked' : ''?>/>   
				<label for="radio-1-3"></label> Incomplete Only<br /> 
				<input type="hidden" name="data_file" value="Y">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="mysubmit" value="GO">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="myclear" value="CLEAR">
			</div>
			</form>
			<div class="middle-report-4">
				<?php if ($datafile == 'Y' AND $startdate <> '' AND $enddate <> '' AND $error == "") { ?>
				<?php if ($record){ ?>
				<div class="middle-report-5">
				<?php echo form_open('contentcontroller/report_print_RSReport');?>
				<button type="SUBMIT" id="button">Generate</button>
				<input type="hidden" name="daterange[]" value="<?=$startdate?>">
				<input type="hidden" name="daterange[]" value="<?=$enddate?>">
				<input type="hidden" name="wostat" value="<?=$wotype?>">
				</div>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<?php if ($wotype <> 'BO'){ ?>
					<tr>	
						<th>No</th>
						<th>Request<br>Date</th>
						<th>Request<br>Number</th>
						<th>User<br>Dept</th>
						<th>Asset&nbsp;Number<br>Tag&nbsp;Number</th>
						<th>Summary</th>
						<th>Type of Work</th>
						<th>Status</th>
						<th>Completion<br>Date</th>
					</tr>
					<?php } else { ?>
					<tr>	
						<th>No</th>
						<th>Request<br>Date</th>
						<th>Request<br>Number</th>
						<th>User<br>Dept</th>
						<th>Asset&nbsp;Number<br>Tag&nbsp;Number</th>
						<th>Respond Findings</th>
						<th>Type of Work</th>
						<th>Status</th>
						<th>Respond<br>Date</th>
					</tr>
					<?php } ?>
					<?php $num = 1;foreach($record as $row): ?>
					<?php if ($row->V_request_status == 'C'){
							$style = 'blue';
						  }
						  else{
						  	$style = 'red';
						  }
					?>
					<tr>
						<td style="color:<?=$style?>;" align="center"><b><?=$num++?></b></td>
						<td style="color:<?=$style?>;"><?=isset($row->D_date) ? date("d-m-Y",strtotime($row->D_date)) : ''?></td>
						<td style="color:<?=$style?>;"><?= isset($row->V_Request_no)  ? anchor ('contentcontroller/workorderlist?wrk_ord='.$row->V_Request_no,''.$row->V_Request_no.'' ) : ''?></td>
						<td style="color:<?=$style?>;"><?=isset($row->V_User_dept_code) ? $row->V_User_dept_code : ''?></td>
						<td style="color:<?=$style?>;"><?=isset($row->V_Asset_no) ? $row->V_Asset_no.'<br>'.$row->V_Tag_no : ''?></td>
						<?php if ($wotype <> 'BO'){ ?>
						<td style="color:<?=$style?>;"><?=isset($row->V_summary) ? $row->V_summary : ''?></td>
						<?php } else { ?>
						<td style="color:<?=$style?>;"><?=isset($row->v_ActionTaken) ? $row->v_ActionTaken : ''?></td>
						<?php } ?>
						<td style="color:<?=$style?>;"><?=isset($row->V_priority_code) ? $row->V_priority_code : ''?></td>
						<td style="color:<?=$style?>;"><?=isset($row->V_request_status) ? $row->V_request_status : ''?></td>
						<?php if ($wotype <> 'BO'){ ?>
						<td style="color:<?=$style?>;"><?=isset($row->v_closeddate) ? date("d-m-Y",strtotime($row->v_closeddate)) : ''?></td>
						<?php } else { ?>
						<td style="color:<?=$style?>;"><?=isset($row->d_Date) ? date("d-m-Y H:i:s",strtotime($row->d_Date)) : ''?></td>
						<?php } ?>
					</tr>
					<input type="hidden" name="wrk_odrno[]" value="<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>">
					<?php endforeach; ?>
				</table>
				<?php } else { ?>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<td style="color:red; text-align:center; height:50px;" colspan="4">Result: No matching record found.</th>
					</tr>
				</table>
				<?php } ?>
				<?php } else { ?>
				<?php if ($error <> ''){ ?>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<td style="color:red; text-align:center; height:50px;" colspan="4"><?=$error?></th>
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
