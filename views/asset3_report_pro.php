<div class="ui-middle-screen">
</table>
<table class="table-middle-screen-2" border="0">
<tr><td>
<div class="div-p"></div>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" align="center">
			<tr class="ui-color-desk desk2">
				<td colspan="4" class="" style="color:white; height:40px; padding-left:10px; background:#398074;	"><b>Procurement Reports</b> <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
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
					<?php $autocolor = array('#7D26CD', '#B22222', '#E9967A', '#00FFFF', '#ADD8E6'); shuffle($autocolor);?>
					<table class="main-report">
					<style>
					.main-report { text-align:center;  margin: 5px auto; width:60%;}
					.main-report tr td a{ width:20%; }
					.main-report tr td a{ font-weight:bold; font-size : 14px; }
					.icon-file-text2,.icon-stats-bars,.icon-cart,.icon-document{font-size : 100px;}
					</style>
					<tr>
					<td><?php echo anchor ('Procurement/pr_report?pr=rs&m='.$this->input->get('m').'&y='.$this->input->get('y'),'<span class="icon-file-text2" style="color:'.$autocolor[0].';"></span> <br />Report Status'); ?></td>
					<td><?php echo anchor ('Procurement/pr_report?pr=vc','<span class="icon-cart" style="color:'.$autocolor[2].';"></span> <br />Vendor Cost'); ?></td>
					<td><?php echo anchor ('Procurement/pr_report?pr=vr','<span class="icon-stats-bars" style="color:'.$autocolor[1].';"></span> <br />Monthly Report'); ?></td>
					<td><?php echo anchor ('Procurement/rprt_po_list?btp=1&m='.$this->input->get('m').'&y='.$this->input->get('y'),'<span class="icon-document" style="color:'.$autocolor[4].';"></span> <br />PO Report'); ?></td>
					<td><?php echo anchor ('Procurement/report_mrin_listing?m='.$month.'&y='.$year,'<span class="icon-file-text2" style="color:'.$autocolor[3].';"></span> <br />Mrin Report'); ?></td>
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
	</td>
	</tr>
	</table>
</div>
</body>
</html>