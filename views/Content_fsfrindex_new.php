<body class="body_acg">
	<div id="Instruction" class="pr-printer">
    <div class="header-pr">Financial Summary</div>
    <button onclick='myFunction()' class="btn-button btn-primary-button">PRINT</button>
    <a href="Schedule"><button type="cancel" class="btn-button btn-primary-button">CANCEL</button></a>
</div>
	<div Class="main-cs">
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid;">
			<tr>
				<td style="padding-left:5px; width:160px;"><img src="<?php echo base_url(); ?>images/logo.png" style="width:150px; height:50px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b>IIUM HOSPITAL</b> </td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;">Financial Summary</b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:5px; width:160px;"> 
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td align="left"> Month : <?=substr(date('F',mktime(0, 0, 0, $fmonth, 10)),0,10)?></td>
						</tr>
						<tr>
							<td align="left"> Year : <?=$fyear?></td>
						</tr>
						<tr>
							<td align="left"> Service : <?=$s_code?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="main-is" id="Instruction">
			<table class="tbl-is">
				<tr>
					<th colspan="6" style="padding-left:5px;">Financial Summary</th>
				</tr>
				<tr>
					<th>Month</th>
					<th>Year</th>
					<th>Service</th>
					<th>....</th>
				</tr>
				<tr>
					<form action="" method="POST">
					<td>
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
					<?php echo form_dropdown('fromMonth', $month_list, set_value('fromMonth',$month) , 'style="width: 95px;"'); ?>
					</td>
					<td>
						<?php 
						for ($dyear = '2015';$dyear <= $year;$dyear++){
							$year_list[$dyear] = $dyear;
						}
					?>
					<?php echo form_dropdown('fromYear', $year_list, set_value('fromYear',$year) , 'style="width: 65px;"'); ?>
					</td>
					<td><?php 
						$Service_list = array(
						'BES' => 'BES',
						'FES' => 'FES',
						'HKS' => 'HKS',
						'Security' => 'Security'
					 );
					?>
					<?php echo form_dropdown('n_base', $Service_list, set_value('n_base') , 'style="width: 80px;"'); ?> </td>
					<td><input type="submit" name="mysubmit" value="Value" id="n_Identification_Type" onchange="javascript: submit()"></td>
					</form>
				</tr>
			</table>
		</div>
		<div class="second-is">
			<table class="tbl-is">
				<tr>
					<th colspan="8" style="padding-left:5px;">Financial Report : <?php echo $this->session->userdata('usersessn'); ?></th>
				</tr>
				<tr>
					<th>Hospital</th>
					<th>Invoice No</th>
					<th>Invoice Date</th>
					<th>Service Fee ( RM )</th>
					<th>Service Tax ( RM )</th>
					<th>Invoice Amount ( RM )</th>
					<th>Date Paid</th>
					<th>Amount Paid</th>
				</tr>
				<tr>
					<td>IIUM</td>
					<td><?= isset($record[0]->Invoice_No) ? $record[0]->Invoice_No : '' ?></td>
					<td><?= isset($record[0]->Invoice_Date) ? date("d-m-Y", strtotime($record[0]->Invoice_Date)) : '' ?></td>
					<td><?= isset($record[0]->Service_Fee) ? $record[0]->Service_Fee : '' ?></td>
					<td><?= isset($record[0]->Service_Tax) ? $record[0]->Service_Tax : '' ?></td>
					<td><?= isset($record[0]->Invoice_Amount) ? $record[0]->Invoice_Amount : '' ?></td>
					<td><?= isset($record[0]->Date_Paid) ? date("d-m-Y", strtotime($record[0]->Date_Paid)) : '' ?></td>
					<td><?= isset($record[0]->Amount_Paid) ? $record[0]->Amount_Paid : '' ?></td>
				</tr>
			</table>
			
		</div>
	</div>
</body>
</html>