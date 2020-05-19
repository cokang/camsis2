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
<input type="text" name="searchBy" value="<?=$this->input->post('searchBy') ?>" placeholder="Work Order/MRIN No" class="input_box" size="30">
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
							<?php $numrow = 1; foreach($record as $row):?>
<?php //if ($numrow==1 OR $numrow%13==1) { 
if ($numrow==1 OR $numrow%18==1) {
?>
<?php include 'content_headprint.php';?>


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
			
			<td colspan="4" valign="top">Root Cause Work Order Listing- <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>   </td>
			
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
		<?php } ?>

	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>

    		<td><?= $numrow ?></td>
			<td><?= ($row->v_HospitalCode) ? $row->v_HospitalCode : 'N/A' ?></td>
			<td><?=($row->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state').'&hosp='.$row->v_HospitalCode,''.$row->V_Request_no.'' ) : 'N/A' ?></td>
			<td><?= isset($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
			<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->v_tag_no.'' ) : 'N/A' ?></td>
			<td><?= isset($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
			<td><?= isset($row->DocReferenceNo) ? $row->DocReferenceNo : 'N/A' ?></td>
			<td><?= isset($row->rone) ? $row->rone : 'N/A' ?></td>
			<td><?= isset($row->rthree) ? $row->rthree: 'N/A' ?></td>
			<td><?= isset($row->specialty_cat) ? $row->specialty_cat : '' ?></td>
	        			</tr>

<?php $numrow++; ?>
			<?php //if (($numrow-1)%13==0) {
				if ((($numrow-1)%18==0) || (($numrow-1)== count($record))) {
		?>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Root Cause Work Order Listing<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
	
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>
</div>
<?php } ?>
<?php endforeach;?>
<?php }?>



</div>
</div>
