<?php
if ($this->input->get('ex') == 'excel'){
	$filename ="Schedule Corrective Maintenance (SCM) Listing (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}

if ($this->input->get('ex') == ''){
	include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">A12</div>
		<button onclick="javascript:myFunction('report_a2?m=<?=$month?>&y=<?=$year?>&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo$this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    	<!--<button onclick="javascript:myFunction('report_vols?m=<?=$month?>&y=<?=$year?>&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo$this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>-->
    	<!--<button onclick="javascript:myFunction('report_vols?m=12&y=2016&stat=fbfb&resch=nt&grp=');" class="btn-button btn-primary-button">PRINT</button>-->
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
		<a href="<?php echo base_url();?>index.php/contentcontroller/report_a2?m=<?=$month?>&y=<?=$year?>&none=close&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&ex=excel&xxx=export&grp=<?=$this->input->get('grp');?>&btp=<?=$this->input->get('btp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
		<a href="<?php echo base_url();?>index.php/contentcontroller/report_a2?m=<?=$month?>&y=<?=$year?>&pdf=1&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
	</div>
<?php } ?>

	<div class="menu" style="position:relative;">
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_headprint.php';?>
	<?php } ?>
	<?php if ($this->input->get('ex') == ''){?>

	<?php } ?>
		<div class="m-div">
			<table >
				<tr>
					<td colspan="5">
						 <?=anchor ('contentcontroller/report_a12newconse?m='.$this->input->get('m').'&y='.$this->input->get('y'),'Back')?>						 
					</td>
				</tr>
				<tr>
					<td colspan="5">
						Site : <?= $this->input->get('hosp')?>
					</td>
				</tr>
			</table>
			<div style="overflow-x:auto;">
		<table class="tftable" border="1" style="text-align:center;">
			<tr style="background:#CCC;">
<th>No.</th>
<th>Request No.</th>
<th>Asset No.</th>
<th>Tag No.</th>
<th>Date</th>
<th>Requestor</th>
<th>Dept Code</th>
<th>Location Code</th>
<th>Summary</th>
<th>Details</th>
<th>Responder</th>
<th>Respond Date</th>
<th>Closed Date</th>
<th>MOH Desig</th>
</tr>
<?php if(!empty($records)){?>
						<?php $no=1;foreach($records as $row):?>
					<tr>
					<td><?=$no;?></td>
					<td><?=$row->V_Request_no;?></td>
					<td><?=$row->V_Asset_no;?></td>
					<td>N/A</td>
					<td><?=date("d/m/Y",strtotime($row->D_date));?></td>
					<td><?=$row->V_requestor;?></td>
					<td><?=$row->V_User_dept_code;?></td>
					<td><?=$row->V_Location_code;?></td>
					<td><?=$row->V_summary;?></td>
					<td><?=$row->V_details;?></td>
					<td><?=$row->V_respon;?></td>
					<td><?=date("d/m/Y",strtotime($row->v_respondate));?></td>
					<td><?=date("d/m/Y",strtotime($row->v_closeddate));?></td>
					<td><?=$row->V_MohDesg;?></td>
					</tr>
					<?php $no++;endforeach;?>
					<?php }else{ ?>
				<tr>
					<td colspan="14" ><span style="color:red;">NO RECORDS FOUND.</span></td>
				</tr>
					<?php } ?>
			</table>
</div>
		</div>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<table width="99%" border="0">
			<tr>
				<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
			</tr>
			<tr>
				<td width="50%"> A12  - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> <br><!--<i>Computer Generated - APBESys</i>--></td>
				<td width="50%" align="right"></td>
			</tr>

		</table>
	<?php } ?>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_footerprint.php';?>
	<?php } ?>

