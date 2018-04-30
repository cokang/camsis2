<div class="ui-middle-screen">
	<?php include 'content_menu_acg.php';?>
	<div class="content-workorder">
		<div Class="main-cs">
	<div Class="form-cs">
	
<span style="color:red;"><?php echo validation_errors(); ?>	
<form action="" method="POST">
		 <fieldset>
		  <legend>Form >> Customize Search</legend>
		  <table style="color:black;">
		  	<tr>
		  		<td Width="200px">Service Code</td>
		  		<td> : 
		  			
		  			<?php 
						$base_list = array(
						'BES' => 'BES',
						'FES' => 'FES',
						'HKS' => 'HKS',
						'Security' => 'Security'
					 );
					?>
					<?php echo form_dropdown('n_base', $base_list, set_value('n_base',isset($record[0]->Service_Code) ? $record[0]->Service_Code : '') , 'style="width: 80px;font-size:14px;" id="service_code" onchange="javascript: submit()"'); ?> 
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>Period</td>
		  		<td> :
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
					<?php echo form_dropdown('fromMonth', $month_list, set_value('fromMonth', isset($record[0]->Month) ? $record[0]->Month : $month) , 'style="width: 90px; font-size:14px;" id="cs_month" onchange="javascript: submit()"'); ?>
					
					<?php 
						for ($dyear = '2015';$dyear <= $year;$dyear++){
							$year_list[$dyear] = $dyear;
						}
					?>
					<?php echo form_dropdown('fromYear', $year_list, set_value('fromYear', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px; font-size:14px;" id="cs_year" onchange="javascript: submit()"'); ?>  
		  			
		  		</td>
		  	</tr>
		  </table>
		 </fieldset>
		 </form>
	</div>
	<form action="" method="POST" name="myform">
	<div class="form-fp">
		<fieldset>
		  <legend>Form >> Fill Parameter</legend>
		  <table width="100%" style="color:black; border:1px solid black;">
		  	<tr>
		  		<td Width="200px">Previous Month Revenue</td>
		  		<td> : RM <?= isset($prev[0]->n_Revenue) ? number_format($prev[0]->n_Revenue,2) : 'N/A' ?>
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>Monthly Revenue <span style="color:red;">*</span></td>
					<?php if ($keyindicator) {?>
		  		<td> : <input type="text" name="n_monthly" value="<?php echo set_value("n_monthly",isset($keyindicator[0]->n_Revenue) ? $keyindicator[0]->n_Revenue : '')?>" onkeyup="myFunction_cdm()" id="cdm_disableMe"/>
					<?php } else { ?>
					<td> : <input type="text" name="n_monthly" value="<?php echo set_value("n_monthly",isset($prev[0]->n_Revenue) ? number_format($prev[0]->n_Revenue,2) : 'N/A')?>" onkeyup="myFunction_cdm()" id="cdm_disableMe"/>
					<?php } ?>
		  		</td>
					<script>
					function myFunction_cdm() {
									var x = document.getElementById("cdm_disableMe").value;
									document.getElementById("cdm1_disableMe2").value = x * 1;
									document.getElementById("cdm2_disableMe2").value = x * 2;
									document.getElementById("cdm3_disableMe2").value = x * 3;
									document.getElementById("cdm4_disableMe2").value = x * 4;
									document.getElementById("cdm5_disableMe2").value = x * 5;
									document.getElementById("cdm6_disableMe2").value = x * 6;
									document.getElementById("cdm7_disableMe2").value = x * 7;
									document.getElementById("cdm8_disableMe2").value = x * 8;
									document.getElementById("cdm9_disableMe2").value = x * 9;
									document.getElementById("cdm10_disableMe2").value = x * 10;
									document.getElementById("cdm11_disableMe2").value = x * 11;
								}
					</script>
		  	</tr>
		  	<tr>
		  		<td COlspan="2">
		  			<table class="tbl-ind" style="color:black;" id="no-more-tables">
						<thead>
		  				<tr>
		  					<th>Indicator</th>
		  					<th>Key Deductions Indicators</th>
		  					<th>Previous Month Value (<?= date('M',strtotime($pdate)).' '.date('Y',strtotime($pdate))?>)</th>
		  					<th>Current Month Value (<?= substr(date('M',mktime(0, 0, 0, $fmonth, 10)),0,3).' '.$fyear ?>)</th>
		  					<th>Parameter</th>
		  					<th>Dimerit Point</th>
		  				</tr>
						</thead>
						<tbody>
						<?php if ($keyindicator) { ?>
						<?php foreach ($keyindicator as $row): ?>
						<tr>
		  					<td align="center"><?=isset($row->v_IndicatorNo) ? $row->v_IndicatorNo : ''?><input type="hidden" name="v_IndicatorNo[]" value="<?php echo set_value("v_IndicatorNo[]",isset($row->v_IndicatorNo) ? $row->v_IndicatorNo : '')?>"/></td>
		  					<td><?=isset($row->v_IndicatorName) ? $row->v_IndicatorName : ''?></td>
		  					<?php if ($prev) { ?>
		  					<?php foreach ($prev as $list): ?>
		  					<?php if ($list->v_IndicatorNo == $row->v_IndicatorNo){ ?>
		  					<td align="right"><?= isset($list->n_Parameters) ? number_format($list->n_Parameters,2) : 'N/A' ?></td>
		  					<?php } ?>
		  					<?php endforeach; ?>
		  					<?php } else { ?>
		  					<td align="right"></td>
		  					<?php } ?>
		  					<td align="center"><input type="text" name="n_indicatorval[]" id="cdm<?=isset($row->v_IndicatorNo) ? $row->v_IndicatorNo : ''?>_disableMe2" value="<?php echo set_value("n_indicatorval[]",isset($row->n_Parameters) ? $row->n_Parameters : '')?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter[]" value="<?php echo set_value("n_parameter[]",isset($row->v_Paramval) ? $row->v_Paramval : '')?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit[]" value="<?php echo set_value("n_demerit[]",isset($row->Demerit_Point) ? $row->Demerit_Point : '')?>"/></td>
		  				</tr>
		  				<?php endforeach; ?>
		  				<?php } else { $nilaikire = 0; ?>
		  				<?php foreach ($keyindlist as $row): ?>
							<tr>
		  					<td align="center"><?=isset($row->v_IndicatorNo) ? $row->v_IndicatorNo : ''?><input type="hidden" name="v_IndicatorNo[]" value="<?php echo set_value("v_IndicatorNo[]",isset($row->v_IndicatorNo) ? $row->v_IndicatorNo : '')?>"/></td>
		  					<td><?=isset($row->v_IndicatorName) ? $row->v_IndicatorName : ''?></td>
		  					<!--bn-->
								<?php //echo print_r($prev[$nilaikire]->n_Parameters.", ");?>
								<td align="right"><?=isset($prev[$nilaikire]->n_Parameters) ? $prev[$nilaikire]->n_Parameters : ''?></td>
								<!--bn-->
		  					<td align="center"><input type="text" name="n_indicatorval[]" value="<?php echo set_value("n_indicatorval[]",isset($prev[$nilaikire]->n_Parameters) ? $prev[$nilaikire]->n_Parameters : '')?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter[]" value="<?php echo set_value("n_parameter[]")?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit[]" value="<?php echo set_value("n_demerit[]")?>"/></td>
		  				</tr>
		  				<?php $nilaikire++; endforeach; ?>
		  				<?php } ?>
		  				<!--<tr>
		  					<td align="center">1</td>
		  					<td>Is there any Biomedicial equiment required for use which are not available</td>
		  					<td align="right"><?= isset($prec[0]->Indicator_Value) ? number_format($prec[0]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval1" value="<?=isset($record[0]->Indicator_Value) ? $record[0]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter1" value="<?=isset($record[0]->Parameter) ? $record[0]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit1" value="<?=isset($record[0]->Demerit_Point) ? $record[0]->Demerit_Point : ''?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">2</td>
		  					<td>Has PPM been completed for the month?</td>
		  					<td align="right"><?= isset($prec[1]->Indicator_Value) ? number_format($prec[1]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval2" value="<?=isset($record[1]->Indicator_Value) ? $record[1]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter2" value="<?=isset($record[1]->Parameter) ? $record[1]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit2" value="<?=isset($record[1]->Demerit_Point) ? $record[1]->Demerit_Point : ''?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">3</td>
		  					<td>Has PPM been completed for the month on time to schedule</td>
		  					<td align="right"><?= isset($prec[2]->Indicator_Value) ? number_format($prec[2]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval3" value="<?=isset($record[2]->Indicator_Value) ? $record[2]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter3" value="<?=isset($record[2]->Parameter) ? $record[2]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit3" value="<?=isset($record[2]->Demerit_Point) ? $record[2]->Demerit_Point : ''?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">4</td>
		  					<td>Are all application statutory requirements complied with and are the systems operated correctly</td>
		  					<td align="right"><?= isset($prec[3]->Indicator_Value) ? number_format($prec[3]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval4" value="<?=isset($record[3]->Indicator_Value) ? $record[3]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter4" value="<?=isset($record[3]->Parameter) ? $record[3]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit4" value="<?=isset($record[3]->Demerit_Point) ? $record[3]->Demerit_Point : ''?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">5</td>
		  					<td>Has user training been completed according to schedule ?</td>
		  					<td align="right"><?= isset($prec[4]->Indicator_Value) ? number_format($prec[4]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval5" value="<?=isset($record[4]->Indicator_Value) ? $record[4]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter5" value="<?=isset($record[4]->Parameter) ? $record[4]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit5" value="<?=isset($record[4]->Demerit_Point) ? $record[4]->Demerit_Point : ''?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">6</td>
		  					<td>Has the testing and commissioning been witnessed and verified ?</td>
		  					<td align="right"><?= isset($prec[5]->Indicator_Value) ? number_format($prec[5]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval6" value="<?=isset($record[5]->Indicator_Value) ? $record[5]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter6" value="<?=isset($record[5]->Parameter) ? $record[5]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit6" value="<?=isset($record[5]->Demerit_Point) ? $record[5]->Demerit_Point : ''?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">7</td>
		  					<td>Has the appropriate Response Time been met for service request for the month ?</td>
		  					<td align="right"><?= isset($prec[6]->Indicator_Value) ? number_format($prec[6]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval7" value="<?=isset($record[6]->Indicator_Value) ? $record[6]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter7" value="<?=isset($record[6]->Parameter) ? $record[6]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit7" value="<?=isset($record[6]->Demerit_Point) ? $record[6]->Demerit_Point : ''?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">8</td>
		  					<td>Are all reports submitted on the time ?</td>
		  					<td align="right"><?= isset($prec[7]->Indicator_Value) ? number_format($prec[7]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval8" value="<?=isset($record[7]->Indicator_Value) ? $record[7]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter8" value="<?=isset($record[7]->Parameter) ? $record[7]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit8" value="<?=isset($record[7]->Demerit_Point) ? $record[7]->Demerit_Point : ''?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">9</td>
		  					<td>Has safety & performance test been completed on the equipment maintained during the month ?</td>
		  					<td align="right"><?= isset($prec[8]->Indicator_Value) ? number_format($prec[8]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval9" value="<?=isset($record[8]->Indicator_Value) ? $record[8]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter9" value="<?=isset($record[8]->Parameter) ? $record[8]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit9" value="<?=isset($record[8]->Demerit_Point) ? $record[8]->Demerit_Point : ''?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">10</td>
		  					<td>Are all reports and records accurate and correct ?</td>
		  					<td align="right"><?= isset($prec[9]->Indicator_Value) ? number_format($prec[9]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval10" value="<?=isset($record[9]->Indicator_Value) ? $record[9]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter10" value="<?=isset($record[9]->Parameter) ? $record[9]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit10" value="<?=isset($record[9]->Demerit_Point) ? $record[9]->Demerit_Point : ''?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">11</td>
		  					<td>Have all work request been completed within the agreed days of 15 days ?</td>
		  					<td align="right"><?= isset($prec[10]->Indicator_Value) ? number_format($prec[10]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval11" value="<?=isset($record[10]->Indicator_Value) ? $record[10]->Indicator_Value : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_parameter11" value="<?=isset($record[10]->Parameter) ? $record[10]->Parameter : ''?>"/></td>
		  					<td align="center"><input type="text" name="n_demerit11" value="<?=isset($record[10]->Demerit_Point) ? $record[10]->Demerit_Point : ''?>"/></td>
		  				</tr>-->
		  				<tr>
		  					<td colspan="6" align="center"><input type="submit" name="mysubmit" value="Submit" onclick="javascript: myform.action='<?php echo base_url();?>index.php/customize_search_ctrl';" style="font-size:15px;"> <a href="<?php echo base_url();?>index.php/contentcontroller/content/<?php echo $this->session->userdata('usersess')?>" class="a-back">Back</a></td>
		  				</tr>
						</tbody>
		  			</table>
		  		</td>
		  	</tr>
		  </table>
		 </fieldset>
		 <?php  echo form_hidden('n_base',isset($s_code) ? $s_code : ''); ?>
		 <?php  echo form_hidden('fromMonth',isset($fmonth) ? $fmonth : ''); ?>
		 <?php  echo form_hidden('fromYear',isset($fyear) ? $fyear : ''); ?>
	</div>
	</div>
	</form>
	</div>
</div>
</body>
</html>