<style type="text/css">
	.middle_report_tbl .tbl th{
		font-size: 14px;
	}

</style>
<body><div style="position:relative;min-width:960px">
	<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()" style="width:10%;">Back</button>
	<img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:fixed; margin-left: 85%;right:0;top:0" title="export to excel" onclick="tableToExcel('tblData')">
	<!-- <button style="width: 10%;margin-left:600px;background-color: teal;" type="export" class="btn-button btn-primary-button" onclick="tableToExcel('tblData')">EXPORT</button> -->
	<!-- <div class="header_report_main"> MONTHLY RCM PERFORMANCE MORE THEN 15 DAYS REPORT</div> -->
	</div>
	<div class="middle_report_main" style="margin-bottom: 1%;">
		<table class="middle_report_tbl" id="tblData">
			<!-- <tr>
				<th colspan="27" class="middle_report_tbl_tr">RCM > 15 days</th>
			</tr> -->
			<tr class="tbl">
				<th>No</th>
				<th>Area</th>
				<th>Hospital</th>
				<th>Request No</th>
				<th>WO No</th>
				<th>ASIS STATUS</th>
				<th>WO CODE</th>
				<th>WO Date</th>
				<th>Month</th>
				<th>By Ageing</th>
				<th>Description WO</th>
				<th>Asset Number</th>
				<th>Tag Number</th>
				<th>Asset Name</th>
				<th>T&C Date</th>
				<th>Manufacturer</th>
				<th>Model</th>
				<th>Purchase Cost</th>
				<th>Category</th>
				<th>Category (IMG / Non IMG)</th>
				<th>Workorder assigned to</th>
				<th>Asset movement Internal</th>
				<th>Cronology outstanding</th>
				<th>WO AP Justification</th>
				<th>Work Order AP Justification</th>
				<th>ROOTCAUSE </th>
				<th>Summary Rootcause</th>
				<th>External Rootcause</th>
				<th>Part Category</th>
				<th>Remarks </th>
				<th>Date sent MRIN to PMT / TRT</th>
				<th>MRIN Date</th>
				<th>MRIN No</th>
				<th>PO Date</th>
				<th>PO No</th>
				<th>Vendor</th>
				<th>Contact No</th>
				<th>Payment Method</th>
				<th>Paid / Unpaid</th>
				<th>SPARE PARTS AND REPAIR COST</th>
				<th>Estimate Cost</th>
				<th>Paid ( Cost)</th>
				<th>Ageing WO from WO issued</th>
				<th>DEDUCTION PER DAY</th>
				<th>IMPACT DEDUCTION TILL JAN <?= $year?></th>
				<th>IMPACT DEDUCTION TILL FEB <?= $year?></th>
				<th>IMPACT DEDUCTION TILL MAC <?= $year?></th>
				<th>IMPACT DEDUCTION TILL APR <?= $year?></th>
				<th>IMPACT DEDUCTION TILL MAY <?= $year?></th>
				<th>IMPACT DEDUCTION TILL JUNE <?= $year?></th>
				<th>IMPACT DEDUCTION TILL JULY <?= $year?></th>
				<th>IMPACT DEDUCTION TILL AUG <?= $year?></th>
				<th>IMPACT DEDUCTION TILL SEPT <?= $year?></th>
				<th>IMPACT DEDUCTION TILL OCT <?= $year?></th>
				<th>IMPACT DEDUCTION TILL NOV <?= $year?></th>
				<th>IMPACT DEDUCTION TILL DEC <?= $year?></th>
				<th>FEEDBACK CONVERSATION FROM BOTH PARTY  ( Y IF AVAILABLE , N IF NOT AVAILABLE) </th>
				<th>DATE ETA / LAST FEEDBACK  </th>
				<th>AVAILABILITY PARTS( Y IF AVAILABLE , N IF NOT AVAILABLE)</th>
 				<th>EXEMPTION DEDUCTION LETTER( Y IF AVAILABLE , N IF NOT AVAILABLE)</th>
			</tr>
			<?php $no=1; $prevWrkOrdNo ='1'; $prevPO='1';?>
		<?php foreach($records as $row):?>
              <tr>
				<td><?php echo $no++?></td>
				<td><?=$row->negeri;?></td>
				<td><?=$row->v_HospitalCode;?></td>
				<td><?=$row->v_ref_wo_no;?></td>
				<td><?=$row->v_WrkOrdNo;?></td>
				<td><?=$row->V_request_status?></td>
				<td><?=$row->V_servicecode?></td>
				<td><?=date("d/m/Y",strtotime($row->D_date));?></td>
				<td><?=date("M-y",strtotime($row->D_date));?></td>
				<td>NA</td>
				<td><?=$row->v_ActionTaken;?></td>
				<td><?=$row->V_Asset_no;?></td>
				<td><?=$row->V_Tag_no;?></td>
				<td><?=$row->V_Asset_name;?></td>
				<td><?php if($row->D_commission!='')echo date("d/m/Y",strtotime($row->D_commission));?></td>
				<td><?=$row->V_Manufacturer;?></td>
				<td><?=$row->V_Model_no;?></td>
				<td>RM<?=$row->N_Cost;?></td>
				<td>-</td>
				<td>-</td>
				<td><?=$row->v_Personal1;?></td>
				<td>-</td>
				<td>-</td>
				<td>NA</td>
				<td>NA</td>
				<td>-</td>
				<td><?=$row->nama;?></td>
				<td>NA</td>
				<td></td>
				<td><?=$row->Commentsx;?></td>
				<td>NA</td>
				<td><?php if($row->DateCreated!='')echo date("d/m/Y",strtotime($row->DateCreated));?></td>
				<td><?= $row->DocReferenceNo;?></td>
				<td><?php if($row->PO_Date!='')echo date("d/m/Y",strtotime($row->PO_Date));?></td>
				<td><?=$row->PO_No;?></td>
				<td><?=$row->VENDOR_NAME;?></td>
				<td><?=$row->TELEPHONE_NO;?></td>
				<td><?=$row->paytype;?></td>
				<td></td>
				<td><?php  if($Costs!=null){foreach($Costs as $cost){
					if($cost!=null){$n=1;
					foreach($cost as $costV){
						
					if($row->MIRN_No==$costV->MIRNcode){ 
						if($costV->MIRNcode!=null){
						 echo $n++.')'.$costV->ItemName.': RM'.$costV->PartCost.'</br>';
						}
					}
				}}
				}}
				?></td>
				<td>-</td>
				<td></td>
				<td>-</td>
				<td>-</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
				<td>NA</td>
			</tr>
			<?php  $prevWrkOrdNo=$row->v_WrkOrdNo;  $prevPO=$row->PO_No; //if($prevPO==''){$prevPO='1';}else{}
		endforeach;?>

			<!--<tr>
				<td>813</td>
				<td>JOH</td>
				<td>MUR</td>
				<td>SR/JHR004/20190219/B003525</td>
				<td>WO/BEMS/JHR004/1902/000153</td>
				<td>Work In Progress</td>
				<td>Unscheduled</td>
				<td>19/2/2019</td>
				<td>Feb-19</td>
				<td>Backlog 1st Jan 2019 - 28th Feb 2019</td>
				<td>MUR150144 Physiologic Monitoring Systems, Acute Care - BP cuff rosak - Sn Nurhaliza</td>
				<td>MUR-BEICM01-0159</td>
				<td>MUR150144</td>
				<td>Physiologic Monitoring Systems, Acute Care</td>
				<td>02-Sep-201</td>
				<td>Philips Medical Systems</td>
				<td>Suresigns Vsi</td>
				<td>6000.00</td>
				<td>CRITICAL CARE</td>
				<td>Non-Imaging</td>
				<td>Mohamad Asiq Bin Jairani</td>
				<td>REMAIN AT USER LOCATION</td>
				<td>20/2/2019- Closing wo in progress</td>
				<td></td>
				<td></td>
				<td>Vendor Delay Parts - Petty Cash</td>
				<td>Vendor Delay Parts</td>
				<td>Vendor Delay</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>PETTY CASH</td>
				<td></td>
				<td></td>
				<td>150.00</td>
				<td></td>
				<td>20</td>
				<td>200</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>-->
		
		</table>
		</div>
		
</body>
<head>
<script type="text/javascript">
    var tableToExcel = (function() {
      var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
        , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
      return function(table, name) {
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
        window.location.href = uri + base64(format(template, ctx))
      }
    })()
    </script>
</head>


