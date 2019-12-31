<body>
<div style="position:relative;min-width:960px">
	<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()" style="width:10%;">Back</button>
	<img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:fixed; margin-left: 85%;right:0;top:0" title="export to excel" onclick="tableToExcel('tblData')">
	
	<div class="header_report_main"> PPM OUTSTANDING REPORT</div>
	</div>
	<div class="middle_report_main">
		<table class="middle_report_tbl" id="tblData">
			<tr>
				<th colspan="37" class="middle_report_tbl_tr">PPM Outstanding</th>
			</tr>
			<tr>
				<th>No</th>
				<th>Condition</th>
				<th>Tag No</th>
				<th>Warranty End</th>
				<th>Condition</th>
				<th>Variation</th>
				<th>Variation Status</th>
				<th>Status</th>
				<th>Asset Status</th>
				<th>Workorder</th>
				<th>Asset No</th>
				<th>Cost</th>
				<th>Asset name</th>
				<th>User Dept code</th>
				<th>Location Code</th>
				<th>Manufacturer</th>
				<th>Model No</th>
				<th>Serial no</th>
				<th>Brandname</th>
				<th>Made</th>
				<th>Month</th>
				<th>StartWk</th>
				<th>DueWk</th>
				<th>Confirmation</th>
				<th>Remarks</th>
				<th>HospitalCode</th>
				<th>ServiceType</th>
				<th>StartDt</th>
				<th>DueDt</th>
				<th>Reschdt</th>
				<th>Wrkordstatus</th>
				<th>Year</th>
				<th>ServiceCode</th>
				<th>Aging</th>
				<th>Year</th>
				<th>Warranty Status</th>
				<th>TnC DATE</th>
				
			</tr>
			<?php $num=0; foreach($records as $rec){ ?>
			<tr>
			<td><?=++$num?></td>
			<td><?=$rec->conditions?></td>
			<td><?=$rec->V_Tag_no?></td>
			<td><?=date("d/m/Y",strtotime($rec->v_wrn_end_code))?></td>
			<td><?=$rec->condition_desc?></td>
			<td><?=$rec->variation?></td>
			<td><?=$rec->variation_status?></td>
			<td><?=$rec->status_?></td>
			<td><?=$rec->status_desc?></td>
			<td><?=$rec->v_WrkOrdNo?></td>
			<td><?=$rec->v_Asset_no?></td>
			<td><?=$rec->N_Cost?></td>
			<td><?=$rec->V_Asset_name?></td>
			<td><?=$rec->V_User_Dept_code?></td>
			<td><?=$rec->V_Location_code?></td>
			<td><?=$rec->V_Manufacturer?></td>
			<td><?=$rec->V_Model_no?></td>
			<td><?=$rec->V_Serial_no?></td>
			<td><?=$rec->V_Brandname?></td>
			<td><?=$rec->V_Make?></td>
			<td><?=$rec->v_Month?></td>
			<td><?=$rec->n_StartWk?></td>
			<td><?=$rec->n_DueWk?></td>
			<td><?=$rec->v_Confirmation?></td>
			<td><?=$rec->v_Remarks?></td>
			<td><?=$rec->v_HospitalCode?></td>
			<td><?=$rec->v_ServiceType?></td>
			<td><?=date("d/m/Y",strtotime($rec->d_StartDt))?></td>
			<td><?=date("d/m/Y",strtotime($rec->d_DueDt))?></td>
			<td><?=date("d/m/Y",strtotime($rec->d_Reschdt))?></td>
			<td><?=$rec->v_Wrkordstatus?></td>
			<td><?=$rec->v_year?></td>
			<td><?=$rec->v_ServiceCode?></td>
			<td><?=$rec->Aging?></td>
			<td><?=$rec->years?></td>
			<td><?=$rec->warranty_stat?></td>
			<td><?=date("d/m/Y",strtotime($rec->TnCDATE))?></td>
			</tr>
<?php }?>

</tr>

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