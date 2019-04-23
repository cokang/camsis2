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
				<td colspan="4"><h4 class="h4-margin" style="text-align: left;">CENTRAL FUNCTIONS</h4>
				</td>
			</tr>
			<tr class="wb">
				<td width="90%" style="color:black;">
				<?php echo anchor ('contentcontroller/qap3', '<img src="'. base_url() .'images/Quality.png" alt="" class="ui-icon"/><br></br>Quality Assurance Program'); ?>
				</td>
				<td>
				<?php echo anchor ('contentcontroller/vo3', '<img src="'. base_url() .'images/VariationOrder.png" alt="" class="ui-icon"/><br></br>Variation Order'); ?>
				</td>
				<td style="border: none;"></td>
				<td style="border: none;"></td>
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
			
		</table>
		<td style="width: 10%;"></td>
		</tr>
		</table>		
	</div>
</div>
</body>
</html>