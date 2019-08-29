<?php include 'pdf_head.php'?>

<style>
.wrapper{
	margin:20px 150px 10px 150px;
}
img{
	display: block;
    margin-left: auto;
    margin-right: auto
}
.h1-po{
	display: block;
	font-weight: bold;
	font-size:12px;
	text-transform: uppercase;
	width:98%;
	text-align:center;
	margin-top:10px;
	padding:10px;
	border:1px solid black;
}
.h1-po-no{
	display: block;
	font-weight: bold;
	font-size:12px;
	width:98%;
	text-align:center;
	margin-top:10px;
	padding:10px;
}

.garis{

border-bottom: solid 1px black;
}

.tbl-info-detail{
	font-size:10px;

}
.tbl-info-td{

 font-weight: bold;
}

.tbl-info-po{
	font-size:10px;
border-bottom: 1px solid black;
border-top: 1px solid black;
border-left: 1px solid black;
border-right: 1px solid black;
	text-transform: uppercase;
	width:50%;
	margin:auto;
}
.tbl-info-pr{
	font-size:10px;

}
.tbl-info-invoice{
	font-size:10px;
border-bottom: 1px solid black;
border-top: 1px solid black;
border-left: 1px solid black;
border-right: 1px solid black;
}
.tbl-info-invoice tr th {height:40px; border:1px solid black;text-align:center;}
.tbl-info-invoice td {padding:20px; text-align:center;}
.tbl-info-invoice tr:nth-child(2) { height:50px;vertical-align:top;}
.tbl-info-invoice tr th:nth-child(2) { width:400px;}

.tbl-info-tc tr td.tc-address{padding:20px; text-align:center;}
.tbl-info-tc{
	font-size:7px;
	border-width: 1px;
	border-collapse: collapse;

	width:100%;
	font-weight:bold;
}


</style>

<html>
	<head>


	</head>
	<body>
			<div class="wrapper">

<div class="h1-po">purchase order</div><div class="garis">
<div class="h1-po-no">Purchase Order No : <?=($this->input->get('po') <> '') ? $this->input->get('po') : ''?></div></div>
<table border="0" style="margin-top:10px;padding:10px;" width="80%">
<tr>
<td width="60%"><div class="info-po"><!-- <?=(isset($veninfo[0]->VENDOR_NAME)) ? $veninfo[0]->VENDOR_NAME : ''?> -->
	<table style="padding:5px;" width="150%" border="0" class="tbl-info-po">
		<tr>
			<td style="padding-bottom:10px; width:10%;" valign="top">To :</td>
			<td style="width: 63%"><b><?=(isset($veninfo[0]->VENDOR_NAME)) ? $veninfo[0]->VENDOR_NAME : ''?></b><br /><?=(isset($veninfo[0]->ADDRESS)) ? $veninfo[0]->ADDRESS : '' ?><br/><?=(isset($veninfo[0]->ADDRESS2))  ? $veninfo[0]->ADDRESS2 : '' ?><br/><?=(isset($veninfo[0]->ADDRESS3)) ? $veninfo[0]->ADDRESS3 : ''?><br/>&nbsp;</td>
		</tr>
		<tr>
			<td>Tel : </td>
			<td><?=(isset($veninfo[0]->TELEPHONE_NO)) ? $veninfo[0]->TELEPHONE_NO : ''?></td>
		</tr>
		<tr>
			<td>Fax : </td>
			<td><?=(isset($veninfo[0]->FAX_NO)) ? $veninfo[0]->FAX_NO : ''?></td>
		</tr>
	</table>
		</div></td>
		<td width="40%" ><div class="info-pr">
		<br><br><br><br>
	<table border="0" class="">
		<tr>
			<td align="right" width="40%" style="border-right:1px solid black;width:40px;"><b>Po Date	&nbsp;</b> </td>
			<?php
	     if (isset($podetail[0]->PO_Date)){
			$da = new DateTime($podetail[0]->PO_Date);
		 } else {
			$da = new DateTime();
		 }
			$das = $da->format('j M Y');
			$dayy = $da->format('j');
			$mon = $da->format('m');
			$yr = $da->format('Y');


			function intPart($float)
{
    if ($float < -0.0000001)
        return ceil($float - 0.0000001);
    else
        return floor($float + 0.0000001);
}

			function Greg2Hijri($day, $month, $year, $string = false)
{
    $day   = (int) $day;
    $month = (int) $month;
    $year  = (int) $year;

    if (($year > 1582) or (($year == 1582) and ($month > 10)) or (($year == 1582) and ($month == 10) and ($day > 14)))
    {
        $jd = intPart((1461*($year+4800+intPart(($month-14)/12)))/4)+intPart((367*($month-2-12*(intPart(($month-14)/12))))/12)-
        intPart( (3* (intPart(  ($year+4900+    intPart( ($month-14)/12)     )/100)    )   ) /4)+$day-32075;
    }
    else
    {
        $jd = 367*$year-intPart((7*($year+5001+intPart(($month-9)/7)))/4)+intPart((275*$month)/9)+$day+1729777;
    }

    $l = $jd-1948440+10632;
    $n = intPart(($l-1)/10631);
    $l = $l-10631*$n+354;
    $j = (intPart((10985-$l)/5316))*(intPart((50*$l)/17719))+(intPart($l/5670))*(intPart((43*$l)/15238));
    $l = $l-(intPart((30-$j)/15))*(intPart((17719*$j)/50))-(intPart($j/16))*(intPart((15238*$j)/43))+29;

    $month = intPart((24*$l)/709);
    $day   = $l-intPart((709*$month)/24);
    $year  = 30*$n+$j-30;

    $date = array();
    $date['year']  = $year;
    $date['month'] = $month;
    $date['day']   = $day;

		$bulanda = array();
		$bulanda = array("kosong", "Muharram", "Safar", "RabiulAwwal", "Rabiuthani", "JumadiulAwwal", "Jumadiuthani", "Rajab", "Shaban", "Ramadan", "Shawwal", "ZhulQada", "ZhulHijja");

    if (!$string)
        return $date;
    else
        //return     "{$year}-{$month}-{$day}";
				return "$day $bulanda[$month] $year";
}
			$arabla = Greg2Hijri($dayy,$mon,$yr,"true");
			//echo "lkajsdk:".print_r($arabla).$arabla[day]." ".$arabla[month]." ".$arabla[year];
			//echo "lkajsdk:".$arabla;
			 ?>
			<td width="90%">	&nbsp;<?=$arabla?> / <?=$das?></td>
		</tr>
		<tr>
			<td style="border-right:1px solid black;" align="right"><b>Your Ref.&nbsp;&nbsp;</b> </td>
			<td></td>
		</tr>
		<tr>
			<td style="border-right:1px solid black;"align="right"><b>PR No.</b>&nbsp;&nbsp; </td>
			<td>	&nbsp;N/A</td>
		</tr>
		<tr>
			<td style="border-right:1px solid black;"align="right"><b>MRIN No.</b>&nbsp;&nbsp;</td>
			<td>	&nbsp;<?=($this->input->get('mrin') <> '') ? $this->input->get('mrin') : ''?></td>
		</tr>
		<tr>
			<td style="border-right:1px solid black;" align="right"><b>Page.</b>&nbsp;&nbsp; </td>
			<td>	&nbsp;1/1</td>
		</tr>
	</table>
	</div></td>
