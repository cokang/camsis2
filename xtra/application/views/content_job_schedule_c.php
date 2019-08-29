<?php echo form_open('job_scheduler_ctrl/confirmation');?>
<body style="margin:0px;">
		<table class="tftable2" border="0"  style="color:black;" cellpadding="4" cellspacing="0">
				<tr class="ui-color-contents-style-1" height="40px">
					<?php
					$Scheduler = $this->input->post('p');
					switch ($Scheduler) {
					case "PWMP":
					$Scheduler_name = 'PERIODIC WORK ( MONTHLY PLANNER )';
					break;
    				case "WPP":
    				$Scheduler_name = 'WEEKLY / PERIODIC PLANNER';
    				break;
    				case "SWRJI":
    				$Scheduler_name = 'SCHEDULE OF WEEKLY ROUTINE JOINT INSPECTION';
    				break;
    				case "GWCS":
    				$Scheduler_name = 'GENERAL WASTE COLLECTION SCHEDULE';
    				break;
					case "SPW":
    				$Scheduler_name = 'SCHEDULE PERIODIC WORK';
    				break;
    				case "DCA":
    				$Scheduler_name = 'DAILY CLEANING ACTIVITY';
    				break;
    				case "DCAP":
    				$Scheduler_name = 'DAILY CLEANSING ACTIVITIES PLANNER';
    				break;
					default:
    				$Scheduler_name = '';
    				}
 					?>
					<td class="ui-header-new" colspan="2"><b>Confirm Job Schedule - <?=$Scheduler_name?></b></td>
				</tr>
				<tr class="ui-color-contents-style-1">
					<td>
						<form>
							<div class="container">
							    <div class="left">
							    	<fieldset> 
							    		<legend>Occurs</legend>
							    			<input type="radio" id="radio-1-1" name="n_occur" class="regular-radio" <?php echo set_radio('n_occur', 'Daily',true); ?>disabled/>   
											<label for="radio-1-1"></label> Daily<br>
											<input type="radio" id="radio-1-2" name="n_occur" class="regular-radio" <?php echo set_radio('n_occur', 'Weekly',true); ?>disabled/>   
											<label for="radio-1-2"></label> Weekly<br>
											<input type="radio" id="radio-1-3" name="n_occur" class="regular-radio" <?php echo set_radio('n_occur', 'Monthly',true); ?>disabled/>   
											<label for="radio-1-3"></label> Monthly<br>
							    	</fieldset>
							    </div>
							    <div class="right">
							    	<fieldset>
							    		<?php if ($this->input->post('n_occur') == 'Daily') { ?>
							    		<legend>Daily</legend>
							    		<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">	
											<tr class="ui-color-contents-style-1"> 
												<td> Every <input type="number" id="no_dayD" name="no_dayD" value="<?php echo set_value('no_dayD'); ?>" min="1" max="31" class="form-control-button2" style="height:40px;" readonly> day(s)</td>
											</tr>
										</table> 
										<?php } elseif ($this->input->post('n_occur') == 'Weekly') { ?>
										<legend>Weekly</legend>
							    		<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">	
											<tr class="ui-color-contents-style-1"> 
												<td> Every <input type="number" id="no_dayW" name="no_dayW" value="<?php echo set_value('no_dayW'); ?>" min="1" max="52" class="form-control-button2" style="height:40px;" readonly> week(s) on :</td>
											</tr>
											<tr class="ui-color-contents-style-1"> 
												<td> <input type="checkbox" name="Wdays1" id="" value="Monday"<?php echo set_radio('Wdays1', 'Monday',true); ?> > <span class="checkbox-w">Mon</span>
													<input type="checkbox" name="Wdays2" id="" value="Tuesday"<?php echo set_radio('Wdays2', 'Tuesday',true); ?> > <span class="checkbox-w">Tue</span>
													<input type="checkbox" name="Wdays3" id="" value="Wednesday"<?php echo set_radio('Wdays3', 'Wednesday',true); ?> > <span class="checkbox-w">Wed</span>
													<input type="checkbox" name="Wdays4" id="" value="Thursday"<?php echo set_radio('Wdays4', 'Thursday',true); ?> > <span class="checkbox-w">Thur</span>
													<input type="checkbox" name="Wdays5" id="" value="Friday"<?php echo set_radio('Wdays5', 'Friday',true); ?> > <span class="checkbox-w">Fri</span>
													<input type="checkbox" name="Wdays6" id="" value="Saturday"<?php echo set_radio('Wdays6', 'Saturday',true); ?> > <span class="checkbox-w">Sat</span>
													<input type="checkbox" name="Wdays7" id="" value="Sunday"<?php echo set_radio('Wdays7', 'Sunday',true); ?> > <span class="checkbox-w">Sun</span>	
												</td>
											</tr>
										</table> 
										<?php } else { ?>
							    		<legend>Monthly</legend>
							    		<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">	
											<tr class="ui-color-contents-style-1"> 
												<td> <input type="radio" id="radio-1-4" name="n_monthly" class="regular-radio" <?php echo set_radio('n_monthly', '1',true); ?>disabled /><label for="radio-1-4"></label> Day <input type="number" name="no_dayM" value="<?php echo set_value('no_dayM'); ?>" min="1" max="31" class="form-control-button2" style="height:40px;" readonly> of every <input type="number" name="no_month1" value="<?php echo set_value('no_month1'); ?>" min="1" max="100" class="form-control-button2" style="height:40px;" readonly> month (s)</td>
											</tr>

											<tr class="ui-color-contents-style-1"> 
												<td><input type="radio" id="radio-1-5" name="n_monthly" class="regular-radio" <?php echo set_radio('n_monthly', '2',true); ?>disabled /><label for="radio-1-5"></label> The 
												<?php
													$month_num = array(
						                              '1' => '1st',
						                              '2' => '2nd',
						                              '3' => '3rd',
						                              '4' => '4th',
						                              '5' => 'Last'
						                              );
					                            ?>
					                            <?php echo form_dropdown('monthnum', $month_num, set_value('monthnum') , 'class="dropdown" id="month_num"  style="width: 80px;" disabled'); ?>

												<!--<select name="n_hour" class="dropdown n_wi-date n_wi-eq">
													<option value="Hour">1st</option>
												</select>-->

												<?php
													$month_day = array(
						                              'Monday' => 'Monday',
						                              'Tuesday' => 'Tuesday',
						                              'Wednesday' => 'Wednesday',
						                              'Thursday' => 'Thursday',
						                              'Friday' => 'Friday',
						                              'Saturday' => 'Saturday',
						                              'Sunday' => 'Sunday',
						                              'Day' => 'Day',
						                              'Weekday' => 'Weekday',
						                              'Weekend' => 'Weekend'
						                              );
					                            ?>
					                            <?php echo form_dropdown('monthday', $month_day, set_value('monthday') , 'class="dropdown" id="month_day"  style="width: 110px;" disabled'); ?>
												of every <input type="number" name="no_month2" value="<?php echo set_value('no_month2'); ?>" min="1" max="100" class="form-control-button2" style="height:40px;" readonly> month (s)</td>
											</tr>
										</table> 
										<?php } ?>
							    	</fieldset>
							    </div>
							    <div class="center">
							    	<fieldset> 
							    		<legend>Daily frequency</legend>
							    			<input type="radio" id="radio-1-6" name="n_daily_occur" class="regular-radio" <?php echo set_radio('n_daily_occur', '1',true); ?>disabled/>   
											<label for="radio-1-6"></label> Occurs once at:  <input type="time" name="n_freq_time" id="n_freq_time" value="<?php echo set_value('n_freq_time'); ?>" class="form-control-button2 n_wi-date2" readonly><br>
											
											<input type="radio" id="radio-1-7" name="n_daily_occur" class="regular-radio" <?php echo set_radio('n_daily_occur', '2',true); ?>disabled/>   
											<label for="radio-1-7"></label> Occurs every : <input type="number" name="daily_freq" value="<?php echo set_value('daily_freq'); ?>" min="1" max="24" class="form-control-button2" style="height:40px;" readonly> 
												<?php
													$daily_time = array(
						                              'Hour' => 'Hour(s)',
						                              'Minute' => 'Minute(s)',
						                              );
						                            
					                            ?>
					                            <?php echo form_dropdown('dailytime', $daily_time, set_value('dailytime') , 'class="dropdown"  style="width: 95px;" id="dailytime" disabled'); ?>
												<span class="ocon-space">Starting at : <input type="time" name="n_freq_time1" id="n_freq_time1" value="<?php echo set_value('n_freq_time1'); ?>" class="form-control-button2 n_wi-date2" readonly></span> 
												<span class="ocon-space1">Ending at : <input type="time" name="n_freq_time2" id="n_freq_time2" value="<?php echo set_value('n_freq_time2'); ?>" class="form-control-button2 n_wi-date2" readonly></span> 
											<br> 
							    	</fieldset>
							    </div>
							    <div class="center">
							    	<fieldset> 
							    		<legend>Duration</legend>
							    		Start Date: <span class="ocon-space"> <input type="text" name="duration_Sdate" value="<?php echo set_value('duration_Sdate') ?>" class="form-control-button2 n_wi-date2" readonly></span>
							    		<input type="radio" id="radio-1-8" name="duration_stat" class="regular-radio" <?php echo set_radio('duration_stat', '1',true); ?>disabled/>   
										<label for="radio-1-8"></label> End Date
											 <span class="ocon-space"><input type="text" name="duration_Edate" value="<?php echo set_value('duration_Edate') ?>" class="form-control-button2 n_wi-date2" readonly></span><br>
										<span class="ocon-space2"><input type="radio" id="radio-1-9" name="duration_stat" class="regular-radio" <?php echo set_radio('duration_stat', '2',true); ?>disabled/>   
										<label for="radio-1-9"></label> No End Date</span>
							    	</fieldset>
							    </div>
							</div>
						</form>
					</td>
				</tr>
				<tr class="ui-header-new">
					<td align="center" colspan="2">

					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Confirm" style="width:150px;"/>
	                <input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
	           
					</td>
				</tr>
			</table>
		<?php echo form_hidden('loct',$this->input->post('loct'))?>
		<?php echo form_hidden('p',$this->input->post('p'))?>
		<?php echo form_hidden('n_occur',$this->input->post('n_occur')) ?>	
		<?php echo form_hidden('n_monthly',$this->input->post('n_monthly')) ?>
		<?php echo form_hidden('no_day',$this->input->post('no_day')) ?>
		<?php echo form_hidden('no_month1',$this->input->post('no_month1')) ?>
		<?php echo form_hidden('no_month2',$this->input->post('no_month2')) ?>
		<?php echo form_hidden('monthnum',$this->input->post('monthnum')) ?>
		<?php echo form_hidden('monthday',$this->input->post('monthday')) ?>
		<?php echo form_hidden('n_daily_occur',$this->input->post('n_daily_occur')) ?>
		<?php echo form_hidden('n_freq_time',$this->input->post('n_freq_time')) ?>
		<?php echo form_hidden('n_freq_time1',$this->input->post('n_freq_time1')) ?>
		<?php echo form_hidden('n_freq_time2',$this->input->post('n_freq_time2')) ?>
		<?php echo form_hidden('daily_freq',$this->input->post('daily_freq')) ?>
		<?php echo form_hidden('dailytime',$this->input->post('dailytime')) ?>
		<?php echo form_hidden('duration_Sdate',$this->input->post('duration_Sdate')) ?>
		<?php echo form_hidden('duration_stat',$this->input->post('duration_stat')) ?>
		<?php echo form_hidden('duration_Edate',$this->input->post('duration_Edate')) ?>

</body>
</html>


<style type="text/css">
    .container {
    width:;  
}
div.left fieldset , div.right fieldset{
	height: 120px;
}
.left {
    float:left;
    width:30%;
}
.right {
    float:right;
    width:68%;
}
.center{
	 width:100%;
}
.ocon-space{
	display: inline-block;
	margin: 10px;
}
.ocon-space1{
	display: inline-block;
	margin-left: 44.4%;
}
.ocon-space2{
	display: inline-block;
	margin-left: 29.7%;
}
</style>
<?php echo form_close(); ?>
