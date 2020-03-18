<?php include 'pdf_head.php';?>
<?php
$colspan='colspan="16"';
$rowspan ="";


if (($this->session->userdata('usersess')=='BES') && ($this->input->get('req') <> 'A9')) {
$rowspan = 'rowspan="2"';
$colspan='colspan="18"';
//exit();
}
?>
	<html>
	<head>
	<style>
	.rport-header{padding-bottom:10px;}
	</style>
	</head>
	<body>
	<?php $assetone = "0";$locationone = "0";?>
	<?php  $assetone = "0";?>
		
<table class="rport-header">
		<tr>
			
			<td colspan="4" valign="top"><h3>Root Cause Work Order Listing- <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if (($this->input->get('req')) and (($this->input->get('grp') == '2') or ($this->input->get('grp') == '3'))){ echo 'Group'.$this->input->get('grp').','.$tulis; } elseif ($this->input->get('req')){echo $tulis; }elseif ($this->input->get('grp') == ''){ echo 'All';}else{ echo 'Group '.$this->input->get('grp');} ?> )</h3></td>
			
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; font-size:7px;" cellpadding="5" cellspacing="0">
		<tr nobr="true">
		<th>No</th>
			<th <?php if($this->input->get('wid')== 1){ echo "style='width:30px;'";}?>>Hospital</th>
			<th>Work Order No</th>
			<th>Work Order Date</th>
			<th>Asset No</th>
			<th>Work Order <br> Status</th>
			<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>MRIN No</th>
			<th>Complaint / Error / <br> Problem Statement </th>
			<th>Root Cause to<br>Part Faulty</th>
			<th>Special Category</th>
		</tr>
			<?php if (($this->session->userdata('usersess')=='BES') && ($this->input->get('req') <> 'A9')) { ?>
		   <tr>
			<th>S</th>
			<th>P</th>
		   </tr>
			<?php } ?>
		<?php  if (!empty($record)) {?>
		<?php $numrow = 1; foreach($record as $row):?>
			<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color" nobr="true">' : '<tr nobr="true">'; ?>

    		<td><?= $numrow ?></td>
			<td><?= ($row->v_HospitalCode) ? $row->v_HospitalCode : 'N/A' ?></td>
			<td><?= isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : 'N/A' ?></td>
			<td><?= isset($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
			<td><?= isset($row->v_tag_no) ? $row->v_tag_no : 'N/A' ?></td>
			<td><?= isset($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
			<td><?= isset($row->DocReferenceNo) ? $row->DocReferenceNo : 'N/A' ?></td>
			<td><?= isset($row->rone) ? $row->rone : 'N/A' ?></td>
			<td><?= isset($row->rthree) ? $row->rthree: 'N/A' ?></td>
			<td><?= isset($row->specialty_cat) ? $row->specialty_cat : '' ?></td>
		</tr>
		<?php $numrow++; ?>
		<?php endforeach;?>
		<?php }else { ?>
		<tr align="center" style="background:white; height:200px;">
			<td <?=$colspan?>><span style="color:red;">NO RECORDS FOUND FOR THIS WORK ORDER.</span></td>
		</tr>
		<?php } ?>
	</table>
	<body>
</html>
<?php include 'pdf_footer.php';?>
