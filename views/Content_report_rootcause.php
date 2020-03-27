<?php

$status = array('' => 'All' ,
				'A' => 'A',
				'BO'=> 'BO',
				'C'=> 'C');
//echo "nilai lalalal : ".cal_days_in_month(CAL_GREGORIAN, $this->input->get('m'), $this->input->get('y'));
  $tajuk = 'Root Cause Work Order Listing';

if ($this->input->get('ex') == 'excel'){
$filename = $tajuk .date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}

$assetone = "0";
$locationone = "0";

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="none">
<?php if ($this->input->get('ex') == ''){?>
<?php include 'content_btp.php';?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Root Cause Work Order Listing</div>
    <button onclick="javascript:myFunction('root_cause?p=<?=$this->input->get('p');?>&req_status=<?=$this->input->get('req_status');?>&from=<?=$from?>&to=<?=$to?>&hospitalcodes=<?=$this->input->get('hospitalcodes');?>&typeOfWrkOrd=<?=$this->input->get('typeOfWrkOrd');?>&ex=print');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/root_cause?p=<?=$this->input->get('p');?>&req_status=<?=$this->input->get('req_status');?>&from=<?=$from?>&to=<?=$to?>&hospitalcodes=<?=$this->input->get('hospitalcodes');?>&typeOfWrkOrd=<?=$this->input->get('typeOfWrkOrd');?>&ex=excel&none=close&xxx=export" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<a href="<?php echo base_url();?>index.php/contentcontroller/root_cause?p=<?=$this->input->get('p');?>&req_status=<?=$this->input->get('req_status');?>&from=<?=$from?>&to=<?=$to?>&hospitalcodes=<?=$this->input->get('hospitalcodes');?>&typeOfWrkOrd=<?=$this->input->get('typeOfWrkOrd');?>&ex=excel&none=close&pdf=1" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
</div>
<?php } ?>

