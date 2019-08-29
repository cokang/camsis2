<?php include 'pdf_head.php'?>


<html>
	<head>
	<style>
	.rport-header{padding-bottom:10px;}
	
	.tbl-wor {
    border: 1px solid black;
}
	</style>
	</head>
	<body>
	<table class="rport-header">
		
	</table>
		<table class="tbl-wo" >
			<tr >
				<td>HOSPITAL  </td>
				<td><?=$this->session->userdata('hosp_code')?> </td>
				<td></td>
				<td></td>
				<!--<td style="width:20%; padding-left:5px;">Report No </td>
				<td style="padding-left:5px; text-align:center;"> </td>-->
			</tr>
			<tr >
				<!--<td style="padding-left:5px; "></td>
				<td style="padding-left:5px;"> </td>-->
				<td>MONTH</td>
				<?php
				$strdt = '1/'.$month.'/'.$year;
				//echo "lalala".$strdt;
				$dt = DateTime::createFromFormat('!d/m/Y', $strdt);
				//echo "nilai date :".$dt->format('M Y');
				 
				 ?>
				<td><?=$dt->format('M Y')?></td>
				<td></td>
				<td></td>
			</tr>
			<tr >
				<!--<td style="padding-left:5px; "></td>
				<td style="padding-left:5px;"> </td>-->
				<td>TOTAL MONTHLY SERVICE FEE(RM)</td>
				
				<td><?= isset($acgparam[0]->n_Revenue) ? number_format($acgparam[0]->n_Revenue,2) : 'N/A' ?></td>
				<td></td>
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
		<th width="20" rowspan="2">No</th>
		<th width="70" rowspan="2">Request Date</th>
		<th width="70" rowspan="2">Request No</th>
		<th width="70" rowspan="2">Request Details</th>
		<th width="70" rowspan="2">Asset No</th>
		<th width="60" rowspan="2">Dept</th>
		<th width="200" colspan="<?=count($keyindlist)?>"><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></th>
		<th width="65" rowspan="2">Complete Date</th>
		<th width="70" rowspan="2">Deduction Status</th>
		<th width="70" rowspan="2">Remarks</th>
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
	<table> 
	<tr>
	<td></td></tr>
	</table>
     <table id="tblwo" class="tbl-wor"  border="0" style="text-align:center; width:100%; margin:10 auto;" >
			
			<tr >
				<td style="width:30%;" style=" border-right: 1px solid black; " align="left" colspan="2">Prepared by : AdvancePact Sdn. Bhd.</td>
				<td style="width:33%;"style=" border-right: 1px solid black; "  align="left" colspan="2">Checked By : Peninsular Medical Sdn. Bhd.</td>
				<td style="width:39%;"  style=" border-right: 1px solid black; " align="left" colspan="2">Verified By : International Islamic University Malaysia</td>
			</tr>
			<tr >
				<td style=" border-right: 1px solid black; "  colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
				<td  style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
			</tr>
			<tr >
				<td align="left" >Name:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td align="left">Name:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td  align="left">Name:</td>
				<td ></td>
			</tr>
			<tr >
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
			</tr>
			<tr >
				<td align="left">Designation:</td>
				<td style=" border-right: 1px solid black; "> </td>
				<td  align="left">Designation:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td align="left">Designation:</td>
				<td style=" border-right: 1px solid black; "></td>
			</tr>
			<tr >
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td align="left">Signature:</td>
				<td style=" border-right: 1px solid black; "> </td>
				<td  align="left">Signature:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td  align="left">Signature:</td>
				<td style=" border-right: 1px solid black; "></td>
			</tr>
			<tr >
				<td style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
				<td  style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td  style=" border-right: 1px solid black; "colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td  align="left">Date:</td>
				<td style=" border-right: 1px solid black; "> </td>
				<td  align="left">Date:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td  align="left">Date:</td>
				<td style=" border-right: 1px solid black; "></td>
			</tr>
			<tr>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td  align="left">Chop:</td>
				<td style=" border-right: 1px solid black; "> </td>
				<td  align="left">Chop:</td>
				<td style=" border-right: 1px solid black; "></td>
				<td  align="left">Chop:</td>
				<td style=" border-right: 1px solid black; "></td>
			</tr>
			<tr >
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
				<td style=" border-right: 1px solid black; " colspan="2">&nbsp;</td>
			</tr>
		</table>
	</body>
</html>
<?php include 'pdf_footer.php'?>