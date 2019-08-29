
<div class="ui-middle-screen">
<?php include 'content_tab_qap3.php';?>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table4" cellpadding="4" cellspacing="0">	
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
			<tr><td colspan="4" class="ui-bottom-border-color" style="font-weight: bold;">Total of siq & car for <?php echo $fromMonth.' '.$fromYear ?> - <?php echo $toMonth.' '.$toYear ?></td></tr>
			<tr class="">
				<td style="" width="" colspan="4" valign="top" align="center">
					<div class="ui-left_web">
					<table class="ui-desk-style-table" style="color:black; background:white;" cellpadding="4" cellspacing="0" width="100%">      			
	    				<tr class="ui-header-new" style="color:white;" align="center">
							<td>Hospital(s)</td>
							<td  colspan="3">PPM</td>
							<td  colspan="3">Uptime</td>
							<td  colspan="3">Total</td>
						</tr>
						<tr>
							<td colspan="4" height="30px"></td>
						</tr>
						<tr class="ui-menu-color-header" style="color:white;" align="center">
							<td style="padding-top:3px; padding-bottom:3px;"></td>
							<td >SIQ</td>
							<td >CAR Open</td>
							<td >CAR Closed</td>
							<td >SIQ</td>
							<td >CAR Open</td>
							<td >CAR Closed</td>
							<td >SIQ</td>
							<td >CAR Open</td>
							<td >CAR Closed</td>
						</tr>
						<tr class="" style="color:black;" align="center">
							<?php
							!is_null($qap3_reportsiq[0]->ppm_siq) ? $PPMSIQ = $qap3_reportsiq[0]->ppm_siq : $PPMSIQ = 0;
							!is_null($qap3_reportsiq[0]->uptime_siq) ? $UptimeSIQ = $qap3_reportsiq[0]->uptime_siq : $UptimeSIQ = 0;
							$TotalSIQ = $PPMSIQ + $UptimeSIQ;

							!is_null($qap3reportcaro[0]->ppm_car) ? $PPMCARo = $qap3reportcaro[0]->ppm_car : $PPMCARo = 0;
							!is_null($qap3reportcaro[0]->uptime_car) ? $UptimeCARo = $qap3reportcaro[0]->uptime_car : $UptimeCARo = 0;
							$TotalCARo = $PPMCARo + $UptimeCARo;

							!is_null($qap3reportcarc[0]->ppm_car) ? $PPMCARc = $qap3reportcarc[0]->ppm_car : $PPMCARc = 0;
							!is_null($qap3reportcarc[0]->uptime_car) ? $UptimeCARc = $qap3reportcarc[0]->uptime_car : $UptimeCARc = 0;
							$TotalCARc = $PPMCARc + $UptimeCARc;

							$gtPPMSIQ = 0;
							$gtPPMSIQ = $gtPPMSIQ + $PPMSIQ;
							$gtUptimeSIQ = 0;
							$gtUptimeSIQ = $gtUptimeSIQ + $UptimeSIQ;
							$gtTotalSIQ = 0;
							$gtTotalSIQ = $gtTotalSIQ + $TotalSIQ;
							$gtPPMCARo = 0;
							$gtPPMCARo = $gtPPMCARo + $PPMCARo;
							$gtUptimeCARo = 0;
							$gtUptimeCARo = $gtUptimeCARo + $UptimeCARo;
							$gtTotalCARo = 0;
							$gtTotalCARo = $gtTotalCARo + $TotalCARo;
							$gtPPMCARc = 0;
							$gtPPMCARc = $gtPPMCARc + $PPMCARc;
							$gtUptimeCARc = 0;
							$gtUptimeCARc = $gtUptimeCARc + $UptimeCARc;
							$gtTotalCARc = 0;
							$gtTotalCARc = $gtTotalCARc + $TotalCARc;
							?>
							<td style="padding-top:3px; padding-bottom:3px;"><?= $this->session->userdata('hosp_code') ?></td>
							<td ><?= $PPMSIQ ?></td>
							<td ><?= $PPMCARo ?></td>
							<td ><?= $PPMCARc ?></td>
							<td ><?= $UptimeSIQ ?></td>
							<td><?= $UptimeCARo ?></td>
							<td ><?= $UptimeCARc ?></td>
							<td ><?= $TotalSIQ ?></td>
							<td><?= $TotalCARo ?></td>
							<td><?= $TotalCARc ?></td>
						</tr>
						<tr class="" style="color:black;" align="center">
							<td>Grand Total</td>
							<td><?= $gtPPMSIQ ?></td>
							<td><?= $gtPPMCARo ?></td>
							<td><?= $gtPPMCARc ?></td>
							<td><?= $gtUptimeSIQ ?></td>
							<td><?= $gtUptimeCARo ?></td>
							<td><?= $gtUptimeCARc ?></td>
							<td><?= $gtTotalSIQ ?></td>
							<td><?= $gtTotalCARo ?></td>
							<td><?= $gtTotalCARc ?></td>
						</tr>
					</table>
				</div>
					<div class="ui-left_mobile">
						<table class="tblqap">
							<tr>
								<th></th>
								<th><?= $this->session->userdata('hosp_code') ?></th>
								<th>Grand Total</th>
							</tr>
							<tr>
								<td>SIQ  </td>
								<td><?= $PPMSIQ ?></td>
								<td><?= $gtPPMSIQ ?></td>
							</tr>
							<tr>
								<td >CAR Open</td>
								<td ><?= $PPMCARo ?></td>
								<td><?= $gtPPMCARo ?></td>
							</tr>
							<tr>
								<td >CAR Closed</td>
								<td ><?= $PPMCARc ?></td>
								<td><?= $gtPPMCARc ?></td>
							</tr>
							<tr>
								<td >SIQ</td>
								<td ><?= $UptimeSIQ ?></td>
								<td><?= $gtUptimeSIQ ?></td>
							</tr>
							<tr>
								<td >CAR Open</td>
								<td><?= $UptimeCARo ?></td>
								<td><?= $gtUptimeCARo ?></td>
							</tr>
							<tr>
								<td >CAR Closed</td>
								<td ><?= $UptimeCARc ?></td>
								<td><?= $gtUptimeCARc ?></td>
							</tr>
							<tr>
								<td >SIQ</td>
								<td ><?= $TotalSIQ ?></td>
								<td><?= $gtTotalSIQ ?></td>
							</tr>
							<tr>
								<td >CAR Open</td>
								<td><?= $TotalCARo ?></td>
								<td><?= $gtTotalCARo ?></td>
							</tr>
							<tr>
								<td >CAR Closed</td>
								<td><?= $TotalCARc ?></td>
								<td><?= $gtTotalCARc ?></td>
							</tr>
						</table>

					</div>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:2px;">
				<td align="center" colspan="4">
				</td>
			</tr>
		</table>
	</div>
</div>