<div class="menu" style="position:relative;">
<?php if ($this->input->get('xxx') == 'export') { ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			
			<td colspan="4" valign="top">Root Cause Work Order Listing- <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if (($this->input->get('req')) and (($this->input->get('grp') == '2') or ($this->input->get('grp') == '3'))){ echo 'Group'.$this->input->get('grp').','.$tulis; } elseif ($this->input->get('req')){echo $tulis; }elseif ($this->input->get('grp') == ''){ echo 'All';}else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
			
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;"><!--filexcel-->
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

		<?php  if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
		<td><?= $numrow ?></td>
		<td><?= ($row->v_HospitalCode) ? $row->v_HospitalCode : 'N/A' ?></td>
			<td><?= isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : 'N/A' ?></td>
			<td><?= isset($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
			<td><?= isset($row->v_tag_no) ? $row->v_tag_no : 'N/A' ?></td>
			<td><?= isset($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
			<td><?= isset($row->DocReferenceNo) ? $row->DocReferenceNo : 'N/A' ?></td>
			<td><?= isset($row->rone) ? $row->rone : 'N/A' ?></td>
			<td><?= isset($row->rthree) ? $row->rthree: 'N/A' ?></td>
			<td><?= isset($row->specialty_cat) ? $row->specialty_cat : '' ?></td>
	        			</tr>
	        			<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="15"><span style="color:red;">NO RECORDS FOUND FOR THIS WORK ORDER.</span></td>
	    				</tr>
						<?php } ?>
	</table>
</div>
<?php } ?>




<?php  if (empty($record)) {?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>

<?php if (($this->input->get('ex') == '' && $this->input->get('broughtfwd') == '') OR ($this->input->get('ex') != '' && $this->input->get('broughtfwd') != '')){?>
<div id="Instruction" >
<center>View List : 
<form method="get" action="">

	
		Status : 
		<?php echo form_dropdown('req_status', $status, set_value('req_status', $this->input->get('req_status')) , 'style="width: 100px;" id="cs_month"'); ?>
		Hospitals : 
		<?php echo form_dropdown('hospitalcodes', $hospitalcodes, set_value('hospitalcodes', $this->input->get('hospitalcodes')) , 'style="width: 100px;" id="cs_month"'); ?>
		Type Of Work Order : 
		<?php echo form_dropdown('typeOfWrkOrd', $typeOfWrkOrd, set_value('typeOfWrkOrd', $this->input->get('typeOfWrkOrd')) , 'style="width: 200px;" id="cs_month"'); ?><br>
	
		Date Range:
		<input type="date" name="from" id="from" value="<?php echo $from ?>" class="form-control-button2 ">
		<input type="date" name="to" id="to" value="<?php echo $to ?>" class="form-control-button2 ">
<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">				
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>
</div>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			
			<td colspan="4" valign="top">Root Cause Work Order Listing - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>  ( <?php if (($this->input->get('req')) and (($this->input->get('grp') == '2') or ($this->input->get('grp') == '3'))){ echo 'Group'.$this->input->get('grp').','.$tulis; } elseif ($this->input->get('req')){echo $tulis; }elseif ($this->input->get('grp') == ''){ echo 'All';}else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
			
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
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">RootCause Report<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>

						<?php } ?>




<?php if ($this->input->get('xxx') != 'export') { ?>

<?php //if ($numrow==1 OR $numrow%13==1) { 
if (!empty($record)) {
?>
<?php include 'content_headprint.php';?>


<div id="Instruction" >
<center>View List : 
<form method="get" action="">


		Status : 
		<?php echo form_dropdown('req_status', $status, set_value('req_status', $this->input->get('req_status')) , 'style="width: 100px;" id="cs_month"'); ?>
		Hospitals : 
		<?php echo form_dropdown('hospitalcodes', $hospitalcodes, set_value('hospitalcodes', $this->input->get('hospitalcodes')) , 'style="width: 100px;" id="cs_month"'); ?>
		Type Of Work Order : 
		<?php echo form_dropdown('typeOfWrkOrd', $typeOfWrkOrd, set_value('typeOfWrkOrd', $this->input->get('typeOfWrkOrd')) , 'style="width: 200px;" id="cs_month"'); ?><br>
		
		Date Range:
		<input type="date" name="from" id="from" value="<?php echo $from ?>" class="form-control-button2 ">
		<input type="date" name="to" id="to" value="<?php echo $to ?>" class="form-control-button2 ">
<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">				
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
		<?php $numrow = 1; foreach($record as $row):?>
	    				<?php //echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
						<tr>

    		<td><?= $start+1 ?></td>
			<td><?= ($row->v_HospitalCode) ? $row->v_HospitalCode : 'N/A' ?></td>
			<?php if  ($this->input->get('ex') != 'print'){ ?>
			<td><?=($row->V_Request_no) ? anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$row->V_Asset_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch=fbfb&state='.$this->input->get('state').'&hosp='.$row->v_HospitalCode,''.$row->V_Request_no.'' ) : 'N/A' ?></td>
			<?php }else{ ?>
			<td><?= isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : 'N/A' ?></td>
			<?php } ?>
			<td><?= isset($row->D_date) ?  date("d/m/Y",strtotime($row->D_date)) : 'N/A' ?></td>
			<?php if  ($this->input->get('ex') != 'print'){ ?>
			<td><?=(($row->V_Asset_no) && $row->V_Asset_no != 'N/A') ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->v_tag_no.'' ) : 'N/A' ?></td>
			<?php }else{ ?>
			<td><?= isset($row->V_Asset_no) ? $row->V_Asset_no : 'N/A' ?></td>
			<?php } ?>
			<td><?= isset($row->V_request_status) ? $row->V_request_status : 'N/A' ?></td>
			<td><?= isset($row->DocReferenceNo) ? $row->DocReferenceNo : 'N/A' ?></td>
			<td><?= isset($row->rone) ? $row->rone : 'N/A' ?></td>
			<td><?= isset($row->rthree) ? $row->rthree: 'N/A' ?></td>
			<td><?= isset($row->specialty_cat) ? $row->specialty_cat : '' ?></td>
	        			</tr>

<?php $numrow++; $start++; ?>
			<?php //if (($numrow-1)%13==0) {
				if ( (($numrow-1)== count($record))) {
		?>
	</table><!-- 
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
</div>-->

<?php } ?> 
<?php endforeach;?>
<center>
<ul class="pagination">
						<?php if ($rec[0]->jumlah > $limit){ ?>
							<li><a href="?p=1&req_status=<?=$this->input->get('req_status');?>&from=<?=$from?>&to=<?=$to?>&hospitalcodes=<?=$this->input->get('hospitalcodes');?>&typeOfWrkOrd=<?=$this->input->get('typeOfWrkOrd');?>"> <i class="fa fa-chevron-circle-left" style="color:green"></i> First Page </a></li>
							<li><a href="?p=<?=($this->input->get('p') > 1 ? $this->input->get('p')-1 : 1)?>&req_status=<?=$this->input->get('req_status');?>&from=<?=$from?>&to=<?=$to?>&hospitalcodes=<?=$this->input->get('hospitalcodes');?>&typeOfWrkOrd=<?=$this->input->get('typeOfWrkOrd');?>">Prev</a></li>
							
							<li><a href=""><?=($this->input->get('p') ? $this->input->get('p') : 1)?></a></li>
							<li class="paginate_button previous"><a href="?p=<?php echo $page?>&req_status=<?=$this->input->get('req_status');?>&from=<?=$from?>&to=<?=$to?>&hospitalcodes=<?=$this->input->get('hospitalcodes');?>&typeOfWrkOrd=<?=$this->input->get('typeOfWrkOrd');?>">Next</a></li>
							<li><a href="?p=<?php echo ceil($rec[0]->jumlah/$limit);?>&req_status=<?=$this->input->get('req_status');?>&from=<?=$from?>&to=<?=$to?>&hospitalcodes=<?=$this->input->get('hospitalcodes');?>&typeOfWrkOrd=<?=$this->input->get('typeOfWrkOrd');?>"> Last Page <i class="fa fa-chevron-circle-right" style="color:red;"></i></a></li>
						<?php } ?>
						</ul>
						</center>
<?php } ?>

<?php if (!empty($record)) {include 'content_footerprint.php';}?>
</div>
</div>
