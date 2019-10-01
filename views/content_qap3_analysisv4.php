
<div class="ui-middle-screen">
<?php include 'content_tab_qap3.php';?>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table4" cellpadding="4" cellspacing="0" width="90%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="4"><b>Analysis Duration</b></td>
			</tr>
			<tr>
				<td colspan="4" height="20px"></td>
			</tr>
			<tr>
				<td colspan="4" style="padding-left:10px;" name="from_month" valign="bottom">From
					<form action="" method="POST">
					<?php 
                              $from_month = array(
                              '01' => 'Jan',
                              '02' => 'Feb',
                              '03' => 'Mar',
                              '04' => 'Apr',
                              '05' => 'May',
                              '06' => 'Jun',
                              '07' => 'Jul',
                              '08' => 'Aug',
                              '09' => 'Sep',
                              '10' => 'Oct',
                              '11' => 'Nov',
                              '12' => 'Dec',
                              );
                            $fromMonth = "fromMonth";
 							$fm = $this->input->post($fromMonth);
                              ?>
                              <?php echo form_dropdown($fromMonth, $from_month, set_value($fromMonth,(!empty($fm) ? $fm : $fmonth)) , 'class="dropdown"  style="width: 80px;" '); ?>
					
                    <?php 
							for ($fyear;$fyear >= 1998;$fyear--){
                              $from_year[$fyear] = $fyear;
                          	}
                          	$fromYear = "fromYear";
 							$fy = $this->input->post($fromYear);
                              ?>
                              <?php echo form_dropdown($fromYear, $from_year, set_value($fromYear,(!empty($fy) ? $fy : $fyear)) , 'class="dropdown" style="width: 80px;"'); ?>
				&nbsp;&nbsp;
				To
				&nbsp;&nbsp;
					<?php 
                              $to_month = array(
                              '01' => 'Jan',
                              '02' => 'Feb',
                              '03' => 'Mar',
                              '04' => 'Apr',
                              '05' => 'May',
                              '06' => 'Jun',
                              '07' => 'Jul',
                              '08' => 'Aug',
                              '09' => 'Sep',
                              '10' => 'Oct',
                              '11' => 'Nov',
                              '12' => 'Dec',
                              );
                            $toMonth = "toMonth";
 							$tm = $this->input->post($toMonth);
                              ?>
                              <?php echo form_dropdown($toMonth, $to_month, set_value($toMonth,(!empty($tm) ? $tm : $tmonth)) , 'class="dropdown" style="width: 80px;"'); ?>
					
                    <?php 
							for ($tyear;$tyear >= 1998;$tyear--){
                              $to_year[$tyear] = $tyear;
                          	}
                          	$toYear = "toYear";
 							$ty = $this->input->post($toYear);
                              ?>
                              <?php echo form_dropdown($toYear, $to_year, set_value($toYear,(!empty($ty) ? $ty : $tyear)) , 'class="dropdown" style="width: 80px;"'); ?>
					<span style="float:; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="GET DATA" id="n_Identification_Type" onchange="javascript: submit()"></span>
					</form>
				</td>
			</tr>
			<?php 
			isset($_POST['fromMonth']) ? $fromMonth = substr(date('F',mktime(0, 0, 0, $_POST['fromMonth'], 10)),0,3) : $fromMonth = substr(date('F',mktime(0, 0, 0, $fmonth, 10)),0,3) ;
			isset($_POST['fromYear']) ? $fromYear = $_POST['fromYear'] : $fromYear = date('Y') ;
			isset($_POST['toMonth']) ? $toMonth = substr(date('F',mktime(0, 0, 0, $_POST['toMonth'], 10)),0,3) : $toMonth = substr(date('F',mktime(0, 0, 0, $tmonth, 10)),0,3) ;
			isset($_POST['toYear']) ? $toYear = $_POST['toYear'] : $toYear = date('Y') ;
			?>
			<tr><td colspan="4" class="ui-bottom-border-color" style="font-weight: bold;">Pareto Study On PPM <?php echo $fromMonth.' '.$fromYear ?> - <?php echo $toMonth.' '.$toYear ?></td></tr>
			<tr class="">
				<td style="" width="" colspan="4" valign="top" align="center">
					<div class="ui-left_web">
					<table class="ui-desk-style-table" style="color:black; background:white; text-align:center;" cellpadding="4" cellspacing="0" width="100%">      			
	    				<tr class="ui-menu-color-header" style="color:white;  font-weight:;" align="center">
							<td>Root Cause</td>
							<td>No Of Occurances</td>
							<td>% of Occurances</td>
							<td>% of Cummulative</td>
						</tr>
						<tr class="" style="color:black; font-size:12px; font-weight:;" align="center">
							<?php 
							$totalOccurances = 0;
							$perc_Cumm = 0;
							$total_perc_occur = 0;
							isset($totalOcc) ? $totalOcc = $totalOcc : $totalOcc = 0;
							$totalOccurances = $totalOccurances + $totalOcc;
							?>
							<?php $numrow = 1; foreach ($recordqcppm as $row): ?>
							<?php


							isset($row->QC_Code) ? $QC_Code = $row->QC_Code : $QC_Code = 'N/A';
							switch ($QC_Code) {
							case "QC01":
							$QCname = 'Equipment not made available';
							break;
							case "QC02":
							$QCname = 'Technical Personnel';
							break;
							case "QC03":
							$QCname = 'Delay closing of Work Order';
							break;
							case "QC04":
							$QCname = 'User Request';
							break;
							case "QC05":
							$QCname = 'Mishandling/vandalism/overload';
							break;
							case "QC06":
							$QCname = 'Vendor Delay';
							break;
							case "QC07":
							$QCname = 'Equipment Down';
							break;
							case "QC08":
							$QCname = 'Breakdown of related support system';
							break;
							case "QC09":
							$QCname = 'Wear and Tear';
							break;
							case "QC10":
							$QCname = 'Recurring of similar fault';
							break;
							case "QC11":
							$QCname = 'Improper procedure';
							break;
							case "QC12":
							$QCname = 'Setting and Calibration';
							break;
							case "QC13":
							$QCname = 'PPM kit/test equipment not available/spares';
							break;
							case "QC14":
							$QCname = 'Defect';
							break;
							case "QC15":
							$QCname = 'Force Majeure';
							break;
							case "QC16":
							$QCname = 'Safety, Health and Environmental Factor';
							break;
							case "QC17":
							$QCname = 'Downtime due to PPM';
							break;
							case "QC18":
							$QCname = 'Downtime due to SCM';
							break;
							case "QC19":
							$QCname = 'Equipment not functional and waiting for BER approved';
							break;
							default:
							
							}

							$perc_Occur = number_format($row->Occurance / $totalOccurances * 100,2);
							$perc_Cumm = $perc_Cumm + $perc_Occur;
							$total_perc_occur = $total_perc_occur + $perc_Occur
							?>
							<?= $numrow%2==1 ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
							<td ><span style="color:blue;"><?= $QC_Code.' '.$QCname ?></td>
							<td ><?= isset($row->Occurance) ? $row->Occurance : '' ?></td>
							<td><?= $perc_Occur ?></td>
							<td><?= $perc_Cumm ?></td>
							<?php $numrow++ ?>
							<?php endforeach; ?>
						</tr>
						<tr class="" style="color:black; font-size:12px; font-weight:;" align="center">
							<?= $numrow%2==1 ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
							<td><span style="color:blue;">Total</td>
							<td><?= $totalOccurances ?></td>
							<td><?= $total_perc_occur ?></td>
							<td></td>
						</tr>
					</table>
					</div>
					<div class="ui-left_mobile">
						<table class="tblqap">
							<tr>
								<th>Root Cause</th>
								<th><span style="color:blue;">Total</span></th>
							</tr>
							<tr>
								<td>No Of Occurances</td>
								<td><?= $totalOccurances ?></td>
							</tr>
							<tr>
								<td >% of Occurances</td>
								<td><?= $total_perc_occur ?></td>
							</tr>
							<tr>
								<td >% of Cummulative</td>
								<td></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr><td colspan="4" class="ui-bottom-border-color" style="font-weight: bold;">Pareto Study On Uptime <?php echo $fromMonth.' '.$fromYear ?> - <?php echo $toMonth.' '.$toYear ?></td></tr>
			<tr class="">
				<td style="" width="" colspan="4" valign="top" align="center">
					<div class="ui-left_web">
					<table class="ui-desk-style-table" style="color:black; background:white; text-align:center;" cellpadding="4" cellspacing="0" width="100%">      			
	    				<tr class="ui-menu-color-header" style="color:white;;" align="center">
							<td >Root Cause</td>
							<td>No Of Downtime Hours</td>
							<td>% of Occurances</td>
							<td>% of Cummulative</td>
						</tr>
						<tr align="center">
							<?php 
							$TotalHour = 0;
							$total_percHour = 0;
							isset($totalDT) ? $totalDT = $totalDT : $totalDT = 0;
							$TotalHour = $TotalHour + $totalDT;
							?>
							<?php $numrow = 1; foreach ($recordqcuptime as $row): ?>
							<?php 

							isset($row->QC_Code) ? $QC_Code = $row->QC_Code : $QC_Code = 'N/A';
							switch ($QC_Code) {
							case "QC01":
							$QCname = 'Equipment not made available';
							break;
							case "QC02":
							$QCname = 'Technical Personnel';
							break;
							case "QC03":
							$QCname = 'Delay closing of Work Order';
							break;
							case "QC04":
							$QCname = 'User Request';
							break;
							case "QC05":
							$QCname = 'Mishandling/vandalism/overload';
							break;
							case "QC06":
							$QCname = 'Vendor Delay';
							break;
							case "QC07":
							$QCname = 'Equipment Down';
							break;
							case "QC08":
							$QCname = 'Breakdown of related support system';
							break;
							case "QC09":
							$QCname = 'Wear and Tear';
							break;
							case "QC10":
							$QCname = 'Recurring of similar fault';
							break;
							case "QC11":
							$QCname = 'Improper procedure';
							break;
							case "QC12":
							$QCname = 'Setting and Calibration';
							break;
							case "QC13":
							$QCname = 'PPM kit/test equipment not available/spares';
							break;
							case "QC14":
							$QCname = 'Defect';
							break;
							case "QC15":
							$QCname = 'Force Majeure';
							break;
							case "QC16":
							$QCname = 'Safety, Health and Environmental Factor';
							break;
							case "QC17":
							$QCname = 'Downtime due to PPM';
							break;
							case "QC18":
							$QCname = 'Downtime due to SCM';
							break;
							case "QC19":
							$QCname = 'Equipment not functional and waiting for BER approved';
							break;
							default:
							
							}

							$perc_hour = number_format($row->total_down_time / $TotalHour * 100,2);
							$perc_Cumm = $perc_Cumm + $perc_hour;
							$total_percHour = $total_percHour + $perc_hour;
							?>
							<?= $numrow%2==1 ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
							<td><span style="color:blue;"><?=$QC_Code.' '.$QCname ?></td>
							<td ><?= isset($row->total_down_time) ? $row->total_down_time : '' ?></td>
							<td><?= $perc_hour ?></td>
							<td><?= $perc_Cumm ?></td>
							<?php $numrow++ ?>
							<?php endforeach; ?>
						</tr>
						<tr class="" style="color:black;" align="center">
							<?= $numrow%2==1 ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
							<td><span style="color:blue;">Total</td>
							<td><?= $TotalHour ?></td>
							<td><?= $total_percHour ?></td>
							<td></td>
						</tr>
					</table>
					</div>
					<div class="ui-left_mobile">
						<table class="tblqap">
							<tr>
								<th>Root Cause</th>
								<th><span style="color:blue;">Total</span></th>
							</tr>
							<tr>
								<td>No Of Downtime Hours</td>
								<td><?= $totalOccurances ?></td>
							</tr>
							<tr>
								<td >% of Occurances</td>
								<td><?= $total_percHour ?></td>
							</tr>
							<tr>
								<td >% of Cummulative</td>
								<td></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="2">
				</td>
			</tr>
		</table>
	</div>
</div>