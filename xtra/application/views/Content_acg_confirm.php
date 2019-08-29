<body class="body_acg">
	<div Class="main-cs">
	<div Class="form-cs">
		<?php echo form_open('customize_search_ctrl/confirmation');?>
		 <fieldset>
		  <legend>Form >> Customize Search</legend>
		  <table>
		  	<tr>
		  		<td Width="200px">Hospital Code</td>
		  		<td> : 
		  			<?php 
						$base_list = array(
						'BES' => 'BES',
						'FES' => 'FES',
						'HKS' => 'HKS',
						'Security' => 'Security'
					 );
					?>
					<?php echo form_dropdown('n_base', $base_list, set_value('n_base') , 'style="width: 80px;" disabled'); ?> 
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
						'08 ' => 'August',
						'09' => 'September',
						'10' => 'October',
						'11' => 'November',
						'12' => 'December'
					 );
					?>
					<?php echo form_dropdown('fromMonth', $month_list, set_value('fromMonth') , 'style="width: 90px;" disabled'); ?>
					<?php 
						for ($dyear = '2015';$dyear <= $year;$dyear++){
							$year_list[$dyear] = $dyear;
						}
					?>
					<?php echo form_dropdown('fromYear', $year_list, set_value('fromYear') , 'style="width: 65px;" disabled'); ?>  
		  		</td>
		  	</tr>
		  </table>
		 </fieldset>
	</div>
	<div class="form-fp">
		<fieldset>
		  <legend>Form >> Fill Parameter</legend>
		  <table width="100%">
		  	<tr>
		  		<td Width="200px">Previous Month Revenue</td>
		  		<td> : RM <?= isset($prev[0]->Monthly_Revenue) ? number_format($prev[0]->Monthly_Revenue,2) : 'N/A' ?>
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>Monthly Revenue <span style="color:red;">*</span></td>
		  		<td> : <input type="text" name="n_monthly" value="<?php echo set_value('n_monthly')?>" disabled/>
		  		</td>
		  	</tr>
		  	<tr>
		  		<td COlspan="2">
		  			<table class="tbl-ind">
		  				<tr>
		  					<th>Indicator</th>
		  					<th>Key Deductions Indicators</th>
		  					<th>Previous Month Value (<?= date('M',strtotime($pdate)).' '.date('Y',strtotime($pdate))?>)</th>
		  					<th>Current Month Value (<?= substr(date('M',mktime(0, 0, 0, $fmonth, 10)),0,3).' '.$fyear ?>)</th>
		  					<th>Parameter (<?= substr(date('M',mktime(0, 0, 0, $fmonth, 10)),0,3).' '.$fyear ?>)</th>
		  					<th>Dimerit Point (<?= substr(date('M',mktime(0, 0, 0, $fmonth, 10)),0,3).' '.$fyear ?>)</th>
		  				</tr>
		  				<?php foreach($keyindlist as $row): ?>
		  				<tr>
		  					<td align="center"><?=isset($row->v_IndicatorNo) ? $row->v_IndicatorNo : ''?></td>
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
		  					<td align="center"><input type="text" name="n_indicatorval[]" value="<?php echo set_value('n_indicatorval[]')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter[]" value="<?php echo set_value('n_parameter[]')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit[]" value="<?php echo set_value('n_demerit[]')?>"  disabled/></td>
		  				</tr>
		  				<?php endforeach; ?>
		  				<!--<tr>
		  					<td align="center">1</td>
		  					<td>Is there any Biomedicial equiment required for use which are not available</td>
		  					<td align="right"><?= isset($prec[0]->Indicator_Value) ? number_format($prec[0]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval1" value="<?php echo set_value('n_indicatorval1')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter1" value="<?php echo set_value('n_parameter1')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit1" value="<?php echo set_value('n_demerit1')?>"  disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">2</td>
		  					<td>Has PPM been completed for the month?</td>
		  					<td align="right"><?= isset($prec[1]->Indicator_Value) ? number_format($prec[1]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval2" value="<?php echo set_value('n_indicatorval2')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter2" value="<?php echo set_value('n_parameter2')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit2" value="<?php echo set_value('n_demerit2')?>"  disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">3</td>
		  					<td>Has PPM been completed for the month on time to schedule</td>
		  					<td align="right"><?= isset($prec[2]->Indicator_Value) ? number_format($prec[2]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval3" value="<?php echo set_value('n_indicatorval3')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter3" value="<?php echo set_value('n_parameter3')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit3" value="<?php echo set_value('n_demerit3')?>"  disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">4</td>
		  					<td>Are all application statutory requirements complied with and are the systems operated correctly</td>
		  					<td align="right"><?= isset($prec[3]->Indicator_Value) ? number_format($prec[3]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval4" value="<?php echo set_value('n_indicatorval4')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter4" value="<?php echo set_value('n_parameter4')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit4" value="<?php echo set_value('n_demerit4')?>"  disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">5</td>
		  					<td>Has user training been completed according to schedule ?</td>
		  					<td align="right"><?= isset($prec[4]->Indicator_Value) ? number_format($prec[4]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval5" value="<?php echo set_value('n_indicatorval5')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter5" value="<?php echo set_value('n_parameter5')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit5" value="<?php echo set_value('n_demerit5')?>"  disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">6</td>
		  					<td>Has the testing and commissioning been witnessed and verified ?</td>
		  					<td align="right"><?= isset($prec[5]->Indicator_Value) ? number_format($prec[5]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval6" value="<?php echo set_value('n_indicatorval6')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter6" value="<?php echo set_value('n_parameter6')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit6" value="<?php echo set_value('n_demerit6')?>"  disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">7</td>
		  					<td>Has the appropriate Response Time been met for service request for the month ?</td>
		  					<td align="right"><?= isset($prec[6]->Indicator_Value) ? number_format($prec[6]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval7" value="<?php echo set_value('n_indicatorval7')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter7" value="<?php echo set_value('n_parameter7')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit7" value="<?php echo set_value('n_demerit7')?>"  disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">8</td>
		  					<td>Are all reports submitted on the time ?</td>
		  					<td align="right"><?= isset($prec[7]->Indicator_Value) ? number_format($prec[7]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval8" value="<?php echo set_value('n_indicatorval8')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter8" value="<?php echo set_value('n_parameter8')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit8" value="<?php echo set_value('n_demerit8')?>"  disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">9</td>
		  					<td>Has safety & performance test been completed on the equipment maintained during the month ?</td>
		  					<td align="right"><?= isset($prec[8]->Indicator_Value) ? number_format($prec[8]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval9" value="<?php echo set_value('n_indicatorval9')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter9" value="<?php echo set_value('n_parameter9')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit9" value="<?php echo set_value('n_demerit9')?>"  disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">10</td>
		  					<td>Are all reports and records accurate and correct ?</td>
		  					<td align="right"><?= isset($prec[9]->Indicator_Value) ? number_format($prec[9]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval10" value="<?php echo set_value('n_indicatorval10')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter10" value="<?php echo set_value('n_parameter10')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit10" value="<?php echo set_value('n_demerit10')?>"  disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">11</td>
		  					<td>Have all work request been completed within the agreed days of 15 days ?</td>
		  					<td align="right"><?= isset($prec[10]->Indicator_Value) ? number_format($prec[10]->Indicator_Value,2) : 'N/A' ?></td>
		  					<td align="center"><input type="text" name="n_indicatorval11" value="<?php echo set_value('n_indicatorval11')?>" disabled/></td>
		  					<td align="center"><input type="text" name="n_parameter11" value="<?php echo set_value('n_parameter11')?>"  disabled/></td>
		  					<td align="center"><input type="text" name="n_demerit11" value="<?php echo set_value('n_demerit11')?>"  disabled/></td>
		  				</tr>-->
		  				<tr>
		  					<td colspan="6" align="center"><input type="submit" value="Save"> <a href="contentcontroller/acg" class="a-back">Cancel</a></td>
		  				</tr>
		  			</table>
		  		</td>
		  	</tr>
		  </table>
		  <?php  echo form_hidden('n_base',$this->input->post('n_base')); ?>
		  <?php  echo form_hidden('fromMonth',$this->input->post('fromMonth')); ?>
		  <?php  echo form_hidden('fromYear',$this->input->post('fromYear')); ?>
		  <?php  echo form_hidden('n_monthly',$this->input->post('n_monthly')); ?>
		  <?php  echo form_hidden('v_IndicatorNo',$this->input->post('v_IndicatorNo')); ?>
		  <?php  echo form_hidden('n_indicatorval',$this->input->post('n_indicatorval')); ?>
		  <?php  echo form_hidden('n_parameter',$this->input->post('n_parameter')); ?>
		  <?php  echo form_hidden('n_demerit',$this->input->post('n_demerit')); ?>

		  <!--<?php  echo form_hidden('n_indicatorval1',$this->input->post('n_indicatorval1')); ?>
		  <?php  echo form_hidden('n_indicatorval2',$this->input->post('n_indicatorval2')); ?>
		  <?php  echo form_hidden('n_indicatorval3',$this->input->post('n_indicatorval3')); ?>
		  <?php  echo form_hidden('n_indicatorval4',$this->input->post('n_indicatorval4')); ?>
		  <?php  echo form_hidden('n_indicatorval5',$this->input->post('n_indicatorval5')); ?>
		  <?php  echo form_hidden('n_indicatorval6',$this->input->post('n_indicatorval6')); ?>
		  <?php  echo form_hidden('n_indicatorval7',$this->input->post('n_indicatorval7')); ?>
		  <?php  echo form_hidden('n_indicatorval8',$this->input->post('n_indicatorval8')); ?>
		  <?php  echo form_hidden('n_indicatorval9',$this->input->post('n_indicatorval9')); ?>
		  <?php  echo form_hidden('n_indicatorval10',$this->input->post('n_indicatorval10')); ?>
		  <?php  echo form_hidden('n_indicatorval11',$this->input->post('n_indicatorval11')); ?>-->

		  <!--<?php  echo form_hidden('n_parameter1',$this->input->post('n_parameter1')); ?>
		  <?php  echo form_hidden('n_parameter2',$this->input->post('n_parameter2')); ?>
		  <?php  echo form_hidden('n_parameter3',$this->input->post('n_parameter3')); ?>
		  <?php  echo form_hidden('n_parameter4',$this->input->post('n_parameter4')); ?>
		  <?php  echo form_hidden('n_parameter5',$this->input->post('n_parameter5')); ?>
		  <?php  echo form_hidden('n_parameter6',$this->input->post('n_parameter6')); ?>
		  <?php  echo form_hidden('n_parameter7',$this->input->post('n_parameter7')); ?>
		  <?php  echo form_hidden('n_parameter8',$this->input->post('n_parameter8')); ?>
		  <?php  echo form_hidden('n_parameter9',$this->input->post('n_parameter9')); ?>
		  <?php  echo form_hidden('n_parameter10',$this->input->post('n_parameter10')); ?>
		  <?php  echo form_hidden('n_parameter11',$this->input->post('n_parameter11')); ?>-->

		  <!--<?php  echo form_hidden('n_demerit1',$this->input->post('n_demerit1')); ?>
		  <?php  echo form_hidden('n_demerit2',$this->input->post('n_demerit2')); ?>
		  <?php  echo form_hidden('n_demerit3',$this->input->post('n_demerit3')); ?>
		  <?php  echo form_hidden('n_demerit4',$this->input->post('n_demerit4')); ?>
		  <?php  echo form_hidden('n_demerit5',$this->input->post('n_demerit5')); ?>
		  <?php  echo form_hidden('n_demerit6',$this->input->post('n_demerit6')); ?>
		  <?php  echo form_hidden('n_demerit7',$this->input->post('n_demerit7')); ?>
		  <?php  echo form_hidden('n_demerit8',$this->input->post('n_demerit8')); ?>
		  <?php  echo form_hidden('n_demerit9',$this->input->post('n_demerit9')); ?>
		  <?php  echo form_hidden('n_demerit10',$this->input->post('n_demerit10')); ?>
		  <?php  echo form_hidden('n_demerit11',$this->input->post('n_demerit11')); ?>-->

		 </fieldset>
	</div>
	</div>
</body>
</html>