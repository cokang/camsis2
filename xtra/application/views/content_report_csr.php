<div class="ui-middle-screen">
	<div class="content-workorder">
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
				Start Date : <input type="te"  id = "date0" name="n_startdate" value="<?=$startdate?>" class="form-control-button2">
			</div>
			<div  class="middle-report-2">
				End Date : <input type="te"  id = "date1" name="n_enddate" value="<?=$enddate?>" class="form-control-button2">
			</div>
			<div  class="middle-report-3">
				<input type="radio" id="radio-1-1" name="n_wotype" class="regular-radio" value = "A"<?=$wotype == 'A' ? 'checked' : 'checked'?>/>   
				<label for="radio-1-1"></label> All Complaints  <br />
				<input type="radio" id="radio-1-2" name="n_wotype" class="regular-radio" value = "C"<?=$wotype == 'C' ? 'checked' : ''?>/>   
				<label for="radio-1-2"></label> Completed Complaints Only  <br />
				<input type="radio" id="radio-1-3" name="n_wotype" class="regular-radio" value = "BO"<?=$wotype == 'BO' ? 'checked' : ''?>/>   
				<label for="radio-1-3"></label> Incomplete Complaints Only <br />
				<input type="hidden" name="data_file" value="Y">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="mysubmit" value="GO">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="myclear" value="CLEAR">
			</div>
			</form>
			<div class="middle-report-4">
				<?php if ($datafile == 'Y' AND $startdate <> '' AND $enddate <> '' AND $error == "") { ?>
				<?php if ($record){ ?>
				<div class="middle-report-5">
					<?php echo form_open('contentcontroller/print_r_csr');?>
					<button type="submit" class="btn-button btn-primary-button" id="button2">Print Version<span class="icon-printer" style="float:right; margin-top:3px; margin-right:10px; font-size:20px;"></span></button>
					<input type="hidden" name="daterange[]" value="<?=$startdate?>">
					<input type="hidden" name="daterange[]" value="<?=$enddate?>">
					<input type="hidden" name="wostat" value="<?=$wotype?>">
				</div>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<th>No</th>
						<th>Complaint<br>Date</th>
						<th>Complaint<br>Number</th>
						<th>Complaint</th>
						<th>User Dept<br>Code</th>
						<th>Source</th>
						<th>Request<br>Number</th>
						<th>Completion<br>Date</th>

					</tr>
					<?php $num = 1;foreach($record as $row): ?>
					<?php if ($row->v_ComplaintStatus == 'C'){
							$style = 'blue';
						  }
						  else{
						  	$style = 'red';
						  }
					?>
					<tr>
						<td style="color:<?=$style?>;"  align="center"><b><?=$num++?></b></td>
						<td style="color:<?=$style?>;" ><?=isset($row->d_ComplaintDt) ? date("d-m-Y",strtotime($row->d_ComplaintDt)) : ''?></td>
						<td style="color:<?=$style?>;" ><?=isset($row->v_ComplaintNo) ? $row->v_ComplaintNo : ''?></td>
						<td style="color:<?=$style?>;" ><?=isset($row->v_Complaint) ? $row->v_Complaint : ''?></td>
						<td style="color:<?=$style?>;" ><?=isset($row->v_UserDeptCode) ? $row->v_UserDeptCode : ''?></td>
						<td style="color:<?=$style?>;" ><?=isset($row->v_Source) ? $row->v_Source : ''?></td>
						<td style="color:<?=$style?>;" ><?=isset($row->v_RequestNo) ? $row->v_RequestNo : ''?></td>
						<td style="color:<?=$style?>;" ><?=isset($row->d_CompleteDt) ? date("d-m-Y",strtotime($row->d_CompleteDt)) : ''?></td>
					</tr>
					<input type="hidden" name="wrk_odrno[]" value="<?=isset($row->v_ComplaintNo) ? $row->v_ComplaintNo : ''?>">
					<?php endforeach;?>
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
   //$(document).ready(function(){
    //$('.check:button').toggle(function(){
    //    $('input:checkbox').attr('checked','checked');
   //     $(this).val('Deselect all')
    //},function(){
    //    $('input:checkbox').removeAttr('checked');
    //    $(this).val('Select All');        
    //})
//})
   </script>
</body>
</html>
