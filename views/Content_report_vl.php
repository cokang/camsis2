<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Response Time Listing Unscheduled - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">VENDOR LISTING </div>
    <button onclick="javascript:myFunction('report_vl?m=<?=$month?>&y=<?=$year?>&search_box=<?=$search_box?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_vl?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td colspan="5">VENDOR LISTING - <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
	<?php if ($this->input->get('ex') == ''){?>
	<div id="Instruction" style="background:white; margin-left:0px; display:inline-block;">
		<table class="tbl-wo-3" align="left">
			<form method="post" action="">
			<tr>
				<td><input type="text" name="search_box" /></td>
				<td>
					<input type="submit" value="Search" />
				</td>
			</tr>
		</table>
	</div>
	<?php } ?>
</form>
	<section class="">
	  <div class="container">
		<table class="<?php if (($this->input->get('ex') == '') or ($this->input->get('ex') == 'ex')){?>tftable-fixedppm<?php } ?>">
		  <thead>
		   <?php if ($this->input->get('ex') == 'excel'){?>
			<tr class="header">
			  <th>No</th>
			  <th>Vendor Code</th>
			  <th>Name</th>
			  <th>Phone No.</th>
			  <th>Fax No.</th>
			  <th>G</th>
			  <th>Address</th>
			  <th>Contact Name</th>
			  <th>Handphone No.</th>
			  <th>E-mail</th>
			  <th>Status</th>
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
				Vendor Code
				<div>Vendor Code</div>
			  </th>
			  <th>
				Name
				<div>Name</div>
			  </th>
			  <th>
				Phone No.
				<div>Phone No.</div>
			  </th>
			  <th>
				Fax No.
				<div>Fax No.</div>
			  </th>
			  <th>
				G
				<div>G</div>
			  </th>
			  <th>
				Address
				<div>Address</div>
			  </th>
			  <th>
				Contact Name
				<div>Contact Name</div>
			  </th>
			  <th>
				Handphone No.
				<div>Handphone No.</div>
			  </th>
			  <th>
				E-mail
				<div>E-mail</div>
			  </th>
			  <th>
				Status
				<div>Status</div>
			  </th>
			</tr>
			<?php } ?>
		  </thead>
		  <tbody>
			<?php  if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<tr>
			<td><?= $numrow ?></td>
			<td><?= ($row->v_vendorcode) ? $row->v_vendorcode : 'N/A' ?></td>
			<td><?= ($row->v_vendorname) ? $row->v_vendorname : 'N/A' ?></td>
			<td><?= ($row->v_phone) ? $row->v_phone : 'N/A' ?></td>
			<td><?= ($row->v_fax) ? $row->v_fax : 'N/A' ?></td>
			<td><?= ($row->v_grade) ? $row->v_grade : 'N/A' ?></td>
			<td><?= ($row->v_address1) ? $row->v_address1.' '.$row->v_address2.' '.$row->v_address3 : 'N/A' ?></td>
			<td><?= ($row->v_contact) ? $row->v_contact : 'N/A' ?></td>
			<td><?= ($row->v_hphone) ? $row->v_hphone : 'N/A' ?></td>
			<td><?= ($row->v_email) ? $row->v_email : 'N/A' ?></td>
			<td><?= ($row->v_RegType) ? $row->v_RegType : 'N/A' ?></td>
		</tr>
		<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="20"><span style="color:red;">NO COMPLAINT RECORDS FOUND FOR THIS WORK ORDER.</span></td>
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
			<td width="50%">VENDOR LISTING<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
</div>
<?php } ?>

