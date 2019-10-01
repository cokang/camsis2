<?php include 'pdf_head.php'?>
	<html>
	<head>
	<style>
	.rport-header{padding-bottom:10px;}
	</style>
	</head>
	<body>
	<table class="rport-header">
		<tr>
			<td colspan="3">ASSET NEXT PPM - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>Asset Number</th>
			<th>Location</th>
			<th>Next PPM</th>
		</tr>
		<?php if ($ppm_wo) { $kire = 1;?>
		<?php foreach ($ppm_wo as $value) { ?>
		<tr>
			<td><?=$kire?></td>
			<td><?=$value->v_tag_no?></td>
			<td><?=$value->v_location_name?></td>
			<td><?=$theweek?></td>
		</tr>
		<?php $kire++;}} else { ?>
		<tr>
			<td colspan="3" style="height:300px;"><span style="color:red;">NO RECORDS FOUND.</span></td>
		</tr>
		<?php }  ?>
	</table>
	
	</body>
</html>
<?php include 'pdf_footer.php'?>