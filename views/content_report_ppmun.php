<?php echo form_open('contentcontroller/print_report_ppmun'); ?>
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
			<div class="middle-report-5">
				<table border="0" class="report_table-1">
					<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Date Range</td></tr>
					<tr>
						<td colspan="3">Month and Year the PPM works are intended to happen.</td>
					</tr>
					<tr>
						<td class="report_table-1-td">Month</td>
						<td class="report_table-1-td">Year</td>
						<td></td>
					</tr>
					<tr>
						<td class="report_table-1-td">
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
							<?php echo form_dropdown('m', $month_list, set_value('m',$month) , 'style="background:white;width:100px;" id="cs_month" class="dropdown" '); ?>
						</td>
						<td class="report_table-1-td">
							<?php 
							for ($dyear = date('Y',strtotime("-2 years"));$dyear <= date('Y',strtotime("+1 month"));$dyear++){
							$year_list[$dyear] = $dyear;
							}
							?>
							<?php echo form_dropdown('y', $year_list, set_value('y',$year) , 'style="background:white;" id="cs_year" class="dropdown"'); ?>

							<!--<select class="dropdown" style="background:white;">
								<option  value="2007">2007</option>
								<option  value="2008">2008</option>
								<option  value="2009">2009</option>
								<option  value="2010">2010</option>
								<option  value="2011">2011</option>
								<option  value="2012">2012</option>
								<option  value="2013">2013</option>
								<option  value="2014">2014</option>
								<option  value="2015">2015</option>
								<option  value="2016">2016</option>
								<option  value="2017">2017</option>
								<option  value="2018">2018</option>
								<option  value="2019">2019</option>
								<option  value="2020">2020</option>
							</select>-->
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Contact Persons</td></tr>
					<tr><td colspan="3">Contact Person and Phone Number to appear in the notification</td></tr>
					<tr>
						<td colspan="2"> Name</td>
						<td> Extension</td>
					</tr>
					<tr>
						<td colspan="2"><input type="text" name="p_name" value="" class="form-control-button" style=""></td>
						<td><input type="text" name="p_ext" value="" class="form-control-button2" style=""></td>
					</tr>
					<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">User Department</td></tr>
				</table>
				<div style="border:1px solid #777777;width:405px;position:relative;height:200px;overflow:scroll;">
					<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<th>Code</th>
						<th>Department</th>
					</tr>
					<?php foreach ($record as $row): ?> 
					<tr>
						<td align="left"><input type="checkbox" name="chkbx[]" value="<?=isset($row->v_UserDeptDesc) ? $row->v_UserDeptDesc : ''?>"><b><?=isset($row->v_UserDeptCode) ? $row->v_UserDeptCode : ''?></b></td>
						<td><?=isset($row->v_UserDeptDesc) ? $row->v_UserDeptDesc : ''?></td>
					</tr>
					<?php endforeach; ?> 
				</table>
				</div>
			</div>
			<div  class="middle-report-3">
				<button type="submit" class="btn btn-primary btn-block" id="button">GO</button>
				<button type="reset" class="btn btn-primary btn-block" id="button" >Clear</button>
			</div>
		</div>
	</div>
</div>
</form>
</body>
</html>
