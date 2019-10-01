<body class="body_acg">
	<div Class="main-cs">
	<div Class="form-cs">
	<span style="color:red;"><?php echo validation_errors(); ?>
<form action="" method="POST" name="myform">
		 <fieldset>
		  <legend>Form >> Customize Search</legend>
		  <table>
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
					<?php echo form_dropdown('n_base', $base_list, set_value('n_base',isset($record[0]->Service_Code) ? $record[0]->Service_Code : '') , 'style="width: 80px;" id="service_code" onchange="javascript: submit()"'); ?> 
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
					<?php echo form_dropdown('fromMonth', $month_list, set_value('fromMonth', isset($record[0]->Month) ? $record[0]->Month : $month) , 'style="width: 90px;" id="cs_month" onchange="javascript: submit()"'); ?>
					
					<?php 
						for ($dyear = '2015';$dyear <= $year;$dyear++){
							$year_list[$dyear] = $dyear;
						}
					?>
					<?php echo form_dropdown('fromYear', $year_list, set_value('fromYear', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year" onchange="javascript: submit()"'); ?>  
		  			
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
		  		<td COlspan="2">
		  			<table class="tbl-ind">
		  				<tr>
		  					<th>Number</th>
		  					<th>Financial Indicators</th>
		  					<th>Current Month Value (<?= substr(date('M',mktime(0, 0, 0, $fmonth, 10)),0,3).' '.$fyear ?>)</th>
		  				</tr>
		  				<tr>
		  					<td align="center">1</td>
		  					<td>Invoice No</td>
		  					<td align="center"><input type="text" name="n_invoiceno" value="<?= isset($record[0]->Invoice_No) ? $record[0]->Invoice_No : '' ?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">2</td>
		  					<td>Invoice Date</td>
		  					<td align="center"><input type="date" name="n_invoicedate" value="<?= isset($record[0]->Invoice_Date) ? date_format(new DateTime($record[0]->Invoice_Date), 'Y-m-d') : '' ?>" style="width:172.3px;"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">3</td>
		  					<td>Service Fee ( RM )</td>
		  					<td align="center"><input type="text" name="n_servicefee" value="<?= isset($record[0]->Service_Fee) ? $record[0]->Service_Fee : '' ?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">4</td>
		  					<td>Service Tax ( RM )</td>
		  					<td align="center"><input type="text" name="n_servicetax" value="<?= isset($record[0]->Service_Tax) ? $record[0]->Service_Tax : '' ?>"/></td>
		  				<tr>
		  					<td align="center">5</td>
		  					<td>Invoice Amount ( RM )</td>
		  					<td align="center"><input type="text" name="n_invoiceamount" value="<?= isset($record[0]->Invoice_Amount) ? $record[0]->Invoice_Amount : '' ?>"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">6</td>
		  					<td>Date Paid</td>
		  					<td align="center"><input type="date" name="n_datepaid" value="<?= isset($record[0]->Date_Paid) ? date_format(new DateTime($record[0]->Date_Paid), 'Y-m-d') : '' ?>" style="width:172.3px;"/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">7</td>
		  					<td>Amount Paid</td>
		  					<td align="center"><input type="text" name="n_amountpaid" value="<?= isset($record[0]->Amount_Paid) ? $record[0]->Amount_Paid : '' ?>"/></td>
		  				</tr>
		  				<tr>
		  					<td colspan="3" align="center"><input type="submit" name="mysubmit" value="Submit" onclick="javascript: myform.action='<?php echo base_url();?>index.php/financial_input_ctrl';"> <a href="<?php echo base_url();?>index.php/contentcontroller/Schedule" class="a-back">Back</a></td>
		  				</tr>
		  			</table>
		  		</td>
		  	</tr>
		  </table>
		 </fieldset>
	</div>
	</div>
	</form>
</body>

</html>