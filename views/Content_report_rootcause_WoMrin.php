<?php
  $tajuk = 'Root Cause By Work Order And MRIN No';
?>

<div class="none">
<?php include 'content_btp.php';?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Search Root Cause Work Order</div>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
</div>


<div class="menu" style="position:relative;">

<?php  if (empty($record)) {?>

<div id="Instruction" >
<center>View List : 
<form method="post" action="">

Search by Work Order Or MRIN No : 
		<input type="text" name="u_name" placeholder="Work Order/MRIN No" class="input_box" size="30">
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>

<div class="m-div">
	<table class="rport-header">
		<tr>
			
			<td colspan="4" valign="top">Root Cause Work Order  - <?=date('F', mktime(0, 0, 0, $month, 10))?> </td>
			
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
	<tr>
			<th>No</th>
			<th <?php if($this->input->get('wid')== 1){ echo "style='width:30px;'";}?>>Hospital</th>
			<th>Work Order No</th>
			<th>Work Order Date</th>
			<th>Asset No</th>
			<th>Work Order <br> Status</th>
			<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>MRIN No</th>
			<th>Complaint / Error / <br> Problem Statement </th>
			<th>Root Cause to<br>Part Faulty</th>
			<th>Special Category</th>
      </tr>

						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="18"><span style="color:red;">NO RECORDS FOUND FOR THIS WORK ORDER.</span></td>
	    				</tr>
	</table>
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">RootCause Report<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
<?php include 'content_footerprint.php';?>

						<?php }else{ ?>







<div id="Instruction" >
<center>View List : 
<form method="post" action="">


Search by Work Order Or MRIN No : 
		<input type="text" name="searchBy" value="<?=$this->input->post('searchBy') ?>" placeholder="Work Order/MRIN No" class="input_box" size="30">
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<div class="m-div">
	<table class="rport-header">
		<tr>
			
			<td colspan="4" valign="top">Root Cause Work Order -  <?=$this->input->post('searchBy')?>   </td>
			
		</tr>
	</table>
	<table class="tftable tbl-go" border="1" style="text-align:center;">
		<tr>
			<th>No</th>
			<th <?php if($this->input->get('wid')== 1){ echo "style='width:30px;'";}?>>Hospital</th>
			<th>Work Order No</th>
			<th>Work Order Date</th>
			<th>Asset No</th>
			<th>Work Order <br> Status</th>
			<th <?php if($this->input->get('wid')== 1){ echo "style='width:10%;'";}?>>MRIN No</th>
			<th>Complaint / Error / <br> Problem Statement </th>
			<th>Root Cause to<br>Part Faulty</th>
			<th>Special Category</th>
      </tr>
		<?php //} ?>
		<?php if($this->input->post('searchBy')!=''){ ?>
	    				<tr>

    		<td><?= 1 ?></td>
			<td><?= isset($record[0]->v_HospitalCode) ? $record[0]->v_HospitalCode : 'N/A' ?></td>
			<td><?=isset($record[0]->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$record[0]->V_Request_no.'&assetno='.$record[0]->V_Asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state').'&hosp='.$record[0]->v_HospitalCode,''.$record[0]->V_Request_no.'' ) : 'N/A' ?></td>
			<td><?= isset($record[0]->D_date) ?  date("d/m/Y",strtotime($record[0]->D_date)) : 'N/A' ?></td>
			<td><?=(($record[0]->V_Asset_no) && $record[0]->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$record[0]->V_Asset_no.'&state='.$this->input->get('state'),''.$record[0]->v_tag_no.'' ) : 'N/A' ?></td>
			<td><?= isset($record[0]->V_request_status) ? $record[0]->V_request_status : 'N/A' ?></td>
			<td><?= isset($record[0]->DocReferenceNo) ? $record[0]->DocReferenceNo : 'N/A' ?></td>
			<td><?= isset($record[0]->rone) ? $record[0]->rone : 'N/A' ?></td>
			<td><?= isset($record[0]->rthree) ? $record[0]->rthree: 'N/A' ?></td>
			<td><?= isset($record[0]->specialty_cat) ? $record[0]->specialty_cat : '' ?></td>
	        			</tr>
		<?php }else{ ?>
			<tr align="center" style="background:white; height:200px;">
	    					<td colspan="18"><span style="color:red;">NO RECORDS FOUND FOR THIS WORK ORDER.</span></td>
	    				</tr>
		<?php } ?>

		
	</table>
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Root Cause Work Order Listing<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
	
	<?php include 'content_footerprint.php';?>	
</div>
<?php }?>



</div>
</div>
