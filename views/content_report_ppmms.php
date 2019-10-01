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
				Select Month and Year : 
				<?php 
				$month_list = array(
				'01' => 'January',
				'02' => 'February',
				'03' => 'March',
				'04' => 'April',
				'05' => 'May',
				'06' => 'June',
				'07' => 'July',
				'08' => 'August',
				'09' => 'September',
				'10' => 'October',
				'11' => 'November',
				'12' => 'December'
			 	);
				?>
				<?php echo form_dropdown('m', $month_list, set_value('m',$month) , 'style="width:20%;background:white;" id="cs_month" class="dropdown" '); ?>
			</div>
			<div  class="middle-report-2">
				<?php 
				for ($dyear = '2015';$dyear <= date('Y');$dyear++){
				$year_list[$dyear] = $dyear;
				}
				?>
				<?php echo form_dropdown('y', $year_list, set_value('y',$year) , 'style="width:20%;background:white;" id="cs_year" class="dropdown"'); ?>
			</div>
			<div  class="middle-report-3">
				<input type="hidden" name="data_file" value="Y">
				<button class="btn btn-primary btn-block buttoncss" id="GO" >GO</button> 
				<!--<button type="reset" class="btn btn-primary btn-block buttoncss" id="Clear" >Clear</button>-->
			</div>
			</form>
			<div class="middle-report-4">
				<?php if ($datafile == 'Y') { ?>
				<?php if ($record){ ?>
				<div class="middle-report-5">
				<?php echo form_open('contentcontroller/report_print_ppmms');?>
				<button type="sumbit" id="button">Generate</button>
				<input type="hidden" name="n_month" value="<?=$month?>">
				<input type="hidden" name="n_year" value="<?=$year?>">
				</div>
				<table class="tftabledetail" border="0" style="text-align:center;table-layout: fixed;">
					<tr>
						<th rowspan="2">No</th>
						<th rowspan="2">Due<br>Date</th>
						<th rowspan="2">PPM<br>Work Order</th>
						<th rowspan="2">Asset&nbsp;No<br>Tag&nbsp;Number</th>
						<th rowspan="2">Equipment<br>Name</th>
						<th rowspan="2">UDP</th>
						<th rowspan="2">Freq</th>
						<th rowspan="2">Status</th>
						<th colspan="2">Test</th>
						<th rowspan="2">Completion<br>Date</th>
						<th rowspan="2">Remarks</th>
					</tr>
					<tr>
						<th>S</th>
						<th>P</th>
					</tr>
					<?php $num = 1;foreach ($record as $row): ?>
					<?php if ($row->v_Wrkordstatus == 'C' OR $row->v_Wrkordstatus == 'CR'){
							$style = 'blue';
						  }
						  else{
						  	$style = 'red';
						  }
					?>
					<tr>
						<td style="color:<?=$style?>; word-wrap:break-word;" align="center"><b><?=$num++?></b></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->d_DueDt) ? date("d-m-Y",strtotime($row->d_DueDt)) : ''?></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : ''?></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->v_Asset_no) ? $row->v_Asset_no.'<br>'.$row->V_Tag_no : ''?></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->V_Asset_name) ? $row->V_Asset_name : ''?></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->V_User_Dept_code) ? $row->V_User_Dept_code : ''?></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->v_jobtype) ? $row->v_jobtype : ''?></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : ''?></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->v_stest) ? ($row->v_stest == 'Done' ? 'Y' : 'N') : ''?></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->v_ptest) ? ($row->v_ptest == 'Done' ? 'Y' : 'N') : ''?></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->v_closeddate) ? date("d-m-Y",strtotime($row->v_closeddate)) : ''?></td>
						<td style="color:<?=$style?>; word-wrap:break-word;"><?=isset($row->v_Remarks) ? $row->v_Remarks : ''?></td>
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
</body>
</html>
