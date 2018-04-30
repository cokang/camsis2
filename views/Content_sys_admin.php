<div class="ui-middle-screen">
	<?php include 'content_tab_menu.php';?>
	<div class="content-workorder">
		<?php include 'content_mobile_menu.php';?>
		<table class="ui-content-middle-menu-workorder" border="0"  align="center" style="background:#79B6D8; opacity: .7;">
			<tr class="ui-header-middle-color" >
				<td align="center" colspan="2" class="ui-header-homepage"><h4 class="h4-margin">SYSTEM ADMINISTRATION</h4></td>
			</tr>
			<?php if (!in_array("contentcontroller/sys_admin?gbl=1", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?gbl=1', '<img src="'. base_url() .'images/helpdesk.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personnel Info'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/sys_admin?us=1", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<?php echo anchor ('contentcontroller/sys_admin?us=1', '<img src="'. base_url() .'images/workorder.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Setup'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/sys_admin?ec=1", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?ec=1', '<img src="'. base_url() .'images/certificate.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Equipment Code'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/sys_admin?ud=1", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?ud=1', '<img src="'. base_url() .'images/Schedule.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Department'); ?>
				</td>	
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/sys_admin?jt=1", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?jt=1', '<img src="'. base_url() .'images/stock.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job type'); ?>
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