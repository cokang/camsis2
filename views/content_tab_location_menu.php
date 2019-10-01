<tr class="ui-left_web">
	<?= ($this->input->get('parent') == 'asset') ? '<td width="120px" class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td width="120px" class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
<?php echo anchor ('contentcontroller/locationlist?parent=asset', 'All Location'); ?></td>

<!--
<?= ($this->input->get('assets') == '1') ? '<td width="150px" class="ui-highlight" align="center" colspan="0" style="">' : '<td width="150px" class="ui-content-menu-desk-color" align="center" colspan="0" style="">' ?>
<?php echo anchor ('contentcontroller/assetsC?assets=1', 'No-PPM Assets'); ?></td>-->
	<td>&nbsp;</td>
</tr>
<tr>
	<td style="background:#398074;"  class="ui-left_mobile">
		<?php
		if (!is_null($this->input->get('assets'))){
			if ($this->input->get('assets') == 0){ 
				echo "<table class='ui-mobile-content-header' border='0' align='center' width='100%'>";
				echo "<tr>";
				echo "<td style='width:20px;'>";
				//echo anchor ('contentcontroller/qap3','<span class="icon-arrow-left"></span>');
				echo "</td>";
				echo "<td align='center'>";
				echo 'All Assets';
				echo"</td>";
				echo "<td align='right' style='width:20px;'>";
				echo anchor ('contentcontroller/assetsC?assets=1','<span class="icon-arrow-right"></span>');
				echo "</td>"; 
				echo "</tr>";
				echo "</table>";
			}
			elseif($this->input->get('assets') == 1){
				echo "<table class='ui-mobile-content-header' border='0' align='center' width='100%'>";
				echo "<tr>";
				echo "<td style='width:20px;'>";
				echo anchor ('contentcontroller/assets?assets=0','<span class="icon-arrow-left"></span>');
				echo "</td>";
				echo "<td align='center'>";
				echo 'No-PPM Assets';
				echo"</td>";
				echo "<td align='right' style='width:20px;'>";
				//echo anchor ('contentcontroller/assetsC?assets=1','<span class="icon-arrow-right"></span>');
				echo "</td>"; 
				echo "</tr>";
				echo "</table>";
			}
		}
		?>
	</td>
</tr>