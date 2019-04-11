<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> Release Note Report(Monthly) </div>
		<button onclick='myFunction()' class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
<div class="m-div">
	<table class="rport-header">
		<tr>		
		</tr>
	</table>
	<div id="Instruction" style="text-align: center;" >
	<form method="get" action="">
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
		<?php echo form_dropdown('m', $month_list, set_value('m', $month) , 'style="width: 90px;" id="cs_month"'); ?>
		
		<?php 
			for ($dyear = '2015';$dyear <= date("Y");$dyear++){
				$year_list[$dyear] = $dyear;
			}
		?>
		<?php echo form_dropdown('y', $year_list, set_value('y', $year) , 'style="width: 65px;" id="cs_year"'); ?>
<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">
<input type="hidden" value="<?php echo set_value('fon', ($this->input->get('fon')) ? $this->input->get('fon') : ''); ?>" name="fon"> 
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<?php  ?>

	<table class="tftable" border="1" style="text-align:center;width:95%" align="center">
		<tr>
		<td style="font-weight: bold;">Release Note No.</td>
		<td style="font-weight: bold;">Date</td>
		<td style="font-weight: bold;">MRIN No.</td>
		<td style="font-weight: bold;">Work Order No.</td>
		<td style="font-weight: bold;">Part No.</td>
		<td style="font-weight: bold;">Unit Price</td>
		<td style="font-weight: bold;">Quantity</td>
		<td style="font-weight: bold;">Total Price</td>
		</tr>
<!-- </div> -->
</div>
	</body>
</html>