<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Expiring Statutory & License Report - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Expiring Statutory & License Report</div>
    <button onclick="javascript:myFunction('ttlexp?m=<?=$month?>&y=<?=$year?>&none=closed&ex=ex');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule?<?php echo '&m='.$this->input->get('m').'&y='.$this->input->get('y');?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/ttlexp?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" >
<center>
<form method="get" action="">
		<?php 
			$month_list = array(
			'1' => '1 Month',
			'2' => '2 Month',
			'3' => '3 Month',
		 );
		?>
		<?php echo form_dropdown('range', $month_list , set_value('range',$range) , 'style="width: 90px;" id="cs_month"'); ?>
		<input type="hidden" value="<?php echo set_value('m', $month) ?>" name="m">
		<input type="hidden" value="<?php echo set_value('y', $year) ?>" name="y">
		<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="3">Expiring Statutory & License Report <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No</th>
			<th>Expiring</th>
			<th>Total Expiring</th>
		</tr>
		<?php if ($recordlic || $recordsta) { ?>
		<?php for($numrow=1;$numrow<=$range;$numrow++){ ?>
		<tr class="ui-color-color-color">
			<td><?=$numrow?></td>
			<td><?=$numrow.' month(s)'?></td>
			<?php 
			$totallic = 'explistlic'.$numrow;
			$totalsta = 'expliststa'.$numrow;
			?>
			<td><?=($$totallic+$$totalsta == 0) ? 0 : anchor ('contentcontroller/report_rsls?&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat=ys&expiring='.$numrow,$$totallic+$$totalsta)?></td>
		</tr>
		<?php } ?>
		<?php } else { ?>
		<tr align="center" style="background:white; height:200px;">
			<td colspan="3"><span style="color:red;">NO Expiring Statutory & License Report.</span></td>
		</tr>
		<?php } ?>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Expiring Statutory & License Report<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
</div>

<?php } ?>