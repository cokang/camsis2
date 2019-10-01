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
				Start Date : <input type="te"  id = "date0" name="n_startdate" value="<?=$startdate ? date('d-m-Y',strtotime($startdate)) : ''?>" class="form-control-button2">
			</div>
			<div  class="middle-report-2">
				End Date : <input type="te"  id = "date1" name="n_enddate" value="<?=$enddate ? date('d-m-Y',strtotime($enddate)) : ''?>" class="form-control-button2">
			</div>
			<div  class="middle-report-3">
				<span style="color:red;">*PPM Bulk Print is limited to per week basis</span>
			</div>
			<div  class="middle-report-3">
				<input type="hidden" name="data_file" value="Y">
				<!--<button class="btn btn-primary btn-block buttoncss" id="GO" >GO</button>--> 
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="mysubmit" value="GO">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="myclear" value="CLEAR">
				<!--<button type="report_selection" class="btn btn-primary btn-block buttoncss" id="Clear" >Clear</button>-->
			</div>
			</form>
			<div class="middle-report-4">
				<?php if ($datafile == 'Y' AND $startdate <> '' AND $enddate <> '' AND $error == "") { ?>
				<?php if ($record){ ?>
				<div class="middle-report-5">
				<?php echo form_open('contentcontroller/print_ppm');?>
					<button type="submit" >Generate</button>
					<input type="button" class="check" value="Select All" />
				</div>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<th>Work Order Number</th>
						<th>Asset Number</th>
						<th>Tag Number</th>
						<th>Department Code</th>
					</tr>
					<?php $num=1;foreach ($record as $row): ?>
					<tr>
						<td align="left"><input type="checkbox" name="chk_bxppm[]" value="<?= isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : '' ?>" class="cb-element"><b><?= isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : '' ?></b></td>
						<td><?= isset($row->v_Asset_no) ? $row->v_Asset_no : '' ?></td>
						<td><?= isset($row->V_Tag_no) ? $row->V_Tag_no : '' ?></td>
						<td><?= isset($row->V_User_Dept_code) ? $row->V_User_Dept_code : '' ?></td>
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
				<?php } else { ?>
				<?php if ($error <> ''){ ?>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<td style="color:red; text-align:center; height:50px;" colspan="4"><?=$error?></th>
					</tr>
				</table>
				<?php } ?>
				<?php } ?>
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
   $(document).ready(function(){
    $('.check:button').toggle(function(){
        $('input:checkbox').attr('checked','checked');
        $(this).val('Deselect all')
    },function(){
        $('input:checkbox').removeAttr('checked');
        $(this).val('Select All');        
    })
})
   </script>
</body>
</html>
