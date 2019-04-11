<style type="text/css">
	table .tblala{
	    width: 100%;
	    table-layout: fixed;
	    margin-left: 5px;
	}

	.tblala tr td{
		text-align: left;
		
	}
	.tblala .wb td{
		text-align: center;
		background: rgba(255,255,255,.8);
		border: 3px solid #E8E8E8;
		
	}
	h4{
		font-size: 25px; 
		color: #165694;
	}
</style>
<div class="ui-middle-screen">
<table style="width: 100%; table-layout: auto;">
<tr>
<td style="width: 10%">
	<?php include 'content_tab_menu.php';?>
    <?php include 'content_mobile_menu.php';?>
		</td>
		<td style="width: 2%;"></td>
		<td valign="top">
		<table class="ui-content-middle-menu-workorder tblala" border="0"  align="center">
			<tr>
				<td align="center" colspan="4"><h4 class="h4-margin">SYSTEM ADMINISTRATION</h4></td>
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
	</div>
	</td>
	<td style="width: 2%;"></td>
	</tr>
	</table>
</div>
</body>
</html>