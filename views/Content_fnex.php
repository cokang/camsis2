<div class="ui-middle-screen">
<div class="div-p"></div>
	<div  class="menu_sr">
		<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Financial Summary</td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				  <tr>
					<th>Month</th>
					<th>Year</th>
					<th>Service</th>
					<th></th>
				  </tr>
				  <tr>
				    <td style=" padding-right:15px;">
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
					<?php echo form_dropdown('fromMonth', $month_list,'style="width: 100%"'); ?>
					</td>
					 <td style=" padding-right:15px;">
					<?php 
							$year_list = array(
							'2015' => '2015',
							'2016' => '2016',);
					?>
					<?php echo form_dropdown('fromYear', $year_list,'style="width: 100%;"'); ?>  
					</td>
					<td style=" padding-right:15px;">
					<?php 
						$option_list = array(
						'BES' => 'BES'
					 );
					?>
					<?php echo form_dropdown('n_option', $option_list,'', 'style="width: 100%;"'); ?></td>
					<td style="width: 100px;"><input type="submit" class="btn-button btn-primary-button" style="width: 90px; margin-left:auto;margin-right:auto;" name="mysubmit" value="Show"></td>
				  </tr>
				 </table>
				</td>
			</tr>
		</table>
	</div>
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Financial Summary : BES</td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				  <tr>
				    <th style="width:20%;">Hospital</th>
					<th>Invoice No.</th>
					<th>Invoice Date</th>
					<th>Service fee (RM)</th>
					<th>Service tax (RM)</th>
					<th>Invoice Amount (RM)</th>
					<th>Date Paid</th>
					<th>Amount Paid</th>
				  </tr>
				  <tr>
				    <td>IIUM</td>
					<td>KDP008690</td>
					<td>11 Feb 2016</td>
					<td>680,993.00</td>
					<td>0.00</td>
					<td>649,008.00</td>
					<td></td>
					<td>0.00</td>
				  </tr>
				  <tr>
				    <th style="text-align:right;">Grand Total</th>
					<th></th>
					<th></th>
					<th>0.00</th>
					<th>0.00</th>
					<th>0.00</th>
					<th></th>
					<th>0.00</th>
				  </tr>
				 </table>
				</td>
			</tr>
		</table>
	</div>
	</div>
	<style>
	.ui-float-asset-reg , .ui-mid-asset-reg{
	border:1px solid #79B6D8;
	color:black;
	border-collapse:collapse;
	width:98%;
	margin:10px auto;
	}
	.ui-float-asset-reg tr th , .ui-mid-asset-reg tr th{
	border:1px solid #79B6D8;
	background:#ccc;
	font-size:14px;
	}
	.ui-float-asset-reg tr td , .ui-mid-asset-reg tr td{
	border:1px solid #79B6D8;
	text-align:center;
	}
	.ui-float-asset-reg tr td:nth-child(1) , .ui-mid-asset-reg tr td:nth-child(1){
	padding-left:15px;
	text-align:left;
	}
	.ui-float-asset-reg tr , .ui-mid-asset-reg tr{
	background:#fff;
	}
	.ui-float-asset-reg tr:nth-child(2n+1){
	background:#eee;
	}
	.ui-mid-asset-reg tr td:nth-child(2n+1){
	background:#eee;
	}
	.ui-float-asset-reg tr td a{
	color:#79B6D8;
	}
	.menu_sr{
		display:block;
		width:60%;
		margin-left:auto;
		margin-right:auto;
	}
	</style>