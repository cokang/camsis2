<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Unsatisfactory by Group (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Unsatisfactory by Group</div>
    <button onclick="javascript:myFunction('Unsatisfactory_by_Group?&m=<?=$this->input->get('m')?>&y=<?=$this->input->get('y')?>&none=closed&ex=ex');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule?<?php echo '&m='.$this->input->get('m').'&y='.$this->input->get('y');?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/Unsatisfactory_by_Group?m=<?=$this->input->get('m')?>&y=<?=$this->input->get('y')?>&ex=excel&none=close&en=<?=$this->input->get('en')?>&dept=<?=$this->input->get('dept')?>&hosp=IIUM" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>

<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" >
<center><span style="display:block; ">View List : </span>
<?php if($this->input->get('path') == 'JISSH') { ?>
<span style="display: inline-block; margin-left: -110px;">Month:</span>
<span style="display: inline-block; margin-left: 50px;">Year:</span>
<?php } ?>
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
		<?php echo form_dropdown('m', $month_list, set_value('m', isset($record[0]->Month) ? $record[0]->Month : $this->input->get('m')) , 'style="width: 90px;" id="cs_month"'); ?>
		
		<?php 
			for ($dyear = '2015';$dyear <= date("Y");$dyear++){
				$year_list[$dyear] = $dyear;
			}
		?>
		<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<?php } ?>
<div class="m-div">

	<table class="rport-header">
		<tr>
			<td colspan="5">Unsatisfactory by Group <?=date('F', mktime(0, 0, 0, $this->input->get('m'), 10))?> <?=$year?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
				  <tr>
					<th rowspan="2">Date</th>
					<th colspan="6">Unsatisfactory</th>
				  </tr>
				  <tr>
					<td>Floors</td>
				    <td>Walls/<br /> Doors</td>
					<td>Ceiling</td>
					<td>Windows</td>
					<td>Fixtures</td>
					<td>Furniture & Fitting</td>
				  </tr>
				 <tr>
					<td><?=date('F', mktime(0, 0, 0, $this->input->get('m'), 10))?> <?=$year?></td>
					<td><?=isset($record[0]->Floor) ? $record[0]->Floor : 0?></td>
				    <td><?=isset($record[0]->WallDoor) ? $record[0]->WallDoor : 0?></td>
					<td><?=isset($record[0]->Ceiling) ? $record[0]->Ceiling : 0?></td>
					<td><?=isset($record[0]->Windows) ? $record[0]->Windows : 0?></td>
					<td><?=isset($record[0]->Fixtures) ? $record[0]->Fixtures : 0?></td>
					<td><?=isset($record[0]->FurnitureFitting) ? $record[0]->FurnitureFitting : 0?></td>
				  </tr>
				 </table>

</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Unsatisfactory by Group <?=date('F', mktime(0, 0, 0, $this->input->get('m'), 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
	<?php } ?>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
