<div class="ui-middle-screen">
	<?php include 'content_tab_menu.php';?>
	<div class="content-workorder">
		<?php include 'content_mobile_menu.php';?>
		<table class="ui-content-middle-menu-workorder" border="0"  align="center" style="background:#79B6D8; opacity: .7;">
			<tr class="ui-header-middle-color" >
				<td align="center" colspan="2" class="ui-header-homepage"><h4 class="h4-margin">WORK MODULES</h4></td>
			</tr>
			<?php 
			/*$mn = array("Help Desk Center" => "contentcontroller/desk?parent=desk", "Assets" => "contentcontroller/assets?parent=asset", "Work Order" => "contentcontroller/workorder?parent=wrkodr", "Statutory & Licenses" => "contentcontroller/Licenses", "Reports" => "contentcontroller/Schedule");
			
			foreach ($mn as $value => $apa) {
			foreach($b as $c)
			{ 
			if ($c->path == $apa)
	    {
			echo '<tr class="ui-content-color-style">';
			echo '<td width="80%">';
			echo anchor ($apa, '<img src="'. base_url() .'images/helpdesk.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$value);
			echo '</td>';
			echo '<td width="20%">&nbsp;</td>';
			echo '</tr>';
			}
			}
			}*/
			?>
			<?php if (!in_array("contentcontroller/workorder?parent=desk", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/workorder?parent=complaint', '<img src="'. base_url() .'images/helpdesk.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HelpDeskCenter'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if ($this->session->userdata('usersess') == 'HKS') { ?>
			<?php  if (!in_array("contentcontroller/assets?parent=asset", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<?php echo anchor ('contentcontroller/locationlist?parent=asset', '<img src="'. base_url() .'images/asset.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  } else { if (!in_array("contentcontroller/assets", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<?php echo anchor ('contentcontroller/assets?parent=asset', '<img src="'. base_url() .'images/asset.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assets'); ?>
				</td>
			</tr>
			<?php } } ?>
			<?php  if (!in_array("contentcontroller/workorder?parent=wrkodr", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<?php echo anchor ('contentcontroller/workorder?parent=wrkodr', '<img src="'. base_url() .'images/workorder.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Work Order'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/Licenses", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/Licenses', '<img src="'. base_url() .'images/certificate.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Statutory & Licenses'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/Schedule", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/Schedule', '<img src="'. base_url() .'images/Schedule.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reports'); ?>
				</td>	
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/Store", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
				<?php if ($this->session->userdata('usersess') == "SEC") { ?>
				 <?php echo anchor ('contentcontroller/Store', '<img src="'. base_url() .'images/stock.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Equipment'); ?>
				<?php } else { ?>
					<?php echo anchor ('contentcontroller/Store', '<img src="'. base_url() .'images/stock.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Stock'); ?>
				<?php  }?>
					
				</td>	
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/acgreport", $chkers)) { ?>
			<tr class="ui-content-color-style">
				<td>
					<?php echo anchor ('contentcontroller/acg_report?tabIndex=1', '<img src="'. base_url() .'images/Statutory.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Deduction Mapping Report'); ?>
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