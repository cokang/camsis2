<?php
include "pdf_head.php";
// add a page
// ob_start();

$rn_no = ($record[0]->RN_No) ? $record[0]->RN_No : "N/A";
$rn_date = ( date("d M Y", strtotime($record[0]->Date_Stamp)) ) ? date("d M Y", strtotime($record[0]->Date_Stamp))  : "NA";
$v_HospitalAdd1 = ($record[0]->v_HospitalAdd1) ? $record[0]->v_HospitalAdd1 : "&nbsp;";
$v_HospitalAdd2 = ($record[0]->v_HospitalAdd2) ? $record[0]->v_HospitalAdd2 : "&nbsp;";
$v_HospitalAdd3 = ($record[0]->v_HospitalAdd3) ? $record[0]->v_HospitalAdd3 : "&nbsp;";
// create some HTML content
$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';

$htmla = '
		<style>
			.rport-header{padding-bottom:10px;}
			table#detail, table#detail thead tr th{
				border: 1px solid black;
				font-size: 11px;
				font-family: Arial, Helvetica, sans-serif;
				font-weight: 400;
				height: 20px;
			}
			table#detail{
				height: auto;
				min-height: 379px;
			}
			table#detail tbody tr td{
				text-align: center;
				padding: 0px;	
				border-right: 1px solid;
				background: white;
				font-size: 11px;
				font-family: Arial, Helvetica, sans-serif;
				font-weight: 400;
				height: 20px;
			}

			.f-s-11{
				font-size: 11px;
				font-family: Arial, Helvetica, sans-serif;
			}

			table#detail tbody tr td.autoheight{
				height: auto;
			}

			table.tftabkew {
				font-size: 11px;
				font-weight: 400;
				font-family: Arial, Helvetica, sans-serif;
				color: #333333;
				border-color: black;
				border-collapse: collapse;
				min-height: 99px;
				height: auto;
			}

			.tftabkew-td-white {
				color: black;
				background: white;
				padding-left: 5px;
				height: 20px;
				font-size: 11px;
				font-family: Arial, Helvetica, sans-serif;
				font-weight: 400;
			}

			td.toAddress{
				border-bottom: 1px solid; height: 21px; width: 100%;
			}

			.m-t-20{margin-top:20px;}
			table.tablehead{border-collapse: collapse; margin-top: 99px;}
			.logo{width:145px; height:60px;}
			.f-w-400{font-weight:400;}
			.m-b-21{margin-bottom: 21px;}
			.c-blue{color:blue;}
			table.tabledetail{color:black; border-color: black; border-collapse: collapse; margin-bottom: 21px;}
			.b-g-lightgrey{background-color: lightgrey;}
			.min-height-200{height: auto; min-height: 200px;}
			.line-height-200{line-height:200px;}
			.line-height-150{line-height:150px;}
			.line-height-50{line-height:50px;}
			.b-t-1{border-top: 1px solid;}
			.b-r-1{border-right: 1px solid;}
			.b-r-0{border-right:0px solid;}
			.height-auto{height: auto;}
			.height-10{height: 10px;}
			.m-t-33{margin-top:33px;}
			.f-s-7{font-size:7px;}
			.p-l-30{padding-left:30px;}
		</style>
		<table style="text-align:center;" border="0">
			<tr>
				<td></td>
				<td style="text-align:center;">
					<img src="images/logo.png" border="0" height="51" width="" align="top" />
				</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td style="text-align:right;">
					<small>QP-018<br>QF-016</small>
				</td>
			</tr>
			<tr>
				<td></td>
				<td style="text-align:center;">
					RELEASE NOTE
				</td>
				<td></td>
			</tr>
			<tr>
				<td width="55%;" style="">
					<table class="tbl-wo-2" style="margin-bottom: 21px;">
						<tr>
							<td width="10%" align="left">No</td>
							<td width="10%"> : </td>
							<td width="65%"><span style="color:blue;text-align:left;">'. $rn_no .'</span></td>
						</tr>
						<tr>
							<td width="10%" align="left">Date</td>
							<td width="10%"> : </td>
							<td width="65%">
								<span style="color:blue;text-align:left;">'. $rn_date .'</span>
							</td>
						</tr>
						<tr>
							<td width="10%" align="left">To</td>
							<td width="10%" valign="top"> : </td>
							<td width="65%" align="left">
								<table>
									<tr>
										<td>'. $v_HospitalAdd1 .'<hr></td>
									</tr>
									<tr>
										<td>'. $v_HospitalAdd2 .'<hr></td>
									</tr>
									<tr>
										<td>'. $v_HospitalAdd3 .'<hr></td>
									</tr>
									<tr>
										<td>&nbsp;<hr></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
				<td width="25%"></td>
				<td width="20%"></td>
			</tr>
			<tr>
				<td colspan="3" width="100%">
					<table class="tabledetail" border="1" align="center" width="100%">
						<thead>
							<tr>
								<th class="b-g-lightgrey" width="5%">NO</th>
								<th class="b-g-lightgrey" width="55%">DESCRIPTION</th>
								<th class="b-g-lightgrey" width="20%">QUANTITY</th>
								<th class="b-g-lightgrey" width="20%">RM/Unit</th>
							</tr>
						</thead>
						<tbody>';
							if(!empty($record)){
								$lastrow = count($record);
								$height = 13;
								$lastheight = 230;
								$borderbottom='';
								$no=1;foreach($record as $row){
									if($height<=260){
										$lastheight=$lastheight-13;
									}else{
										$lastheight=13;
									}
									// if($no==$lastrow){
									// 	$height=$lastheight;
									// }else{
									if($no!=$lastrow){
										$height=20;
									}
									if($no==$lastrow && $lastheight>13){
										$borderbottom='style="border-bottom:0px solid white;border-right:1px solid black;"';
									}
									
									$htmlb .= '
										<tr style="line-height:'.$height.'px;">
											<td class="detail" '.$borderbottom.'>'.$no.'</td>
											<td class="detail" '.$borderbottom.'>'.$row->accessories.'</td>
											<td class="detail" '.$borderbottom.'>'.$row->Qty.'</td>
											<td class="detail" '.$borderbottom.'>'.$row->Price.'</td>
										</tr>
									';
									if($height<20){
										$htmlb .= '
											<tr style="line-height:'.$lastheight.'px;">
												<td class="detail" style="border-top:0px solid white;border-right:1px solid black;"></td>
												<td class="detail" style="border-top:0px solid white;border-right:1px solid black;"></td>
												<td class="detail" style="border-top:0px solid white;border-right:1px solid black;"></td>
												<td class="detail" style="border-top:0px solid white;border-right:1px solid black;"></td>
											</tr>
										';
									}
								$no++;}
							}else{
								$htmlb = '
									<tr class="line-height-150">
										<td colspan="4">No Data</td>
									</tr>
								';
							}
