<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Asset Group Summary - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer" style="width:100%">
    <div class="header-pr">Asset Group Summary</div>
    <button onclick="javascript:myFunction('report_agl?m=<?=$month?>&y=<?=$year?>&none=closed&ex=ex&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule?<?php echo '&m='.$this->input->get('m').'&y='.$this->input->get('y').'&grp='.$this->input->get('grp');?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_agl?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" >
<center>View List : 
<form method="get" action="">
		<?php 
			$month_list = array(
			'01' => 'January',
			'02' => 'February',
			'03' => 'March',
			'04' => 'April',
			'05' => 'May',
			'06' => 'June',
			'07' => 'July',
			'08' => 'August',
			'09' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December'
		 );
		?>
		<?php echo form_dropdown('m', $month_list, set_value('m', isset($record[0]->Month) ? $record[0]->Month : $month) , 'style="width: 90px;" id="cs_month"'); ?>
		
		<?php 
			for ($dyear = '2015';$dyear <= date("Y");$dyear++){
				$year_list[$dyear] = $dyear;
			}
		?>
		<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>
<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">  
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<?php } ?>	
<table class="rport-header">
	<tr>
		<td style="padding-left:10px;" colspan="5">ASSET REGISTER SUMMARY - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
	</tr>
</table>	
<div class="m-div">
	<section class="">
	  <div class="container">
		<table class="<?php if (($this->input->get('ex') == '') or ($this->input->get('ex') == 'ex')){?>tftable-fixed<?php } ?>">
		  <thead>
		  <?php if ($this->input->get('ex') == 'excel'){?>
			<tr class="header">
			  <th>No</th>
			  <th>Type Code</th>
			  <th>Description</th>
			  <th>Asset Count</th>
			</tr>
			<?php }elseif (($this->input->get('ex') == '') or ($this->input->get('ex') == 'ex')){?>
			<tr class="header">
			  <th>
				No
				<div>No</div>
			  </th>
			  <th>
				Type Code
				<div>Type Code</div>
			  </th>
			  <th>
				Description
				<div>Description</div>
			  </th>
			  <th>
				Asset Count
				<div>Asset Count</div>
			  </th>
			</tr>
			<?php } ?>
		  </thead>
		  <tbody>
			<?php  if (!empty($record)) {?>
				<?php $abjad='0'; $numrow = 1; $totalcount = 0; foreach($record as $row):?>
				<?php  if ($abjad != substr($row->V_Asset_name,0,1)) { $abjad = substr($row->V_Asset_name,0,1) ?>
				<tr style="text-align:center;">								
						<td colspan="4" class="header"><?=$abjad?></td>
				</tr>
				<?php  }?>
			<tr style="text-align:center;">
				<td width="20px"><?= $numrow ?></td>
				<td width="70px"><?= ($row->new_asset_type) ? $row->new_asset_type : 'N/A' ?></td>
				<td style="text-align:left;"><?= ($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
				<td width="80px"><?= ($row->assetcount) ? $row->assetcount : 'N/A' ?></td>
			</tr>
			<?php $totalcount = $totalcount + $row->assetcount; $numrow++; ?>
							<?php endforeach;?>
							<?php }else { ?>
							<tr align="center" style="background:white; height:200px;">
								<td colspan="4"><span style="color:red;">NO RECORDS FOUND.</span></td>
							</tr>
							<?php } ?>
			<tr>
				<td colspan="3" style="text-align:right;font-weight:bold;">Grand Total</td>
				<td style="text-align:center;font-weight:bold;"><?=$totalcount?></td>
			</tr>
		  </tbody>
		</table>
	  </div>
	</section>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Asset Register Summary<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
</body>
</html>