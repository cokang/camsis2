<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Statutory & License Summary - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<script>
function barchart(a,b,c,d){
	winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
	Win = window.open('<?php if ($this->uri->slash_segment(1) == 'contentcontroller/') { echo "pop_barchart"; } else { echo "contentcontroller/pop_barchart"; }?>?&bar=Stat&v1='+a+'&v2='+b+'&m='+c+'&y='+d, 'assetnumber', winProp);
	Win.window.focus();
}
</script>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Statutory & License Summary</div>
    <button onclick="javascript:myFunction('report_sls?m=<?=$month?>&y=<?=$year?>&grp=<?=$this->input->get('grp');?>&none=closed&ex=ex');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule?<?php echo '&m='.$this->input->get('m').'&y='.$this->input->get('y').'&grp='.$this->input->get('grp');?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_sls?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php //if($this->session->userdata('v_UserName') == 'nezam') {?>
	<span style="float:right; margin-right:90px;" onclick="barchart(<?php if ($licsatsum[0]->notlicsat+$satsum[0]->notlicsat == 0){ echo '0';}else{echo $licsatsum[0]->notlicsat+$satsum[0]->notlicsat;}?>,<?php if ($licsatsum[0]->licsat+$satsum[0]->licsat == 0){ echo '0';}else{echo $licsatsum[0]->licsat+$satsum[0]->licsat;}?>,'<?= substr(date('M',mktime(0, 0, 0, $month, 10)),0,3)?>',<?=$year?>)"><img src="<?php echo base_url();?>images/Bar-Chart-icon.png" style="width:40px; height:38px; position:absolute;" title="Bar Chart"></span>
	<?php //} ?>
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
			<td colspan="5">Statutory & License Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>License/Certificate Type</th>
				<th>No of License/Certificate </th>
				<th>Expired license/Certificate</th>
			</tr>
			<tr style="text-align:center;">
				<td><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			  <td><?php if ($licsatsum[0]->notlicsat+$satsum[0]->notlicsat == 0) { echo $licsatsum[0]->notlicsat+$satsum[0]->notlicsat; } else {echo anchor('contentcontroller/report_rsls?m='.$month.'&y='.$year.'&stat=ys&grp='.$this->input->get('grp'),$licsatsum[0]->notlicsat+$satsum[0]->notlicsat);} ?></td>
			  <td><?php if ($licsatsum[0]->licsat+$satsum[0]->licsat == 0) { echo $licsatsum[0]->licsat+$satsum[0]->licsat; } else {echo anchor('contentcontroller/report_rsls?m='.$month.'&y='.$year.'&stat=no&grp='.$this->input->get('grp'),$licsatsum[0]->licsat+$satsum[0]->licsat);} ?></td>
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
			<td colspan="5">Statutory & License Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
		</tr>
	</table>
</div>

<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>