$html = $htmla . $htmlb . '
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2" align="center" style="padding:0px;" width="35%">AUTHORIZATION</td>
								<td colspan="2" align="center" width="65%">CLIENT</td>
							</tr>
							<tr>
								<td align="center" width="35%"></td>
								<td align="center" width="65%" height="111px;">
									<table>
										<tr><td height="101px"></td></tr>
										<tr>
											<td style="height: 10px; vertical-align:bottom">
												<center>
													<small style="bottom:0px;">Please stamp, Sign & Fax<br>Received in Good Order and Condition</small>
												</center>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</tfoot>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<br><br><br>
					<table class="f-s-11" style="font-size:7px;">
						<tr>
							<td colspan="2" align="center">
								ADVANCE PACT SDN BHD
								<br>(Procurement Services Department)
								<br>2-3A, Perdana The Place, Jalan PJU 8/5G, Bandar Damansara Perdana
								<br>47820 Petaling Jaya, Selangor
							</td>
						</tr>
						<tr>
							<td align="center">Tel : +603-7726 8632</td>
							<td align="center">Fax : +603-7728 3075</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="f-s-11" style="font-size:7px;">
				<td align="left">APSB-FORM</td>
				<td></td>
				<td align="right">Revision 2.0: 1 Oct 2013</td>
			</tr>
		</table>
';
ob_end_clean();
// output the HTML content
$obj_pdf->writeHTML($html, true, false, true, false, '');
$obj_pdf->lastPage();

include "pdf_footer.php";