<div class="ui-middle-screen">
<table class="table-middle-screen-2" border="0">
<tr>
    <td style="width: 13%; border-style:none;";>
	<?php include 'content_tab_menu.php';?>
	<?php include 'content_mobile_menu.php';?>
	</td>
	<td  style="width: 2%; border-style: none;"></td>
	<td valign="top" style="width: 70%;">
		<table class="ui-content-middle-menu-workorder tblala" border="0" align="center">
			<tr>
				<td colspan="4"><h4 class="h4-margin" style="text-align: left;">PROCUREMENT MODULES</h4></td>
			</tr>
			<?php  if (!in_array("Procurement?pro=mrin", $chkers)) { ?>
			<tr class="wb">
				<td width="80%">
				<a href="<?php echo base_url();?>index.php/Procurement?pro=mrin"><img src="<?php echo base_url(); ?>images/report.png" alt="" class="ui-icon"/><br></br> MRIN</a>
				</td>
			<?php  } ?>
			<?php  if (!in_array("Procurement/e_pr", $chkers)) { ?>
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/e_pr"><img src="<?php echo base_url(); ?>images/Pr.png" alt="" class="ui-icon"/><br></br>PR/PO</a>
				</td>
		
			<?php  } ?>
			<?php  if (!in_array("Procurement/pro_catalog", $chkers)) { ?>

				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/pro_catalog"><img src="<?php echo base_url(); ?>images/vendorupdate.png" alt="" class="ui-icon"/><br></br>Vendor Update</a>
				</td>
			<?php  } ?>
			<?php  if (!in_array("Procurement/Release_note", $chkers)) { ?>
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/Release_note"><img src="<?php echo base_url(); ?>images/notepad.png" alt="" class="ui-icon"/><br></br>Release Note</a>
				</td>
				</tr>
			<?php  } ?>
			<?php  if (!in_array("Procurement/e_request", $chkers)) { ?>
				<tr class="wb">
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/e_request"><img src="<?php echo base_url(); ?>images/followup.png" alt="" class="ui-icon"/><br></br>PO Follow Up</a>
				</td>
	
			<?php  } ?>
			<?php  if (!in_array("Procurement/report", $chkers)) { ?>
			
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/report"><img src="<?php echo base_url(); ?>images/report.png" alt="" class="ui-icon"/><br></br>Report</a>
				</td>					
			<?php  } ?>
			<?php  if (!in_array("Procurement/report_progress", $chkers)) { ?>
				<td>
				<a href="<?php echo base_url();?>index.php/Procurement/report_progress"><img src="<?php echo base_url(); ?>images/report.png" alt="" class="ui-icon"/><br></br>Progress Work Order</a>
				</td>
				<td style="border: none"></td>
			<?php  } ?>

		</table>		
	<td style="width: 10%;"></td>
	</tr>
	</table>
</div>
</body>
</html>