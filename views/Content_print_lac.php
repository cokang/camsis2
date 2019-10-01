<div id="Instruction" class="pr-printer">
    <div class="header-pr">Licenses and Certificates</div>
    <button onclick="javascript:myFunction('print_lac');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
</div>

<div class="menu" style="position:relative;">
<?php include 'content_headprint.php';?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="2">Licenses and Certificates </td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No.</th>
			<th>Licenses and Certificates</th>
			<th style="width:400px;">Identification</th>
			<th>Certificate Number</th>
			<th>Expiry Date</th>
			<th>Grade ID</th>
			<th>Remarks</th>
		</tr>
			<?php  if (!empty($lic)) {?>
							<?php $rownum=1;  foreach($lic as $row):?>  
						<tr align="center">
							<td><?=$rownum++;?></td>
							<td><?=isset($row->v_LicenseCategoryCode) == TRUE ? $row->v_LicenseCategoryCode : 'N/A' ?></td>
							<td><?=isset($row->v_Identification) == TRUE ? $row->v_Identification : 'N/A'?></td>
							<td><?=isset($row->v_CertificateNo) == TRUE ? $row->v_CertificateNo : 'N/A'?></td>
							<td><?=isset($row->v_ExpiryDate) == TRUE ? $row->v_ExpiryDate : 'N/A'?></td>
							<td><?=isset($row->v_GradeID) == TRUE ? $row->v_GradeID : 'N/A'?></td>
							<td><?=isset($row->v_Remarks) == TRUE ? $row->v_Remarks : 'N/A'?></td>
						</tr>
							<?php endforeach;?>
							<?php }else { ?>
						<tr align="center" style="height:200px;">
							<td colspan="10" class="default-NO">NO Licenses and Certificates</td>
						</tr>
						<?php } ?>

		

	</table>
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Licenses and Certificates <br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>

