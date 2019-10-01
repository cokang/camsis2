<?php
if ($this->input->get('ex') == 'excel'){
$filename ="PPM UNDER WARRANTY - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">PPM UNDER WARRANTY </div>
    <button onclick="javascript:myFunction('report_ppmuw?m=<?=$month?>&y=<?=$year?>&none=closed&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule?<?php echo '&m='.$this->input->get('m').'&y='.$this->input->get('y').'&grp='.$this->input->get('grp');?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_ppmuw?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td colspan="5" style="padding-left:10px; padding-bottom:10px;">PPM UNDER WARRANTY - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	<!--<div id="Instruction" style="background:white;">
		<table class="tbl-wo-3" align="left">
			<tr>
				<td>Excel :</td>
				<td><img src="<?php echo base_url(); ?>images/excel.png" style=""/></td>
			</tr>
		</table>
	</div>-->
	
<section class="">
	  <div class="container">
		<table class="<?php if (($this->input->get('ex') == '') or ($this->input->get('ex') == 'ex')){?>tftable-fixedppm<?php } ?>">
		  <thead>
		  <?php if ($this->input->get('ex') == 'excel'){?>
			<tr class="header">
			  <th>No</th>
			  <th>H Code</th>
			  <th>Asset No.</th>
			  <th>Asset Desc.</th>
			  <th>Model</th>
			  <th>Dept.</th>
			  <th>PPM</th>
			  <th>W End Date</th>
			  <th>W E M</th>
			  <th>S Date</th>
			  <th>Start M</th>
			  <th>D Date</th>
			  <th>Resch. Date</th>
			  <th>Status</th>
			  <th>Closed Date</th>
			  <th>Job Type</th>
			  <th>Start Week</th>
			</tr>
			<?php }elseif (($this->input->get('ex') == '') or ($this->input->get('ex') == 'ex')){?>
			<tr class="header">
			  <th>
				No
				<div>No</div>
			  </th>
			  <!--<th>
				H State
				<div>H State</div>
			  </th>-->
			  <th>
				H Code
				<div>H Code</div>
			  </th>
			  <th>
				Asset No.
				<div>Asset No.</div>
			  </th>
			  <th>
				Asset Desc.
				<div>Asset Desc.</div>
			  </th>
			  <th>
				Model
				<div>Model</div>
			  </th>
			  <th>
				Dept.
				<div>Dept.</div>
			  </th>
			  <th>
				PPM
				<div>PPM</div>
			  </th>
			  <th>
				W End Date
				<div>W End Date</div>
			  </th>
			  <th>
				W E M
				<div>W E M</div>
			  </th>
			  <th>
				S Date
				<div>S Date</div>
			  </th>
			  <th>
				Start M
				<div>Start M</div>
			  </th>
			  <th>
				D Date
				<div>D Date</div>
			  </th>
			  <th>
				Resch. Date
				<div>Resch. Date</div>
			  </th>
			  <th>
				Resch. Month
				<div>Resch. Month</div>
			  </th>
			  <th>
				Status
				<div>Status</div>
			  </th>
			  <th>
				Closed Date
				<div>Closed Date</div>
			  </th>
			  <th>
				Job Type
				<div>Job Type</div>
			  </th>
			  <th>
				Start Week
				<div>Start Week</div>
			  </th>
			</tr>
			<?php } ?>
		  </thead>
		  <tbody>
			<?php  if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<tr>
			<td><?= $numrow ?></td>
			<!--<td>223</td>-->
			<td><?= ($row->v_HospitalCode) ? $row->v_HospitalCode : 'N/A' ?></td>
			<td><?= ($row->v_Asset_no) ? $row->v_Asset_no : 'N/A' ?></td>
			<td><?= ($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
			<td><?= ($row->V_Model_no) ? $row->V_Model_no : 'N/A' ?></td>
			<td><?= ($row->V_User_Dept_code) ? $row->V_User_Dept_code : 'N/A' ?></td>
			<td><?= ($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : 'N/A' ?></td>
			<td><?= date("d/m/Y", strtotime(isset($record[0]->V_Wrn_end_code) == TRUE ? $record[0]->V_Wrn_end_code : 'N/A'))?></td>
			<td><?= ($row->v_Month) ? $row->v_Month : 'N/A' ?></td>
			<td><?= date("d/m/Y", strtotime(isset($record[0]->d_StartDt) == TRUE ? $record[0]->d_StartDt : 'N/A'))?></td>
			<td><?= ($row->d_StartDt) ? date("m",strtotime($row->d_StartDt)) : 'N/A' ?></td>
			<td><?= ($record[0]->d_DueDt) ? ($record[0]->d_DueDt != '01-01-1970 00:00:00' ? date("d/m/Y",strtotime($record[0]->d_DueDt)) : '-' ) : 'N/A' ?></td>
			<td><?= ($row->d_Reschdt) ? ($row->d_Reschdt != '01-01-1970 00:00:00' ? date("d/m/Y",strtotime($row->d_Reschdt)) : '-' ) : 'N/A' ?></td>
			<td><?= ($row->d_Reschdt) ? date("m",strtotime($row->d_Reschdt)) : 'N/A' ?></td>
			<td><?= ($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : 'N/A' ?></td>
			<td><?= ($row->v_closeddate) ? ($row->v_closeddate != '01-01-1970 00:00:00' ? date("d/m/Y",strtotime($row->v_closeddate)) : '-' ) : 'N/A' ?></td>
			<td><?= ($row->v_jobtype) ? $row->v_jobtype : 'N/A' ?></td>
			<td><?= ($row->n_StartWk) ? $row->n_StartWk : 'N/A' ?></td>
		</tr>
		<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="19"><span style="color:red;">NO RECORDS FOUND.</span></td>
	    				</tr>
						<?php } ?>
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
			<td width="50%">PPM UNDER WARRANTY <br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<?php } ?>
