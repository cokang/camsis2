<?php
if ($this->input->get('ex') == 'excel'){
$filename ="PPM Work Order Summary (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<script>
function barchart(a,b,c,d,e,f){
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php if ($this->uri->slash_segment(1) == 'contentcontroller/') { echo "pop_barchart"; } else { echo "contentcontroller/pop_barchart"; }?>?&bar=ppm&v1='+a+'&v2='+b+'&v3='+c+'&v4='+d+'&m='+e+'&y='+f, 'assetnumber', winProp);
	Win.window.focus();
}
</script>
<?php include 'content_btp.php';?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">PPM Work Order Summary</div>
    <button onclick="javascript:myFunction('report_ppmwos?<?=$a?>&<?=$b?>&&none=closed&ex=ex&grp=<?=$this->input->get('grp');?>&fon=<?=$this->input->get('fon');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_ppmwos?<?=$a?>&<?=$b?>&&ex=excel&none=close&grp=<?=$this->input->get('grp');?>&fon=<?=$this->input->get('fon');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php //if($this->session->userdata('v_UserName') == 'nezam') {?>
	<span style="float:right; margin-right:90px;" onclick="barchart(<?php if ($ppmsum[0]->total == 0) { echo "0"; } else {echo $ppmsum[0]->total; }?>,<?php if ($ppmsum[0]->comp == 0) { echo "0"; } else {echo $ppmsum[0]->comp; }?>,<?php if ($ppmsum[0]->resch == 0) { echo "0"; } else {echo $ppmsum[0]->resch; }?>,<?php if ($ppmsum[0]->notcomp == 0) { echo "0"; } else {echo $ppmsum[0]->notcomp; }?>,'<?= substr(date('M',mktime(0, 0, 0, $month, 10)),0,3)?>',<?=$year?>)"><img src="<?php echo base_url();?>images/Bar-Chart-icon.png" style="width:40px; height:38px; position:absolute;" title="Bar Chart"></span>
	<?php //} ?>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>
<?php if ($this->input->get('ex') == ''){?>

<div id="Instruction" >
<center>View List : 
<?php if ($this->input->get('fon')) { ?>

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
<input type="hidden" value="<?php echo set_value('fon', ($this->input->get('fon')) ? $this->input->get('fon') : ''); ?>" name="fon"> 
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>

<?php } else { ?>

<form method="get" action="">
 <label for="from">From</label>
	<input type="date" name="from" id="from" value="<?=($from) ? $from : $from?>" class="form-control-button2 n_wi-date2">
	<label for="to">To</label>
	<input type="date" name="to" id="to" value="<?=($to) ? $to : $to?>" class="form-control-button2 n_wi-date2">
<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp"> 
<input type="hidden" value="<?php echo set_value('fon', ($this->input->get('fon')) ? $this->input->get('fon') : ''); ?>" name="fon"> 
<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
</form>

<?php } ?>
</div>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
		<?php if($this->input->get('m')){ ?>
		<td colspan="5">PPM Work Order Summary <?= substr(date('M',mktime(0, 0, 0, $month, 10)),0,3).' '.$year ?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> ) <?php if ($this->input->get('fon') == ''){echo ''; }else{ echo '(Freeze)';} ?></td>
		<?php } else { ?>
		<td colspan="5">PPM Work Order Summary ( <?= date("d-m-Y", strtotime($from)).' To '.date("d-m-Y", strtotime($to)); ?> ) - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> ) <?php if ($this->input->get('fon') == ''){echo ''; }else{ echo '(Freeze)';} ?></td>
		<?php } ?>
		</tr>
	</table>
	
	<table class="tftable" border="1" style="text-align:center; width:90%;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>Period <?php if ($this->session->userdata('usersess') == 'FES'){ echo '/ Categories';}?></th>
				<th>Total PPM Work Order</th>
				<th>Total Completed</th>
				<!--<th>Total Rescheduled</th>-->
				<th>Total Rescheduled Brought In </th>
				<th>Total Rescheduled Brought Out</th>
				<th>Total Not Done</th>
			</tr>
			
			<?php if ($this->session->userdata('usersess') == 'FES'){ ?>
			   <tr style="text-align:center;">
			   <td>Electrical</td>
			   <?php if (isset($totale[0]->PeCat)){?>
			  <td><?= isset($totale[0]->TPPMWO) == TRUE ? $totale[0]->TPPMWO : '0'?></td>
			  <td><?= isset($totale[0]->TC) == TRUE ? $totale[0]->TC : '0'?></td>
			  <td><?= isset($totale[0]->TRBI) == TRUE ? $totale[0]->TRBI : '0'?></td>
			  <td><?= isset($totale[0]->TRBO) == TRUE ? $totale[0]->TRBO : '0'?></td>
			  <td><?= isset($totale[0]->TND) == TRUE ? $totale[0]->TND : '0'?></td>
			  <?php } else { ?>			
			  <td><?php if (($ppmelec[0]->total + $reschoutlec[0]->reschout == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=total&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=ele'.'&fon='.$this->input->get('fon'),$ppmelec[0]->total + $reschoutlec[0]->reschout);} ?></td>
			  <td><?php if (($ppmelec[0]->comp == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=A&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=ele'.'&fon='.$this->input->get('fon'),$ppmelec[0]->comp);} ?></td>
			  <td><?php if ($ppmelec[0]->resch == 0) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=A&resch=ys&btp=1&grp='.$this->input->get('grp').'&serv=ele'.'&fon='.$this->input->get('fon'),$ppmelec[0]->resch);} ?></td>
			  <td><?php if ($reschoutlec[0]->reschout == 0) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=E&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=ele'.'&fon='.$this->input->get('fon'),$reschoutlec[0]->reschout);} ?></td>
			  <td><?php if (($ppmelec[0]->notcomp == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=C&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=ele'.'&fon='.$this->input->get('fon'),$ppmelec[0]->notcomp);} ?></td>				
			<?php } ?>	
				</tr>
				<tr style="text-align:center;">
					<td>Mechanical</td>
				<?php if (isset($totalm[0]->PeCat)){?>
	          <td><?= isset($totalm[0]->TPPMWO) == TRUE ? $totalm[0]->TPPMWO : '0'?></td>
			  <td><?= isset($totalm[0]->TC) == TRUE ? $totalm[0]->TC : '0'?></td>
			  <td><?= isset($totalm[0]->TRBI) == TRUE ? $totalm[0]->TRBI : '0'?></td>
			  <td><?= isset($totalm[0]->TRBO) == TRUE ? $totalm[0]->TRBO : '0'?></td>
			  <td><?= isset($totalm[0]->TND) == TRUE ? $totalm[0]->TND : '0'?></td>
            <?php } else { ?>				  
			  <td><?php if (($ppmmech[0]->total + $reschoutmech[0]->reschout == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=total&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=mec'.'&fon='.$this->input->get('fon'),$ppmmech[0]->total + $reschoutmech[0]->reschout);} ?></td>
			  <td><?php if (($ppmmech[0]->comp == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=A&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=mec'.'&fon='.$this->input->get('fon'),$ppmmech[0]->comp);} ?></td>
			  <td><?php if ($ppmmech[0]->resch == 0) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=A&resch=ys&btp=1&grp='.$this->input->get('grp').'&serv=mec'.'&fon='.$this->input->get('fon'),$ppmmech[0]->resch);} ?></td>
			  <td><?php if ($reschoutmech[0]->reschout == 0) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=E&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=mec'.'&fon='.$this->input->get('fon'),$reschoutmech[0]->reschout);} ?></td>
			  <td><?php if (($ppmmech[0]->notcomp == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=C&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=mec'.'&fon='.$this->input->get('fon'),$ppmmech[0]->notcomp);} ?></td>
				<?php } ?>	
				</tr>
				<tr style="text-align:center;">
					<td>Civil</td>
				<?php if (isset($totalm[0]->PeCat)){?>
			 <td><?= isset($totalm[0]->TPPMWO) == TRUE ? $totalc[0]->TPPMWO : '0'?></td>
			  <td><?= isset($totalc[0]->TC) == TRUE ? $totalc[0]->TC : '0'?></td>
			  <td><?= isset($totalc[0]->TRBI) == TRUE ? $totalc[0]->TRBI : '0'?></td>
			  <td><?= isset($totalc[0]->TRBO) == TRUE ? $totalc[0]->TRBO : '0'?></td>
			  <td><?= isset($totalc[0]->TND) == TRUE ? $totalc[0]->TND : '0'?></td>
			   <?php } else { ?>	
					<td><?php if (($ppmcivil[0]->total + $reschoutcivil[0]->reschout == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=total&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=civ'.'&fon='.$this->input->get('fon'),$ppmcivil[0]->total + $reschoutcivil[0]->reschout);} ?></td>
			  <td><?php if (($ppmcivil[0]->comp == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=A&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=civ'.'&fon='.$this->input->get('fon'),$ppmcivil[0]->comp);} ?></td>
			  <td><?php if ($ppmcivil[0]->resch == 0) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=A&resch=ys&btp=1&grp='.$this->input->get('grp').'&serv=civ'.'&fon='.$this->input->get('fon'),$ppmcivil[0]->resch);} ?></td>
			  <td><?php if ($reschoutcivil[0]->reschout == 0) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=E&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=civ'.'&fon='.$this->input->get('fon'),$reschoutcivil[0]->reschout);} ?></td>
			 <td><?php if (($ppmcivil[0]->notcomp == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=C&resch=nt&btp=1&grp='.$this->input->get('grp').'&serv=civ'.'&fon='.$this->input->get('fon'),$ppmcivil[0]->notcomp);} ?></td>
				<?php } ?>	
				</tr>
			<?php } ?>
			<tr style="text-align:center;">
			<?php if($this->input->get('m')){ ?>
			<td><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			<?php } else { ?>
			  <td>(<?= date("d-m-Y", strtotime($from)).' To '.date("d-m-Y", strtotime($to)); ?>)</td>
			<?php } ?>
			  <?php if  ($this->input->get('ex') != 'excel'){ ?>
			  <?php if (isset($total[0]->PeCat)){?>
			  <td><?= isset($total[0]->TPPMWO) == TRUE ? $total[0]->TPPMWO : '0'?></td>
			  <td><?= isset($total[0]->TC) == TRUE ? $total[0]->TC : '0'?></td>
			  <td><?= isset($total[0]->TRBI) == TRUE ? $total[0]->TRBI : '0'?></td>
			  <td><?= isset($total[0]->TRBO) == TRUE ? $total[0]->TRBO : '0'?></td>
			  <td><?= isset($total[0]->TND) == TRUE ? $total[0]->TND : '0'?></td>
			  
			  <?php } else { ?>
		      <td><?php if (($ppmsum[0]->total + $reschout[0]->reschout == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=total&resch=nt&btp=1&grp='.$this->input->get('grp').'&fon='.$this->input->get('fon'),$ppmsum[0]->total + $reschout[0]->reschout);} ?></td>
			  <td><?php if (($ppmsum[0]->comp == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=A&resch=nt&btp=1&grp='.$this->input->get('grp').'&fon='.$this->input->get('fon'),$ppmsum[0]->comp);} ?></td>
			  <td><?php if ($ppmsum[0]->resch == 0) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=A&resch=ys&btp=1&grp='.$this->input->get('grp').'&fon='.$this->input->get('fon'),$ppmsum[0]->resch);} ?></td>
			  <td><?php if (($reschout[0]->reschout == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=E&resch=nt&btp=1&grp='.$this->input->get('grp').'&fon='.$this->input->get('fon'),$reschout[0]->reschout);} ?></td>
			  <td><?php if (($ppmsum[0]->notcomp == 0)) { echo "0"; } else {echo anchor('contentcontroller/report_vols?'.$a.'&'.$b.'&stat=C&resch=nt&btp=1&grp='.$this->input->get('grp').'&fon='.$this->input->get('fon'),$ppmsum[0]->notcomp);} ?></td>		
			<?php } ?>

				 <?php }else{ ?>
			<?php if (isset($total[0]->PeCat)){?>
			  <td><?= isset($total[0]->TPPMWO) == TRUE ? $total[0]->TPPMWO : '0'?></td>
			  <td><?= isset($total[0]->TC) == TRUE ? $total[0]->TC : '0'?></td>
			  <td><?= isset($total[0]->TRBI) == TRUE ? $total[0]->TRBI : '0'?></td>
			  <td><?= isset($total[0]->TRBO) == TRUE ? $total[0]->TRBO : '0'?></td>
			  <td><?= isset($total[0]->TND) == TRUE ? $total[0]->TND : '0'?></td>
			  
			  <?php } else { ?>
				  <td><?php if (($ppmsum[0]->total + $reschout[0]->reschout == 0)) { echo "0"; } else {echo $ppmsum[0]->total + $reschout[0]->reschout ;} ?></td>
				  <!--<td><?php if (($ppmsum[0]->total == 0)) { echo "0"; } else {echo $ppmsum[0]->total;} ?></td>-->
			  <td><?php if (($ppmsum[0]->comp == 0)) { echo "0"; } else {echo $ppmsum[0]->comp;} ?></td>
			  <td><?php if ($ppmsum[0]->resch == 0) { echo "0"; } else {echo $ppmsum[0]->resch;} ?></td>
			  <td><?php if (($reschout[0]->reschout == 0)) { echo "0"; } else {echo $reschout[0]->reschout;} ?></td>
			  <td><?php if (($ppmsum[0]->notcomp == 0)) { echo "0"; } else {echo $ppmsum[0]->notcomp;} ?></td>		
			<?php } ?>
				  <?php } ?>
			 
			</tr>
	</table>
	<?php if ($this->input->get('ex') != 'excel'){?>
	<div id="container" class="qapgraf2"></div>
	<?php } ?>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">PPM Work Order Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
	<?php } ?>
</div>

<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
