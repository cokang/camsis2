<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Asset Next PPM (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>

<?php if ($this->input->get('ex') == ''){?>
<?php include 'content_btp.php';?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Asset Next PPM</div>
    <button onclick="javascript:myFunction('assetnextppm?m=<?=$month?>&y=<?=$year?>&grp=<?=$this->input->get('grp');?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/assetnextppm?m=<?=$month?>&y=<?=$year?>&none=close&ex=excel&xxx=export&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<a href="<?php echo base_url();?>index.php/contentcontroller/assetnextppm?m=<?=$month?>&y=<?=$year?>&pdf=1&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
</div>
<?php } ?>

<div class="menu" style="position:relative;">
<?php if ($this->input->get('ex') == ''){?>
<?php include 'content_headprint.php';?>
<?php } ?>
<div class="m-div">

	<table class="rport-header">
		<tr>
			<td colspan="3">ASSET NEXT PPM - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
		  <th>No.</th>
			<th>Asset Number</th>
			<th>Location</th>
			<th>Next PPM Date</th>
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
</div>
<?php if (($this->input->get('ex') == '') or (1==0)){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Asset Next PPM - <?= date("F-Y")?><br><!--<i>Computer Generated - APBESys</i>--></td>
			<td width="50%" align="right"></td>
		</tr>

	</table>
	<?php } ?>
<?php if ($this->input->get('ex') == ''){?>
<?php include 'content_footerprint.php';?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>

</div>

