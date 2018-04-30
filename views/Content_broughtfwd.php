<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Unscheduled Brought Forward Work Order Summary".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<?php include 'content_btp.php';?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Unscheduled Brought Forward Work Order Summary</div>
    <button onclick="javascript:myFunction('broughtfwd?m=<?=$month?>&y=<?=$year?>&none=closed&ex=<?=$this->input->get('none');?>&stat=<?=$this->input->get('stat');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/broughtfwd?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&ex=excel&none=close&stat=<?=$this->input->get('stat');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="4" valign="top">Unscheduled Brought Forward Work Order Summary - <?=date("d/m/Y",strtotime($year.'-'.$month.'-09'))?> - <?=date("d/m/Y",strtotime('-1 days',strtotime('+1 months',strtotime($year.'-'.$month.'-09'))))?> - <?php echo $this->session->userdata('usersessn');?></td>
			
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No</th>
			<th>Ageing</th>
			<th>Completed</th>
			<th>Completed in current month</th>
			<th>Outstanding</th>
		</tr>
		<?php $totalcomp = 0; $totalnotcomp = 0; $totalmonthcomp = 0; $numrow = 1; foreach($records as $row): ?>
		
                <?php  if (($row->notcomp != 0) && ($row->comp != 0)) {?>
                <?php if (($row->month != 1))  {?>
		<tr>
			<td><?=$numrow++?></td>
			<?php if ($row->month == 1) {?>
			<td>Current Month</td>
			<?php  } else {?>
			<td><?=isset($row->month) ? (($row->month) - 2).' month(s)' : ''?></td>
			<?php } ?>
			<td><?php if ($this->input->get('ex') == 'excel'){?><?php echo $row->comp ;?><?php } else {?><?=isset($row->comp) && $row->comp <> 0 ? anchor ('contentcontroller/report_volu?&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat=A&btp=1&resch=fbfb&broughtfwd='.$row->month,$row->comp)  : '0' ?><?php } ?></td>
			<td><?php if ($this->input->get('ex') == 'excel'){?><?php echo $row->monthcomp ;?><?php } else {?><?=isset($row->monthcomp) && $row->monthcomp <> 0 ? anchor ('contentcontroller/report_volu?&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat=A&btp=1&resch=fbfb&broughtfwd='.$row->month.'&cm=1',$row->monthcomp)  : '0' ?><?php } ?></td>
			<td><?php if ($this->input->get('ex') == 'excel'){?><?php echo $row->notcomp ;?><?php } else {?><?=isset($row->notcomp) && $row->notcomp <> 0 ? anchor ('contentcontroller/report_volu?&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat=C&btp=1&resch=fbfb&broughtfwd='.$row->month,$row->notcomp) : '0' ?><?php } ?></td>
		</tr>
                <?php  $totalcomp = $totalcomp + $row->comp; $totalnotcomp = $totalnotcomp + $row->notcomp; $totalmonthcomp = $totalmonthcomp + $row->monthcomp;}?>
		<?php  }?>
		<?php endforeach; ?>
		<tr>
			<th colspan="2">Total</th>
			<th><?php if ($this->input->get('ex') == 'excel'){?><?php echo $totalcomp ;?><?php } else {?><?=$totalcomp > 0 ? anchor ('contentcontroller/report_volu?&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat=A&btp=1&resch=fbfb&broughtfwd='.$row->month.'&tag=total',$totalcomp) : 0 ?><?php } ?></th>
			<th><?php if ($this->input->get('ex') == 'excel'){?><?php echo $totalmonthcomp ;?><?php } else {?><?=$totalmonthcomp > 0 ? anchor ('contentcontroller/report_volu?&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat=A&btp=1&resch=fbfb&broughtfwd='.$row->month.'&tag=total'.'&cm=1',$totalmonthcomp) : 0 ?><?php } ?></th>
			<th><?php if ($this->input->get('ex') == 'excel'){?><?php echo $totalnotcomp ;?><?php } else {?><?=$totalnotcomp > 0 ? anchor ('contentcontroller/report_volu?&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat=C&btp=1&resch=fbfb&broughtfwd='.$row->month.'&tag=total',$totalnotcomp) : 0 ?><?php } ?></th>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Unscheduled Brought Forward Work Order Summary<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
</div>
</div>

