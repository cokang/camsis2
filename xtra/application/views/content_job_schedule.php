<?php echo form_open('job_scheduler_ctrl');?>
<body style="margin:0px;">
		<table class="tftable2" border="0"  style="color:black;" cellpadding="4" cellspacing="0">
				<tr class="ui-color-contents-style-1" height="40px">
					<?php
					$Scheduler = $this->input->get('p');
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
					<td class="ui-header-new" colspan="2"><b>Edit Job Schedule - <?=$Scheduler_name?></b></td>
				</tr>
				<tr class="ui-color-contents-style-1">
					<td>
						<form>
							<div class="container">
							    <div class="left">
							    	<fieldset> 
							    		<legend>Occurs</legend>
							    			<input type="radio" id="radio-1-1" name="n_occur"  onclick="javascript:fShowSTestResult('N');" class="regular-radio" value="Daily"<?php echo set_radio('n_occur', 'Daily', TRUE); ?><?= isset($record[0]->Scheduler_Name) &&  $record[0]->Occurs == 'Daily' ? 'checked' : 'checked'?> />   
											<label for="radio-1-1"></label> Daily<br>
											<input type="radio" id="radio-1-2" name="n_occur" onclick="javascript:fShowSTestResult('Y');" class="regular-radio" value="Weekly"<?php echo set_radio('n_occur', 'Weekly'); ?><?= isset($record[0]->Scheduler_Name) &&  $record[0]->Occurs == 'Weekly' ? 'checked' : ''?>/>   
											<label for="radio-1-2"></label> Weekly<br>
											<input type="radio" id="radio-1-3" name="n_occur" onclick="javascript:fShowSTestResult('YN');" class="regular-radio" value="Monthly"<?php echo set_radio('n_occur', 'Monthly'); ?><?= isset($record[0]->Scheduler_Name) &&  $record[0]->Occurs == 'Monthly' ? 'checked' : ''?> />   
											<label for="radio-1-3"></label> Monthly<br>
							    	</fieldset>
							    </div>
							    <div class="right">
							    	<?php if ((!isset($record[0]->Scheduler_Name)) OR (isset($record[0]->Scheduler_Name) &&  $record[0]->Occurs == 'Daily')) { ?>
							    	<fieldset id="divShowSTestResult">
							    	<?php } else { ?>
							    	<fieldset id="divShowSTestResult" style="display:none;">
							    	<?php } ?>
							    		<legend>Daily</legend>
							    		<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">	
											<tr class="ui-color-contents-style-1"> 
												<td> Every <input type="number" id="no_dayD" name="no_dayD" value="<?= isset($record[0]->Monthly_num) ? $record[0]->Monthly_num : '' ?>" min="1" max="31" class="form-control-button2" style="height:40px;"> day(s)</td>
											</tr>
										</table> 
							    	</fieldset>
							    	<?php if ((!isset($record[0]->Scheduler_Name)) OR (isset($record[0]->Scheduler_Name) &&  $record[0]->Occurs != 'Weekly')) { ?>
							    	<fieldset id="divShowSTestResult2" style="display:none;">
							    	<?php } else { ?>
							    	<fieldset id="divShowSTestResult2">
							    	<?php } ?>
							    		<legend>Weekly</legend>
							    		<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">	
											<tr class="ui-color-contents-style-1"> 
												<td> Every <input type="number" id="no_dayW" name="no_dayW" value="<?= isset($record[0]->Monthly_num) ? $record[0]->Monthly_num : '' ?>" min="1" max="52" class="form-control-button2" style="height:40px;"> week(s) on :</td>
											</tr>
											<tr class="ui-color-contents-style-1"> 
												
												<td> <input type="checkbox" name="Wdays1" id="" value="Monday"<?php echo set_radio('Wdays1', 'Monday'); ?><?= isset($Monday) ? 'checked' : ''?> > <span class="checkbox-w">Mon</span>
													<input type="checkbox" name="Wdays2" id="" value="Tuesday"<?php echo set_radio('Wdays2', 'Tuesday'); ?><?= isset($Tuesday) ? 'checked' : ''?> > <span class="checkbox-w">Tue</span>
													<input type="checkbox" name="Wdays3" id="" value="Wednesday"<?php echo set_radio('Wdays3', 'Wednesday'); ?><?= isset($Wednesday) ? 'checked' : ''?> > <span class="checkbox-w">Wed</span>
													<input type="checkbox" name="Wdays4" id="" value="Thursday"<?php echo set_radio('Wdays4', 'Thursday'); ?><?= isset($Thursday) ? 'checked' : ''?> > <span class="checkbox-w">Thur</span>
													<input type="checkbox" name="Wdays5" id="" value="Friday"<?php echo set_radio('Wdays5', 'Friday'); ?><?= isset($Friday) ? 'checked' : ''?> > <span class="checkbox-w">Fri</span>
													<input type="checkbox" name="Wdays6" id="" value="Saturday"<?php echo set_radio('Wdays6', 'Saturday'); ?><?= isset($Saturday) ? 'checked' : ''?> > <span class="checkbox-w">Sat</span>
													<input type="checkbox" name="Wdays7" id="" value="Sunday"<?php echo set_radio('Wdays7', 'Sunday'); ?><?= isset($Sunday) ? 'checked' : ''?> > <span class="checkbox-w">Sun</span>	
												</td>
												
											</tr>
										</table> 
							    	</fieldset>
							    	<?php if ((!isset($record[0]->Scheduler_Name)) OR (isset($record[0]->Scheduler_Name) &&  $record[0]->Occurs != 'Monthly')) { ?>
							    	<fieldset id="divShowSTestResult3" style="display:none;">
							    	<?php } else { ?>
							    	<fieldset id="divShowSTestResult3">
							    	<?php } ?>
							    		<legend>Monthly</legend>
							    		<table class="ui-desk-style-table3" style="" cellpadding="4" cellspacing="0" width="80%">	
											<tr class="ui-color-contents-style-1"> 
												<td> <input type="radio" id="radio-1-4" onclick="javascript:disabledfield('1');" name="n_monthly" class="regular-radio" value="1"<?php echo set_radio('n_monthly', '1',TRUE); ?><?= isset($record[0]->Scheduler_Name) &&  $record[0]->Monthly_sel == '1' ? 'checked' : 'checked'?> />
													<label for="radio-1-4"></label> Day <input type="number" id="no_dayM" name="no_dayM" value="<?= isset($record[0]->Monthly_num) && $record[0]->Monthly_sel == '1' ? $record[0]->Monthly_num : '' ?>" min="1" max="31" class="form-control-button2" style="height:40px;"> of every <input type="number" id="no_month1" name="no_month1" value="<?= isset($record[0]->Monthly_months) && $record[0]->Monthly_sel == '1' ? $record[0]->Monthly_months : '' ?>" min="1" max="100" class="form-control-button2" style="height:40px;" > month (s)</td>
											</tr>
											<tr class="ui-color-contents-style-1"> 
												<td>
													<input type="radio" id="radio-1-5" onclick="javascript:disabledfield('2');" name="n_monthly" class="regular-radio" value="2"<?php echo set_radio('n_monthly', '2'); ?><?= isset($record[0]->Scheduler_Name) &&  $record[0]->Monthly_sel == '2' ? 'checked' : ''?> /><label for="radio-1-5"></label> The 
												
												<?php
													$month_num = array(
						                              '1' => '1st',
						                              '2' => '2nd',
						                              '3' => '3rd',
						                              '4' => '4th',
						                              '5' => 'Last'
						                              );
						                            //$monthnum = "monthnum";
						 							//$fm = $this->input->post($monthnum);
					                            ?>
					                            <?php echo form_dropdown('monthnum', $month_num, set_value('monthnum',isset($record[0]->Monthly_num) && $record[0]->Monthly_sel == '2' ? $record[0]->Monthly_num : '1') , 'class="dropdown" id="month_num"  style="width: 80px;"'); ?>

												<!--<select name="n_hour" class="dropdown n_wi-
												 n_wi-eq">
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
						                            //$monthday = "monthday";
						 							//$fm = $this->input->post($monthday);
					                            ?>
					                            <?php echo form_dropdown('monthday', $month_day, set_value('monthday',isset($record[0]->Monthly_days) && $record[0]->Monthly_sel == '2' ? $record[0]->Monthly_days : 'Monday') , 'class="dropdown" id="month_day"  style="width: 110px;"'); ?>

												<!--<select name="n_hour" class="dropdown n_wi-eq">
													<option value="Hour">Monday</option>
												</select> --> 
												of every <input type="number" id="no_month2" name="no_month2" value="<?= isset($record[0]->Monthly_months) && $record[0]->Monthly_sel == '2' ? $record[0]->Monthly_months : '' ?>" min="1" max="100" class="form-control-button2" style="height:40px;"> month (s)</td>
											</tr>
										</table> 
							    	</fieldset>
							    </div>
							    <div class="center">
							    	<fieldset> 
							    		<legend>Daily frequency</legend>
							    			<input type="radio" id="radio-1-6" onclick="javascript:disb('1');" name="n_daily_occur" class="regular-radio" value="1"<?php echo set_radio('n_daily_occur','1',TRUE); ?><?= isset($record[0]->Scheduler_Name) &&  $record[0]->Daily_FreqOccurs == '1' ? 'checked' : 'checked'?>  />   
											<label for="radio-1-6"></label> Occurs once at:  <input type="time" name="n_freq_time" id="n_freq_time" value="<?=isset($record[0]->Daily_freq_time_1)  && $record[0]->Daily_FreqOccurs == '1'  ? $record[0]->Daily_freq_time_1 : ''?>" class="form-control-button2" style="width:200px;"><br>
											
											<input type="radio" id="radio-1-7" onclick="javascript:disb('2');" name="n_daily_occur" class="regular-radio" value="2"<?php echo set_radio('n_daily_occur','2'); ?><?= isset($record[0]->Scheduler_Name) &&  $record[0]->Daily_FreqOccurs == '2' ? 'checked' : ''?> />   
											<label for="radio-1-7"></label> Occurs every : 
											<?php if (isset($record[0]->Daily_Freq) AND isset($record[0]->Daily_freq_time) AND $record[0]->Daily_freq_time=='Hour' AND $record[0]->Daily_FreqOccurs == '2'){ ?>
											<input type="number" name="daily_freq" id="daily_freq" value="<?=isset($record[0]->Daily_Freq)  && $record[0]->Daily_FreqOccurs == '2'  ? $record[0]->Daily_Freq : ''?>" min="1" max="24" class="form-control-button2" style="height:40px;" > 
											<?php } elseif(isset($record[0]->Daily_Freq) AND isset($record[0]->Daily_freq_time) AND $record[0]->Daily_freq_time=='Minute' AND $record[0]->Daily_FreqOccurs == '2') { ?>
											<input type="number" name="daily_freq" id="daily_freq" value="<?=isset($record[0]->Daily_Freq)  && $record[0]->Daily_FreqOccurs == '2'  ? $record[0]->Daily_Freq : ''?>" min="1" max="60" class="form-control-button2" style="height:40px;" >
											<?php }	else {?>
											<input type="number" name="daily_freq" id="daily_freq" value="<?=isset($record[0]->Daily_Freq)  && $record[0]->Daily_FreqOccurs == '2'  ? $record[0]->Daily_Freq : ''?>" min="1" max="24" class="form-control-button2" style="height:40px;" >
											<?php } ?>																   
												<?php
													$daily_time = array(
						                              'Hour' => 'Hour(s)',
						                              'Minute' => 'Minute(s)',
						                              );
						                            //$dailytime = "dailytime";
						 							//$fm = $this->input->post($dailytime);
					                            ?>
					                            <?php echo form_dropdown('dailytime', $daily_time, set_value('dailytime',isset($record[0]->Daily_freq_time)  && $record[0]->Daily_FreqOccurs == '2'  ? $record[0]->Daily_freq_time : 'Hour') , 'class="dropdown"  style="width: 95px;" id="dailytime" onchange="javascript:dailytimes(this.value);" '); ?>
					                        	
												 <!--<select name="n_hour" class="dropdown n_wi-date2" readonly>
													<option value="Hour">Hour (s)</option>
												</select>-->

												<span class="ocon-space">Starting at : <input type="time" name="n_freq_time1" id="n_freq_time1" value="<?=isset($record[0]->Daily_freq_time_1)  && $record[0]->Daily_FreqOccurs == '2'  ? $record[0]->Daily_freq_time_1 : ''?>" class="form-control-button2 n_wi-date2" ></span> 
												<span class="ocon-space1">Ending at : <input type="time" name="n_freq_time2" id="n_freq_time2" value="<?=isset($record[0]->Daily_freq_time_2)  && $record[0]->Daily_FreqOccurs == '2'  ? $record[0]->Daily_freq_time_2 : ''?>" class="form-control-button2 n_wi-date2" ></span> 
											<br> 
							    	</fieldset>
							    </div>
							    <div class="center">
							    	<fieldset> 
							    		<legend>Duration</legend>
							    		Start Date: <span class="ocon-space"> <input type="type" id="date0" name="duration_Sdate" value="<?=isset($record[0]->Duration_start_date) ? date_format(new DateTime($record[0]->Duration_start_date), 'Y-m-d') : ''?>" class="form-control-button2 n_wi-date2"></span>
							    		
							    		<input type="radio" id="radio-1-8" onclick="javascript:disbs('1');" name="duration_stat" class="regular-radio" value="1"<?php echo set_radio('duration_stat','1',TRUE); ?><?= isset($record[0]->Scheduler_Name) &&  $record[0]->Duration_Status == '1' ? 'checked' : 'checked'?>/>   
											<label for="radio-1-8"></label> End Date
											 <span class="ocon-space"><input type="type" id="date1" name="duration_Edate" value="<?=isset($record[0]->Duration_end_date) &&  $record[0]->Duration_Status == '1' ? date_format(new DateTime($record[0]->Duration_end_date), 'Y-m-d') : ''?>" class="form-control-button2 n_wi-date2"></span><br>
										 
										<span class="ocon-space2"><input type="radio" id="radio-1-9" onclick="javascript:disbs('2');" name="duration_stat" class="regular-radio" value="2"<?php echo set_radio('duration_stat','2'); ?><?= isset($record[0]->Scheduler_Name) &&  $record[0]->Duration_Status == '2' ? 'checked' : ''?>/>   
										<label for="radio-1-9"></label> No End Date</span>
							    	</fieldset>
							    </div>
							</div>
						</form>
					</td>
				</tr>
				<tr class="ui-header-new">
					<td align="center" colspan="2">

						<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;">
						<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
							<!--<a href="job_schedule_c">Save</a>-->
					</td>
				</tr>
			</table>
		<?php echo form_hidden('loct',$this->input->get('loct'))?>
		<?php echo form_hidden('p',$this->input->get('p'))?>	
		</form>			
