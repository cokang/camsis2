<div class="ui-middle-screen">
<div class="div-p"></div>
<div class="main-box">
	<div class="box">
	<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue'); shuffle($autocolor);?>
		<div class="small-box <?php echo $autocolor[0];?>">
			<div class="inner2" >
				<p>NEW Release Note</p>
			</div>
			<div class="icon"><i class="icon-file-text2"></i></div>
			<?php echo anchor ('Procurement/Release_note?pro=new','<span class="ui-left_web">More Info <i class="icon-arrow-right"></i></span>','class="small-box-footer"'); ?>
		</div>
	</div>
</div>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" align="center">
			<tr class="ui-color-desk desk2">
				<td colspan="4" class="ui-main-form-header" style="color:white; height:40px; padding-left:10px; text-align:left;"><b>RELEASE NOTE </b> <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			</tr>
			<tr class="ui-color-desk bg-red-blood"> 
				<td colspan="4">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr style="background:#B3130A;">
							<td width="3%" height="30px">
							<a href="?&y=<?= $year-1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="3%">
							<a href="?&y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?&y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="3%">
							<a href="?&y=<?= $year+1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="4" style="" valign="top" >
					<table class="ui-content-middle-menu-workorder2" width="100%">
						<tr class="ui-menu-color-header" style="color:white; font-size:12px;">
							<th >&nbsp;</th>
							<th style="text-align:left;">RN Number</th>
							<th >Shipment Type</th>
							<th >Courier</th>
							<th >Status</th>
							<th >RN Date</th>
							<th >Consignment Date</th>
						</tr>
						<style>
				.ui-content-middle-menu-workorder2 tr th {padding:8px;font-size:14px;}
				.ui-content-middle-menu-workorder2 tr td {padding:8px;font-size:14px;}
				.ui-content-middle-menu-workorder2 tr td.td-desk a{ font-weight:bold; font-size:14px;}
				</style>
							<?php $numrow = 1; ?>
							   			
		    				<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
		    					<td class="td-desk"><?=$numrow++?></td>
		    					<td class="td-desk" style="text-align:left;"><a href="<?php echo base_url();?>index.php/Procurement/Release_note?pro=edit">	RN/NJ/BPH/00002/12 </a></td>
		    					<td class="td-desk">Courier </td>
		    					<td class="td-desk">Others </td>
		    					<td class="td-desk">Sent</td>
		    					<td class="td-desk">17 Jul 2012 </td>
		    					<td class="td-desk">17 Jul 2012 </td>
		        			</tr>
							<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
		    					<td class="td-desk"><?=$numrow++?></td>
		    					<td class="td-desk" style="text-align:left;"><a href="<?php echo base_url();?>index.php/Procurement/Release_note?pro=edit">	RN/MKA/JAS/00003/12 </a></td>
		    					<td class="td-desk">Courier </td>
		    					<td class="td-desk">Others </td>
		    					<td class="td-desk">Sent</td>
		    					<td class="td-desk">17 Jul 2012 </td>
		    					<td class="td-desk">17 Jul 2012 </td>
		        			</tr>					
								<tr align="center" style="height:200px; background:white;">
								<td colspan="10" class="default-NO">NO RELEASE NOTE FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
							</tr>
				</table>
			</td>	
		</tr>
		<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
				</td>
			</tr>
	</table>	
	</div>
</div>
</body>
</html>