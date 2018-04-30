<div class="ui-middle-screen">
	<?php include 'content_tab_menu.php';?>
	<div class="content-workorder">
		<?php include 'content_mobile_menu.php';?>
		<table class="ui-content-middle-menu-workorder" border="0" align="center" style="background:#79B6D8; opacity: .7;">
			<tr class="ui-header-middle-color">
				<td align="center" colspan="2" class="ui-header-homepage"><h4 class="h4-margin">CENTRAL FUNCTIONS</h4></td>
			</tr>
			<tr class="ui-content-color-style" color="black">
				<td width="90%" style="color:black;">
				<?php echo anchor ('contentcontroller/qap3', '<img src="'. base_url() .'images/Quality.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quality Assurance Program'); ?>
				</td>
			</tr>
			<tr class="ui-content-color-style">
				<td>
				<?php echo anchor ('contentcontroller/vo3', '<img src="'. base_url() .'images/VariationOrder.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Variation Order'); ?>
				</td>
			</tr>
			<!--<tr class="ui-content-color-style">
				<td>
				<a href="#"><img src="<?php echo base_url(); ?>images/SystemAdministration.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System Administration</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td>
				<a href="#"><img src="<?php echo base_url(); ?>images/Inventory.png" alt="" class="ui-icon" />&nbsp;&nbsp;&nbsp;&nbsp;Stock Inventory</a>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<!--<tr class="ui-content-color-style">
				<td>
				<a href="#"><img src="<?php echo base_url(); ?>images/AutomaticComplaintGeneration.png" alt="" class="ui-icon" />&nbsp;&nbsp;&nbsp;&nbsp;Automatic Complaint Generation</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td>
				<a href="#"><img src="<?php echo base_url(); ?>images/usersecurty.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;User Security</a>
				</td>	
				<td>&nbsp;</td>					
			</tr>-->
			<tr class="ui-header-new" style="height:8px;">
				<td align="center" colspan="4" class="footer-class">
				</td>
			</tr>
		</table>		
	</div>
</div>
</body>
</html>