</tr>

</table>
		<table class="tbl-info-detail" style="margin-top: 0px">
	<tr>
		<td class="bold"></td>
		<td><b>DELIVERY ADDRESS : ADVANCE PACT SDN BHD</b></td>
	</tr>
	<tr>
		<td class="tbl-info-td">ASSET NO : <?=(isset($record[0]->V_Asset_no)) ? $record[0]->V_Asset_no :''?></td>
		<td><?=$hospdet[0]->v_HospitalName?></td>
	</tr>
	<tr>
		<td class="tbl-info-td">EQUIPMENT: <?=(isset($record[0]->V_Asset_name)) ? $record[0]->V_Asset_name :''?></td>
		<td><?=$hospdet[0]->v_HospitalAdd1?> <?=$hospdet[0]->v_HospitalAdd2?></td>
	</tr>
	<tr>
		<td class="tbl-info-td">DEPARTMENT : <?=(isset($record[0]->V_User_Dept_code)) ? $record[0]->V_User_Dept_code :''?> </td>
		<td><?=$hospdet[0]->v_HospitalAdd3?> <?=$hospdet[0]->v_hosp_postcode?></td>
	</tr>
	<tr>
		<td class="tbl-info-td">WORK ORDER NO : <?=(isset($record[0]->V_Request_no)) ? $record[0]->V_Request_no :''?> </td>
		<td><b><i>ATTN:<?=$hospdet[0]->v_head_of_bems?> / <?=$hospdet[0]->v_teleno?></i></b></td>
	</tr>
	</table><br><br><br>
		<table class="tbl-info-invoice">
	<tr nobr="true">
		<th width="4%">No</th>
		<th width="27%">Description</th>
		<th>Unit <br/> Measure</th>
		<th width="5%">Qty</th>
		<th>Unit Price <br/> (RM)</th>
		<th>Amount (RM)<br/> Before GST</th>
		<th width="8%">GST %</th>
		<th width="8%">GST (RM)</th>
		<th width="15%">Amount (RM)<br/> After GST</th>
	</tr>
	<tr nobr="true">
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;text-align:left;"><b><u><?=$record[0]->V_Asset_name?></u></b><br /><b><u>Model : <?=$record[0]->V_Model_no?></u></b> </td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
	</tr>


				<tr nobr="true" style="height:20px;vertical-align:top; border-top:hidden;">
					<td style="border-right:1px solid black;">1</td>
					<td style=" border-right:1px solid black;text-align:left;"><?=$itemrec[0]->ItemName?><br /> P/N : </td>
					<td style="border-right:1px solid black;">UNIT</td>
					<td style="border-right:1px solid black;" ><?=$itemrec[0]->QtyReqfx?></td>
					<?php
					$howmanyunit = floatval($itemrec[0]->QtyReqfx);
					$perunit = floatval($itemrec[0]->Unit_Costx);
					$totalcost = $perunit*$howmanyunit;
					$gstcost = $totalcost*.06;
					$totalwgst = $gstcost+$totalcost;
					//echo "qwqwqw".$itemrec[0]->Unit_Costx."iuiuiu".$perunit;
					?>
					<td style="border-right:1px solid black;" align="right"><?=number_format($perunit,2)?></td>
					<td style="border-right:1px solid black;" align="right"><?=number_format($totalcost,2)?></td>


					<td style="border-right:1px solid black;" align="right">6%</td>
					<td style="border-right:1px solid black;" align="right"><?=number_format($gstcost,2)?></td>
					<td style="border-right:1px solid black;" align="right"><?=number_format($totalwgst,2)?></td>

				</tr>




	<tr nobr="true" style="height:80%; border-top-style:hidden;">
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>
		<td style="border-right:1px solid black;"></td>

	</tr>
	<tr nobr="true" style="height:20px; border-top-style:hidden;">
		<td style="border-right:1px solid black;border-bottom:1px solid black;"></td>
		<td style="border-right:1px solid black;border-bottom:1px solid black;text-align:left;"><br><br>Discount</td>
		<td style="border-right:1px solid black;border-bottom:1px solid black;" ></td>
		<td style="border-right:1px solid black;border-bottom:1px solid black;"></td>
		<td style="border-right:1px solid black;border-bottom:1px solid black;"></td>
		<td style="border-right:1px solid black;border-bottom:1px solid black;"></td>
		<td style="border-right:1px solid black;border-bottom:1px solid black;"></td>
		<td style="border-right:1px solid black;border-bottom:1px solid black;"></td>
		<td style="border-right:1px solid black;border-bottom:1px solid black;"></td>
	</tr>
	<tr nobr="true">
		<td colspan="6" style="text-align:left; padding-left:5px; text-transform: none; height:20px;"><i>Please notify us immediately (refer PO acceptance form) if this order cannot</i><br /><i>be shipped or completed on before 14 days from the last date of signatory</i></td>
		<td colspan="2" style="border-right:1px solid black;border-left:1px solid black;" >TOTAL PRICE <br /> AFTER GST</td>
		<td align="right"><?=number_format($totalwgst,2)?></td>
	</tr>
