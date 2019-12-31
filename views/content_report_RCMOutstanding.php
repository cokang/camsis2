<body>
<div style="position:relative;min-width:960px">
	<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()" style="width:10%;">Back</button>
	<img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:fixed; margin-left: 85%;right:0;top:0" title="export to excel" onclick="tableToExcel('tblData')">
	
	<div class="header_report_main"> RCM OUTSTANDING REPORT</div>
</div>
	<div class="middle_report_main">
		<table class="middle_report_tbl" id="tblData">
			<tr>
				<th colspan="33" class="middle_report_tbl_tr">RCM Outstanding</th>
			</tr>
			<tr>
				<th>No</th>
				<th>Condition</th>
				<th>Asset Condition</th>
				<th>Variation</th>
				<th>Variation Status</th>
				<th>Status</th>
				<th>Asset Status</th>
				<th>Workorder</th>
				<th>Asset No</th>
				<th>Asset Name</th>
				<th>Cost</th>
				<th>Manufacturer</th>
				<th>Model No</th>
				<th>Serial No</th>
				<th>Brand</th>
				<th>Made</th>
				<th>Service Code</th>
				<th>Requestor</th>
				<th>Phone No</th>
				<th>Department Code</th>
				<th>Location Code</th>
				<th>Summary</th>
				<th>Priority Code</th>
				<th>Request Type</th>
				<th>Request Status</th>
				<th>Hospital Code</th>
				<th>Aging</th>
				<th>Year</th>
				<th>Tag No</th>
				<th>Warranty End</th>
				<th>Warranty Status</th>
				<th>Claim Status</th>
				<th>TnC Date</th>
			</tr>
			<?php $num=0; foreach($records as $rec){ ?>
			<tr>	
			<td><?=++$num?></td>
			<td><?=$rec->conditions ?></td>
			<td><?=$rec->condition_desc ?></td>
			<td><?=$rec->variation ?></td>
			<td><?=$rec->variation_status ?></td>
			<td><?=$rec->status_?></td>
			<td><?=$rec->status_desc?></td>
			<td><?=$rec->V_Request_no?></td>
			<td><?=$rec->V_Asset_no?></td>
			<td><?=$rec->V_Asset_name?></td>
			<td><?=$rec->N_Cost?></td>
			<td><?=$rec->V_Manufacturer?></td>
			<td><?=$rec->V_Model_no?></td>
			<td><?=$rec->V_Serial_no?></td>
			<td><?=$rec->V_Brandname?></td>
			<td><?=$rec->V_Make?></td>
			<td><?=$rec->V_servicecode?></td>
			<td><?=$rec->V_requestor?></td>
			<td><?=$rec->V_phone_no?></td>
			<td><?=$rec->V_User_dept_code?></td>
			<td><?=$rec->V_Location_code?></td>
			<td><?=$rec->V_summary?></td>
			<td><?=$rec->V_priority_code?></td>
			<td><?=$rec->V_request_type?></td>
			<td><?=$rec->V_request_status?></td>
			<td><?=$rec->V_hospitalcode?></td>
			<td><?=$rec->Aging?></td>
			<td><?=$rec->years?></td>
			<td><?=$rec->V_Tag_no?></td>
			<td><?=date("d/m/Y",strtotime($rec->V_Wrn_end_code))?></td>
			<td><?=$rec->warranty_stat?></td>
			<td><?=$rec->claimstatus?></td>
			<td><?=date("d/m/Y",strtotime($rec->TnCDATE))?></td>

			</tr>
			<?php } ?>
		</table>
	</div>
	</div>
</body>
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
<html>