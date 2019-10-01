<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Scheduled Maintenance</div>
    <button onclick="javascript:myFunction('logprint_U?&none=closed&asstno=<?php echo $this->input->get('asstno');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>assetlogcards_M?tab=8&card=1&asstno=<?php echo $this->input->get('asstno');?>';">CANCEL</button>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="2">Scheduled Maintenance List for - <?php echo $this->input->get('asstno') ;?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No.</th>
			<th>Date</th>
			<th>Closed Date</th>
			<th>Work Order No.</th>
			<th>Freq</th>
			<th>Cost RM</th>
		</tr>
		<?php $num = 1;foreach($wo_list as $row): ?>
		<tr>
			<td><?=$num++?></td>
			<td><?= isset($row->d_date) == TRUE ? date("d-m-Y",strtotime($row->d_date)) : 'N/A'?></td>
			<td><?= isset($row->v_closeddate) == TRUE ? date("d-m-Y",strtotime($row->v_closeddate)) : 'N/A'?></td>
			<td><?= isset($row->v_Wrkordno) == TRUE ? $row->v_Wrkordno : 'N/A'?><br /><i><?= isset($row->v_summary) == TRUE ? $row->v_summary : 'N/A'?></i></td>
			<td><?= isset($row->v_jobTypecode) == TRUE ? $row->v_jobTypecode : 'N/A'?></td>
			<?php if ($wo_list_cost){ ?>
			<?php foreach($wo_list_cost as $wolist): ?>
			<?php if ($row->v_Wrkordno == $wolist->v_wrkordno) { ?>
			<td><?= isset($wolist->totallabor) || isset($wolist->totalpart) ? number_format($wolist->totallabor + $wolist->totalpart,2) : 0.00?></td>
			<?php } ?>
			<?php endforeach; ?>
			<?php } else { ?>
			<td>'N/A'</td>
			<?php } ?>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Scheduled Maintenance <br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<?php } ?>
