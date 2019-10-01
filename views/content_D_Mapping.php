<?php 
if ($this->input->get('ex') == 'excel'){
$filename ="Deduction Mapping Report - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>


<body><?php if ($this->input->get('ex') == ''){?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr" style="text-transform:uppercase;">Deduction Mapping Report</div>
		<button onclick="javascript:myFunction('D_Mapping?sev=<?=$this->input->get('sev')?>&mth=<?=$this->input->get('mth')?>&yr=<?=$this->input->get('yr')?>');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>acg_report?tabIndex=1';">CANCEL</button>
		<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/D_Mapping?sev=<?=$this->input->get('sev')?>&mth=<?=$this->input->get('mth')?>&yr=<?=$this->input->get('yr')?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<a href="<?php echo base_url();?>index.php/contentcontroller/D_Mapping?pdf=1&sev=<?=$this->input->get('sev')?>&mth=<?=$this->input->get('mth')?>&yr=<?=$this->input->get('yr')?>"  style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:38px; height:36px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
	</div>	<?php } ?>
	<div class=Section1> 
	<div class=""><?php if ($this->input->get('ex') == ''){?>
		<table class="tbl-wo" border="0" style=" margin:10 auto; width:100%;"  align="center" >
			<tr>
				<td style="padding-left:0px; width:20%;" align="center"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:30px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b style="text-transform: uppercase;">Mapping Deduction Report</b></td>
						</tr>
						<!--<tr>
						<?php  if ($service== "FES") {?>
							<td align="center"><b style="text-transform: uppercase;">Facility Engineering Services</b></td>
						<?php  } elseif ($service== "BES") {?>
						  <td align="center"><b style="text-transform: uppercase;">Biomedical Engineering Services</b></td>
						<?php  } elseif ($service== "HKS") {?>
						<td align="center"><b style="text-transform: uppercase;">Housekeeping Services</b></td>
						<?php }?>
						</tr>saya ensem dan pandai-->
					</table>
				</td>
				<td style="padding-left:0px; width:20%;" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:100px; height:40px;"/></td>
			</tr>
			
		</table>
			<?php } ?>
		<table class="tbl-wo" border="0" >
			<tr >
				<td style="width:20%; padding-left:5px;">HOSPITAL  </td>
				<td style="width:20%; padding-left:5px; text-align:left;"><?=$this->session->userdata('hosp_code')?> </td>
				<td style="width:20%; padding-left:5px;"></td>
				<td style="width:20%; padding-left:5px; text-align:center;"></td>
				<!--<td style="width:20%; padding-left:5px;">Report No </td>
				<td style="padding-left:5px; text-align:center;"> </td>-->
			</tr>
			<tr >
				<!--<td style="padding-left:5px; "></td>
				<td style="padding-left:5px;"> </td>-->
				<td style="padding-left:5px;">MONTH</td>
				<?php
				$strdt = '1/'.$month.'/'.$year;
				//echo "lalala".$strdt;
				$dt = DateTime::createFromFormat('!d/m/Y', $strdt);
				//echo "nilai date :".$dt->format('M Y');
				 
				 ?>
				<td style="padding-left:5px; text-align:left;"><?=$dt->format('M Y')?></td>
				<td style="padding-left:5px;"></td>
				<td style="padding-left:5px; text-align:center;"></td>
			</tr>
			<tr >
				<!--<td style="padding-left:5px; "></td>
				<td style="padding-left:5px;"> </td>-->
				<td style="padding-left:5px;">TOTAL MONTHLY SERVICE FEE(RM)</td>
				
				<td style="padding-left:5px; text-align:left;"><?= isset($acgparam[0]->n_Revenue) ? number_format($acgparam[0]->n_Revenue,2) : 'N/A' ?></td>
				<td style="padding-left:5px;"></td>
				<?php  if ($service== "FES") {?>
							<td style="padding-left:5px;" align="right">SERVICE : FES</td>
						<?php  } elseif ($service== "BES") {?>
						  <td style="padding-left:5px;" align="right">SERVICE : BES</td>
						<?php  } elseif ($service== "HKS") {?>
						<td style="padding-left:5px;" align="right">SERVICE : HKS</td>
						<?php }?>
			</tr>
		</table>
		<table id="adtable" class="tftable tbl-size"  border="1" style="text-align:center; width:90%; margin:0 auto; background:white;">
		<tr>
		<th rowspan="2">No</th>
		<th rowspan="2">Request Date</th>
		<th rowspan="2">Request No</th>
		<th rowspan="2">Request Details</th>
		<th rowspan="2">Asset No</th>
		<th rowspan="2">Dept</th>
		<th colspan="<?=count($keyindlist)?>"><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></th>
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
						</tr>
						<?php endforeach; ?>
		
	</table>
	<table id="tblwo" class="tbl-wo"   border="0" align="center" style=" margin:10 auto; width:90%;" frame="box" >
			<tr >
				<td style="width:20%; padding-left:5px;border-right:1px solid black;" colspan="2">Prepared by : AdvancePact Sdn. Bhd.</td>
				<td style="width:20%; padding-left:5px;border-right:1px solid black;" colspan="2">Checked By : Peninsular Medical Sdn. Bhd.</td>
				<td style="width:20%; padding-left:5px;border-right:1px solid black;" colspan="2">Verified By : International Islamic University Malaysia</td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
			<tr >
				<td style="padding-left:5px; ">Name:</td>
				<td style="padding-left:5px;border-right:1px solid black;" align="center"> </td>
				<td style="padding-left:5px;">Name:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
				<td style="padding-left:5px;">Name:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
			<tr >
				<td style="padding-left:5px; ">Designation:</td>
				<td style="padding-left:5px;border-right:1px solid black;" align="center"> </td>
				<td style="padding-left:5px;">Designation:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
				<td style="padding-left:5px;">Designation:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
			<tr >
				<td style="padding-left:5px; ">Signature:</td>
				<td style="padding-left:5px;border-right:1px solid black;" align="center"> </td>
				<td style="padding-left:5px;">Signature:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
				<td style="padding-left:5px;">Signature:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
			<tr >
				<td style="padding-left:5px; ">Date:</td>
				<td style="padding-left:5px;border-right:1px solid black;" align="center"> </td>
				<td style="padding-left:5px;">Date:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
				<td style="padding-left:5px;">Date:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
			<tr >
				<td style="padding-left:5px; ">Chop:</td>
				<td style="padding-left:5px;border-right:1px solid black;" align="center"> </td>
				<td style="padding-left:5px;">Chop:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
				<td style="padding-left:5px;">Chop:</td>
				<td style="padding-left:5px; text-align:center;border-right:1px solid black;"></td>
			</tr>
			<tr >
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
				<td style="padding-left:5px;border-right:1px solid black;" colspan="2">&nbsp</td>
			</tr>
		</table>
	</div></div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	</body>
</html>

