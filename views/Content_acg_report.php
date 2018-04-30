
<div class="ui-middle-screen">
	<?php if( $this->input->get('ag') == '1'){?>
	<?php }else{ ?>
	<?php include 'content_menu_acg.php';?>
	<?php }

// echo "<p style='color:black';background-color:black;>". $this->db->last_query(). "</p>";	

	?>
	<div class="content-workorder">

		<div Class="main-cs">
			<div Class="form-cs">
			<span style="color:red;"><?php echo validation_errors(); ?>
		<form action="" method="POST" name="myform">
				 <fieldset>
				  <legend>Form >> Customize Search</legend>
				  <table style="color:black;">
					<tr>
						<td Width="200px">Service Code</td>
						<td> : 
							
							<?php 
								$base_list = array(
								'BES' => 'BES',
								'FES' => 'FES',
								'HKS' => 'HKS',
								//'Security' => 'Security'
							 );
							?>
							<?php echo form_dropdown('n_base', $base_list, (set_value('n_base')) ? set_value('n_base') : $service , 'style="width: 80px; font-size:14px;" id="service_code"'); ?> 
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
							<?php echo form_dropdown('fromMonth', $month_list, set_value('fromMonth',$month),'style="width: 90px; font-size:14px;" id="cs_month"'); ?>
							
							<?php 
								//$yrow = 1;
								for ($dyear = '2015';$year >= $dyear;$year--){
									//if ($yrow <= 5){
									$year_list[$year] = $year;
									//}
									//$yrow++;
								}
							?>
							<?php echo form_dropdown('fromYear', $year_list, set_value('fromYear',$year),'style="width: 65px; font-size:14px;"'); ?>  
							
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;"> 
							<input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Show">
						</td>
					</tr>
				  </table>
				 </fieldset>
			</div>
			<div id="nav" class="form-fp">
				<ul>
				<li>
				<?php if( $this->input->get('ag') == '1'){?>
				<?php echo anchor ('contentcontroller/acg_report?tabIndex=1&ag=1', 'Indicator Parameter' , ($this->input->get('tabIndex') == '1') ? 'class="heloo"' : ''); ?></li>
				<?php }else{ ?>
				<?php echo anchor ('contentcontroller/acg_report?tabIndex=1', 'Indicator Parameter' , ($this->input->get('tabIndex') == '1') ? 'class="heloo"' : ''); ?></li>
				<?php }?>
				<li>
				<?php if( $this->input->get('ag') == '1'){?>
				<?php echo anchor ('contentcontroller/acg_report?tabIndex=2&ag=1', 'Deduction Mapping' , ($this->input->get('tabIndex') == '2') ? 'class="heloo"' : ''); ?></li>
				<?php }else{ ?>
				<?php echo anchor ('contentcontroller/acg_report?tabIndex=2', 'Deduction Mapping' , ($this->input->get('tabIndex') == '2') ? 'class="heloo"' : ''); ?></li>
				<?php }?>
				</ul>
			</div>
			<div class="form-fp">
				<div class="form-mcg-top">
				<div class="text-mcg">
				<?php if($this->input->get('tabIndex') == '1'){ ?>
				<?php  if ($service== "FES") {?>
							<td align="center"><b style="text-transform: uppercase;">Facility Engineering Services</b></td>
						<?php  } elseif ($service== "BES") {?>
						  <td align="center"><b style="text-transform: uppercase;">Biomedical Engineering Services</b></td>
						<?php  } elseif ($service== "HKS") {?>
						<td align="center"><b style="text-transform: uppercase;">Housekeeping Services</b></td>
						<?php }?>
				<?php }?>
				</div>
				<?php if($this->input->get('tabIndex') == '1'){?>
				<?php $num = 0;?>
					<table class="tbl-mcg">
						<tr>
							<th Colspan="9">Demonstration of Agreed Deduction Formula</th>
						</tr>
						<tr>
							<th>No</th>
							<th>Key Deduction Indicators</th>
							<th>Weightage</th>
							<th>Parameter</th>
							<th>Indicator Value Per Month (RM)</th>
							<th>No of Demerit Point</th>
							<th>Deduction Value (RM)</th>
							<th>Deduction %</th>
						</tr>
						<?php 
						$T_Weightage = 0;
						$T_Parameter = 0;
						$T_MonVal = 0;
						$T_DeductionVal = 0;
						$T_DeductionPer = 0;
						?>
						<?php foreach ($keyindlist as $row): ?>
						<tr class="<?php echo ($num++%2==true ? 'mark' : 'even')?>">
							<td align="center"><?=isset($row->v_IndicatorNo) ? $row->v_IndicatorNo : ''?></td>
							<td align="left"><?=isset($row->v_IndicatorName) ? $row->v_IndicatorName : ''?></td>
							<td align="center"><?=isset($row->n_Weightage) ? $row->n_Weightage : ''?></td>
							<?php $DeductionVal = 0; 
							      $DeductionPer = 0; ?>
							<?php if ($acgparam) { ?>
							<?php foreach ($acgparam as $acg): ?>
							<?php if ($row->v_IndicatorNo == $acg->v_IndicatorNo) { ?>
							<td align="center"><?=isset($acg->v_Paramval) ? $acg->v_Paramval : ''?></td>
							<td align="center"><?=isset($acg->n_Parameters) ? number_format($acg->n_Parameters,2) : ''?></td>
							<?php $indno = 'ind'.$row->v_IndicatorNo?>
							<td align="center"><?=isset($acg->Demerit_Point) ? $acg->Demerit_Point : ''?></td>
							<!--<td align="center"><?=isset($acgreport[0]->$indno) ? $acgreport[0]->$indno : ''?></td>-->
							<?php
							$Parameter = isset($acg->v_Paramval) ? $acg->v_Paramval : 0;
							$MonValue = isset($acg->n_Parameters) ? $acg->n_Parameters : 0;
							$DemeritPoint = isset($acg->Demerit_Point) ? $acg->Demerit_Point : 0;
							//$DemeritPoint = isset($acgreport[0]->$indno) ? $acgreport[0]->$indno : 0;
							if ($DemeritPoint != 0) {
							$DeductionVal = ($MonValue / $Parameter) * $DemeritPoint;
							$DeductionPer = ($DeductionVal / $MonValue) * 100; } else {
							$DeductionVal = 0;
							$DeductionPer = 0;}

							$T_Parameter += $Parameter;
							$T_MonVal += $MonValue;
							$T_DeductionVal += $DeductionVal;
							//$T_DeductionPer += $DeductionPer;
							$T_DeductionPer = ($T_DeductionVal / $T_MonVal) * 100;
							?> 
							<?php } ?>
							<?php endforeach; ?>
							<?php } else { ?>
							<td align="center"></td>
							<td align="center"></td>
							<?php $indno = 'ind'.$row->v_IndicatorNo?>
							<!--<td align="center"><?=isset($acgreport[0]->$indno) ? $acgreport[0]->$indno : ''?></td>-->
							<td align="center"><?=isset($acg->Demerit_Point) ? $acg->Demerit_Point : ''?></td>
							<?php } ?>
							<td align="center"><?=number_format($DeductionVal,2)?></td>
							<td align="center"><?=number_format($DeductionPer,2).'%'?></td>
							<?php 
							$n_Weightage = isset($row->n_Weightage) ? $row->n_Weightage : 0;
							$T_Weightage += $n_Weightage;
							?>
						</tr>
						<?php endforeach; ?>
						<tr class="<?php echo ($num++%2==true ? 'mark' : 'even')?>" style="font-weight:bold;">
							<td style="text-align:right;" colspan="2">Total</td>
							<td align="center"><?=number_format($T_Weightage,2)?></td>
							<td align="center"><?=$T_Parameter?></td>
							<td align="center">$<?=number_format($T_MonVal,2)?></td>
							<td align="center"></td>
							<td align="center">$<?=number_format($T_DeductionVal,2)?></td>
							<td align="center"><?=number_format($T_DeductionPer,2)?>%</td>
						</tr>
					</table>
				<?php }elseif($this->input->get('tabIndex') == '2'){ ?>
					
					<table class="tbl-mcg">
						<tr>
						<form action="" method="POST" name="myform">
							<th Colspan="20" style="text-align:left;">DEDUCTION FORMULA MAPPING : <?php 
								$deduction = array(
								'1' => 'Unscheduled WO',
								'2' => 'Scheduled WO',
								//'3' => 'Complaint',
								//'4' => 'Other activities',
								);
							?>
							<?php echo form_dropdown('deductiont', $deduction, set_value('deductiont') , 'id="service_code" onchange="javascript: submit()"'); ?> <br />
							HOSPITAL : IIUM MEDICAL CENTRE PAHANG <span align="right" style="float:right;">DATE : <?=date('F', mktime(0, 0, 0, $fmonth, 10))?> <?=$fyear?></span>
							</th>
						</tr>
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">Request Date</th>
							<th rowspan="2">Request No</th>
							<th rowspan="2">Request Details</th>
							<th rowspan="2">Asset No</th>
							<th rowspan="2">Dept</th>
							<th colspan="<?=count($keyindlist)?>"><?=date('F', mktime(0, 0, 0, $fmonth, 10))?> <?=$fyear?></th>
							<th rowspan="2">Complete Date</th>
							<th rowspan="2">Deduction Status</th>
							<th rowspan="2">Remarks</th>
						</tr>
						<tr>
							<?php for ($ind = 1;$ind <= count($keyindlist);$ind++) { ?>
							<th><?=$ind?></th>
							<?php } ?>
						</tr>
						<?php $rnum = 1;foreach ($deductmap as $dm): ?>
					
						    <tr class="even">
							<?php if($t==1){ ?>
						   	<td align="center"><?=$rnum++?></td>
							<td align="center"><?=isset($dm->D_date) ? date('d M Y',strtotime($dm->D_date)) : '' ?></td>
							<td align="center" style="color:blue;"><?=isset($dm->v_requestno) ? $dm->v_requestno : ''?> </td>
							<td align="center"><?=isset($dm->V_summary) ? $dm->V_summary : ''?></td>
							<td align="center"><?=isset($dm->V_Asset_no) ? $dm->V_Asset_no : ''?></td>
							 <td align="center"><?=isset($dm->V_User_dept_code) ? $dm->V_User_dept_code : ''?></td>	
							<?php for ($ind = 1;$ind <= count($keyindlist); $ind++) { ?>
							<?php $indnom = 'v_IndicatorNo'.$ind; ?>
							<td align="center"><?=isset($dm->$indnom) ? $dm->$indnom : ''?></td>
							<?php } ?>
							<!--<td align="center"><?=isset($dm->v_IndicatorNo1) ? $dm->v_IndicatorNo1 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo2) ? $dm->v_IndicatorNo2 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo3) ? $dm->v_IndicatorNo3 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo4) ? $dm->v_IndicatorNo4 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo5) ? $dm->v_IndicatorNo5 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo6) ? $dm->v_IndicatorNo6 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo7) ? $dm->v_IndicatorNo7 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo8) ? $dm->v_IndicatorNo8 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo9) ? $dm->v_IndicatorNo9 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo10) ? $dm->v_IndicatorNo10 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo11) ? $dm->v_IndicatorNo11 : ''?></td>-->
							
							<td align="center"><?=isset($dm->v_closeddate) ? date('d M Y',strtotime($dm->v_closeddate)) : '' ?></td>
							<?php
							$status = isset($dm->v_Status) ? $dm->v_Status : '';

							switch ($status) {
								case "1":
							        $destat = "Agreed";
							        break;
							    case "2":
							        $destat = "Disputed";
							        break;
							    case "3":
							        $destat = "Valid & Closed";
							        break;
							    case "4":
							        $destat = "Not Valid & Closed";
							        break;
							    case "5":
							        $destat = "Validated but Disputed";
							        break;
							    default:
							        $destat = "";
							}

							?>
							<td align="center"><?=$destat?></td>
							<td align="center"><?=isset($dm->v_VCM_Remarks) ? $dm->v_VCM_Remarks : ''?></td>		
							
							<?php }else { ?>
							
							
						  	<td align="center"><?=$rnum++?></td>
							<td align="center"><?=isset($dm->d_StartDt) ? date('d M Y',strtotime($dm->d_StartDt)) : '' ?></td>
							<td align="center" style="color:blue;"><?=isset($dm->v_requestno) ? $dm->v_requestno : ''?> </td>
							<td align="center"><?=isset($dm->v_summary) ? $dm->v_summary : ''?></td>
							<td align="center"><?=isset($dm->v_Asset_no) ? $dm->v_Asset_no : ''?></td>
							 <td align="center"><?=isset($dm->V_User_Dept_code) ? $dm->V_User_Dept_code : ''?></td>		
							<?php for ($ind = 1;$ind <= count($keyindlist); $ind++) { ?>
							<?php $indnom = 'v_IndicatorNo'.$ind; ?>
							<td align="center"><?=isset($dm->$indnom) ? $dm->$indnom : ''?></td>
							<?php } ?>
							<!--<td align="center"><?=isset($dm->v_IndicatorNo1) ? $dm->v_IndicatorNo1 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo2) ? $dm->v_IndicatorNo2 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo3) ? $dm->v_IndicatorNo3 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo4) ? $dm->v_IndicatorNo4 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo5) ? $dm->v_IndicatorNo5 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo6) ? $dm->v_IndicatorNo6 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo7) ? $dm->v_IndicatorNo7 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo8) ? $dm->v_IndicatorNo8 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo9) ? $dm->v_IndicatorNo9 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo10) ? $dm->v_IndicatorNo10 : ''?></td>
							<td align="center"><?=isset($dm->v_IndicatorNo11) ? $dm->v_IndicatorNo11 : ''?></td>-->
							
							<td align="center"><?=isset($dm->v_closeddate) ? date('d M Y',strtotime($dm->v_closeddate)) : '' ?></td>
							<?php
							$status = isset($dm->v_Status) ? $dm->v_Status : '';

							switch ($status) {
								case "1":
							        $destat = "Agreed";
							        break;
							    case "2":
							        $destat = "Disputed";
							        break;
							    case "3":
							        $destat = "Valid & Closed";
							        break;
							    case "4":
							        $destat = "Not Valid & Closed";
							        break;
							    case "5":
							        $destat = "Validated but Disputed";
							        break;
							    default:
							        $destat = "";
							}

							?>
							<td align="center"><?=$destat?></td>
							<td align="center"><?=isset($dm->v_VCM_Remarks) ? $dm->v_VCM_Remarks : ''?></td>	
							<?php } ?>
						</tr>
						<?php endforeach; ?>
						<!--<tr class="mark">
							<td align="center">2</td>
							<td align="center" style="color:blue;">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">SPO2 bermasalah. MKA IIUM B002</td>
							<td align="center">IIUM B002</td>
							<td align="center">2-3</td>
							<td align="center"></td>
							<td align="center">10</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center">06 Mar 2015</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						</tr>-->
					</table>
					
					<!--<?php if ($t == 1){?>
					<table class="tbl-mcg">
						<tr>
							<th Colspan="20" style="text-align:left;">Brought Fwd</th>
						</tr>
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">Request Date</th>
							<th rowspan="2">Request No</th>
							<th rowspan="2">Request Details</th>
							<th rowspan="2">Asset No</th>
							<th rowspan="2">Dept</th>
							<th colspan="11">FEBRUARY 2016</th>
							<th rowspan="2">Complete Date</th>
							<th rowspan="2">Deduction Status</th>
							<th rowspan="2">Remarks</th>
						</tr>
						<tr>
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
							<th>6</th>
							<th>7</th>
							<th>8</th>
							<th>9</th>
							<th>10</th>
							<th>11</th>
						</tr>
						<tr class="even">
							<td align="center">1</td>
							<td align="center">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">Ventilators bermasalah - IIUM B003</td>
							<td align="center">IIUM B003</td>
							<td align="center">SCN</td>
							<td align="center"></td>
							<td align="center">100</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"> 06 Mar 2015	</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						</tr>
						<tr class="mark">
							<td align="center">2</td>
							<td align="center">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">Ventilators bermasalah - IIUM B004</td>
							<td align="center">IIUM B004</td>
							<td align="center">SCN</td>
							<td align="center"></td>
							<td align="center">100</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"> 06 Mar 2015	</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						</tr>
					</table>
					<table class="tbl-mcg">
						<tr>
							<th Colspan="20" style="text-align:left;">Brought Fwd Completed</th>
						</tr>
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">Request Date</th>
							<th rowspan="2">Request No</th>
							<th rowspan="2">Request Details</th>
							<th rowspan="2">Asset No</th>
							<th rowspan="2">Dept</th>
							<th colspan="11">FEBRUARY 2016</th>
							<th rowspan="2">Complete Date</th>
							<th rowspan="2">Deduction Status</th>
							<th rowspan="2">Remarks</th>
						</tr>
						<tr>
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
							<th>6</th>
							<th>7</th>
							<th>8</th>
							<th>9</th>
							<th>10</th>
							<th>11</th>
						</tr>
						<tr class="even">
							<td align="center">1</td>
							<td align="center">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">Ventilators bermasalah - IIUM B005</td>
							<td align="center">IIUM B005</td>
							<td align="center">SCN</td>
							<td align="center"></td>
							<td align="center">100</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"> 06 Mar 2015	</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						<tr class="mark">
							<td align="center">2</td>
							<td align="center">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">Ventilators bermasalah - IIUM B006</td>
							<td align="center">IIUM B006</td>
							<td align="center">SCN</td>
							<td align="center"></td>
							<td align="center">100</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"> 06 Mar 2015	</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						</tr>
					</table>
					<?php }elseif ($t == 2){?>
					<table class="tbl-mcg">
						<tr>
							<th Colspan="20" style="text-align:left;">A3 Current</th>
						</tr>
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">Request Date</th>
							<th rowspan="2">Request No</th>
							<th rowspan="2">Request Details</th>
							<th rowspan="2">Asset No</th>
							<th rowspan="2">Dept</th>
							<th colspan="11">FEBRUARY 2016</th>
							<th rowspan="2">Complete Date</th>
							<th rowspan="2">Deduction Status</th>
							<th rowspan="2">Remarks</th>
						</tr>
						<tr>
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
							<th>6</th>
							<th>7</th>
							<th>8</th>
							<th>9</th>
							<th>10</th>
							<th>11</th>
						</tr>
						<tr class="even">
							<td align="center">1</td>
							<td align="center">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">Ventilators bermasalah - IIUM B003</td>
							<td align="center">IIUM B003</td>
							<td align="center">SCN</td>
							<td align="center"></td>
							<td align="center">100</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"> 06 Mar 2015	</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						</tr>
						<tr class="mark">
							<td align="center">2</td>
							<td align="center">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">Ventilators bermasalah - IIUM B004</td>
							<td align="center">IIUM B004</td>
							<td align="center">SCN</td>
							<td align="center"></td>
							<td align="center">100</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"> 06 Mar 2015	</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						</tr>
					</table>
					<table class="tbl-mcg">
						<tr>
							<th Colspan="20" style="text-align:left;">A3 Brought Fwd</th>
						</tr>
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">Request Date</th>
							<th rowspan="2">Request No</th>
							<th rowspan="2">Request Details</th>
							<th rowspan="2">Asset No</th>
							<th rowspan="2">Dept</th>
							<th colspan="11">FEBRUARY 2016</th>
							<th rowspan="2">Complete Date</th>
							<th rowspan="2">Deduction Status</th>
							<th rowspan="2">Remarks</th>
						</tr>
						<tr>
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
							<th>6</th>
							<th>7</th>
							<th>8</th>
							<th>9</th>
							<th>10</th>
							<th>11</th>
						</tr>
						<tr class="even">
							<td align="center">2</td>
							<td align="center">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">Ventilators bermasalah - MKA48506 (SCN)</td>
							<td align="center">BEVEN03-0065</td>
							<td align="center">SCN</td>
							<td align="center"></td>
							<td align="center">100</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"> 06 Mar 2015	</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						</tr>
						<tr class="mark">
							<td align="center">2</td>
							<td align="center">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">Ventilators bermasalah - MKA48506 (SCN)</td>
							<td align="center">BEVEN03-0065</td>
							<td align="center">SCN</td>
							<td align="center"></td>
							<td align="center">100</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"> 06 Mar 2015	</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						</tr>
					</table>
					<table class="tbl-mcg">
						<tr>
							<th Colspan="20" style="text-align:left;">A3 Brought Fwd Completed</th>
						</tr>
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">Request Date</th>
							<th rowspan="2">Request No</th>
							<th rowspan="2">Request Details</th>
							<th rowspan="2">Asset No</th>
							<th rowspan="2">Dept</th>
							<th colspan="11">FEBRUARY 2016</th>
							<th rowspan="2">Complete Date</th>
							<th rowspan="2">Deduction Status</th>
							<th rowspan="2">Remarks</th>
						</tr>
						<tr>
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
							<th>6</th>
							<th>7</th>
							<th>8</th>
							<th>9</th>
							<th>10</th>
							<th>11</th>
						</tr>
						<tr class="even">
							<td align="center">1</td>
							<td align="center">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">Ventilators bermasalah - MKA48506 (SCN)</td>
							<td align="center">BEVEN03-0065</td>
							<td align="center">SCN</td>
							<td align="center"></td>
							<td align="center">100</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"> 06 Mar 2015	</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						</tr>
						<tr class="mark">
							<td align="center">2</td>
							<td align="center">02 Mar 2015</td>
							<td align="center" style="color:blue;">RQ/A4/B97495/15</td>
							<td align="center">Ventilators bermasalah - MKA48506 (SCN)</td>
							<td align="center">BEVEN03-0065</td>
							<td align="center">SCN</td>
							<td align="center"></td>
							<td align="center">100</td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"> 06 Mar 2015	</td>
							<td align="center">Agreed</td>
							<td align="center"></td>
						</tr>
					</table>
					<?php } ?>-->
					
					</form>
				<?php } ?>
				</div>
			</div>
			
	</div>	
	</div>
</div>
</body>
</html>