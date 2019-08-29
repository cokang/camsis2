<?php include 'pdf_head.php'?>	<html>
	<head>
	<style>
	.rport-header{padding-bottom:10px;}
	</style>
	</head>
	<body>
	<table class="rport-header">
		<tr>
			<td colspan="4" valign="top"><h3>Statutory & License Summary t<br/>Date : <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> <span style="font-size:7px;">Computer Generated - CAMSIS</span></h3></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No</th>
			<th>Certificate No</th>
			<th>Agency Code</th>
			<th>License Category Code</th>
			<th>Asset No</th>				
			<th>Identification</th>
			<th>Start Date</th>
			<th>Expiry Date</th>
			<th>Grade ID</th>
			<th>Remarks</th>
		</tr>
		<?php $numrow = 1; ?>
		<?php  if (!empty($record2) || !empty($record)) {?>
		<?php  foreach($record2 as $row):?>
	    <?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
			<td><span style="color:#0000FF;"><?= $numrow ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_cert_no) ? $row->v_cert_no : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_authority) ? $row->v_authority : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_authority) ? $row->v_authority : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_authority) ? $row->v_authority : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_authority) ? $row->v_authority : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->D_start) ? date("d-m-Y",strtotime($row->D_start)): 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->D_end) ? date("d-m-Y",strtotime($row->D_end)) : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_GradeID) ? $row->v_GradeID : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_Remarks) ? $row->v_Remarks : 'N/A' ?></span></td>
		</tr>	
		<?php $numrow++; ?>
		<?php endforeach;?>
		<?php } ?>
		<?php  if (!empty($record) || !empty($record2)) {?>
		<?php  foreach($record as $row):?>
	    <?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
    		<td><span style="color:#0000FF;"><?= $numrow ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_CertificateNo) ? $row->v_CertificateNo : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_AgencyCode) ? $row->v_AgencyCode : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_LicenseCategoryCode) ? $row->v_LicenseCategoryCode : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_registrationno) ? $row->v_registrationno : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_Identification) ? $row->v_Identification : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_StartDate) ? date("d-m-Y",strtotime($row->v_StartDate)): 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_ExpiryDate) ? date("d-m-Y",strtotime($row->v_ExpiryDate)) : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_GradeID) ? $row->v_GradeID : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_Remarks) ? $row->v_Remarks : 'N/A' ?></span></td>	</tr>	
		<?php $numrow++; ?>
		<?php endforeach;?>
		<?php } else { ?>
		<tr align="center" style="background:white; height:200px;">
			<td colspan="14"><span style="color:red;">NO COMPLAINT RECORDS FOUND FOR THIS WORK ORDER.</span></td>
		</tr>
		<?php } ?>
	</table>
	</body>
</html>
<?php include 'pdf_footer.php'?>