</body>
</html>
<script language="javascript" type="text/javascript">

function disabledfield(val) {
if(val=="1") 
{
	document.getElementById("month_num").disabled = true;
	document.getElementById("month_day").disabled = true;
	document.getElementById("no_month2").disabled = true;
	document.getElementById("no_dayM").disabled = false;
	document.getElementById("no_month1").disabled = false;
	document.getElementById("no_month2").value = "";
	document.getElementById("month_day").value = "Monday";
	document.getElementById("month_num").value = "1";
}
else {
	document.getElementById("month_num").disabled = false;
	document.getElementById("month_day").disabled = false;
	document.getElementById("no_month2").disabled = false;
	document.getElementById("no_dayM").disabled = true;
	document.getElementById("no_month1").disabled = true;
	document.getElementById("no_day").value = "";
	document.getElementById("no_month1").value = "";
}
}

function disb(val) {
if(val=="1") 
{
	document.getElementById("n_freq_time").disabled = false;
	document.getElementById("daily_freq").disabled = true;
	document.getElementById("dailytime").disabled = true;
	document.getElementById("n_freq_time1").disabled = true;
	document.getElementById("n_freq_time2").disabled = true;
	document.getElementById("daily_freq").value = "";
	document.getElementById("dailytime").value = "Hour";
	document.getElementById("n_freq_time1").value = "";
	document.getElementById("n_freq_time2").value = "";
}
else {
	document.getElementById("n_freq_time").disabled = true;
	document.getElementById("daily_freq").disabled = false;
	document.getElementById("dailytime").disabled = false;
	document.getElementById("n_freq_time1").disabled = false;
	document.getElementById("n_freq_time2").disabled = false;
	document.getElementById("n_freq_time").value = "";
}
}
function disbs(val) {
if(val=="2") 
{
	document.getElementById("duration_Edate").disabled = true;
	document.getElementById("duration_Edate").value = "";
}
else{
	document.getElementById("duration_Edate").disabled = false;
}
}
function dailytimes(val){
if (val=='Hour')
{
	document.getElementById("daily_freq").value = "";
	document.getElementById("daily_freq").setAttribute("max", 24);
}
else{
	document.getElementById("daily_freq").value = "";
	document.getElementById("daily_freq").setAttribute("max", 60);
}
}
</script>
<script language="javascript" type="text/javascript">
	function fShowSTestResult(sTest)
	{
		/*Monthly*/
		if (sTest == "YN")
			{
				document.getElementById('divShowSTestResult').style.display = "none"
				document.getElementById('divShowSTestResult2').style.display = "none"
				document.getElementById('divShowSTestResult3').style.display = "block"
				document.getElementById("no_dayD").value = "";
				document.getElementById("no_dayW").value = "";
			}
		/*Weekly*/
		if (sTest == "Y")
			{
				document.getElementById('divShowSTestResult').style.display = "none"
				document.getElementById('divShowSTestResult2').style.display = "block"
				document.getElementById('divShowSTestResult3').style.display = "none"
				document.getElementById("no_dayD").value = "";
				document.getElementById("no_dayM").value = "";
			}
		/*Daily*/
		if (sTest == "N") 
			{
				document.getElementById('divShowSTestResult').style.display = "block"
				document.getElementById('divShowSTestResult2').style.display = "none"
				document.getElementById('divShowSTestResult3').style.display = "none"
				document.getElementById("no_dayW").value = "";
				document.getElementById("no_dayM").value = "";
			}
		 /*Daily*/
		 /* if (sTest == "N") 
			{
				document.getElementById('divShowSTestResult').style.display = "none"
				document.getElementById('divShowSTestResult2').style.display = "none"
				document.getElementById('divShowSTestResult3').style.display = "block"
			}
		
		else
			{
				document.getElementById('divShowSTestResult').style.display = "none"
				document.getElementById('divShowSTestResult2').style.display = "none"
				document.getElementById('divShowSTestResult3').style.display = "block"
			}*/
	}

</script>
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
	margin-left: 30px;
}
.ocon-space2{
	display: inline-block;
	margin-left: 29.7%;
}
span.checkbox-w{
	display: inline-block;
	margin-left: 5px;
	margin-right: 5px;
}
</style>
<?php echo form_close(); ?>

