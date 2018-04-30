<div class="ui-middle-screen">
	<?php include 'content_tab_menu.php';?>
	<div class="content-workorder">
		<?php include 'content_mobile_menu.php';?>
		<table class="ui-content-middle-menu-workorder" border="0" align="center" style="background:#79B6D8; opacity: .7;">
			<tr class="ui-header-middle-color">
				<td align="center" colspan="2" class="ui-header-homepage"><h4 class="h4-margin">PROCUREMENT MODULES</h4></td>
			</tr>
			<?php  if (!in_array("Procurement?pro=mrin", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td width="80%">
				<a href="<?php echo base_url();?>index.php/Procurement?pro=mrin"><img src="<?php echo base_url(); ?>images/report.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MRIN</a>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("Procurement/e_pr", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/e_pr"><img src="<?php echo base_url(); ?>images/Pr.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PR/PO</a>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("Procurement/pro_catalog", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/pro_catalog"><img src="<?php echo base_url(); ?>images/vendorupdate.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendor Update</a>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("Procurement/Release_note", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/Release_note"><img src="<?php echo base_url(); ?>images/notepad.png" alt="" class="ui-icon" />&nbsp;&nbsp;&nbsp;&nbsp;Release Note</a>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("Procurement/e_request", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/e_request"><img src="<?php echo base_url(); ?>images/followup.png" alt="" class="ui-icon" />&nbsp;&nbsp;&nbsp;&nbsp;PO Follow Up</a>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("Procurement/report", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/report"><img src="<?php echo base_url(); ?>images/report.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Report</a>
				</td>					
			</tr>
			<?php  } ?>
			<?php  if (!in_array("Procurement/report_progress", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/report_progress"><img src="<?php echo base_url(); ?>images/report.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Progress Work Order</a>
				</td>					
			</tr>
			<?php  } ?>
			<tr class="ui-header-new" style="height:8px;">
				<td align="center" colspan="4" class="footer-class">
				</td>
			</tr>
		</table>		
	</div>
</div>
</body>
</html>