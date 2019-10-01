<?php
if ($this->input->get('ex') == 'excel'){
$filename ="QAP Asset Count - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr"> QAP Asset Count</div>
    <button onclick="javascript:myFunction('report_qapac?m=<?=$month?>&y=<?=$year?>&none=closed&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule?<?php echo '&m='.$this->input->get('m').'&y='.$this->input->get('y').'&grp='.$this->input->get('grp');?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_qapac?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td colspan="5">SIQ WORK ORDER SUMMARY ALL HOSPITAL - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	<div id="Instruction" style="background:white; display:inline-block;">
		<table class="tbl-wo-3" align="left">
			<tr>
				<td style="padding-left:10px;" colspan="5">SIQ WO </td>
			</tr>
		</table>
	</div>
</div>
	<section class="">
	  <div class="container">
		<table class="<?php if (($this->input->get('ex') == '') or ($this->input->get('ex') == 'ex')){?>tftable-fixed<?php } ?>">
		  <thead>
		  <?php if ($this->input->get('ex') == 'excel'){?>
			<tr class="header">
			  <th>No</th>
			  <th>Equipment Code</th>
			  <th>Asset Type Code Description</th>
			  <th>QAP Asset Count</th>
			</tr>
			<?php }elseif (($this->input->get('ex') == '') or ($this->input->get('ex') == 'ex')){?>
			<tr class="header">
			  <th>
				No
				<div>No</div>
			  </th>
			  <th>
				Equipment Code
				<div>Equipment Code</div>
			  </th>
			  <th>
				Asset Type Code Description
				<div>Asset Type Code Description</div>
			  </th>
			  <th>
				QAP Asset Count
				<div>QAP Asset Count</div>
			  </th>
			</tr>
			<?php } ?>
		  </thead>
		  <tbody>
			<?php  if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<tr>
			<td><?= $numrow ?></td>
			<td><?= ($row->V_Equip_code) ? $row->V_Equip_code : 'N/A' ?></td>
			<td><?= ($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
			<td><?= ($row->assetcount) ? $row->assetcount : 'N/A' ?></td>
		</tr>
		<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="4"><span style="color:red;">NO RECORDS FOUND.</span></td>
	    				</tr>
						<?php } ?>
		  </tbody>
		</table>
	  </div>
	</section>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Asset Count<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>