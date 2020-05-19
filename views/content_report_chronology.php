<style type="text/css">
	.middle_report_tbl .tbl td{
		font-weight: bold;
	}
	#Instruction{
		color: white;
	}

</style>
<body>
	<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()" style="width:10%;">Back</button>
	<img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:fixed; margin-left: 85%;right:0;top:0" title="export to excel" onclick="tableToExcel('tblData')">

	<div id="Instruction" >
<center>View List : 
<form method="get" action="">
<label for="from">From</label>
<input type="date" name="from" id="from" value="<?php echo $from ?>" class="form-control-button2 ">
<label for="to">To</label>
<input type="date" name="to" id="to" value="<?php echo $to ?>" class="form-control-button2 ">
<label for="to">Filter By</label>
<?php 
	$filter = array('All'=> 'All',
					'C' => 'Completed (C)', 
					'BO'=> 'Work In Progress (BO)'
	);
	$request_type = array('All'=> 'All',
	'A4' => 'A4', 
	'AP'=> 'AP'
);
	echo form_dropdown('status', $filter,set_value('status', $this->input->get('status')), 'class="form-control-button2 "');
 ?>
 <br>
 <label for="to">Request Type</label>
 <?php echo form_dropdown('request_type', $request_type,set_value('request_type', $this->input->get('request_type')), 'class="form-control-button2 "'); ?>
 
 <label for="to">Specialty</label>
 <?php echo form_dropdown('special_cat', $special_cat,set_value('special_cat', $this->input->get('special_cat')), 'class="form-control-button2 "'); ?>

<input class="btn-button btn-secondary-button" type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
	<!-- <div class="header_report_main"> MONTHLY RCM PERFORMANCE MORE THEN 15 DAYS REPORT</div> -->
	<div class="middle_report_main">
		<table class="middle_report_tbl" id="tblData">
			<!-- <tr>
				<th colspan="27" class="middle_report_tbl_tr">RCM > 15 days</th>
			</tr> -->
			<tr>
				<th>Count of Summary Rootcause </br> <?php echo 'From: '.date("d/m/Y",strtotime($from)).' To: '.date("d/m/Y",strtotime($to)) ?></th>
				<th colspan="3">Area</th>
				<th></th>
			</tr>
			<tr>
				<th>Summary Rootcause </th>
				<th>JOH</th>
				<th>MKA</th>
				<th>NS</th>
				<th>Grand Total</th>
			</tr>
			<?php $totalJOH=0;$totalMKA=0;$totalNS=0;$totalALL=0;$numrow=1; foreach($det as $row): ?>
			<tr><form method="get" action="">
				<td><?=isset($row->nama) ? $row->nama : ''?></td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama='.$row->nama.'&negeri=JOH'.'&status='.$this->input->get('status').'&request_type='.$this->input->get('request_type').'&special_cat='.$this->input->get('special_cat'), $row->JOH); ?></td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama='.$row->nama.'&negeri=MKA'.'&status='.$this->input->get('status').'&request_type='.$this->input->get('request_type').'&special_cat='.$this->input->get('special_cat'),$row->MKA); ?></td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama='.$row->nama.'&negeri=NS'.'&status='.$this->input->get('status').'&request_type='.$this->input->get('request_type').'&special_cat='.$this->input->get('special_cat'),$row->NS); 
				?></td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama='.$row->nama.'&negeri=ALL'.'&status='.$this->input->get('status').'&request_type='.$this->input->get('request_type').'&request_type='.$this->input->get('special_cat'),$row->total); ?></td>
				<?php $totalALL+=$row->total;
					  $totalJOH+=$row->JOH;
					  $totalMKA+=$row->MKA;
					  $totalNS+=$row->NS; ?>
				
			</tr>
			<?php endforeach; ?>
			<tr class="tbl">
				<td>Grand Total</td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama=ALL&negeri=JOH'.'&status='.$this->input->get('status').'&request_type='.$this->input->get('request_type').'&special_cat='.$this->input->get('special_cat'),$totalJOH); ?></td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama=ALL&negeri=MKA'.'&status='.$this->input->get('status').'&request_type='.$this->input->get('request_type').'&special_cat='.$this->input->get('special_cat'),$totalMKA); ?></td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama=ALL&negeri=NS'.'&status='.$this->input->get('status').'&request_type='.$this->input->get('request_type').'&special_cat='.$this->input->get('special_cat'),$totalNS); ?></td>
				<td><?php echo anchor ('contentcontroller/Summary_chonology?from='.$from.'&to='.$to.'&nama=ALL&negeri=ALL'.'&status='.$this->input->get('status').'&request_type='.$this->input->get('request_type').'&special_cat='.$this->input->get('special_cat'),$totalALL); ?></td>
			</tr>


		</table>
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