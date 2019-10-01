<div class="ui-left_web">
<div class="ui-middle-screen">
<div><?php include 'content_mobile_menu.php';?></div>
<table class="table-middle-screen-2" border="0">
<tr>
    <td style="width: 13%; border-style:none;";>
	<?php include 'content_tab_menu.php';?>
	</td>
	<td  style="width: 2%; border-style: none;"></td>
	<td valign="top" style="width: 70%;">
		<table class="ui-content-middle-menu-workorder tblala" border="0"  align="center">
			<tr>
				<td align="center" colspan="4"><h4 class="h4-margin" style="text-align: left;">SYSTEM ADMINISTRATION</h4></td>
			</tr>
			<?php if (!in_array("contentcontroller/sys_admin?gbl=1", $chkers)) { ?>
			<tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?gbl=1', '<img src="'. base_url() .'images/helpdesk.png" alt="" class="ui-icon"/><br></br>Personnel Info'); ?>
				</td>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/sys_admin?us=1", $chkers)) { ?>
				<td>
				<?php echo anchor ('contentcontroller/sys_admin?us=1', '<img src="'. base_url() .'images/workorder.png" alt="" class="ui-icon"/><br></br>User Setup'); ?>
				</td>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/sys_admin?ec=1", $chkers)) { ?>
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?ec=1', '<img src="'. base_url() .'images/certificate.png" alt="" class="ui-icon"/><br></br>Equipment Code'); ?>
				</td>
			
			<?php  } ?>
			<?php if (!in_array("contentcontroller/sys_admin?ud=1", $chkers)) { ?>
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?ud=1', '<img src="'. base_url() .'images/Schedule.png" alt="" class="ui-icon"/><br></br>User Department'); ?>
				</td>
				</tr>	
			<?php  } ?>
			<?php if (!in_array("contentcontro<br></br>ller/sys_admin?jt=1", $chkers)) { ?>
			<tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?jt=1', '<img src="'. base_url() .'images/stock.png" alt="" class="ui-icon"/><br></br>Job type'); ?>
				</td>
				<td style="border: none;"></td>	
				<td style="border: none;"></td>	
				<td style="border: none;"></td>	
			</tr>
			<?php  } ?>
			
			
		</table>	
	<td style="width: 10%;"></td>
	</tr>
	</table>
</div>
</div>

<div class="ui-left_mobile">
<div class="ui-middle-screen">
<table class="table-middle-screen-2" border="0">
<tr>
    <td colspan="2" style="width: 13%; border-style:none;";>
	<?php include 'content_mobile_menu.php';?>
	</td>
</tr>
<tr>
	<td valign="top">
	<table class="ui-content-middle-menu-workorder tblala" border="0"  align="center">
			<?php if (!in_array("contentcontroller/sys_admin?gbl=1", $chkers)) { ?>
			<tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?gbl=1', '<img src="'. base_url() .'images/helpdesk.png" alt="" class="ui-icon"/><br></br>Personnel Info'); ?>
				</td>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/sys_admin?us=1", $chkers)) { ?>
				<td>
				<?php echo anchor ('contentcontroller/sys_admin?us=1', '<img src="'. base_url() .'images/workorder.png" alt="" class="ui-icon"/><br></br>User Setup'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/sys_admin?ec=1", $chkers)) { ?>
				<tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?ec=1', '<img src="'. base_url() .'images/certificate.png" alt="" class="ui-icon"/><br></br>Equipment Code'); ?>
				</td>
			
			<?php  } ?>
			<?php if (!in_array("contentcontroller/sys_admin?ud=1", $chkers)) { ?>
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?ud=1', '<img src="'. base_url() .'images/Schedule.png" alt="" class="ui-icon"/><br></br>User Department'); ?>
				</td>
				</tr>	
			<?php  } ?>
			<?php if (!in_array("contentcontro<br></br>ller/sys_admin?jt=1", $chkers)) { ?>
			<tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/sys_admin?jt=1', '<img src="'. base_url() .'images/stock.png" alt="" class="ui-icon"/><br></br>Job type'); ?>
				</td>	
			</tr>
			<?php  } ?>
		</table>
		</td>
		</tr>
		</table>
		</div>
</div>
</body>
</html>