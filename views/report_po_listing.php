<?php
if ($this->input->get('ex') == 'excel'){
	$filename ="Schedule Corrective Maintenance (SCM) Listing (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}

if ($this->input->get('ex') == ''){
	include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">PO REPORT</div>
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
		<?php //include 'content_headprint.php';?>
	<?php } ?>
	<?php if ($this->input->get('ex') == ''){?>

	<?php } ?>
		<div class="m-div">
			<table >
			<tr>
					<td colspan="5">
						 <?=anchor ('Procurement/report?','Back')?>						 
					</td>
				</tr>
				<tr>
					<td colspan="5">
						MONTHLY PO REPORT -  <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>						 
					</td>
				</tr>
				
			</table>
			<div style="overflow-x:auto;">
		<table class="tftable" border="1" style="text-align:center;">
			<tr style="background:#CCC;">
			<th>No.</th>
			<th>Hospital</th>
			<th>Pending PO</th>
			<th>Complete PO</th>
			<th>% Rejected MRIN</th>
           </tr>
           <?php if(!empty($records)){?>
		   <?php 
		   $totalpogen = 0;
		   $totalpocom = 0;
		   $totalrjm = 0;
		   ?>
		   <?php $no=1;foreach($records as $row):?>
		   <?php 
		    $rjt=($row->po_gen > 0) ? number_format(($row->po_com / $row->po_gen) * 100, 2) : '0.00';
		    $totalpogen = $totalpogen + $row->po_gen;
		    $totalpocom = $totalpocom + $row->po_com;
		    $totalrjm = $totalrjm + $rjt;
		   ?>
					<tr>
					<td><?=$no;?></td>
					<td><a href="?m=<?=$month?>&y=<?=$year;?>&whatr=1&whathosp=<?=$row->hosp;?>"><?=$row->hosp;?></a></td>
					<td><a href="?m=<?=$month?>&y=<?=$year;?>&whatr=2&whathosp=<?=$row->hosp;?>"><?=$row->po_gen;?></a></td>
					<td><a href="?m=<?=$month?>&y=<?=$year;?>&whatr=3&whathosp=<?=$row->hosp;?>"><?=$row->po_com;?></a></td>
					<td><?=$rjt?></td>				
					</tr>				
					<?php $no++;endforeach;?>
					<tr>
					<td colspan="2">Total</td>
					<td><?=$totalpogen?></td>
					<td><?=$totalpocom?></td>
					<td><?=number_format($totalrjm,2)?></td>
					</tr>
					<?php }else{ ?>
				<tr>
					<td colspan="5" ><span style="color:red;">NO RECORDS FOUND.</span></td>
				</tr>
					<?php } ?>
			</table>
       </div>
	   <?php 
	   if ($this->input->get('whatr') == 21){?>
	   <table class="tftable" border="1" style="margin-top:60px;text-align:center;">
	   <tr style="background:#CCC;">
       <th>Total Pending MRIN</th>
       <th>Pending AM</th>
       <th>% Pending AM</th>
       <th>Pending Procurement</th>
       <th>%Pending Procurement</th>
       <th>Pending Specialist</th>
       <th>% Pending Specialist</th>
       <th>Pending Logistic</th>
       <th>% Pending Logistic</th>
       </tr>
	   <tr>
	   <td><?= $totalcwo ?></td>
	   <td><?= $totalpam ?></td>
	   <td><?= $totalpamp ?></td>
	   <td><?= $totalppr ?></td>
	   <td><?= $totalpprp ?></td>
	   <td><?= $totalpsp ?></td>
	   <td><?= $totalpspp ?></td>
	   <td><?= $totalplc ?></td>
	   <td><?= $totalplcp ?></td>
	   </tr>
	   </table>
	
	   <?php } ?>
	   <?php 
	   if ($this->input->get('whatr')){?>
	   	<div style="overflow-x:auto;">
	   <table style="margin-top:60px;" class="tftable" border="1" style="text-align:center;">
	   <tr style="background:#CCC;">
<th>No.</th>
<th>MRIN No.</th>
<th>MRIN Date</th>
<th>ItemCode</th>
<th>Item Name</th>
<th>Qty</th>
<th>WO No.</th>
<th>Asset Name</th>
<th>Asset No.</th>
<th>Tag No.</th>
<th>Brand</th>
<th>Model No</th>
<th>WO Date</th>
<th>Root Cause(1)</th>
<th>Root Cause(2)</th>
<th>Root Cause(3)</th>
<th>Site Comments</th>
<th>AM Status</th>
<th>AM Comments</th>
<th>HQ Procurement Status</th>
<th>HQ Procurement Comments</th>
<th>Specialist</th>
<th>Specialist Status</th>
<th>Specialist Comments</th>
<th>HQ Logistic Status</th>
<th>HQ Logistic Comments</th>
</tr>
 <?php if(!empty($records2)){?>
 <?php $no=1;foreach($records2 as $row):?>
 <tr>
 <td><?=$no;?></td>
 <td><?=$row->DocReferenceNo;?></td>
 <td><?=date("d/m/Y",strtotime($row->DateCreated));?></td>
 <td><?=$row->ItemCode;?></td>
 <td><?=$row->ItemName;?></td>
 <td><?=$row->Qty;?></td>
 <td><?=$row->WorkOfOrder;?></td>
 <td><?=$row->V_Asset_name;?></td>
 <td><?=$row->v_Asset_no;?></td>
 <td><?=$row->V_Tag_no;?></td>
 <td><?=$row->V_Brandname;?></td>
 <td><?=$row->V_Model_no;?></td>
 <td><?=date("d/m/Y",strtotime($row->d_StartDt));?></td>
 <td><?=$row->rone;?></td>
 <td><?=$row->rtwo;?></td>
 <td><?=$row->rthree;?></td>
 <td><?=$row->Comments;?></td>
 <?php
 $spec2 = $row->ApprStatusID;
	if ($spec2 == 4) {
		$spec2 = "Approved";
	}
	elseif ($spec2 == 5){
		$spec2 = "Rejected"; }
	elseif ($spec2 == 6){
		$spec2 = "Pending" ;}
	elseif ($spec2 == 128) {
		$spec2 = "Returned(Ammended)"; }
	elseif ($spec2 == 129){
		$spec2 = "Approved (RN)";}
 ?>
 <td><?=$spec2?></td>
 <td><?=$row->ApprComments;?></td>
   <?php 
$spec2 = $row->ApprStatusIDx;
	if ($spec2 == 4) {
		$spec2 = "Approved";
	}
	elseif ($spec2 == 5){
		$spec2 = "Rejected"; }
	elseif ($spec2 == 6){
		$spec2 = "Pending" ;}
	elseif ($spec2 == 128) {
		$spec2 = "Returned(Ammended)"; }
	elseif ($spec2 == 129){
		$spec2 = "Approved (RN)";}

 ?>
 <td><?=$spec2;?></td>
  <td><?=$row->ApprCommentsx;?></td>
  <?php 
$spec2 = $row->Status;
	if ($spec2 == 4) {
		$spec2 = "Approved";
	}
	elseif ($spec2 == 5){
		$spec2 = "Rejected"; }
	elseif ($spec2 == 6){
		$spec2 = "Pending" ;}
	elseif ($spec2 == 128) {
		$spec2 = "Returned(Ammended)"; }
	elseif ($spec2 == 129){
		$spec2 = "Approved (RN)";}

 ?>
  <td><?=($row->Specialist) ? $row->Specialist :'&nbsp;';?></td>
 <td><?=($row->Status) ? $spec2 :'&nbsp;';?></td>
  <td><?=($row->Remark) ? $row->Remark :'&nbsp;';?></td>
    <?php 
$spec2 = $row->ApprStatusIDxx;
	if ($spec2 == 4) {
		$spec2 = "Approved";
	}
	elseif ($spec2 == 5){
		$spec2 = "Rejected"; }
	elseif ($spec2 == 6){
		$spec2 = "Pending" ;}
	elseif ($spec2 == 128) {
		$spec2 = "Returned(Ammended)"; }
	elseif ($spec2 == 129){
		$spec2 = "Approved (RN)";}

 ?>
 <td><?=($row->ApprStatusIDxx) ? $spec2 :'&nbsp;';?></td>
 <td><?=($row->ApprCommentsxx) ? $row->ApprCommentsxx :'&nbsp;';?></td>

</tr>				

<?php $no++;endforeach;?>					
<?php }else{ ?>
<tr>
<td colspan="26" ><span style="color:red;">NO RECORDS FOUND.</span></td>
</tr>	  
<?php } ?>
	  </table>
	  </div>
<?php } ?>	  
		</div>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
	
	<?php } ?>
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php //include 'content_footerprint.php';?>
	<?php } ?>