</table>
<table  border="0" class="tbl-info-tc">
<br><br>
	<tr>
		<td colspan="3"><br><i>Terms & Condition :-</i></td>
	</tr>
	<tr>
		<td width="4%" valign="top"><i>i)</i></td>
		<td width="70%"><i>As human health care provider, the repaired, supply devices and services carried out <br /> must comply to Occupational Health and Safety (OHS) Standard and Environmental <br /> Quality Act 1974(EQA).</i></td>
		<td width="20%">Authorised Signatory :</td>
	</tr>
	<tr>
		<td valign="top"><i>ii)</i></td>
		<td><i>Delivery of part/goods must be made to the address mentioned above.</i></td>
		<td></td>
	</tr>
	<tr>
		<td valign="top"><i>iii)</i></td>
		<td><i>Invoice together with job sheet/service report/delivery order shall be sent to : <br /> <span style="font-weight:normal; display:block;">HEAD OFFICE : 2-3A, Perdana The Place, Jalan PJU 8/5G, <br/> Bandar Damansara Perdana , 47820 Petaling Jaya, Selangor </span></i></td>
		<td></td>
	</tr>
	<tr>
		<td valign="top"><i>iv)</i></td>
		<td>Payment terms:- [] Cash on delivery [] Cash in Advance [] 30 Days from invoice date</td>
		<td></td>
	</tr>
	<tr>
		<td valign="top"><i>v)</i></td>
		<td><i>Purchase Order valid for 30 days from date mentioned above.</i></td>
		<td></td>
	</tr>
	<tr>
		<td valign="top"><i>vi)</i></td>
		<td><i>Advance Pact Shd Bhd GST Registration Number : 001458896896</i></td>
		<td>Date :</td>
	</tr>
	<br><br>
	<tr>
		<td class="tc-address" colspan="3">HEAD OFFICE : 2-3A, Perdana The Place, Jalan PJU 8/5G, Bandar Damansara Perdana , 47820 Petaling Jaya, Selangor Darul Ehsan Malaysia <br /> Tel :+6(03)-77268632 &nbsp;&nbsp;&nbsp; Fax :+6(03)-77258836</td>
	</tr>
	<tr>
		<td colspan="2">APSB-FORM</td>
		<td align="right">Revision 7.0 : 15 May 2019</td>
	</tr>

</table>
		</div>
</body>

</html>









<?php include 'pdf_footer.php'?>
