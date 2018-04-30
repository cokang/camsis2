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
				<input type="hidden" name="data_file" value="Y">
				<button class="btn btn-primary btn-block buttoncss" id="GO" >GO</button> 
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="myclear" value="CLEAR">
			</div>
			</form>
			<div class="middle-report-4">
				<?php if ($datafile == 'Y' AND $startdate <> '' AND $enddate <> '' AND $error == "") { ?>
				<?php if ($record){ ?>
				<div class="middle-report-5">
				<?php echo form_open('contentcontroller/report_print_RPPMW');?>
					<button type="submit" id="button">Generate</button>
					<input type="hidden" name="daterange[]" value="<?=$startdate?>">
					<input type="hidden" name="daterange[]" value="<?=$enddate?>">
				</div>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<th>No</th>
						<th>Due<br>Date</th>
						<th>WO<br>Number</th>
						<th>User<br>Dept</th>
						<th>Asset<br>Number</th>
						<th>Summary</th>
						<th>Job<br>Type</th>
						<th>Status</th>
						<th>Completion<br>Date</th>

					</tr>
					<?php $num = 1; foreach ($records as $list): ?>
					<?php foreach ($list as $row): ?>
					<tr>
						<td align="center"><b><?=$num++?></b></td>
						<td><?=isset($row->d_DueDt) ? date("d-m-Y",strtotime($row->d_DueDt)) : ''?></td>
						<td><?=isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : ''?></td>
						<td><?=isset($row->V_User_Dept_code) ? $row->V_User_Dept_code : ''?></td>
						<td><?=isset($row->v_Asset_no) ? $row->v_Asset_no : ''?></td>
						<td><?=isset($row->v_Remarks) ? $row->v_Remarks : ''?></td>
						<td><?=isset($row->v_jobtype) ? $row->v_jobtype : ''?></td>
						<td><?=isset($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : ''?></td>
						<td><?=isset($row->v_closeddate) ? date("d-m-Y",strtotime($row->v_closeddate)) : ''?></td>
					</tr>
					<?php endforeach; ?>
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
   //$(document).ready(function(){
    //$('.check:button').toggle(function(){
    //    $('input:checkbox').attr('checked','checked');
    //    $(this).val('Deselect all')
    //},function(){
    //    $('input:checkbox').removeAttr('checked');
    //    $(this).val('Select All');        
    //})
//})   </script>
</body>
</html>
