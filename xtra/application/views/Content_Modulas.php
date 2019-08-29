<div class="ui-left_web">
<div class="ui-middle-screen">
<table class="table-middle-screen-2" border="0">
<tr>
    <td style="width: 13%; border-style:none;";>
	<?php include 'content_tab_menu.php';?>
	<?php include 'content_mobile_menu.php';?>
	</td>
	<td  style="width: 2%; border-style: none;"></td>
	<td valign="top" style="width: 70%;">
		<table class="ui-content-middle-menu-workorder tblala" border="0"  align="center">
			<tr >
				<td colspan="4"><h4 class="h4-margin" style="text-align: left;">WORK MODULES</h4></td>
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
			<tr  class="wb">
				<td>
					<?php echo anchor ('contentcontroller/workorder?parent=complaint', '<img src="'. base_url() .'images/helpdesk.png" alt="" class="ui-icon"/><br></br>HelpDeskCenter'); ?>
				</td>
			<?php  } ?>
			<?php  if ($this->session->userdata('usersess') == 'HKS') { ?>
			<?php  if (!in_array("contentcontroller/assets?parent=asset", $chkers)) { ?>
				<td>
				<?php echo anchor ('contentcontroller/locationlist?parent=asset', '<img src="'. base_url() .'images/asset.png" alt="" class="ui-icon"/><br></br>Location'); ?>
				</td>
			<?php  } ?>
			<?php  } else { if (!in_array("contentcontroller/assets", $chkers)) { ?>
				<td>
				<?php echo anchor ('contentcontroller/assets?parent=asset', '<img src="'. base_url() .'images/asset.png" alt="" class="ui-icon"/><br></br>Assets'); ?>
				</td>
				
			<?php } } ?>
			<?php  if (!in_array("contentcontroller/workorder?parent=wrkodr", $chkers)) { ?>
				<td>
				<?php echo anchor ('contentcontroller/workorder?parent=wrkodr', '<img src="'. base_url() .'images/workorder.png" alt="" class="ui-icon"/><br></br>Work Order'); ?>
				</td>
				
			<?php  } ?>
			<?php if (!in_array("contentcontroller/Licenses", $chkers)) { ?>
			   
				<td>
					<?php echo anchor ('contentcontroller/Licenses', '<img src="'. base_url() .'images/certificate.png" alt="" class="ui-icon"/><br></br>Statutory & Licenses'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/Schedule", $chkers)) { ?>
			 <tr class="wb">
				<td>
					<?php echo anchor ('contentcontroller/Schedule', '<img src="'. base_url() .'images/Schedule.png" alt="" class="ui-icon"/><br></br>Reports'); ?>
				</td>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/Store", $chkers)) { ?>
				<td>
				<?php if ($this->session->userdata('usersess') == "SEC") { ?>
				 <?php echo anchor ('contentcontroller/Store', '<img src="'. base_url() .'images/stock.png" alt="" class="ui-icon"/><br></br>Equipment'); ?>
				<?php } else { ?>
					<?php echo anchor ('contentcontroller/Store', '<img src="'. base_url() .'images/stock.png" alt="" class="ui-icon"/><br></br>Stock'); ?>
				<?php  }?>

				</td>
			
	
			<?php  } ?>
			<?php if (!in_array("contentcontroller/acgreport", $chkers)) { ?>
			    
				<td>
					<?php echo anchor ('contentcontroller/acg_report?tabIndex=1', '<img src="'. base_url() .'images/Statutory.png" alt="" class="ui-icon"/><br></br>Deduction Mapping Report'); ?>
				</td>
			<?php  } ?>
		
				<td>
					<?php //echo anchor ('Upload_asis?tabIndex=1', '<img src="'. base_url() .'images/upload.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload ASIS');Ajaxasisa
								//ori echo anchor ('contentcontroller/upload_asis', '<img src="'. base_url() .'images/upload.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload ASIS');
								echo anchor ('contentcontroller/uploaddesk', '<img src="'. base_url() .'images/upload.png" alt="" class="ui-icon"/><br></br>Upload ASIS');
					?>
				</td>
			</tr>
			<!-- <tr class="ui-header-new" style="height:8px;">
				<td align="center" colspan="4" class="footer-class">
				</td>
			</tr>
 -->
			</table>	
			</div>
 			<td style="width: 10%; border-style: none;"></td>	
	</tr>
	</table>
	</div>
</div>

<div class="ui-left_mobile">
<div class="ui-middle-screen">
<table class="table-middle-screen-2" border="0">
<tr>
    <td colspan="4" style="width: 13%; border-style:none;";>
	<?php include 'content_mobile_menu.php';?>
	</td>
</tr>
<tr>
	<td valign="top">
		<table class="ui-content-middle-menu-workorder tblala" border="0"  align="center">
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
			<tr  class="wb">
				<td>
					<?php echo anchor ('contentcontroller/workorder?parent=complaint', '<img src="'. base_url() .'images/helpdesk.png" alt="" class="ui-icon"/><br></br>HelpDeskCenter'); ?>
				</td>
			<?php  } ?>
			<?php  if ($this->session->userdata('usersess') == 'HKS') { ?>
			<?php  if (!in_array("contentcontroller/assets?parent=asset", $chkers)) { ?>
				<td>
				<?php echo anchor ('contentcontroller/locationlist?parent=asset', '<img src="'. base_url() .'images/asset.png" alt="" class="ui-icon"/><br></br>Location'); ?>
				</td>
			<?php  } ?>
			<?php  } else { if (!in_array("contentcontroller/assets", $chkers)) { ?>
				<td>
				<?php echo anchor ('contentcontroller/assets?parent=asset', '<img src="'. base_url() .'images/asset.png" alt="" class="ui-icon"/><br></br>Assets'); ?>
				</td>
				</tr>
			<?php } } ?>
			<?php  if (!in_array("contentcontroller/workorder?parent=wrkodr", $chkers)) { ?>
			<tr  class="wb">
				<td>
				<?php echo anchor ('contentcontroller/workorder?parent=wrkodr', '<img src="'. base_url() .'images/workorder.png" alt="" class="ui-icon"/><br></br>Work Order'); ?>
				</td>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/Licenses", $chkers)) { ?>
				<td>
					<?php echo anchor ('contentcontroller/Licenses', '<img src="'. base_url() .'images/certificate.png" alt="" class="ui-icon"/><br></br>Statutory & Licenses'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/Schedule", $chkers)) { ?>
			<tr  class="wb">
				<td>
				<?php echo anchor ('contentcontroller/Schedule', '<img src="'. base_url() .'images/Schedule.png" alt="" class="ui-icon"/><br></br>Reports'); ?>
				</td>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/Store", $chkers)) { ?>
				<td>
				<?php if ($this->session->userdata('usersess') == "SEC") { ?>
				 <?php echo anchor ('contentcontroller/Store', '<img src="'. base_url() .'images/stock.png" alt="" class="ui-icon"/><br></br>Equipment'); ?>
				<?php } else { ?>
					<?php echo anchor ('contentcontroller/Store', '<img src="'. base_url() .'images/stock.png" alt="" class="ui-icon"/><br></br>Stock'); ?>
				<?php  }?>
				</td>
				</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/acgreport", $chkers)) { ?>
			 <tr  class="wb">   
				<td>
					<?php echo anchor ('contentcontroller/acg_report?tabIndex=1', '<img src="'. base_url() .'images/Statutory.png" alt="" class="ui-icon"/><br></br>Deduction Mapping Report'); ?>
				</td>
			<?php  } ?>
				<td>
					<?php //echo anchor ('Upload_asis?tabIndex=1', '<img src="'. base_url() .'images/upload.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload ASIS');Ajaxasisa
								//ori echo anchor ('contentcontroller/upload_asis', '<img src="'. base_url() .'images/upload.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload ASIS');
								echo anchor ('contentcontroller/uploaddesk', '<img src="'. base_url() .'images/upload.png" alt="" class="ui-icon"/><br></br>Upload ASIS');
					?>
				</td>
			</tr>
			<!-- <tr class="ui-header-new" style="height:8px;">
				<td align="center" colspan="4" class="footer-class">
				</td>
			</tr>
 -->
			</table>	
			</div>	
	</tr>
	</table>
	</div>

</div>
</body>
</html>
