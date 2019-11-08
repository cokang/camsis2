<?php
if ($this->input->get('ex') == 'excel'){
$filename ="MONTHLY PROCUREMENT REPORT ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">MONTHLY PROCUREMENT REPORT</div>
    <button onclick="javascript:myFunction('pr_report?pr=vr&m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>report?<?php echo '&m='.$this->input->get('m').'&y='.$this->input->get('y');?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=vr&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">

<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<?php include 'content_headprint.php';?>
<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<div id="Instruction"></div>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="5">MONTHLY PROCUREMENT REPORT <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
			<th>No.</th>
			<th>Hospital</th>
			<th>Generated MRIN</th>
			<th>Rejected MRIN </th>
			<th>% Rejected MRIN</th>
			<!--<th>Pending PR </th>
			<th>% Pending PR </th>-->
			<th>Pending MRIN</th>
			<th>% Pending MRIN</th>
			<th>Approved MRIN</th>
			<th>% Approved MRIN</th>
		</tr>

		<?php $sumgen=0;$sumrej=0;$sumpen=0;$sumapr=0;?>
		<?php if(!empty($records)){?>
		<?php $nom=1;foreach($records as $row):?>
		<tr>
			<td><?=$nom;?></td>
			<td><a href="<?=site_url()?>/Procurement/report_mrin_listing?m=<?=$month;?>&y=<?=$year;?>&whatr=1&whathosp=<?=$row->hosp;?>"><?=$row->hosp;?></a></td>
			<td><a href="<?=site_url()?>/Procurement/report_mrin_listing?m=<?=$month;?>&y=<?=$year;?>&whatr=2&whathosp=<?=$row->hosp;?>"><?=$row->Total;?></a></td>
			<td><a href="<?=site_url()?>/Procurement/report_mrin_listing?m=<?=$month;?>&y=<?=$year;?>&whatr=3&whathosp=<?=$row->hosp;?>"><?=$row->reject;?></a></td>
			<td><?= number_format(($row->reject / $row->Total) * 100, 2); ?></td>
			<td><a href="<?=site_url()?>/Procurement/report_mrin_listing?m=<?=$month;?>&y=<?=$year;?>&whatr=4&whathosp=<?= $row->hosp;?>"><?=$row->pending;?></a></td>
			<td><?= number_format(($row->pending / $row->Total) * 100, 2);?></td>
			<td><a href="<?=site_url()?>/Procurement/report_mrin_listing?m=<?=$month;?>&y=<?=$year;?>&whatr=5&whathosp=<?= $row->hosp;?>"><?=$row->approve_mirn;?></a></td>
			<td><?= number_format(($row->approve_mirn / $row->Total) * 100, 2) ;?></td>
		</tr>
			<?php 
			$sumgen = $sumgen + $row->Total;
			$sumrej = $sumrej + $row->reject;
			$sumpen = $sumpen + $row->pending;
			$sumapr = $sumapr + $row->approve_mirn;
			?>
		<?php $nom++;endforeach;?>
		<tr>
			<td colspan="2">Total</td>
			<td><?=$sumgen;?></td>
			<td><?=$sumrej;?></td>
			<td><?= number_format(($sumrej / $sumgen) * 100, 2) ;?></td>
			<td><?=$sumpen;?></td>
			<td><?= number_format(($sumpen / $sumgen) * 100, 2) ;?></td>
			<td><?=$sumapr;?></td>
			<td><?= number_format(($sumapr / $sumgen) * 100, 2) ;?></td>
		</tr>
		<?php } ?>
	</table><br><br><br>

	<?php if(isset($_GET['whathosp']) ){?>
		
		<?php if( $_GET['whatr'] <> "" ){?>
			<!-- <a href="<?=site_url()?>/Procurement/report_mrin_listing?m=<?=$month;?>&y=<?=$year;?>&whatr=<?=$_REQUEST["whatr"];?>&whathosp=<?=$_REQUEST["whathosp"];?>">
				<img src="<?=base_url()?>/images/excel.png" width="22" height="20">
			</a> -->

			<?php if( $_GET['whatr']==21 ){?>
			<!-- <table border=o cellspacing=1 > -->
			<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
				<tr style="background:#CCC;">
					<td>Total Pending MRIN</td>
					<td>Pending AM</td>
					<td>% Pending AM</td>
					<td>Pending Procurement</td>
					<td>%Pending Procurement</td>
					<td>Pending Specialist</td>
					<td>% Pending Specialist</td>
					<td>Pending Logistic</td>
					<td>% Pending Logistic</td>
				</tr>
				<tr>
					<td><?=$totalcwo;?></td>
					<td><a href="<?=site_url()?>/Procurement/report_mrin_listing?m=<?=$month;?>&y=<?=$year;?>&whatr=2&whatrx=1"><?=$totalpam;?></a></td>
					<td><?=$totalpamp;?></td>
					<td><a href="<?-site_url();?>/Procurement/report_mrin_listing?m=<?=$month;?>&y=<?=$year;?>&whatr=2&whatrx=2"><?=$totalppr;?></a></td>
					<td><?=$totalpprp;?></td>
					<td><a href="report-procurement-listing.asp?m=<%=sMonth%>&y=<%=sYear%>&whatr=2&whatrx=3"><?=$totalpsp;?></a></td>
					<td><?=$totalpspp;?></td>
					<td><a href="<?=site_url()?>/Procurement/report_mrin_listing?m=<?=$month;?>&y=<?=$year;?>&whatr=2&whatrx=4"><?=$totalplc;?></a></td>
					<td><?=$totalplcp;?></td>
				</tr>
			</table>
			<?php } ?>
			<table class="tftable scrolltable" border="1" style="text-align:center; width:100%;" align="center">
				<tr style="background:#CCC;">
					<td>No.</td>
					<td>MRIN No.</td>
					<td>MRIN Date</td>
					<td>ItemCode</td>
					<td>Item Name</td>
					<td>Qty</td>
					<td>WO No.</td>
					<td>Asset Name</td>
					<td>Asset No.</td>
					<td>Tag No.</td>
					<td>Brand</td>
					<td>Model No</td>
					<td>WO Date</td>
					<td>Root Cause(1)</td>
					<td>Root Cause(2)</td>
					<td>Root Cause(3)</td>
					<td>Site Comments</td>
					<td>AM Status</td>
					<td>AM Comments</td>
					<td>HQ Procurement Status</td>
					<td>HQ Procurement Comments</td>
					<td>Specialist</td>
					<td>Specialist Status</td>
					<td>Specialist Comments</td>
					<td>HQ Logistic Status</td>
					<td>HQ Logistic Comments</td>
				</tr>
				<?php  if(!empty($whatr)){?>
				<?php $nom=0;foreach($whatr as $uResa):$nom++;?>
				<tr >
					<td><?=$nom;?></td>
					<td><?=$uResa->DocReferenceNo;?>&nbsp;</td>
					<td><?=$uResa->DateCreated;?>&nbsp;</td>
					<td><?=$uResa->ItemCode;?>&nbsp;</td>
					<td><?=$uResa->ItemName;?>&nbsp;</td>
					<td><?=$uResa->Qty;?>&nbsp;</td>
					<td><?=$uResa->WorkOfOrder;?>&nbsp;</td>
					<td><?=$uResa->V_Asset_name;?>&nbsp;</td>
					<td><?=$uResa->v_Asset_no;?>&nbsp;</td>
					<td><?=$uResa->V_Tag_no;?>&nbsp;</td>
					<td><?=$uResa->V_Brandname;?>&nbsp;</td>
					<td><?=$uResa->V_Model_no;?>&nbsp;</td>
					<td><?=$uResa->d_StartDt;?>&nbsp;</td>
					<td><?=$uResa->rone;?>&nbsp;</td>
					<td><?=$uResa->rtwo;?>&nbsp;</td>
					<td><?=$uResa->rthree;?>&nbsp;</td>
					<td><?=$uResa->Comments;?>&nbsp;</td>
					<?php
					$spec2 = $uResa->ApprStatusID;
					if( $spec2 == 4 ){
						$spec2 = "Approved";
					}elseif( $spec2 == 5 ){
						$spec2 = "Rejected";
					}elseif( $spec2 == 6 ){
						$spec2 = "Pending";
					}elseif( $spec2 == 128 ){
						$spec2 = "Returned (Ammended)";
					}elseif( $spec2 = 129 ){
						$spec2 = "Approved (RN)";
					}
					?>
					<td><?=$spec2;?>&nbsp;</td>
					<td><?=$uResa->ApprComments;?>&nbsp;</td>
					<?php
					$spec2 = $uResa->ApprStatusIDx;
					if( $spec2 == 4 ){
						$spec2 = "Approved";
					}elseif( $spec2 == "5" ){
						$spec2 = "Rejected";
					}elseif( $spec2 == 6 ){
						$spec2 = "Pending";
					}
					elseif( $spec2 == 128 ){
						$spec2 = "Returned (Ammended)";
					}elseif( $spec2 == 129 ){
						$spec2 = "Approved (RN)";
					}
					?>
					<td><?=$spec2;?>&nbsp;</td>
					<td><?=$uResa->ApprCommentsx;?>&nbsp;</td>
					<?php
					$spec1 = "&nbsp;";
					$spec2 = "&nbsp;";
					$spec3 = "&nbsp;";

					$spec1 = ($uResa->Specialist) ? $uResa->Specialist : "&nbsp";
					$spec2 = ($uResa->Status) ? $uResa->Status : "nbsp";
					$spec3 = ($uResa->Remark) ? $uResa->Remark : "nbsp";
					if( $spec2 == 4 ){
						$spec2 = "Approved";
					}elseif( $spec2 == 5 ){
						$spec2 = "Rejected";
					}elseif( $spec2 == 6 ){
						$spec2 = "Pending";
					}elseif( $spec2 == 128 ){
						$spec2 = "Returned (Ammended)";
					}elseif( $spec2 == 129 ){
						$spec2 = "Approved (RN)";
					}
					?>
					<td><?=$spec1;?></td>
					<td><?=$spec2;?></td>
					<td><?=$spec3;?></td>
					<?php
					$spec2 = $uResa->ApprStatusIDxx;
					if( $spec2 == 4 ){
						$spec2 = "Approved";
					}elseif( $spec2 == 5 ){
						$spec2 = "Rejected";
					}elseif( $spec2 == 6 ){
						$spec2 = "Pending";
					}elseif( $spec2 == 128 ){
						$spec2 = "Returned (Ammended)";
					}elseif( $spec2 == 129 ){
						$spec2 = "Approved (RN)";
					}
					?>
					<td><?=$spec2;?>&nbsp;</td>
					<td><?=$uResa->ApprCommentsxx;?>&nbsp;</td>
				</tr>
				<?php endforeach;?>
				<?php } ?>

				<?php $prevMirn ='1';
				if( !empty($whatr2) ){?>
				<?php $nom=1;foreach($whatr2 as $r):?>
				<tr>
					<td><?php if($prevMirn!=$r->WorkOfOrder){echo $nom++;}?></td>
					<td><?=$r->DocReferenceNo;?>&nbsp;</td>
					<td><?=$r->DateCreated;?>&nbsp;</td>
					<td><?=$r->ItemCode;?>&nbsp;</td>
					<td><?=$r->ItemName;?>&nbsp;</td>
					<td><?=$r->Qty;?>&nbsp;</td>
					<td><?=$r->WorkOfOrder;?>&nbsp;</td>
					<td><?=$r->V_Asset_name;?>&nbsp;</td>
					<td><?=$r->V_Asset_no;?>&nbsp;</td>
					<td><?=$r->V_Tag_no;?>&nbsp;</td>
					<td><?=$r->V_Brandname;?>&nbsp;</td>
					<td><?=$r->V_Model_no;?>&nbsp;</td>
					<td><?=$r->D_date;?>&nbsp;</td>
					<td><?=$r->rone;?>&nbsp;</td>
					<td><?=$r->rtwo;?>&nbsp;</td>
					<td><?=$r->rthree;?>&nbsp;</td>
					<td><?=$r->Comments;?>&nbsp;</td>
					<?php
					$spec2 = $r->ApprStatusID;
					if( $spec2 == 4 ){
						$spec2 = "Approved";
					}elseif( $spec2 == 5 ){
						$spec2 = "Rejected";
					}elseif( $spec2 == 6 ){
						$spec2 = "Pending";
					}elseif( $spec2 == 128 ){
						$spec2 = "Returned (Ammended)";
					}elseif( $spec2 == 129 ){
						$spec2 = "Approved (RN)";
					}
					?>
					<td><?=$spec2;?>&nbsp;</td>
					<td><?=$r->ApprComments;?>&nbsp;</td>
					<?php
					$spec2 = $r->ApprStatusIDx;
					if( $spec2 == 4 ){
						$spec2 = "Approved";
					}elseif( $spec2 == 5 ){
						$spec2 == "Rejected";
					}elseif( $spec2 == 6 ){
						$spec2 = "Pending";
					}elseif( $spec2 == 128 ){
						$spec2 = "Returned (Ammended)";
					}elseif( $spec2 == 129 ){
						$spec2 = "Approved (RN)";
					}
					?>
					<td><?=$spec2;?>&nbsp;</td>
					<td><?=$r->ApprCommentsx;?>&nbsp;</td>
					<?php
					if( !empty($whatr2) ){
						foreach ($whatr2 as $ro):
						$spec1 = ($ro->Specialist) ? $ro->Specialist : "N/A";
						$spec2 = ($ro->Status) ? $ro->Status : "&nbsp;";
						$spec3 = ($ro->Remark) ? $ro->Remark : "N/A";
						if( $spec2 == 4 ){
							$spec2 = "Approved";
						}elseif( $spec2 == 5 ){
							$spec2 = "Rejected";
						}elseif( $spec2 == 6 ){
							$spec2 = "Pending";
						}elseif( $spec2 == 128 ){
							$spec2 = "Returned (Ammended)";
						}elseif( $spec2 == 129 ){
							$spec2 = "Approved (RN)";
						}
						endforeach;
					}
					?>
					<td><?=$spec1;?></td>
					<td><?=$spec2;?></td>
					<td><?=$spec3;?></td>
					<?php
					$spec2 = $r->ApprStatusIDxx;
					if( $spec2 == 4 ){
						$spec2 = "Approved";
					}elseif( $spec2 == 5 ){
						$spec2 = "Rejected";
					}elseif( $spec2 == 6 ){
						$spec2 = "Pending";
					}elseif( $spec2 == 128 ){
						$spec2 = "Returned (Ammended)";
					}elseif( $spec2 == 129 ){
						$spec2 = "Approved (RN)";
					}
					?>
					<td><?=$spec2;?>&nbsp;</td>
					<td><?=$r->ApprCommentsxx;?>&nbsp;</td>
				</tr>
				<?php $prevMirn=$r->WorkOfOrder;endforeach;?>
				<?php } ?>
				<?php if( empty($whatr) && empty($whatr2) ){?>
				<tr><td colspan="26">No Result</td></tr>
				<?php } ?>
			</table>
		<?php } ?>
	<?php } ?>





















</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">MONTHLY PROCUREMENT REPORT <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>
