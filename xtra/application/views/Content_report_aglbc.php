<div style="position:fixed; margin-top:-10px; z-index: 1; width:100%; background:white; display:block; height:160px;">
<div id="Instruction" class="pr-printer" style="width:100%">
    <div class="header-pr">Asset Group Listing</div>
    <button onclick="javascript:myFunction('report_agl?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
</div>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; background:white; margin:5px;" bordercolor="#111111">
	<tr>
		<td width="64"><img src="<?php echo base_url(); ?>images/logo.png" style="width:140px; height:40px;"/></td>
		<td width="618">
			<span class="PantaiCorporateName">Advance Pact Sdn Bhd</span>
			<span class="PantaiCompanyNo">(412168-V)</span>
			<br>
			<span class="ReportCenter">site: <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?></span></td>
		<td width="200" align="right">
			<span class="ReportCenter"></span>&nbsp;</td>
	</tr>
</table>
<table class="rport-header" style=" background:white;">
	<tr>
		<td>ASSET REGISTER SUMMARY</td>
	</tr>
</table>
<table class="tftable" border="1" style="text-align:center;width:99.4%;  margin-left:5px;">
	<tr>
		<th width="20px">No</th>
		<th width="70px">Type Code</th>
		<th>Description</th>
		<th width="80px" >Asset Count</th>
	</tr>
</table>
</div>
<div class="menu" style="position:relative;">			

<div class="m-div" style="padding-top:156px;">

	<table class="tftable" border="1" style="text-align:center;">
		
		
		<?php  if (!empty($record)) {?>
				<?php $abjad='0'; $numrow = 1; $totalcount = 0; foreach($record as $row):?>
				<?php  if ($abjad != substr($row->V_Asset_name,0,1)) { $abjad = substr($row->V_Asset_name,0,1) ?>
				<tr style="text-align:center;">								
						<th colspan="4"><?=$abjad?></th>
				</tr>
				<?php  }?>
		<tr style="text-align:center;">
			<td width="20px"><?= $numrow ?></td>
			<td width="70px"><?= ($row->new_asset_type) ? $row->new_asset_type : 'N/A' ?></td>
			<td style="text-align:left;"><?= ($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
			<td width="80px"><?= ($row->assetcount) ? $row->assetcount : 'N/A' ?></td>
		</tr>
		<?php $totalcount = $totalcount + $row->assetcount; $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="4"><span style="color:red;">NO RECORDS FOUND.</span></td>
	    				</tr>
						<?php } ?>
		<tr>
			<td colspan="3" style="text-align:right;font-weight:bold;">Grand Total</td>
			<td style="text-align:center;font-weight:bold;"><?=$totalcount?></td>
		</tr>

	</table>
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Asset Register Summary<br><i>Computer Generated - APBESys</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>

</body>
</html>