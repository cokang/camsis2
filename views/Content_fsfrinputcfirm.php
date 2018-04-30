<body class="body_acg">
	<div Class="main-cs">
	<div Class="form-cs">
		<?php echo form_open('financial_input_ctrl/confirmation');?>
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
		  					<td align="center"><input type="text" name="n_invoiceno" value="<?php echo set_value('n_invoiceno') ?>" disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">2</td>
		  					<td>Invoice Date</td>
		  					<td align="center"><input type="date" name="n_invoicedate" value="<?php echo set_value('n_invoicedate') ?>" disabled /></td>
		  				</tr>
		  				<tr>
		  					<td align="center">3</td>
		  					<td>Service Fee ( RM )</td>
		  					<td align="center"><input type="text" name="n_servicefee" value="<?php echo set_value('n_servicefee') ?>" disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">4</td>
		  					<td>Service Tax ( RM )</td>
		  					<td align="center"><input type="text" name="n_servicetax" value="<?php echo set_value('n_servicetax') ?>" disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">5</td>
		  					<td>Invoice Amount ( RM )</td>
		  					<td align="center"><input type="text" name="n_invoiceamount" value="<?php echo set_value('n_invoiceamount') ?>" disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">6</td>
		  					<td>Date Paid</td>
		  					<td align="center"><input type="date" name="n_datepaid" value="<?php echo set_value('n_datepaid') ?>" disabled/></td>
		  				</tr>
		  				<tr>
		  					<td align="center">7</td>
		  					<td>Amount Paid</td>
		  					<td align="center"><input type="text" name="n_amountpaid" value="<?php echo set_value('n_amountpaid') ?>" disabled/></td>
		  				</tr>
		  				<tr>
		  					<td colspan="6" align="center"><input type="submit" value="Save"> <a href="contentcontroller/fsfrinput" class="a-back">Cancel</a></td>
		  				</tr>
		  			</table>
		  		</td>
		  	</tr>
		  </table>
		  <?php  echo form_hidden('n_base',$this->input->post('n_base')); ?>
		  <?php  echo form_hidden('fromMonth',$this->input->post('fromMonth')); ?>
		  <?php  echo form_hidden('fromYear',$this->input->post('fromYear')); ?>
		  <?php  echo form_hidden('n_invoiceno',$this->input->post('n_invoiceno')); ?>
		  <?php  echo form_hidden('n_invoicedate',$this->input->post('n_invoicedate')); ?>
		  <?php  echo form_hidden('n_servicefee',$this->input->post('n_servicefee')); ?>
		  <?php  echo form_hidden('n_servicetax',$this->input->post('n_servicetax')); ?>
		  <?php  echo form_hidden('n_invoiceamount',$this->input->post('n_invoiceamount')); ?>
		  <?php  echo form_hidden('n_datepaid',$this->input->post('n_datepaid')); ?>
		  <?php  echo form_hidden('n_amountpaid',$this->input->post('n_amountpaid')); ?>
		 </fieldset>
	</div>
	</div>
</body>
</html>